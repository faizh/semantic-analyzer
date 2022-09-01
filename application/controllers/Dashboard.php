<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model(array('m_data_tweets', 'm_data'));

		$positive_tweets		= $this->m_data_tweets->getByAttributes(array('sentiment' => 'positive'));
		$negative_tweets		= $this->m_data_tweets->getByAttributes(array('sentiment' => 'negative'));
		$neutral_tweets			= $this->m_data_tweets->getByAttributes(array('sentiment' => 'neutral'));
		$total_tweet_words 		= $this->m_data_tweets->getTotalWords();
		$count_total_tweets 	= $this->m_data_tweets->countTotalTweets();
		$app_data 				= $this->m_data->getData();

		$data 					= array(
			'positive'				=> count($positive_tweets),
			'negative'				=> count($negative_tweets),
			'neutral'				=> count($neutral_tweets),
			'total_tweet_words'		=> $total_tweet_words,
			'total_tweets' 			=> $count_total_tweets,
			'presentase_data_uji'	=> $app_data->presentase_data_uji
		);

		$data['content'] 		= 'pages/v_dashboard';
		$data['menu']			= 'dashboard';
		$this->load->view('layouts/v_layout', $data);
	}
	
}
