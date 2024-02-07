<?

namespace App\Models\Hrm;

use CodeIgniter\Model;  

class EducationModel extends Model 
{
    protected $table = 'hrm_education';
    protected $primaryKey = 'id';
    protected $allowedFields = array(
        'name',
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