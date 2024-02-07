<?


namespace App\Models\Hrm;

use CodeIgniter\Model;

class ProfileStatusHistoryModel extends Model 
{
	protected $table = 'hrm_profile_status_history';
	protected $primarykey = 'id';
	protected $allowedFields = array(
		'profile_id',
		'status',
		'created_by',
	);
	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';

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
        $this->builder = $this->db->table('hrm_profile_status_history');
    }

    public function getProfileTimeline($id)
    {

        $this->builder->select(' hrm_profile_status_history.id,hrm_profile_status_history.profile_id,hrm_ps.name,hrm_profile_status_history.note,hrm_profile_status_history.created_at');
        // $this->builder->from('hrm_profile_status_history hrm_psh');
        $this->builder->join('hrm_profile_status hrm_ps','hrm_ps.id = hrm_profile_status_history.status','left');
        $this->builder->join('user u','u.id = hrm_profile_status_history.created_by','left');
        $this->builder->where('hrm_profile_status_history.profile_id',$id);

       //->order_by('hrm_psh.created_at','ASC');
        $qry = $this->builder->get();
        // print $this->db->getLastQuery();
        return $qry->getResultArray();
    }


}