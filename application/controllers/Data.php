<?php
ini_set('max_execution_time', 0);
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
		$this->load->model('m_data_uji');

		$data_uji 		= $this->m_data_uji->getAllTweets();
		
		$data['content'] 		= 'pages/v_data_uji';
		$data['menu']			= 'data_uji';
		$data['data_uji']		= $data_uji;

		$this->load->view('layouts/v_layout', $data);
	}

	public function get_data_tweet($start_date, $end_date)
	{
		$postdata = http_build_query(
		    array(
		        'start_date' 	=> $start_date,
		        'end_date'		=> $end_date
		    )
		);

		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-Type: application/x-www-form-urlencoded',
		        'timeout' => 1200,
		        'content' => $postdata
		    )
		);

		$context  	= stream_context_create($opts);

		$result 	= file_get_contents('http://127.0.0.1:4996/getTweets', false, $context);
		$response 	= json_decode($result);

		return $response;
	}

	public function import_data_tweet()
	{
		$this->load->model('m_data_tweets');
		$this->load->model('m_data_uji');

		$start_date 	= $this->input->post('start_date');
		$end_date 		= $this->input->post('end_date');

		// converted to standard date twitter api
		$start_date 	= new DateTime($start_date.' 00:00:00');
		$end_date 		= new DateTime($end_date.' 00:00:00');
		$start_date 	= $start_date->format('Y-m-d\TH:i:s\Z');
		$end_date 		= $end_date->format('Y-m-d\TH:i:s\Z');

		$data_tweets 	= $this->get_data_tweet($start_date, $end_date);

		if (!empty($data_tweets) && count($data_tweets) > 0) {
			// $this->m_data_tweets->delete_all();
			$this->m_data_uji->delete_all();

			foreach ($data_tweets as $tweet) {
				
				$check_tweet_id 	= $this->m_data_tweets->getByAttributes(array('tweet_id' => $tweet->tweet_id));
				if (count($check_tweet_id) > 0 || $tweet->clean_tweet == '') {
					continue;
				}

				$tweet_id 			= $tweet->tweet_id;
				$author_id 			= $tweet->author_id;
				$clean_tweet 		= $tweet->clean_tweet;
				$original_tweet 	= $tweet->original_tweet;
				$polarity 			= $tweet->polarity;
				$sentiment 			= $tweet->sentiment;
				$created_dtm 		= $this->convert_to_datetime($tweet->created_dtm);

				$data_insert = array(
					'tweet_id'			=> $tweet_id,
					'tweet_author_id'	=> $author_id,
					'clean_tweet'		=> $clean_tweet,
					'original_tweet'	=> $original_tweet,
					'polarity'			=> $polarity,
					'sentiment'			=> $sentiment,
					'created_dtm'		=> $created_dtm
				);

				$this->m_data_tweets->insert($data_insert);
			}	
		}

		redirect('data/data_latih');
	}

	public function convert_to_datetime($date)
	{
		$date = new DateTime($date);
		$date = $date->format('Y-m-d H:i:s');
		
		return $date;
	}

	public function create_data_uji()
	{
		$this->load->model(array(
			'm_data_tweets',
			'm_data_uji'
		));

		$this->m_data_uji->delete_all();
		$random_tweets = $this->m_data_tweets->getRandomTweets();

		foreach ($random_tweets as $tweet) {
			$data_uji = array(
				'tweet_id' 		=> $tweet->tweet_id,
				'clean_tweet'	=> $tweet->clean_tweet,
				'sentiment'		=> $tweet->sentiment
			);

			$this->m_data_uji->insert($data_uji);
		}

		redirect('data/data_uji');
	}
	
}
