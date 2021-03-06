<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$sess_login		= $this->session->userdata('sess_login');
		if($sess_login != 1)
		{
			redirect('login');
		}
	}
	
	public function index()
	{
		$this->load->model('m_users');

		$user_id 		= $this->session->userdata('sess_user_id');
		$user_data 		= $this->m_users->getUserDataRow(array('id' => $user_id));

		$data['data']			= array(
			'user_data'	=> $user_data
		);

		$data['content'] 		= 'pages/v_profile';
		$data['menu']			= 'profile';
		$this->load->view('layouts/v_layout', $data);
	}
	
}
