<?php

namespace App\Controllers\Hrm;

use App\Controllers\BaseController;

/**
 * Department
 */
class Department extends BaseController
{
    protected $departmentModel;

    public function __construct()
    {
        $this->departmentModel = model("App\Models\Hrm\DepartmentModel");
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
        $data["departments"] = $this->departmentModel->orderBy("name", "asc")->findAll();
        $data["tRecords"] = $this->departmentModel->countAllResults();

        $data["page"] = [
            "title" => "Department",
            "page_title" => "Department Module",
            "breadcrumb" => [["name" => "HRM", "url" => "hrm"]],
            "js" => ["hrm/js/department"],
        ];

        return view("hrm/department/departments", $data);
    }

    /**
     * Index Body Method
     */
    public function indexBody(): string
    {
        $data["params"] = $this->request->getPost();
        $data["tRecords"] = $this->departmentModel->like("name", $data["params"]["keywords"])->countAllResults();
        $data["departments"] = $this->departmentModel->like("name", $data["params"]["keywords"])->orderBy("name", "asc")->findAll();
        return view("hrm/department/department_body", $data);
    }

    /**
     * To Add Department
     */
    public function add(): string
    {
        return view("hrm/department/department_add");
    }

    /**
     * To Create Department
     */
    public function create(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $rules = [
                "name" => ["label" => "Name", "rules" => "required"],
            ];

            if ($this->validate($rules)) {
                $create_department = [
                    "name" => $this->request->getPost("name"),
                ];

                $add_department = $this->departmentModel->insert(
                    $create_department
                );
                return view("template/alert_modal", ["msg" => "Department Added successfullty!",
                ]);
            } else {
                return view("hrm/department/department_add");
            }
        }
    }

    /**
     * To Edit Department
     */
    public function edit(): string
    {
        $id = $this->request->getGet("id");
        $data["department"] = $this->departmentModel->find($id);
        return view("hrm/department/department_edit", $data);
    }

    /**
     * To Update Department
     */
    public function update(): string
    {
        if ($this->request->getPost(csrf_token()) === csrf_hash()) {
            $id = $this->request->getPost("id");
            $rules = [
                "name" => ["label" => "Name", "rules" => "required"],
            ];
            if ($this->validate($rules)) {
                $update_department = [
                    "name" => $this->request->getPost("name"),
                ];
                $this->departmentModel->update($id, $update_department);
                return view("template/alert_modal", [ "msg" => "Department updated successfullty!"
                ]);
            } else {
                return view("hrm/department/department_edit");
            }
        }
    }
    
    /**
     * To Delete Department
     */
    public function delete(): string
    {
        $id = $this->request->getPost("id");
        if ($this->departmentModel->delete($id)) {
            return view("template/alert_modal", ["msg" => "Department Deleted successfully!",
            ]);
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
        $this->departmentModel->update($id, $update_data);
        return view("template/alert_modal", ["msg" => "Status updated successfully!",]);
    }
}
