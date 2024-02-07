<?

namespace App\Controllers\Hrm;

use App\Controllers\BaseController;

/**
 * @package HRM
 * HRM dashboard
 */
class Education extends BaseController
{
    protected $educationModel;
    public function __construct()
    {
    /**
     * load Models
     */     
        $this->educationModel = model('App\Models\Hrm\EducationModel');
    }

    /**
     * Index Method
     */
    public function index(): string
    {
        $data['params'] = array(
            //'rows' => 10,
            //'page_no' => 1,
            //'sort_by' => 'name',
            //'sort_order' => 'asc',
            'keywords' => '',
        );
        $data['education'] = $this->educationModel->orderBy('name','asc')->findAll(); // fetch all education records
        $data['total_educations'] = $this->educationModel->countAllResults();
        $data['page'] = array(
            'page_title' => 'Education',
            'title' => 'Education',
            'breadcrumb' => [['name' => 'HRM','url' => 'hrm']],
            'js' => ['hrm/js/education'],
        );
        return view('hrm/education/educations',$data);
    }

    /**
     * Index Body Method
     */
    public function indexBody(): string 
    {
        $data['params'] = $this->request->getPost();
        $data['total_educations'] = $this->educationModel->like('name',$data['params']['keywords'])->countAllResults();
        $data['education'] = $this->educationModel->like('name',$data['params']['keywords'])->orderBy('name','asc')->findAll();
        return view('hrm/education/educations_body',$data);
    }

    /**
     * To Add User
     */
    public function add(): string
    {
        return view('hrm/education/add_education');
    }

    /**
     * To Insert User
     */
    public function create(): string
    {
        $rules = [  'name' =>['label' => 'Name' ,'rules' => 'required'],];     
        if($this->validate($rules)) {  
            $data = array(
                'name' => $this->request->getPost('name'),
                'status'=>1,
            );  
            $education_data =  $this->educationModel->insert($data);
            return view('template/alert_modal', ['msg' => 'education added successfullty!']);
        }
        else{
            return view('hrm/education/add_education');
        }
    }

    /**
     * edit method
     */
    public function edit(): string
    {

    $id = $this->request->getGet('id');   
    $data['edu'] = $this->educationModel->find($id);
    return view('hrm/education/edit_education', $data);
    }

    /**
     * update method
     */
    public function update(): string 
    {   
        $id = $this->request->getPost('id');
        $rules = [ 'name' =>['label' => 'Name','rules' => 'required'],];
        if($this->validate($rules)) {
            $education_data = array(
                'name' => $this->request->getPost('name'),
                'status'=>1,
            );
        $this->educationModel->update($id,$education_data);
        return view('template/alert_modal', ['msg' => 'education updated successfullty!']);     
        }
        else{
        return view('hrm/education/edit_education');
        }

    }

    /**
     * delete method
     */
    public function delete(): string 
    {
        $id = $this->request->getPost('id');
        if( $this->educationModel->delete($id)) {
        return view('template/alert_modal',['msg' => 'education deleted successfully!']);
        }
    }

    /**
     * change status method
     */
    public function statuschange(): string
    {
    $id = $this->request->getPost('id');
    $status = $this->request->getPost('status');  

    $status_education = ['status' => $status, ];
    $this->educationModel->update($id, $status_education);
    return view('template/alert_modal', ['msg' => 'education status updated successfully!']);
    }


}