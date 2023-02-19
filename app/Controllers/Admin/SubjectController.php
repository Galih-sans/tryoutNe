<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\ClassModel;
use App\Models\Admin\SubjectModel;

class SubjectController extends BaseController
{
    public $pagedata;
    public $response;
    public $SubjectModel;
    public $ClassModel;
    public $data;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "subject";
        $this->pagedata['title'] = "Daftar Mata Pelajaran";
        $this->SubjectModel = new SubjectModel();
        $this->ClassModel = new ClassModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $this->data['class'] = $this->ClassModel->orderBy('id', 'ASC')->findAll();
        return view('admin/pages/subject/index', ['pagedata'=> $this->pagedata, 'data'=> $this->data]);
    }

    public function dt_subject()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->SubjectModel;
            $class = $request->getPost("class_id");
            $where = ['to_subjects.id !=' => 0];
                    //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
                    //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_subjects.id','to_class.level','to_class.class', 'to_subjects.subject');
            $column_search = array('to_class.level','to_class.class', 'to_subjects.subject');
            $order = array('to_subjects.id' => 'asc');
            $list = $list_data->get_datatables($class, $column_order, $column_search, $order, $where);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = $lists->level;
                $row[] = $lists->class;
                $row[] = $lists->subject;
                $row[]  = '
                    <div class="block-options text-center">
                    <button type="button" class="btn btn-sm btn-warning  edit-button" data-id="'.$lists->id.'" data-level="'.$lists->level.'"'.'" data-class="'.$lists->class.'">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger  delete-button" data-id="'.$lists->id.'">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                    </div>
                    ';
                $data[] = $row;
            }
            $response = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => count($data),
                "recordsFiltered" => count($data),
                "data" => $data,
                
            );
            return json_encode($response);
        }
    }

    // public function dt_subject()
    // {
    //     if ($this->request->isAJAX()) {
    //         $class =  $this->request->getVar('class_id'); 
    //         $subjectdata = $this->SubjectModel->get_datatables($class);
    //         $data = array();
    //         $no = 0;
    //         foreach ($subjectdata as $subject) {
    //             $no++;
    //             $row = array();
    //             $classData = $this->ClassModel->get_class($subject->class_id);
    //             $row['number']  = $no;
    //             $row['level']  = $classData->level ;
    //             $row['class']  = $classData->class ;
    //             $row['subject']  = $subject->subject;
    //             $row['action']  = '
    //             <div class="block-options">
    //             <button type="button" class="btn-block-option btn btn-light text-primary edit-button" data-id="'.$subject->id.'" data-class="'.$subject->class_id.'"'.'" data-subject="'.$subject->subject.'">
    //                 <i class="fa-solid fa-pen-to-square"></i>
    //             </button>
    //             <button type="button" class="btn-block-option btn btn-light text-primary delete-button" data-id="'.$subject->id.'">
    //             <i class="fa-solid fa-trash"></i>
    //             </button>
    //             </div>
    //             ';
    //             $data[] = $row;
    //         }
    //         $response = array(
    //             "draw" => true,
    //             "data" => $data,
    //         );
    
    //         echo json_encode($response);
    //     }
    // }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'class_id' => $this->request->getVar('class'),
                'subject' => $this->request->getVar('subject')
            ];
            $query = $this->SubjectModel->insert($data);
            if($query){
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Ditambahkan';
            }else{
                $response['success'] = false;
                $response['message']  = 'Data Berhasil Ditambahkan';
            }


            echo json_encode($response);
        }
    }
    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('subject_id');
            $data = [
                'class_id' => $this->request->getVar('class_id'),
                'subject' => $this->request->getVar('subject')
            ];
            $query = $this->SubjectModel->update_subject($id, $data);
            if($query){
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Diupdate';;
            }else{
                $response['success'] = false;
                $response['message']  = 'Data Gagal Diupdate';
            }


            echo json_encode($response);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $delete = $this->SubjectModel->delete_subject($id);
            if ($delete) {
                $response['success'] = true;
                $response['message']  = 'Data telah dihapus';
            }else{
                $response['success'] = false;
                $response['message']  = 'Data gagal dihapus';
            }

            echo json_encode($response);
        }
    }
    
    public function get_subject()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $subjectdata = $this->SubjectModel->get_subject($id);
                $response = array();
                foreach ($subjectdata as $subject) {
                    $response[] = array(
                        "subject"=>$subject->subject, PHP_EOL
                    );
                }
            echo json_encode($response);
        }
    }
}