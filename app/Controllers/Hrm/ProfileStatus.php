<?

namespace App\Controllers\Hrm;

use App\Controllers\BaseController;

/**
 * @package HRM
 * HRM dashboard
 */
class ProfileStatus extends BaseController
{
    protected $profileStatusModel;
   
    public function __construct()
    {
        $this->profileStatusModel = model('App\Models\Hrm\ProfileStatusModel');
    
    }

    /**
     * index Method
     */
    public function index(): string
    {
        $data['params'] = array(
            
            'keywords' => '',
            'rows' => 10,
            'page_no' => 1,
            'sort_by' => 'name',
            'sort_order' => 'ASC',
        );
        $data['profilestatus'] = $this->profileStatusModel->orderBy('name','ASC')->findAll();
        $data['total_profiles'] = $this->profileStatusModel->countAllResults();
        //$data['profile_details'] = $this->profileModel->findAll();
        $data['page'] = array(
            'page_title' => 'ProfileStatus',
            'title' => 'ProfileStatus',
            'breadcrumb' => [['name' => 'HRM','url' => 'hrm']],
            'js' => ['hrm/js/status'],
        );
         return view('hrm/status/statuses',$data);
    }

    /**
     * index body method
     */
    public function indexBody(): string 
    {
        $data['params'] = $this->request->getPost();
        $data['total_profiles'] = $this->profileStatusModel->like('name',$data['params']['keywords'])->countAllResults();
        $data['profilestatus'] = $this->profileStatusModel->like('name',$data['params']['keywords'])->orderBy('name','ASC')->findAll();
        return view('hrm/status/statuses_body',$data);
    }

    /**
     * add method
     */
    public function add(): string 
    {
        return view('hrm/status/add_status');
    }

    /**
     * create method
     */
    public function create(): string 
    {
        $rules= ['name' =>['label' =>'name','rules' => 'required']];
        
        if($this->validate($rules)) {
            $data = array(
                'name' => $this->request->getPost('name'),
                 
                'status' => 1,
            );
            $status_data = $this->profileStatusModel->insert($data);
            return view('template/alert_modal',['msg' => 'status added successfully!']);
        }
        else{
            return view('hrm/status/add_status');
        }
    }

    /**
     * edit method
     */
    public function edit(): string 
    {
        $id = $this->request->getGet('id');
        $data['profile'] = $this->profileStatusModel->find($id);
        return view('hrm/status/edit_status',$data);
    }

    /**
     * update method
     */
    public function update(): string 
    {
        $id = $this->request->getPost('id');
        $rules = ['name' =>['label' => 'Name','rules' => 'required'],];
        if($this->validate($rules)){
            $status_data = array(
                'name' => $this->request->getPost('name'),
                'status' => 1,
            );
            $this->profileStatusModel->update($id,$status_data);
            return view('template/alert_modal',['msg' => 'status updated successfully!']);
        }
        else{
            return view('hrm/status/edit_status');
        }
    }
    
    /**
     * delete method
     */
    public function delete(): string 
    {
        $id = $this->request->getPost('id');
        if($this->profileStatusModel->delete($id)) {
        return view('hrm/alert_modal',['msg' => 'status deleted successfully!']);
        }
    }

    /**
     * status change method
     */
    public function statuschange(): string 
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        $status_profile = ['status' => $status];
        $this->profileStatusModel->update($id,$status_profile);
        return view('template/alert_modal',['msg' => ' profile status updated successfully!']); 
    }

    public function addEvent(): string 
    {
        $profileModel =  model('App\Models\Hrm\ProfileModel');
        return view('hrm/profile/add_event_profile');

    }

    public function createEvent(): string 
    {
        $profileModel =  model('App\Models\Hrm\ProfileModel');

        $rules= ['Evnet' =>['label' =>'Event','rules' => 'required'],
        'Event Date' =>['label' => 'Event Date','rules' => 'required'],
        'Description' =>['label' => 'Description','rules' => 'required'],];
        if($validate($rules)) {
            $data = array(
                'id' =>  $request->getPost('id'),
                'event' => $request->getPost('event'),
                'event_date' => date('Y-m-d',strtotime($request->getpost('event_add_date'))),
                'description'=> $request->getPost('description'),
                'name' => $request->getPost('name'),
                 
                'status' => 1,
            );
            $event_data = $profileModel->insert($data);
            return view('template/alert_modal',['msg' => 'event added successfully!']);
        }
        else{
            return view('hrm/profile/add_event_profile');
        }
    }

     public function editEvent(): string 
    {
        $profileModel =  model('App\Models\Hrm\ProfileModel');
        $id = $request->getGet('id');
        $data['profile'] = $profileModel->find($id);
        return view('hrm/profile/edit_event_profile',$data);
    }


    public function updateEvent(): string 
    {
        $id = $request->getPost('id');
        $rules = ['Event' =>['label' => 'Event','rules' => 'required'],
        'Event Date' =>['label' => 'Event Date','rules' => 'required'],
        'Description' =>['label' => 'Description','rules' => 'required'],
    ];
        if($this->validate($rules)){
            $status_data = array(
                'event' => $request->getPost('event'),
                'event_date' => date('Y-m-d',strtotime($request->getpost('event_add_date'))),
                'description'=> $request->getPost('description'),
                'name' => $this->request->getPost('name'),
                'status' => 1,
            );
            $profileModel->update($id,$event_data);
            return view('template/alert_modal',['msg' => 'event updated successfully!']);
        }
        else{
            return view('hrm/profile/edit_event_profile');
        }
    }

    /**
 * Move position up
 */
public function movePositionUp(): string
{
    $id = $this->request->getPost('id');
    $profile = $this->profileStatusModel->find($id);

    if (!$profile) {
        return 'Profile not found!';
    }

    $currentPosition = $profile['id'];
    $tempPosition = $profile['position'];

    $previousProfile = $this->profileStatusModel
        ->where('position ', $currentPosition)
        ->get();
        // ->orderBy('position', 'DESC')
        // ->first();

    if ($previousProfile) {

        $this->profileStatusModel->update($profile['id'], ['position' => $previousProfile['position']]);
        $this->profileStatusModel->update($previousProfile['id'], ['position' => $tempPosition]);

        return 'Position moved up successfully!';
    }

    return 'Cannot move position up!';
}

/**
 * Move position down
 */
public function movePositionDown(): string
{
    $id = $this->request->getGet('id');
    $profile = $this->profileStatusModel->find($id);

    if (!$profile) {
        return 'Profile not found!';
    }

    $currentPosition = $profile['position'];

    $nextProfile = $this->profileStatusModel
        ->where('position ', $currentPosition)
        ->get();
        // ->orderBy('position', 'ASC')
        // ->first();

    if ($nextProfile) {
        $tempPosition = $profile['position'];
        $this->profileStatusModel->update($profile['id'], ['position' => $nextProfile['position']]);
        $this->profileStatusModel->update($nextProfile['id'], ['position' => $tempPosition]);

        return 'Position moved down successfully!';
    }

    return 'Cannot move position down!';
}

}