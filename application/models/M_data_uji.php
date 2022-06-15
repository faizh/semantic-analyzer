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
}