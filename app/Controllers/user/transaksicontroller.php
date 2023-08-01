<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use Ramsey\Uuid\Uuid;

class transaksicontroller extends BaseController
{
    public $pagedata;
    public $encrypter;
    public $tests_model;
    public $paket_diamond_model;
    public $student_model;
    public $diamond_transaction_model;
    public $balance_model;
    public $log_balance_model;
    public $uri;
    public $offer_model;
    public function __construct()
    {
        $this->uri = service('uri');
        $this->offer_model = new \App\Models\Admin\OffersModel();
        $this->student_model = new \App\Models\StudentModel();
        $this->paket_diamond_model = new \App\Models\Admin\PaketDiamondModel();
        $this->diamond_transaction_model = new \App\Models\Admin\DiamondTransModel();
        $this->balance_model = new \App\Models\Admin\BalanceSiswaModel();
        $this->log_balance_model = new \App\Models\Admin\LogBalanceModel();
        $this->tests_model = new \App\Models\TestModel();
        $this->encrypter = \Config\Services::encrypter();
        $this->pagedata['activeTab'] = "transaksi";
        $this->pagedata['title'] = "Pembelian - Neo Edukasi";
    }
    protected function now()
    {
        return Time::now()->getTimestamp();
    }
    public function index()
    {
        $this->pagedata['tests'] =  $this->tests_model->findAll();
        $this->pagedata['paketDiamond'] =  $this->paket_diamond_model->findAll();

        return view('user/pages/transaksi/index', ['data' => $this->pagedata]);
    }

    public function check_voucher()
    {
        if ($this->request->isAJAX()) {
        $data = array();
        $data['diskon'] = 0;
        $data['string'] = array();
        $paket_id = $this->request->getVar('id_paket');
        $kode_voucher = $this->request->getVar('kode_voucher');
        $offer_data = $this->offer_model->where('offer_code', $kode_voucher)->where('status', 'active')->findAll();
        $dataPaket =  $this->paket_diamond_model->where('id', $paket_id)->findAll();

        if ($this->request->getVar('kode_voucher') == '') {
            $data['string'][] = 'Masukan Kode Voucher Terlebih Dahulu';
            $data['success'] = false;
        } elseif ($offer_data == true) {
            $pricexpercent = ((int)$dataPaket[0]->price * (int)$offer_data[0]->discount_percentage)/100;
            if ($pricexpercent > (int)$offer_data[0]->discount_amount) {
                $discount_price = (int)$offer_data[0]->discount_amount;
            } else {
                $discount_price = $pricexpercent;
            }
            $data['string'][] = 'Voucher Berhasil Digunakan';
            $data['success'] = true;
            $data['potongan'] = $discount_price;
            $data['code'] = $offer_data[0]->offer_code;
        } elseif ($offer_data == false) {
            $data['string'][] = 'Voucher Gagal Digunakan / Tidak Berlaku';
            $data['success'] = false;
            $data['data_diskon'] = $offer_data;
        }
        echo json_encode($data);
        exit();
    }
    }

    public function diamond_transaction()
    {
        if ($this->request->isAJAX()) {
        $this->pagedata['tests'] =  $this->tests_model->findAll();
        $this->pagedata['paketDiamond'] =  $this->paket_diamond_model->findAll();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('SERVER_KEY_MIDTRANS');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('IS_PRODUCTION_MIDTRANS');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = env('IS_SANITIZED_MIDTRANS');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = env('IS_3DS_MIDTRANS');

        // \Midtrans\Config::$appendNotifUrl = "https://example.com/test1,https://example.com/test2";

        $uuid = Uuid::uuid1();
        // $paket_id = $this->uri->getSegment(3);
        $paket_id = $this->request->getVar('paket_id');
        $student_id = session()->get('id');
        $dataPaket =  $this->paket_diamond_model->where('id', $paket_id)->findAll();
        $dataStudent =  $this->student_model->where('id', $student_id)->asObject()->findAll();

        $name = $dataStudent[0]->full_name;

        $parts = explode(" ", $name);
        if (count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        } else {
            $firstname = $name;
            $lastname = " ";
        }

        $transaction_details = array(
            'order_id' => $uuid->toString(),
            'gross_amount' => 1, // no decimal allowed for creditcard
        );

        $expiry  = array(
            // 'start_time' => $this->now() .  '+0800',
            'unit' => 'day',
            'duration' => 3,
        );

        $item1_details = array(
            'id' => $dataPaket[0]->id,
            'price' => $dataPaket[0]->price,
            'quantity' => 1,
            'name' => $dataPaket[0]->name,
        );

        // apakah menggunakan voucher atau tidak
        if ($this->request->getVar('offer_code') == 'undefined') {
            $item_details = array($item1_details);
        } else {
            $offer_code = $this->request->getVar('offer_code');
            $dataOffer = $this->offer_model->where('offer_code', $offer_code)->where('status', 'active')->findAll();
            $pricexpercent = ((int)$dataPaket[0]->price * (int)$dataOffer[0]->discount_percentage)/100;

            if ($pricexpercent > (int)$dataOffer[0]->discount_amount) {
                $discount_price = (int)$dataOffer[0]->discount_amount;
            } else {
                $discount_price = $pricexpercent;
            }

            $item2_details = array(
                'id' => $dataOffer[0]->id,
                'price' => -($discount_price), // perhitungan dengan persen diskon dengan harga item pertama
                'quantity' => 1,
                'name' => $dataOffer[0]->name
            );

            // Optional
            $item_details = array($item1_details, $item2_details);
        }

        $customer_details = array(
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $dataStudent[0]->email,
            'phone' => $dataStudent[0]->phone_number,
        );

        $params = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
            'expiry' => $expiry,
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);        
        // snap redirect
        // return redirect()->to('https://app.sandbox.midtrans.com/snap/v3/redirection/' . $snapToken);
        
        // snap local
        $data = [
            'transaction_id' => $transaction_details['order_id'],
            'snapToken' => $snapToken
        ];
        // $this->pagedata['snapToken'] = $snapToken;
        // return view('user/pages/snap/pay'); // REDIRECT KEMBALI KE TRANSAKSI, SNAP DIATAS HTML TRANSAKSI
        echo json_encode($data);
        exit();
    }
    }

    public function save_transaction(){
        $uuid1 = Uuid::uuid1();
        $student_id = session()->get('id');
        if ($this->request->isAJAX()) {
            $transaction_data = [
                'id' => $uuid1->toString(),
                'student_id' => $student_id,
                'package_id' => $this->request->getVar('package_id'),
                'transaction_id' => $this->request->getVar('transaction_id'),
                'status' => $this->request->getVar('status'),
            ];

            if ($this->request->getVar('offer_id') == 'undefined') {
                $transaction_data['offer_id'] = '';
            } else {
                $transaction_data['offer_id'] = $this->request->getVar('offer_id');
            }

            // if status success insert balance, create log type topup
            // if ($transaction_data['status'] == 'success') {
            //     $this->add_balance($transaction_data);
            //     $this->create_balace_log($transaction_data);
            // }
            
            $this->diamond_transaction_model->add_transaction($transaction_data);

            $response['success'] = true;
            $response['message'] = $transaction_data['status'];
            $balanceSiswa = $this->balance_model->where('user_id', $transaction_data['student_id'])->findAll();
            $response['balance'] = $balanceSiswa[0]->balance;
            echo json_encode($response);
        }
    }

    
    // public function add_balance($transaction_data){
    //     $packet_id = $transaction_data['package_id'];
    //     $dataPaket =  $this->paket_diamond_model->where('id', $packet_id)->findAll();
    //     $balanceSiswa = $this->balance_model->where('user_id', $transaction_data['student_id'])->findAll();
    //     $totalBalance = (int)$balanceSiswa[0]->balance + (int)$dataPaket[0]->amount;
    //     $data_balance = [
    //         'balance' => $totalBalance,
    //         'updated_at' => $this->now(),
    //     ]; 
    //     // $this->create_balace_log($transaction_data);
    //     $this->balance_model->update($transaction_data['student_id'] ,$data_balance);
    // }

    // public function create_balace_log($transaction_data){
    //     $dataPaket =  $this->paket_diamond_model->where('id', $transaction_data['package_id'])->findAll();
    //     $balanceSiswa = $this->balance_model->where('user_id', $transaction_data['student_id'])->findAll();
    //     $uuid11 = Uuid::uuid1();
    //     $total = (int)$balanceSiswa[0]->balance + (int)$dataPaket[0]->amount;
    //     $log_data = [
    //         'id' => $uuid11->toString(),
    //         'student_id' => $transaction_data['student_id'],
    //         'type' => 'topup',
    //         'amount' => $dataPaket[0]->amount,
    //         'total' => $total,
    //         'timestamp' => date("Y/m/d H:i:s",time()),
    //         'status' => '',
    //         'created_at' => $this->now()
    //     ];
    //     $this->log_balance_model->insert($log_data);
    // }

}
