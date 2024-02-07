<?php

namespace App\Models\Hrm;

use CodeIgniter\Model;

class ProfileSkillsModel extends Model 
{
	protected $table 				= 'hrm_profile_skills';
	protected $primaryKey    		= 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes 		= false;
	protected $allowedFields		= array(
		'profile_id',
		'skill_id',
		'created_by',
	);

	protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
}