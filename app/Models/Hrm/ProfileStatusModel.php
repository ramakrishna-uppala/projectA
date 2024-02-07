<?

namespace App\Models\Hrm;

use  CodeIgniter\Model;

class ProfileStatusModel extends Model
{
	protected $table = 'hrm_profile_status';
	protected $primarykey = 'id';
	protected $allowedFields = array(
		'name',
		'position',
		'status'
	);
	protected $returnType = 'array';
	protected $useSoftDeletes = 'true';
	/**
	 * Dates
	 */
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
}

