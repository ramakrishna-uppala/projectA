<?php 

namespace App\Models\Hrm;

use CodeIgniter\Model;

/**
 * Event Model
 */
class EventModel extends Model
{
	protected $table                 = 'hrm_event';
	protected $primaryKey            = 'id';

	protected $useAutoIncrement      = true;

	protected $returnType            = 'array';

	protected $useSoftDeletes        = true;

	protected $allowedFields 		 = array(
    	'name',
    	'status',
	);

	protected $useTimestamps         = true;
	protected $dateFormat            = 'datetime';
	protected $createdField          = 'created_at';
	protected $updatedField          = 'updated_at';
	protected $deletedField          = 'deleted_at';
}