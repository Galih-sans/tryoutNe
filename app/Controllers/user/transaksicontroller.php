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
    public $uri;
    public function __construct()
    {
        $this->uri = service('uri');
        $this->student_model = new \App\Models\StudentModel;
        $this->paket_diamond_model = new \App\Models\Admin\PaketDiamondModel();
        $this->diamond_transaction_model = new \App\Models\Admin\DiamondTransModel;
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

    public function diamond_transaction()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('SERVER_KEY_MIDTRANS');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('IS_PRODUCTION_MIDTRANS');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = env('IS_SANITIZED_MIDTRANS');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = env('IS_3DS_MIDTRANS');

        $uuid = Uuid::uuid1();
        $paket_id = $this->uri->getSegment(3);
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
            'gross_amount' => 1000, // no decimal allowed for creditcard
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
        // // Optional
        // $item2_details = array(
        //     'id' => 'a2',
        //     'price' => 45000,
        //     'quantity' => 1,
        //     'name' => "Orange"
        // );

        // Optional
        $item_details = array($item1_details);

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

        $transaction_data = array(
            'id' => $uuid->toString(),
            'student_id' => $student_id,
            'package_id' => $paket_id,
            'transaction_id' => $transaction_details['order_id'],
        );


        // create transaction data to_diamond_transaction
        $this->diamond_transaction_model->add_transaction($transaction_data);

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return redirect()->to('https://app.sandbox.midtrans.com/snap/v3/redirection/' . $snapToken);
    }
}
