<?php

namespace App\Models\User;

use CodeIgniter\Model;

/**
 * Users Model
 */ 
class UserModel extends Model
{
	protected $table 			= 'user';
	protected $primaryKey 		= 'id';

	protected $useAutoIncrement = true;

	protected $returnType 		= 'array';
	
	protected $useSoftDeletes 	= true;
	
	protected $allowedFields 	= array(
		'user_code',
		'username',
		'password',
		'name',
		'email',
		'phone',
		'role',
		'status',
		'created_by',
		'last_login_at',
	);

	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	
	protected $allowCallbacks = true;
	
	protected $db;
	
	public function __construct()
	{
		parent::__construct();
		$this->db = db_connect();
	}

	/**
	 * To Get All User Details
	 */ 
	public function getUsers($params)
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		if(isset($params['keywords']) and $params['keywords'] != '') {
			$builder->groupStart();
			$builder->like('name', $params['keywords']);
			$builder->orLike('username', $params['keywords']);
			$builder->orLike('user_code', $params['keywords']);
			$builder->orLike('name', $params['keywords']);
			$builder->orLike('email', $params['keywords']);
			$builder->orLike('phone', $params['keywords']);
			$builder->groupEnd();
		}
		$builder->where('deleted_at', NULL);
		$builder->orderBy($params['sort_by'],$params['sort_order']);
		$builder->limit($params['rows'],($params['pageno']-1)*$params['rows']);
		return $builder->get()->getResultArray();
	}

	/**
	 * To Count the User Records
	 */ 
	public function getUsersNum($params)
	{
		$builder = $this->db->table('user');
		$builder->select('count(id) as trecords');
		if(isset($params['keywords']) and $params['keywords'] != '') {
			$builder->groupStart();
			$builder->like('name', $params['keywords']);
			$builder->orLike('username', $params['keywords']);
			$builder->orLike('user_code', $params['keywords']);
			$builder->orLike('name', $params['keywords']);
			$builder->orLike('email', $params['keywords']);
			$builder->orLike('phone', $params['keywords']);
			$builder->groupEnd();
		}
		$builder->where('deleted_at', NULL);
		return $builder->get()->getRowArray()['trecords'];
	}

	/**
	 * To Check User Login
	 */ 
	public function getUserLoginDetails($username,$password)
	{
		$builder = $this->db->table('user u');
		$builder->select('u.*, r.rights');
		$builder->join('role r', 'r.id=u.role', 'left');
		$builder->where('u.status', 1);
		$builder->where('u.username', $username);
		$builder->where('u.password', $password);
		$builder->where('u.deleted_at', NULL);
		return $builder->get()->getRowArray();
	}
}