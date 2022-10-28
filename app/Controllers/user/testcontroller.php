<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\Admin\QuestionCompotionModel;
use App\Models\TestModel;
use App\Models\StudentModel;

class testcontroller extends BaseController
{
    public $pagedata;
    public $TestModel;
    public $StudentModel;
    public $encrypter;
    public function __construct()
    {
        $this->uri = service('uri');
        $this->encrypter = \Config\Services::encrypter();
        $this->TestModel = new TestModel();
        $this->StudentModel = new StudentModel();
        $this->pagedata['activeTab'] = "test";

    }
    public function index()
    {
        
        $id = $this->encrypter->decrypt(base64_decode(session()->get('id')));
        
        $this->pagedata['title'] = "Daftar Test - Neo Edukasi";
        $this->pagedata['encrypter'] = $this->encrypter;
        $this->pagedata['testData'] = $this->TestModel->get_test($this->StudentModel->getClass($id));
        return view('user/pages/test/index', ['data'=>$this->pagedata]);
    }

    public function detail()
    {
        $QuestionCompotionModel = new QuestionCompotionModel();
        $this->pagedata['title'] = "Detail Test - Neo Edukasi";
        $id = $this->encrypter->decrypt(base64_decode(strtr($this->uri->getSegment(3),array('.' => '+', '-' => '=', '~' => '/'))));
        $this->pagedata['testData'] = $this->TestModel->getDetailTest($id);
        $this->pagedata['encrypter'] = $this->encrypter;
        $this->pagedata['testData']->subject = $QuestionCompotionModel->get_composition_subject($id);
        $this->pagedata['testData']->question_compositon = $QuestionCompotionModel->user_get_composition($id);
        
        return view('user/pages/test/view', ['data'=>$this->pagedata]);
    }
    public function sheet()
    {
        $this->pagedata['title'] = "Halaman Pengerjaan Test - Neo Edukasi";
        // $this->pagedata['encrypter'] = $this->encrypter;
        $id = $this->encrypter->decrypt(base64_decode(strtr($this->uri->getSegment(3),array('.' => '+', '-' => '=', '~' => '/'))));
        $class_id = $this->StudentModel->getClass($this->encrypter->decrypt(base64_decode(session()->get('id'))));
        //get Soal
        $this->pagedata['test'] = $this->TestModel->getDetailTest($id);
        $this->pagedata['testData'] = json_encode($this->TestModel->get_test_composition($id));
        
        $question = $this->TestModel->get_test_composition($id);
        $arr_jawab = array();
        $html = '';
		$no = 1;
        foreach ($question as $s) {
            foreach ($s as $s1) {
            $path = 'uploads/bank_soal/';
            // $vrg = $arr_jawab[$s1['id']]["r"] == "" ? "N" : $arr_jawab[$s1['id']]["r"];
            $html .= '<input type="hidden" name="answer['.$no.'][question]" value="'.$s1['id'].'">';
            $html .= '<input type="hidden" name="answer['.$no.'][notsure]" id="rg_'.$no.'" value="N">';
            $html .= '<div class="step" id="widget_'.$no.'">';

            $html .= '<div class="text-center"><div class="w-25"></div></div>'.$s1['question'].'<div class="funkyradio">';
            $i=1;
            $oi ="A";
            foreach ($s1['answer'] as $s2) {
                $opsi 			= "opsi_".$i;
                $file 			= "file_".$i;
                // $checked 		= $arr_jawab[$s->id_soal]["j"] == strtoupper($arr_opsi[$j]) ? "checked" : "";
                // $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                // $tampil_media_opsi = (is_file(base_url().$path.$s->$file) || $s->$file != "") ? tampil_media($path.$s->$file) : "";
                $html .= '<div class="funkyradio-success" onclick="return simpan_sementara();">
                    <input type="radio" id="opsi_'.strtolower($i).'_'.$s1['id'].'" name="answer['.$no.'][answer]" data-opsi = "'.strtoupper($oi).'" value="'.$s2['id'].'"> <label for="opsi_'.strtolower($i).'_'.$s1['id'].'"><div class="huruf_opsi d-flex flex-wrap justify-content-center align-items-center">'.$oi.'</div> <p>'.$s2['answer'].'</p><div class="w-25"></div></label></div>';
                    $i++;
                    $oi++;
                }
            $html .= '</div></div>';
            $no++;
        }
        }
		$data = [
            'data'      => $question,
			'number' 		=> $no,
			'html' 		=> $html,
			'test_id'	=> $id
		];
        
        return view('user/pages/test/sheet', ['data'=>$this->pagedata]);
    }

    public function get_test()
    {
        if ($this->request->isAJAX()) {
            // $this->pagedata['encrypter'] = $this->encrypter;
            $id = $this->request->getVar('id');
            // $class_id = $this->StudentModel->getClass($this->encrypter->decrypt(base64_decode(session()->get('id'))));
            //get Soal
            $question = $this->TestModel->get_test_composition($id);
            $arr_jawab = array();
            $html = '';
            $no = 1;
            foreach ($question as $s) {
                foreach ($s as $s1) {
                $path = 'uploads/bank_soal/';
                // $vrg = $arr_jawab[$s1['id']]["r"] == "" ? "N" : $arr_jawab[$s1['id']]["r"];
                $html .= '<input type="hidden" name="answer['.$no.'][question]" value="'.$s1['id'].'">';
                $html .= '<input type="hidden" name="answer['.$no.'][notsure]" id="rg_'.$no.'" value="N">';
                $html .= '<div class="step" id="widget_'.$no.'">';

                $html .= '<div class="text-center"><div class="w-25"></div></div>'.$s1['question'].'<div class="funkyradio">';
                $i=1;
                $oi ="A";
                foreach ($s1['answer'] as $s2) {
                    $opsi 			= "opsi_".$i;
                    $file 			= "file_".$i;
                    // $checked 		= $arr_jawab[$s->id_soal]["j"] == strtoupper($arr_opsi[$j]) ? "checked" : "";
                    // $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                    // $tampil_media_opsi = (is_file(base_url().$path.$s->$file) || $s->$file != "") ? tampil_media($path.$s->$file) : "";
                    $html .= '<div class="funkyradio-success" onclick="return simpan_sementara();">
                        <input type="radio" id="opsi_'.strtolower($i).'_'.$s1['id'].'" name="answer['.$no.'][answer]" data-opsi = "'.strtoupper($oi).'" value="'.$s2['id'].'"> <label for="opsi_'.strtolower($i).'_'.$s1['id'].'"><div class="huruf_opsi d-flex flex-wrap justify-content-center align-items-center">'.$oi.'</div> <p>'.$s2['answer'].'</p><div class="w-25"></div></label></div>';
                        $i++;
                        $oi++;
                    }
                $html .= '</div></div>';
                $no++;
            }
            }
            $data = [
                'number' 		=> $no,
                'html' 		=> $html,
                'test_id'	=> $id
            ];
            echo json_encode($data);
        }
    }

    public function submit()
    {
        $this->pagedata['title'] = "Hasil Test - Neo Edukasi";
        $data = $this->request->getVar('answer[][]');
        $id = $this->request->getVar('id');
        $perhitungan = $this->TestModel->test_answer_value($id);
        $result = 0;
        $answer[] = array();
        foreach($data as $item){
            if(isset($item['answer'])){
                $answer[] = array(
                    "question_id"=>$item['question'],
                    "answer_id"=>$item['answer'],
                    "answer_isright"=>$this->TestModel->checkanswer($item['answer']),
                );
                if($this->TestModel->checkanswer($item['answer'])){
                    $result+= $perhitungan->true;
                }else{
                    $result-= $perhitungan->false;
                }
            }
        }

        $this->pagedata['output'] = [
            'test_result' => $result." &frasl; ".(count($data)*$perhitungan->true),
            'user-answer' => $answer,
        ];
        return view('user/pages/test/result', ['data'=>$this->pagedata]);
    }
    
}