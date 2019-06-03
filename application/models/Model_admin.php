<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function _init($val = array()){
        if (!empty($val['id'])) {
            $this->db->where_in('id', $val['id']);
        }
        if (!empty($val['username'])) {
            $this->db->where('username', $val['username']);
        }
        if (!empty($val['email'])) {
            $this->db->where('email', $val['email']);
        }
        if (!empty($val['password'])) {
            $this->db->where('password', $val['password']);
        }
        if (!empty($val['status'])) {
            $this->db->where('status', $val['status']);
        }
        if (!empty($val['type'])) {
            $this->db->where('type', $val['type']);
        }
        if (!empty($val['where'])) {
            $this->db->where($val['where']);
        }
        if (!empty($val['select'])) {
            $this->db->select($val['select']);
        }
    }

	public function get($val = array())
	{
        $this->_init($val);
        return $this->db->get('admin')->row_array();
    }
    
    public function count($val = array())
	{
        $this->_init($val);
        $this->db->select('count(*) as count');
        return $this->db->get('admin')->row_array()['count'];
    }
    
    public function lists($val = array())
	{
        $this->_init($val);
        
        $this->db->limit($this->pagination->per_page, $this->uri->segment(4));
        return $this->db->get('admin')->result_array();
    }
    
    public function add($val = array())
	{
        $val['create_time'] = date('Y-m-d H:i:s');
        if ($this->db->insert('admin', $val)) {
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    public function delete($val = array())
	{
        $this->_init($val);
        return $this->db->delete('admin');
    }
    
    public function update($val = array())
	{
        $this->db->where('id', $val['id']);
        return $this->db->update('admin', $val);
    }
}
