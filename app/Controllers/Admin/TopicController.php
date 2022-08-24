<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\ClassModel;
use App\Models\Admin\SubjectModel;
use App\Models\Admin\TopicModel;

class TopicController extends BaseController
{
    public $pagedata;
    public $TopicModel;
    public $SubjectModel;
    public $ClassModel;
    public $data;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "topic";
        $this->pagedata['title'] = "Daftar Topik Mata Pelajaran";
        $this->TopicModel = new TopicModel();
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
        return view('admin/pages/topic/index', ['pagedata'=> $this->pagedata, 'data'=> $this->data]);
    }
    public function dt_topic()
    {
        if ($this->request->isAJAX()) {
            $subject_id = $this->request->getVar('subject_id');
            $topicData = $this->TopicModel->get_datatables($subject_id);
            $data = array();
            $no = 0;
            foreach ($topicData as $topic) {
                $no++;
                $row = array();
                $subjectData = $this->SubjectModel->get_subject_row($topic->subject_id);
                $classData = $this->ClassModel->get_class($subjectData->class_id);
                $row['number']  = $no;
                $row['level']  = $classData->level ;
                $row['class']  = $classData->class ;
                $row['subject']  = $subjectData->subject;
                $row['topic']  = $topic->topic;
                $row['action']  = '
                <div class="block-options">
                <button type="button" class="btn-block-option btn btn-light text-primary edit-button" data-id="'.$topic->id.'" data-class="'.$topic->subject_id.'"'.'" data-subject="'.$topic->topic.'">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button type="button" class="btn-block-option btn btn-light text-primary delete-button" data-id="'.$topic->id.'">
                <i class="fa-solid fa-trash"></i>
                </button>
                </div>
                ';
                $data[] = $row;
            }
            $output = array(
                "draw" => true,
                "data" => $data,
            );
    
            echo json_encode($output);
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
        if ($this->request->isAJAX()) {
            $data = [
                'subject_id' => $this->request->getVar('subject_id'),
                'topic' => $this->request->getVar('topic')
            ];
            $query = $this->TopicModel->insert($data);
            if($query){
                $this->output['success'] = true;
                $this->output['message']  = 'Data Berhasil Ditambahkan';
            }else{
                $this->output['success'] = false;
                $this->output['message']  = 'Data Berhasil Ditambahkan';
            }


            echo json_encode($this->output);
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
            $query = $this->TopicModel->update_topic($id, $data);
            if($query){
                $this->output['success'] = true;
                $this->output['message']  = 'Data Berhasil Diupdate';;
            }else{
                $this->output['success'] = false;
                $this->output['message']  = 'Data Gagal Diupdate';
            }
            echo json_encode($this->output);
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
                $this->output['success'] = true;
                $this->output['message']  = 'Data telah dihapus';
            }else{
                $this->output['success'] = false;
                $this->output['message']  = 'Data gagal dihapus';
            }

            echo json_encode($this->output);
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