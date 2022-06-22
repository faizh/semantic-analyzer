<?php
class M_data_tweets extends CI_Model {
	
	public function insert($data)
    {
		$this->db->insert('t_data_tweets',$data);
    }

    public function getByAttributes($attributes=array())
    {
        $this->db->where($attributes);
        $results = $this->db->get('t_data_tweets')->result();

        return $results;
    }

    public function getUserDataRow($attributes = array())
    {
    	$this->db->select('*');
    	$this->db->where($attributes);
    	$result = $this->db->get('t_users')->row();

    	return $result;
    }

    public function isAvailableUsername($username)
    {
    	$this->db->select('*');
    	$this->db->where('username', $username);
    	$result = $this->db->get('t_users')->result();

    	if (count($result) > 0) {
    		return FALSE;
    	}else{
    		return TRUE;
    	}
    }

    public function getAllTweets()
    {
        $this->db->select('*');
        $results = $this->db->get('t_data_tweets')->result();

        return $results;
    }

    public function delete_all()
    {
        $this->db->truncate('t_data_tweets');
    }

    public function getRandomTweets()
    {
        $this->db->select('*');
        $results = $this->db->get('t_data_tweets')->result();
        
        $cnt_all_tweets = count($results);
        $random_amount  = round((10 / 100) * $cnt_all_tweets);

        $this->db->select('*');
        $this->db->order_by('RAND()');
        $this->db->limit($random_amount);
        $random_tweets = $this->db->get('t_data_tweets')->result();

        return $random_tweets;
    }

    public function getTotalWords()
    {
        $query      = "SELECT SUM(LENGTH(clean_tweet) - LENGTH(REPLACE(clean_tweet, ' ', '')) + 1) as total FROM t_data_tweets";

        $result = $this->db->query($query)->row();

        return $result->total;
    }

    public function countTotalTweets()
    {
        $query      = "SELECT COUNT(*) as total FROM t_data_tweets";

        $result = $this->db->query($query)->row();

        return $result->total;
    }
	
}