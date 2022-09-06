<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmailController extends BaseController
{
	protected $email;

	public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function sendEmailVerification($to, $title,$data){
		$this->email->setFrom('noreply.neoedukasi@gmail.com@gmail.com','Neo Edukasi');
		$this->email->setTo($to);
		$this->email->setSubject($title);
        $template = view("email-template/verification-email", ['data'=>$data]);
		$this->email->setMessage($template);
		if(!$this->email->send()){
			return false;
		}else{
			return true;
		}
	}
    public function sendForgotPass($to, $title,$data){
		$this->email->setFrom('noreply.neoedukasi@gmail.com@gmail.com','Neo Edukasi');
		$this->email->setTo($to);
		$this->email->setSubject($title);
        $template = view("email-template/forgot_password", ['data'=>$data]);
		$this->email->setMessage($template);

		if(!$this->email->send()){
			return false;
		}else{
			return true;
		}
	}
}