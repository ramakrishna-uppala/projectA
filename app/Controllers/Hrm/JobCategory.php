<?php

namespace App\Controllers\Hrm;

use App\Controllers\BaseController;

/**
 * Job Category
 */
class JobCategory extends BaseController
{
    protected $jobCategoryModel;

    public function __construct()
    {
        $this->jobCategoryModel = model('App\Models\Hrm\JobCategoryModel');
    }

    /**
     * Index Method
     */
    public function index(): string
     {
        $data['params'] = array(
            'keywords' => ''
        );
        $data['jobs'] = $this->jobCategoryModel->findAll();
        $data['page'] = array(
           'title'      => 'Jobs',
           'page_title' => 'Jobs',
           'breadcrumb' => [['name' => 'HRM', 'url' => 'hrm']],
           'js'         => ['hrm/js/job_category'],  
       );
      return view('hrm/job_category/job_category', $data);
      }
    /**
     * Indexbody Method
     */
    public function indexbody()
    {
        $data['params'] = $this->request->getPost();
        $data['jobs'] = $this->jobCategoryModel->like('name', $data['params']['keywords'])->orderBy('name', 'asc')->findAll();
        
        return view('hrm/job_category/job_category_body', $data);
    }

    /**
     *  Add Job
     */
    public function add(): string
    {
        return view('hrm/job_category/job_category_add');
    }

    /**
     * Create
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $rules = ['name' => ['label' => 'Name', 'rules' => 'required']];

            if ($this->validate($rules)) {
                $create_job = ['name' => $this->request->getPost('name')];
                $add_job = $this->jobCategoryModel->insert($create_job);

                return view('template/alert_modal', ['msg' => 'Job Category Added successfullty!']);
            }
            else {
                return view('hrm/job_category/job_category_add',);
            }
        }
    }
    /**
     * Edit
     */
    public function edit(): string
    {
        $id = $this->request->getGet('id');
        $data['job'] = $this->jobCategoryModel->find($id);
        
        return view('hrm/job_category/job_category_edit', $data);
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
                $update_job = ['name' => $this->request->getPost('name')];
                $this->jobCategoryModel->update($id, $update_job);
                return view('template/alert_modal', ['msg' => 'Job Category updated successfullty!']);
            }
            else {
                return view('hrm/job_category/job_category_edit');
            }
        }
    }

    /** 
     * Delete 
     */
    public function delete(): string 
    {
        $id = $this->request->getPost('id');
        if($this->jobCategoryModel->delete($id)) {
            return view('template/alert_modal', ['msg' => 'Job Category deleted successfully!']);
        }
    }

    /** 
     * Status 
     */
    public function Changestatus(): string
    {

        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        $status_job = ['status' => $status,];
        $this->jobCategoryModel->update($id, $status_job);
    return view('template/alert_modal', ['msg' => 'Job Category status updated successfully!']);
   }
}

