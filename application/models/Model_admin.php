<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function _init($val = array()){
        if (!empty($val['id'])) {
            $this->db->where('id', $val['id']);
        }
        if (!empty($val['username'])) {
            $this->db->where('username', $val['username']);
        }
        if (!empty($val['password'])) {
            $this->db->where('password', $val['password']);
        }
        if (!empty($val['status'])) {
        $this->db->where('status', $val['status']);
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
        $this->db->limit($this->pagination->per_page, $this->pagination->cur_page);
        return $this->db->get('admin')->result_array();
    }
    
    public function add($val = array())
	{
        $val['create_time'] = date('Y-m-d H:i:s');

        return $this->db->insert('admin', $val);
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
