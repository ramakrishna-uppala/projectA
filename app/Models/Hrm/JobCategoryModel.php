<?php

namespace App\Models\Hrm;

Use CodeIgniter\Model;

/**
 * Job Model
 */

class JobCategoryModel extends Model
{
	Protected $table                = 'hrm_job_category';
	Protected $primaryKey           = 'id';
	Protected $useAutoIncrement     = true;
	Protected $returnType           = 'array';
	Protected $useSoftDeletes       = true;
	Protected $allowedFields        = array(
		'name',
		'status',
	);

	Protected $useTimestamps          = true;
	Protected $dateFormat             = 'datetime';
	Protected $createdField           = 'created_at';
	Protected $updatedField           = 'updated_at';
	Protected $deletedField           = 'deleted_at';

}