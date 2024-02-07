<?php 

namespace App\Controllers\Cms;

use App\Controllers\BaseController;

/**
 * Content controller
 */
class Content extends BaseController
{
	
	/**
	 * Constructor
	 */
	public function __construct()
	{

	}

	/**
	 * Index
	 */ 
	public function index() : string
	{
		$data['page'] = array(
			'page_title' => 'Content Page',
			'title' => 'Content Title',
		);

		return view('cms/content/content', $data);
	}
}