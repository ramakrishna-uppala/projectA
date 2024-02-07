<?php

namespace App\Controllers\Hrm;

use App\Controllers\BaseController;

/**
 * Skill
 */
class Skill extends BaseController
{
    protected $skillModel;

    public function __construct()
    {
        $this->skillModel = model('App\Models\Hrm\SkillModel');
    }

    /**
     * Index Method
     */
    public function index(): string
    {
        $data['params'] = array(
               'keywords' => ''
        );
        $data['skills'] = $this->skillModel->findAll();
        $data['page'] = array(
            'title' => 'Skills',
            'page_title' => 'Skills',
            'breadcrumb' => [['name' => 'HRM', 'url' => 'hrm']],
            'js' => ['hrm/js/skill'],
        );

        return view('hrm/skill/skill',$data);
    }

    /**
     * IndexBody Method
     */
    public function indexbody()
    {
        $data['params'] = $this->request->getPost();
        $data['skills'] = $this->skillModel->like('name', $data['params']['keywords'])->orderBy('name', 'asc')->findAll();

        return view('hrm/skill/skill_body', $data);
    }

    /**
     *  Add Skill 
     */
    public function add(): string
    {
        return view('hrm/skill/skill_add');
    }

    /**   
     *  Create 
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $rules = ['name' => ['label' => 'Name', 'rules' => 'required']];

            if ($this->validate($rules)) {
                $create_skill = ['name' => $this->request->getPost('name')];
                $add_skill = $this->skillModel->insert($create_skill);

                return view('template/alert_modal', ['msg' => 'Skill Added successfullty!']);
            }
            else {
                return view('hrm/skill/skill_add',);
            }
        }
    }

    /**
     * Edit
     */
    public function edit(): string
    {
        $id = $this->request->getGet('id');
        $data['skill'] = $this->skillModel->find($id);
        return view('hrm/skill/skill_edit', $data);
    }

    /**
     * Update 
     */
    public function update(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $id = $this->request->getPost('id');
            $rules = ['name' => ['label' => 'Name', 'rules' => 'required']];
            if ($this->validate($rules)) {
                $update_skill = ['name' => $this->request->getPost('name')];
                $this->skillModel->update($id, $update_skill);
                return view('template/alert_modal', ['msg' => 'Skill updated successfullty!']);
            }
            else {
                return view('hrm/skill/skill_edit');
            }
        }
    }

    /** 
     * Delete 
     */
    public function delete(): string 
    {
        $id = $this->request->getPost('id');
        if($this->skillModel->delete($id)) {
            return view('template/alert_modal', ['msg' => 'Skill deleted successfully!']
        );
        }
    }
    /** 
     * Status 
     */
    public function statusChange(): string
    {

        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        $status_skill = ['status' => $status,];
        $this->skillModel->update($id, $status_skill);
    return view('template/alert_modal', ['msg' => 'Skill status updated successfully!']);
   }
}