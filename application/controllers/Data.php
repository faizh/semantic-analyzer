<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

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
	
	public function data_latih()
	{
		$this->load->model('m_data_tweets');

		$data_tweets 	= $this->m_data_tweets->getAllTweets();

		$data['content'] 		= 'pages/v_data_latih';
		$data['menu']			= 'data_latih';
		$data['data_tweets'] 	= $data_tweets;

		$this->load->view('layouts/v_layout', $data);
	}

	public function data_uji()
	{
		$data['content'] 		= 'pages/v_data_uji';
		$data['menu']			= 'data_uji';
		$this->load->view('layouts/v_layout', $data);
	}
	
}
