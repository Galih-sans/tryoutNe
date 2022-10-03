<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\StudentModel;

class LoginController extends BaseController
{   
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['tittle'] = "Masuk Atau Daftar - Neo Edukasi";
    }
    public function login()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[6]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email atau Password tidak sesuai",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('auth/login', [
                    "validation" => $this->validator,'pagedata' => $this->pagedata
                ]);

            } else {
                $isAdmin = true;
                $adminModel = new AdminModel();
                $user = $adminModel->where('email', $this->request->getVar('email'))
                ->first();
                if(!$user){
                
                $isAdmin = false;
                $model = new StudentModel();
                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();
                if($user['email_verified'] == false){
                    session()->setFlashData("email_verification",'<div class="alert alert-warning" role="alert">Email Anda Belum Diverifikasi, Silahkan Verifikasi email anda terlebih dahulu, <a href="'.base_url('sendverification/'.$user['token']).'">Kirim email</a></div>');
                    return redirect()->route('login');
                }
                }
                // Stroing session values
                $this->setUserSession($user,$isAdmin);

                // Redirecting to dashboard after login
                if($isAdmin){
                    return redirect()->to(base_url('/admin'));
                }else{
                    return redirect()->to(base_url('/'));
                }
            }
        }
        return view('auth/login', ['pagedata'=> $this->pagedata]);
    }

    private function setUserSession($user,$isAdmin)
    {
        $encrypter = \Config\Services::encrypter();
       
        // decrypt the message 
        // $txt = $encrypter->decrypt(base64_decode($encodedMsg));
        //                'id' => base64_encode($encrypter->encrypt($user['id'])),
        if($isAdmin == true){
            $data = [
                'id' => $user['id'],
                'name' => $user['full_name'],
                'email' => $user['email'],
                'isLoggedIn' => true,
                'isAdmin' => true,
                // "role" => $user['role'],
            ];
        }else{
            $data = [
                'id' => base64_encode($encrypter->encrypt($user['id'])),
                'name' => $user['full_name'],
                'isLoggedIn' => true,
                'isUser' => true,
            ];
        }
        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}