<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view('pages/v_login');
	}

	public function act_login()
	{
		$this->load->model('m_users');

		$data_post 	= $this->input->post();
		$username 	= $data_post['username'];
		$password 	= $data_post['password'];

		$data_user 	= $this->m_users->getUserDataRow(array('username' => $username));

		if (password_verify($password, $data_user->password)) {
			// set session
			$sess_array = array(
				'sess_login'				=> '1',
				'sess_user_id' 				=> $data_user->id,
				'sess_user_name' 			=> $data_user->username
			);
			$this->session->set_userdata($sess_array);

			redirect('dashboard');
		}else{
			
			redirect('login');
		}
	}

	public function act_logout()
	{
		// session destroy
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}
