<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ClassModel;
use App\Models\Admin\SubjectModel;
use App\Models\Admin\TopicModel;
use Ramsey\Uuid\Uuid;

class TopicController extends BaseController
{
    public $pagedata;
    public $response;
    public $TopicModel;
    public $SubjectModel;
    public $ClassModel;
    public $data;
    public $role_model;
    public $encrypter;

    public function __construct()
    {
        $this->pagedata['activeTab'] = "topic";
        $this->pagedata['title'] = "Daftar Topik Mata Pelajaran";
        $this->TopicModel = new TopicModel();
        $this->SubjectModel = new SubjectModel();
        $this->ClassModel = new ClassModel();
        $this->role_model = new \App\Models\Admin\RoleModel();
        $this->encrypter = \Config\Services::encrypter();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $id_role = session()->get('role');
        $this->data['role'] = $this->role_model->where('id', $id_role)->findAll();
        $this->data['class'] = $this->ClassModel->orderBy('id', 'ASC')->findAll();
        return view('admin/pages/topic/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_topic()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->TopicModel;
            $subject = $request->getPost("subject_id");
            $where = ['to_subjects.id !=' => ''];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('', 'to_class.level', 'to_class.class', 'to_subjects.subject', 'to_topics.topic');
            $column_search = array('to_class.level', 'to_class.class', 'to_subjects.subject', 'to_topics.topic');
            $order = array('to_topics.id' => 'asc');
            $list = $list_data->get_datatables($subject, $column_order, $column_search, $order, $where);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = $lists->level;
                $row[] = $lists->class;
                $row[] = $lists->subject;
                $row[] = $lists->topic;
                $row[]  = '
                    <div class="block-options text-center">
                    <button type="button" class="btn btn-sm btn-warning  edit-button" data-id="' . $lists->id . '" data-level="' . $lists->level . '"' . '" data-class="' . $lists->class . '">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger  delete-button" data-id="' . $lists->id . '">
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
        $this->_validation();
        $uuid = Uuid::uuid1();
        if ($this->request->isAJAX()) {
            $data = [
                'id' => $uuid->toString(),
                'subject_id' => $this->request->getVar('subject_id'),
                'topic' => $this->request->getVar('topic')
            ];
            $this->TopicModel->insert($data);
            $response['success'] = true;
            $response['message']  = 'Data Berhasil Ditambahkan';
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
            $id = $this->request->getVar('id');
            $data = [
                'id' => $this->request->getVar('id'),
                'subject_id' => $this->request->getVar('subject_id'),
                'topic' => $this->request->getVar('topic')
            ];
            $query = $this->TopicModel->update($id, $data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Diupdate';;
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Gagal Diupdate';
                $response['message']  = 'Topik Mata Pelajaran Tidak Boleh Kosong';
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
            $delete = $this->TopicModel->delete_topic($id);
            if ($delete) {
                $response['success'] = true;
                $response['message']  = 'Data telah dihapus';
            } else {
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
                    "subject" => $subject->subject, PHP_EOL
                );
            }
            echo json_encode($response);
        }
    }

    public function _validation()
    {
        $data = array();
        $data['input_error'] = array();
        $data['error_string'] = array();
        $data['status'] = true;

        if($this->request->getVar('topic') == ''){
            $data['input_error'][] = 'topic';
            $data['error_string'][] = 'Topik Mata Pelajaran Wajib Diisi';
            $data['status'] = false;
        }

        if($data['status'] == false){
            echo json_encode($data);
            exit();
        }
    }
}
