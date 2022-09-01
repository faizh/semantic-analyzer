<?php
class M_data_uji extends CI_Model {
    
    public function insert($data)
    {
        $this->db->insert('t_data_uji',$data);
    }

    public function getAllTweets()
    {
        $this->db->select('*');
        $results = $this->db->get('t_data_uji')->result();

        return $results;
    }

    public function delete_all()
    {
        $this->db->truncate('t_data_uji');
    }

    public function dataCountTestTweet()
    {
        $query = "
        SELECT 
        COUNT(CASE WHEN sentiment = 'positive' THEN 1 ELSE NULL END) manual_positive,
        COUNT(CASE WHEN sentiment = 'negative' THEN 1 ELSE NULL END) manual_negative,
        COUNT(CASE WHEN sentiment = 'neutral' THEN 1 ELSE NULL END) manual_neutral,
        COUNT(CASE WHEN naive_bayes_analysis = 'positive' THEN 1 ELSE NULL END) nb_positive,
        COUNT(CASE WHEN naive_bayes_analysis = 'negative' THEN 1 ELSE NULL END) nb_negative,
        COUNT(CASE WHEN naive_bayes_analysis = 'neutral' THEN 1 ELSE NULL END) nb_neutral,
        COUNT(CASE WHEN textblob_analysis = 'positive' THEN 1 ELSE NULL END) tb_positive,
        COUNT(CASE WHEN textblob_analysis = 'negative' THEN 1 ELSE NULL END) tb_negative,
        COUNT(CASE WHEN textblob_analysis = 'neutral' THEN 1 ELSE NULL END) tb_neutral
        FROM t_data_uji a";

        $results = $this->db->query($query);

        return $results->row();
    }
}