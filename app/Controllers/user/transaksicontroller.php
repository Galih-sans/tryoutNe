<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class transaksicontroller extends BaseController
{
    public $pagedata;
    public $encrypter;
    public $tests_model;
    public $paket_diamond_model;
    public $student_model;
    public $uri;
    public function __construct()
    {
        $this->uri = service('uri');
        $this->student_model = new \App\Models\StudentModel;
        $this->paket_diamond_model = new \App\Models\Admin\PaketDiamondModel();
        $this->tests_model = new \App\Models\TestModel();
        $this->encrypter = \Config\Services::encrypter();
        $this->pagedata['activeTab'] = "transaksi";
        $this->pagedata['title'] = "Pembelian - Neo Edukasi";
    }
    public function index()
    {
        $this->pagedata['tests'] =  $this->tests_model->findAll();
        $this->pagedata['paketDiamond'] =  $this->paket_diamond_model->findAll();

        return view('user/pages/transaksi/index', ['data' => $this->pagedata]);
    }

    public function tes_beli()
    {
        $paket_id = $this->uri->getSegment(3);
        $student_id = $this->encrypter->decrypt(base64_decode(session()->get('id')));
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

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-K8J8EKP-cOq3kIJ5uCWuCRTN';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => 10000,
        //     ),
        //     'customer_details' => array(
        //         'first_name' => $firstname,
        //         'last_name' => $lastname,
        //         'email' => $dataStudent[0]->email,
        //         'phone' => $dataStudent[0]->phone_number,
        //     ),
        // );

        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 1000, // no decimal allowed for creditcard
        );

        $item1_details = array(
            'id' => 'a1',
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
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $data['token'] = $snapToken;
        return view('user/pages/transaksi/pay', $data);
    }
}
