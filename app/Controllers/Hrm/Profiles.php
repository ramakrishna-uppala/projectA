<?php

namespace App\Controllers\Hrm;

use App\Controllers\BaseController;

class Profiles extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = model('App\Models\Hrm\ProfileModel');
        $this->profileStatusModel = model('App\Models\Hrm\ProfileStatusModel');
        $this->profileStatusHistoryModel = model('App\Models\Hrm\ProfileStatusHistoryModel');
        $this->jobCategoryModel = model('App\Models\Hrm\JobCategoryModel');
        $this->educationModel = model('App\Models\Hrm\EducationModel');
        $this->departmentModel = model("App\Models\Hrm\DepartmentModel");
        $this->profileSkillsModel = model('App\Models\Hrm\ProfileSkillsModel');
        $this->skillModel = model('App\Models\Hrm\SkillModel');
    }

    /**
     * Index method
     */
    public function index(): string
    {
        $data["params"] = [
            "rows" => "10",
            "pageno" => "1",
            "sort_by" => "code",
            "sort_order" => "asc",
            "keywords" => "",
        ];

        $data['education'] = $this->educationModel->findAll();
        $data["departments"] = $this->departmentModel->findAll();
        $data['jobs'] = $this->jobCategoryModel->findAll();
        $data['skills'] = $this->skillModel->findAll();
        $data['profile_skills'] = $this->profileSkillsModel->findAll();
        $data['profilestatus'] = $this->profileStatusModel->findAll();
        $data["profiles"] = $this->profileModel->getProfiles($data["params"]);
        $data["trecords"] = $this->profileModel->getProfilesCount($data["params"]);

        $data['page'] = [
            'page_title' => 'Profile',
            'title' => 'Profiles',
            'css' => ["hrm/css/profile"],
            'breadcrumb' => [['name' => 'HRM', 'url' => 'hrm']],
            "js" => ["hrm/js/profile"],
        ];

        return view('hrm/profiles/profiles', $data);
    }

    /**
     * Index Body Method
     */
    public function indexBody(): string
    {
        $data['params'] = $this->request->getPost();
        $data['education'] = $this->educationModel->findAll();
        $data["departments"] = $this->departmentModel->findAll();
        $data['jobs'] = $this->jobCategoryModel->findAll();
        $data['skills'] = $this->skillModel->findAll();
        $data['profile_skills'] = $this->profileSkillsModel->findAll();
        $data['profilestatus'] = $this->profileStatusModel->findAll();
        $data['trecords'] = $this->profileModel->getProfilesCount($data['params']);
        $data['profiles'] = $this->profileModel->getProfiles($data['params']);

        return view("hrm/profiles/profiles_body", $data);
    }

    /**
     * Add Profile
     */
    public function addProfile(): string
    {
        $data['education'] =  $this->educationModel->findAll();
        $data['departments'] = $this->departmentModel->findAll();
        $data['job_category'] = $this->jobCategoryModel->findAll();
        return view('hrm/profiles/add_profile', $data);
    }

    /**
     * Create Profile
     */
    public function createProfile(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $rules = array(
                'fname' => ['label' => 'First Name', 'rules' => 'required'],
                'lname' => ['label' => 'Last Name', 'rules' => 'required'],
                'gender' => ['label' => 'Gender', 'rules' => 'required'],
                'dob' => ['label' => 'Date of Birth', 'rules' => 'required'],
                'mobile' => ['label' => 'Mobile', 'rules' => 'required|numeric|exact_length[10]'],
                'mobile2' => ['label' => 'Alternate Mobile', 'rules' => 'permit_empty|numeric|exact_length[10]'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
                'education' => ['label' => 'Education', 'rules' => 'required'],
                'experience' => ['label' => 'Experience', 'rules' => 'required|numeric|greater_than_equal_to[1]|less_than[40]'],
                'department' => ['label' => 'Department', 'rules' => 'required'],
                'job_category' => ['label' => 'Job Category', 'rules' => 'required'],
            );

            if ($this->validate($rules)) {
                $profileData = array(
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('lname'),
                    'gender' => $this->request->getPost('gender'),
                    'dob' => date('Y-m-d',strtotime($this->request->getPost('dob'))),
                    'mobile' => $this->request->getPost('mobile'),
                    'mobile2' => $this->request->getPost('mobile2'),
                    'email' => $this->request->getPost('email'),
                    'education' => $this->request->getPost('education'),
                    'experience' => $this->request->getPost('experience'),
                    'department' => $this->request->getPost('department'),
                    'job_category' => $this->request->getPost('job_category'),
                    'created_by' => session()->get('user')['id'],
                );

                $this->profileModel->insert($profileData);
                $add_profile = $this->profileModel->getInsertID();

                $code = "P" . str_pad($add_profile, 8, '0', STR_PAD_LEFT);
                $profileCodeUpdate = array(
                    'id' => $add_profile,
                    'code' => $code,
                );

                $this->profileModel->update($add_profile, $profileCodeUpdate);

                $dataProfileHistory =array(
                    'profile_id' => $add_profile,
                    'created_by' => session()->get('user')['id'],
                );

                $this->profileStatusHistoryModel->insert($dataProfileHistory);
                
                if ($add_profile && $profileCodeUpdate && $dataProfileHistory){
                    return view('template/alert_modal', ['msg' => 'Profile added successfully!']);
                } else {
                    return view('template/alert_modal', ['msg' => 'Failed to add profile.']);
                }
            } else {
                $data['education'] =  $this->educationModel->findAll();
                $data['departments'] = $this->departmentModel->findAll();
                $data['job_category'] = $this->jobCategoryModel->findAll();
                $data['validation'] = $this->validator;
                return view('hrm/profiles/add_profile', $data);
            }
        } else {
            return view('template/alert_modal', ['msg' => 'CSRF token validation failed!']);
        }
    }

    /**
     * Edit Profile
     */
    public function editProfile(): string
    {
        $id = $this->request->getGet('id');
        $data['profile'] = $this->profileModel->find($id);
        $data['education'] =  $this->educationModel->findAll();
        $data['departments'] = $this->departmentModel->findAll();
        $data['job_category'] = $this->jobCategoryModel->findAll();
        return view('hrm/profiles/edit_profile', $data);
    }

    /**
     * Update Profile
     */
    public function updateProfile(): string
    {
        if ($this->request->getPost(csrf_token()) == csrf_hash()) {
            $rules = [
                'fname' => ['label' => 'First Name', 'rules' => 'required'],
                'lname' => ['label' => 'Last Name', 'rules' => 'required'],
                'gender' => ['label' => 'Gender', 'rules' => 'required'],
                'dob' => ['label' => 'Date of Birth', 'rules' => 'required'],
                'mobile' => ['label' => 'Mobile', 'rules' => 'required|numeric|exact_length[10]'],
                'mobile2' => ['label' => 'Mobile 2', 'rules' => 'permit_empty|numeric|exact_length[10]'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
                'education' => ['label' => 'Education', 'rules' => 'required'],
                'experience' => ['label' => 'Experience', 'rules' => 'required|numeric|greater_than_equal_to[1]|less_than[40]'],
                'department' => ['label' => 'Department', 'rules' => 'required'],
                'job_category' => ['label' => 'Job Category', 'rules' => 'required'],
            ];

            if ($this->validate($rules)) {
                $id = $this->request->getPost('id');
                $profileData = [
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('lname'),
                    'gender' => $this->request->getPost('gender'),
                    'dob' => $this->request->getPost('dob'),
                    'mobile' => $this->request->getPost('mobile'),
                    'mobile2' => $this->request->getPost('mobile2'),
                    'email' => $this->request->getPost('email'),
                    'education' => $this->request->getPost('education'),
                    'experience' => $this->request->getPost('experience'),
                    'department' => $this->request->getPost('department'),
                    'job_category' => $this->request->getPost('job_category'),
                    'updated_by' => session()->get('user')['id'],
                ];

                $update_profile = $this->profileModel->update($id, $profileData);

                if ($update_profile) {
                    return view('template/alert_modal', ['msg' => 'Profile updated successfully!']);
                } else {
                    return view('template/alert_modal', ['msg' => 'Failed to update profile.']);
                }
            } else {
                $data['education'] = $this->educationModel->findAll();
                $data['departments'] = $this->departmentModel->findAll();
                $data['job_category'] = $this->jobCategoryModel->findAll();
                $data['validation'] = $this->validator;
                return view('hrm/profiles/edit_profile', $data);
            }
        } else {
            return view('template/alert_modal', ['msg' => 'CSRF token validation failed!']);
        }
    }

    /**
     * Profile view
     */
    public function viewprofile(): string
    {

        $id = $this->request->getGet('id');
        $data['profile'] = $this->profileModel->getProfileDetails($id);
        $data['profile_status'] = $this->profileStatusModel->findAll();
        $data['profile_status_history'] = $this->profileStatusHistoryModel->where('profile_id', $id)->findAll()
        ;

        $data['profile_timeline'] = $this->profileStatusHistoryModel->getProfileTimeline($id);
      
       
        return view('hrm/profiles/view_profile', $data);
    }

    /**
     * To Add Profile Skills
     **/
    public function addSkills(): string
    {
        $profileId = $this->request->getPost('profile_id');
        $skillId = $this->request->getPost('skill_id');

        $insertData = [
            'profile_id' => $profileId,
            'skill_id' => $skillId,
        ];
        $this->profileSkillsModel->insert($insertData);

        // Load skills
        $data['id'] = $profileId;
        $data['assignedSkills'] = $this->profileModel->getAssignedSkills($data['id']);
        $data['notAssignedSkills'] = $this->profileModel->getNotAssignedSkills($data['id']);
        $data['skills'] = $this->skillModel->findAll();

        return view('hrm/profiles/view_skills_body', $data);
    }

    /**
    * To Remove Profile Skills
    */
    public function removeSkills(): string
    {
        $profileId = $this->request->getPost('profile_id');
        $skillId = $this->request->getPost('skill_id');

        $deleteData = [
            'profile_id' => $profileId,
            'skill_id' => $skillId,
        ];
        $this->profileSkillsModel->where($deleteData)->delete();
        // Define $data array
        $data = [
            'id' => $profileId,
        ];

        // Load data
        $data['profile_skills'] = $this->profileSkillsModel->select('id, skill_id')->where(['profile_id' => $data['id']])->findAll();
        $data['assignedSkills'] = $this->profileModel->getAssignedSkills($data['id']);
        $data['notAssignedSkills'] = $this->profileModel->getNotAssignedSkills($data['id']);
        $data['skills'] = $this->skillModel->findAll();
        // Return the view
        return view('hrm/profiles/view_skills_body', $data);
    }
    
    /**
     * To View Profile Skills
     */
    public function viewSkills(): string
    {
        $data['id'] = $this->request->getPost('id');
        $data['skills'] = $this->skillModel->findAll();
        $data['profile_skills'] = $this->profileSkillsModel->select('id, skill_id')->where(['profile_id' => $data['id']])->findAll();
        
        $data['assignedSkills'] = $this->profileModel->getAssignedSkills($data['id']);
        $data['notAssignedSkills'] = $this->profileModel->getNotAssignedSkills($data['id']);

        return view('hrm/profiles/view_skills', $data);
    }

    /**
    * To View Profile Skills Body
    */
    public function viewSkillsBody(): string
    {
        $data['id'] = $this->request->getGet('id');
        $data['skills'] = $this->skillModel->findAll();
        $data['assignedSkills'] = $this->profileModel->getAssignedSkills($data['id']);
        $data['notAssignedSkills'] = $this->profileModel->getNotAssignedSkills($data['id']);
        return view('hrm/profiles/view_skills_body', $data);
    }

    public function changeProfileStatus(): string 
    {
      $data['params'] = $this->request->getPost();
      return view('hrm/profiles/view_profile',$data);  
    }

    public function updateProfileStatus(): string 
    {
          $userId = $this->session->get('user')['id'];
        $historyData = array(
            'status' => $this->request->getPost('sid'),
            'note' => $this->request->getPost('note'),
            'created_by' => $userId,
            'profile_id' => $this->request->getPost('pid'),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->profileModel->updateProfileStatus($historyData);
        $data['profile_status'] = $this->profileStatusModel->findAll();
        $data['profile'] = $this->profileModel->getProfileDetails($this->request->getPost('pid'));
        $data['profile_timeline'] = $this->profileStatusHistoryModel->getProfileTimeline($this->request->getPost('pid'));
        
        return view('hrm/profiles/view_profile',$data);

    }

}
