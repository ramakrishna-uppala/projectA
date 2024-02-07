<?php

namespace App\Models\Hrm;

use CodeIgniter\Model;

/**
 * Skill Model
 */
class SkillModel extends Model
{
	protected $table   		  		= 'hrm_skill';
    
 	protected $primaryKey     		= 'id';

 	protected $useAutoIncrement     = true;

 	protected $returnType           = 'array';

 	protected $useSoftDeletes       = true;

 	protected $allowedFields        = array(
        'name',
        'status',
    );

    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
}