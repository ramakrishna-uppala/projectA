<?php

namespace App\Models\Hrm;

use CodeIgniter\Model;

/**
 * Profile Model
 */
class ProfileModel extends Model
{
    protected $table = 'hrm_profile';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'code',
        'fname',
        'lname',
        'email',
        'gender',
        'dob',
        'mobile',
        'mobile2',
        'education',
        'experience',
        'document',
        'department',
        'job_category',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Query Builder 
    protected $db;
    protected $builder;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // Initiate database and query builder object
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('hrm_profile');
    }

    public function getProfileFilters($params)
    {
        //print_r($params);
        //exit();
        if (isset($params['keywords']) && !empty($params['keywords'])) {
            $this->builder->groupStart();
            $this->builder->like('hrm_profile.fname', $params['keywords']);
            $this->builder->orLike('hrm_profile.code', $params['keywords']);
            $this->builder->orLike('hrm_profile.mobile', $params['keywords']);
            $this->builder->orLike('hrm_profile.experience', $params['keywords']);
            $this->builder->groupEnd();
        }

        // Check for search parameters
        if (isset($params['fname']) && !empty($params['fname'])) {
            $this->builder->like('hrm_profile.fname', $params['fname']);
        }

        if (isset($params['code']) && !empty($params['code'])) {
            $this->builder->like('hrm_profile.code', $params['code']);
        }

        if (isset($params['mobile']) && !empty($params['mobile'])) {
            $this->builder->like('hrm_profile.mobile', $params['mobile']);
        }

        if (isset($params['experience']) && !empty($params['experience'])) {
            $this->builder->where('hrm_profile.experience', $params['experience']);
        }

        if (isset($params['created_at']) && !empty($params['created_at'])) {
            $date = date('Y-m-d', strtotime($params['created_at']));
            $this->builder->where('DATE(hrm_profile.created_at)', $date);
        }
        if(isset($params['edu']) and !empty($params['edu'])) {
            $this->builder->where('hrm_profile.education', $params['edu']);
        }
        if(isset($params['profile']) and !empty($params['profile'])) {
            $this->builder->where('hrm_profile_status.id', $params['profile']);
        }
        if(isset($params['department']) and !empty($params['department'])) {
            $this->builder->where('hrm_profile.department',$params['department']);
        }
        if(isset($params['job']) and !empty($params['job'])) {
            $this->builder->where('hrm_profile.job_category',$params['job']);
        }
        if (isset($params['skill']) && !empty($params['skill'])) {
        // Join with the hrm_profile_skills table
        $this->builder->join('hrm_profile_skills', 'hrm_profile_skills.profile_id = hrm_profile.id', 'left');

        // Filter by skill IDs
        $this->builder->whereIn('hrm_profile_skills.skill_id', $params['skill']);
        }

    }
        

    public function getProfilesCount($params)
    {
        $this->builder->join('hrm_education', 'hrm_education.id = hrm_profile.education', 'left');
        $this->builder->join('hrm_profile_status', 'hrm_profile_status.id = hrm_profile.status', 'left');
        $this->builder->where('hrm_profile.deleted_at', null);
        $this->getProfileFilters($params);
        $this->builder->selectCount('hrm_profile.id', 'total_records');
        return $this->builder->get()->getRow()->total_records;
    }

    public function getProfiles($params)
    {
    // print_r($params);
        $this->builder->select('hrm_profile.*, hrm_education.name as education_name, hrm_profile_status.name as status_name');
        $this->builder->join('hrm_education', 'hrm_education.id = hrm_profile.education', 'left');
        $this->builder->join('hrm_profile_status', 'hrm_profile_status.id = hrm_profile.status', 'left');
        $this->builder->where('hrm_profile.deleted_at', null);
        $this->getProfileFilters($params);
        $this->builder->limit($params['rows'], ($params['pageno'] - 1) * $params['rows']);
        $this->builder->orderBy($params['sort_by'], $params['sort_order']);
        $qry = $this->builder->get();
        return $qry->getResultArray();
    }
    
    public function getAssignedSkills($profile_id)
    {
        $this->builder->select('hrm_skill.id, hrm_skill.name as skill_name');
        $this->builder2 = $this->db->table('hrm_skill');
        $this->builder->join('hrm_profile_skills', 'hrm_profile_skills.profile_id = hrm_profile.id', 'left');
        $this->builder->join('hrm_skill', 'hrm_skill.id = hrm_profile_skills.skill_id', 'left');
        $this->builder->where('hrm_profile_skills.profile_id', $profile_id);

        $qry = $this->builder->get();
        return $qry->getResultArray();
    }

    public function getNotAssignedSkills($profile_id)
    {
        $this->builder2 = $this->db->table('hrm_skill');
        $this->builder2->select('hrm_skill.id, hrm_skill.name as skill_name');
        $this->builder2->join('hrm_profile_skills', 'hrm_skill.id = hrm_profile_skills.skill_id AND hrm_profile_skills.profile_id = ' . $profile_id, 'left');
        $this->builder2->where('hrm_profile_skills.skill_id IS NULL');

        //echo $this->db->getLastQuery();
        return $this->builder2->get()->getResultArray();
    }


    public function getProfileDetails($id)
    {
        $this->builder->select('hrm_profile.*, hrm_e.name as education_name, hrm_d.name as department_name, hrm_j.name as job_category_name, hrm_s.name as profile_status_name,hrm_psh.profile_id');

        $this->builder->join('hrm_education hrm_e', 'hrm_e.id = hrm_profile.education', 'left');
        $this->builder->join('hrm_department hrm_d', 'hrm_d.id = hrm_profile.department', 'left');
        $this->builder->join('hrm_job_category hrm_j', 'hrm_j.id = hrm_profile.job_category', 'left');
        $this->builder->join('hrm_profile_status hrm_s', 'hrm_s.id = hrm_profile.status', 'left');
        $this->builder->join('hrm_profile_status_history hrm_psh', 'hrm_psh.profile_id = hrm_profile.status','left');
        $this->builder->where('hrm_profile.id', $id);
        
        //$this->builder->where('hrm_profile.deleted_at', null);
        return $this->builder->get()->getRowArray();
    }   

    public function updateProfileStatus($data)
    {
        if($this->db->set('status',$data['status'])->where('id',$data['profile_id'])->update('hrm_profile')){
            return $this->db->insert('hrm_profile_status_history',$data);
        }
    }
}
