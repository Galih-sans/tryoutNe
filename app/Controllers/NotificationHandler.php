<?php 
namespace App\Controllers;
// if ( ! defined('BASEPATH')) exit('Tidak dapat diakses secara langsung');

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;
use CodeIgniter\I18n\Time;

class NotificationHandler extends BaseController {

	/**
     * Index Page for this controller.
	 *
	 * Maps to the following URL
     * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
    public $diamond_transaction_model;
    public $uri;
    public $paket_diamond_model;
    public $balance_model;
    public $log_balance_model;
    
    public function __construct()
    {
        $this->diamond_transaction_model = new \App\Models\Admin\DiamondTransModel();
        $this->paket_diamond_model = new \App\Models\Admin\PaketDiamondModel();
        $this->log_balance_model = new \App\Models\Admin\LogBalanceModel();
        $this->balance_model = new \App\Models\Admin\BalanceSiswaModel();
        $this->uri = service('uri');
    }

    protected function now()
    {
        return Time::now()->getTimestamp();
    }

	public function index()
	{
        \Midtrans\Config::$serverKey = env('SERVER_KEY_MIDTRANS');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
		$notif = new \Midtrans\Notification();

        try {
            $notif = new \Midtrans\Notification();
        }
        catch (\Exception $e) {
            exit($e->getMessage());
        }

		//notification handler sample
		$transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        
        
        // $id_student = $data_diamond_transaction->student_id;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card')
            {
                if($fraud == 'challenge'){
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id ." is challenged by FDS";
                    } 
                    else {
                    // TODO set payment status in merchant's database to 'Success'
                    echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                    }
                }
                }
            else if ($transaction == 'settlement')
            {
                // data variabel untuk update
                $data_diamond_transaction = $this->diamond_transaction_model->where('transaction_id', $order_id)->first();
                // id transaksi
                $id_transaction = $data_diamond_transaction->id;
                // TODO set payment status in merchant's database to 'Settlement'
                // update status to_diamond_transaction
                $update_data = [
                    'status' => $transaction,
                ];
                $this->diamond_transaction_model->update($id_transaction, $update_data);
                // tambah balance berdasarkan amount + balance siswa lama
                $this->add_balance($data_diamond_transaction);
                $this->create_balace_log($data_diamond_transaction);
                echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
            }
            // else if($transaction == 'pending') // pending sudah di transaksicontroller
            // {
            //     // TODO set payment status in merchant's database to 'Pending'
            //     echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
            // }
            else if ($transaction == 'deny')
            {
                  // TODO set payment status in merchant's database to 'Denied'
                echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
            }
            else if($transaction == 'expire')
            {
                // data variabel untuk update
                $data_diamond_transaction = $this->diamond_transaction_model->where('transaction_id', $order_id)->first();
                // id transaksi
                $id_transaction = $data_diamond_transaction->id;
                // TODO set payment status in merchant's database to 'expire'
                $update_data = [
                    'status' => $transaction,
                ];
                $this->diamond_transaction_model->update($id_transaction, $update_data);
                // echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
            }
	}

    public function add_balance($data_diamond_transaction){
        $balanceSiswa = $this->balance_model->where('user_id', $data_diamond_transaction->student_id)->first();
        $dataPaket =  $this->paket_diamond_model->where('id', $data_diamond_transaction->package_id)->first();
        $totalBalance = (int)$balanceSiswa->balance + (int)$dataPaket->amount;
        $data_balance = [
            'balance' => $totalBalance,
            'updated_at' => $this->now(),
        ];
        // $this->create_balace_log($transaction_data);
        $this->balance_model->update($data_diamond_transaction->student_id, $data_balance);
    }

    public function create_balace_log($data_diamond_transaction){
        $dataPaket =  $this->paket_diamond_model->where('id', $data_diamond_transaction->package_id)->first();
        $balanceSiswa = $this->balance_model->where('user_id', $data_diamond_transaction->student_id)->first();
        $uuid = Uuid::uuid1();
        // $total = (int)$balanceSiswa[0]->balance + (int)$dataPaket[0]->amount;
        $log_data = [
            'id' => $uuid->toString(),
            'student_id' => $data_diamond_transaction->student_id,
            'type' => 'topup',
            'amount' => $dataPaket->amount,
            'total' => $balanceSiswa->balance,
            'timestamp' => date("Y/m/d H:i:s",time()),
            'status' => '',
            'created_at' => $this->now()
        ];
        $this->log_balance_model->insert($log_data);
    }
}
