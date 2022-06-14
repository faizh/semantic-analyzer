<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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

	public function index()
	{
		$this->load->view('pages/v_sign_up');
	}

	public function act_signup()
	{
		$this->load->model('m_users');

		$data_post 		= $this->input->post();
		$username 		= $data_post['username'];
		$name 			= $data_post['name'];
		$email 			= $data_post['email'];
		$password 		= $data_post['password'];

		if (!$this->m_users->isAvailableUsername($username)) {
			redirect('register');
		}

		$data_register 	= array(
			'username' 	=> $username,
			'name'		=> $name,
			'email'		=> $email,
			'password'	=> password_hash($password, PASSWORD_DEFAULT)
		);

		$register = $this->m_users->insert($data_register);

		if ($this->db->affected_rows() > 0) {
			redirect('login');
		}else{
			redirect('register');
		}


	}
	
}
