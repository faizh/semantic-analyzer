<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$data['content'] 		= 'pages/v_report_table';
		$data['menu']			= 'report';
		$this->load->view('layouts/v_layout', $data);
	}

	public function chart()
	{
		$this->load->model('m_data_tweets');

		$positive_tweets		= $this->m_data_tweets->getByAttributes(array('sentiment' => 'positive'));
		$negative_tweets		= $this->m_data_tweets->getByAttributes(array('sentiment' => 'negative'));
		$neutral_tweets			= $this->m_data_tweets->getByAttributes(array('sentiment' => 'neutral'));

		$data['data_tweets']	= array(
			'positive_tweets'	=> $positive_tweets,
			'negative_tweets'	=> $negative_tweets,
			'neutral_tweets'	=> $neutral_tweets
		);


		$data['content'] 		= 'pages/v_report_chart';
		$data['menu']			= 'chart';
		$this->load->view('layouts/v_layout', $data);
	}
	
}
