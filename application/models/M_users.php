<?php
class M_users extends CI_Model {
	
	public function insert($data)
    {
		$this->db->insert('t_users',$data);
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
	
}