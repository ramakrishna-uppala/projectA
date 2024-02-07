<?php

namespace App\Controllers\Hrm;

use App\Controllers\BaseController;

/**
 * Event
 */
class Event extends BaseController
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = model("App\Models\Hrm\EventModel");
    }

    /**
     * Index Method
     */
    public function index(): string
    {
        $data["params"] = [
            "rows" => "10",
            "pageno" => "1",
            "sort_by" => "name",
            "sort_order" => "asc",
            "keywords" => "",
        ];
        $data['events'] = $this->eventModel->orderBy($data['params']['sort_by'], $data['params']['sort_order'])->findAll();

        $data["tRecords"] = $this->eventModel->countAllResults();
        $data["page"] = [
            "title" => "Event",
            "page_title" => "Event Module",
            "breadcrumb" => [["name" => "HRM", "url" => "hrm"]],
            "js" => ["hrm/js/event"],
        ];
        return view('hrm/event/events', $data);
    }

    /**
     * Index Body Method
     */
    public function indexBody(): string
    {
        $data["params"] = $this->request->getPost();
        $data["tRecords"] = $this->eventModel->like("name", $data["params"]["keywords"])->countAllResults();
        if (isset($data['params']['keywords']) && !empty($data['params']['keywords'])) {
            $data['events'] = $this->eventModel->like('name', $data['params']['keywords'])->orderBy($data['params']['sort_by'], $data['params']['sort_order'])->findAll();
        }
        else {
            $data['events'] = $this->eventModel->orderBy($data['params']['sort_by'], $data['params']['sort_order'])->findAll();

        }
        return view('hrm/event/event_body', $data);
    }

    /**
     * To Add Event
     */
    public function add(): string
    {
        return view('hrm/event/event_add');
    }

    /**
     * To Create Event
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $rules = [
                "name" => ["label" => "Name", "rules" => "required"],
            ];

            if ($this->validate($rules)) {
                $create_event = [
                    "name" => $this->request->getPost("name"),
                ];

                $add_event = $this->eventModel->insert(
                    $create_event
                );
                return view("template/alert_modal", ["msg" => "Event Added successfullty!",
                ]);
            } else {
                return view("hrm/event/event_add");
            }
        }
    }

    /**
     * To Edit Event
     */
    public function edit(): string
    {
        $id = $this->request->getGet("id");
        $data["event"] = $this->eventModel->find($id);
        return view("hrm/event/event_edit",$data);
    }
    /**
     * To Update Event
     */
    public function update(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $id = $this->request->getPost('id');
            $rules = [
                'name' => ['label' => 'Name', 'rules' => 'required'],
            ];

            if ($this->validate($rules)) {
                $update_event = [
                    "name" => $this->request->getPost("name"),
                ];

                $this->eventModel->update($id, $update_event);

                return view("template/alert_modal", ['msg' => "Event Updated Successfully!"]);
            } else {
                return view("hrm/event/event_edit");
            }
        }
    }

    /**
     * To Delete Event
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");

        if ($this->eventModel->delete($id)) {
            return view("template/alert_modal", ['msg' => "Event Record Deleted successfully!"]);
        } 
    }

    /**
     * To Change Status
     */
    public function changeStatus()
    {
        $id = $this->request->getPost("id");
        $status = $this->request->getPost("status");

        $update_data = ["status" => $status];
        $this->eventModel->update($id, $update_data);
        return view("template/alert_modal", ["msg" => "Status updated successfully!",]);
    }
}
