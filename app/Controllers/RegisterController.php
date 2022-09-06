<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\ClassModel;
use App\Models\ModelSekolah;
use App\Models\StudentModel;

class RegisterController extends BaseController
{
    public $data;
    public $ClassModel;
    public $SchoolModel;
    public $StudentModel;
    public $email;
    protected $emailController;

    public function __construct()
    {
        $this->data['title'] = "Neo Edukasi - Masuk Atau Daftar";
        $this->ClassModel = new ClassModel();
        $this->SchoolModel = new ModelSekolah();
        $this->StudentModel = new StudentModel();
        $this->email = \Config\Services::email();
        $this->emailController =  new EmailController();
    }
    public function register()
    {

        $this->data['class'] = $this->ClassModel->orderBy('id', 'ASC')->findAll();
        $this->data['province'] = $this->SchoolModel->get_province();
        if ($this->request->getMethod() == 'post') {
            $data = [
                'full_name'     => $this->request->getVar('name'),
                'phone_number'     => $this->request->getVar('phone_number'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'POB'    => $this->request->getVar('POB'),
                'DOB'    => $this->request->getVar('DOB'),
                'parent_name'    => $this->request->getVar('parent_name'),
                'parent_email'    => $this->request->getVar('parent_email'),
                'parent_phone_number'    => $this->request->getVar('parent_phone_number'),
                'level'    => $this->request->getVar('level'),
                'class_id'    => $this->request->getVar('class'),
                'school'    => $this->request->getVar('school'),
                'token'    => random_string('md5', 16),
            ];
            if($this->StudentModel->save($data) === false){
                $this->data['old'] = $data; 
                return view('auth/register', ['data'=>$this->data,'validations'=>$this->StudentModel->errors()]);
            }else{
                $this->emailController->sendEmailVerification($data['email'], 'Verifikasi Akun Tryout Neo Edukasi',$data);
                session()->setFlashData("email_verification",'<div class="alert alert-success" role="alert">Selamat Akun Anda Berhasil Dibuat, Silahkan Cek Email Anda Untuk Verifikasi Akun Anda.</div>');
                return redirect()->to('/login');
            }
        }
        return view('auth/register', ['data'=>$this->data,]);
    }


    public function get_class()
    {
        if ($this->request->isAJAX()) {
        $level = $this->request->getVar('level');
        $data = $this->ClassModel->get_class_by_level($level);
        $response = array();
        foreach($data as $data)
        { 
                $response[] = array(
                    "id"=>$data->id,
                    "text"=>$data->class, PHP_EOL
                );
        }    
        echo json_encode($response);
        }
    }
    public function get_city()
    {
        if ($this->request->isAJAX()) {
        $kode_prop = $this->request->getVar('kode_prop');
        $data = $this->SchoolModel->get_city($kode_prop);
        $response = array();
        foreach($data as $data)
        { 
                $response[] = array(
                    "id"=>$data->kode_kab_kota,
                    "text"=>$data->kabupaten_kota, PHP_EOL
                );
        }    
        echo json_encode($response);
        }
    }
    public function get_districts()
    {
        if ($this->request->isAJAX()) {
        $kode_kab_kota = $this->request->getVar('kode_kab_kota');
        $data = $this->SchoolModel->get_districts($kode_kab_kota);
        $response = array();
        foreach($data as $data)
        { 
                $response[] = array(
                    "id"=>$data->kode_kec,
                    "text"=>$data->kecamatan, PHP_EOL
                );
        }    
        echo json_encode($response);
        }
    }
    public function get_school()
    {
        if ($this->request->isAJAX()) {
        $kode_kec = $this->request->getVar('kode_kec');
        $level = $this->request->getVar('level');
        $data = $this->SchoolModel->get_school($kode_kec,$level);
        $response = array();
        foreach($data as $data)
        { 
                $response[] = array(
                    "id"=>$data->id,
                    "text"=>$data->sekolah, PHP_EOL
                );
        }    
        echo json_encode($response);
        }
    }

    public function reset()
    {
        return view('auth/reset');
    }

    public function email_verif(){
        $uri = service('uri');
        $token=$uri->getSegment(3);
        if(!$this->StudentModel->where('token',$token)->get()){
            session()->setFlashData("email_verification",'<div class="alert alert-danger" role="alert">Authkey Expired, Silahkan Coba Lagi, Kirim Verifikasi Email</div>');
            return redirect()->route('login');
        }else{
            if(!$this->StudentModel->verify_email($token)){
                session()->setFlashData("email_verification",'<div class="alert alert-success" role="alert">Verifikasi Email Gagal, Silahkan Coba Lagi, Kirim Verifikasi Email</div>');
                return redirect()->route('login');
            }else{
                session()->setFlashData("email_verification",'<div class="alert alert-success" role="alert">Verifikasi Email Berhasil Silahkan Login</div>');
                return redirect()->route('login');
            }
        }
	}

    public function send_verif()
    {
        $uri = service('uri');
        $token=$uri->getSegment(2);
        if($this->StudentModel->where('token',$token)->first()){
            $data = $this->StudentModel->where('token',$token)->first();
            $this->emailController->sendEmailVerification($data['email'], 'Verifikasi Akun Tryout Neo Edukasi',$data);
            session()->setFlashData("email_verification",'<div class="alert alert-success" role="alert">Verifikasi Email Berhasil Dikirim Silahkan Buka Email Anda</div>');
            return redirect()->route('login');
        }else{
            session()->setFlashData("email_verification",'<div class="alert alert-warning" role="alert">Authkey Kadaluarsa, Silahkan Coba Lagi, Kirim Verifikasi Email</div>');
            return redirect()->route('login');
        }
    }

    public function forgetPassword()
    {
        $pagedata['tittle'] = "Neo Edukasi - Masuk Atau Daftar";
        if ($this->request->getMethod() == 'post') {
            $data = [
                'email'    => $this->request->getVar('email'),
            ];
            if(!$this->StudentModel->where('email',$data['email'])->first()){
                session()->setFlashData("email_verification",'<div class="alert alert-warning" role="alert">Maaf Email anda belum terdaftar. Silahkan mendaftar terlebih dahulu</a></div>');
                return view('auth/forget2', ['pagedata'=>$pagedata]);
            }else{
                $user = $this->StudentModel->where('email',$data['email'])->first();
                $this->emailController->sendForgotPass($data['email'], 'Konfirmasi Email untuk Mengatur Ulang Kata Sandi.',$user);
                session()->setFlashData("email_verification",'<div class="alert alert-success" role="alert">Email Untuk Mengatur Ulang Password Berhasil Dikirim. Silahkan Cek Email Anda.</div>');
                return view('auth/forget2', ['pagedata'=>$pagedata]);
            }
        }
        return view('auth/forget',['pagedata'=>$pagedata]);
    }
    
    public function resetpassword()
    {
        $pagedata['tittle'] = "Atur Ulang Kata Sandi - Neo Edukasi";
        $uri = service('uri');
        $token=$uri->getSegment(3);
        if($this->StudentModel->where('token',$token)->first()){
            if ($this->request->getMethod() == 'post') {
                $data = [
                    'password'    => $this->request->getVar('password'),
                ];
                if(!$this->StudentModel->reset_password($token,$data)){
                    session()->setFlashData("email_verification",'<div class="alert alert-success" role="alert">Kata Sandi Gagal Diubah Silahkan Coba Lagi.</div>');
                    return redirect()->route('auth/reset');
                }else{
                    session()->setFlashData("email_verification",'<div class="alert alert-success" role="alert">Kata Sandi Berhasil Diubah Silahkan Masuk dengan Kata Sandi Baru.</div>');
                    return redirect()->route('login');
                }
            }
            return view('auth/reset',['pagedata'=>$pagedata]);
        }else{
            return view('errors/html/error_403',['pagedata'=>$pagedata]);
        }
    }
}