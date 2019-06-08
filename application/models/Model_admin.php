<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    protected $_table = 'admin';

    public function _init($val = array()){
        if (!empty($val['adm_id'])) {
            if (is_array($val['adm_id'])) {
                $this->db->where_in('adm_id', $val['adm_id']);
            }else{
                $this->db->where('adm_id', $val['adm_id']);
            }
        }
        if (!empty($val['username'])) {
            $this->db->where('username', $val['username']);
        }
        if (!empty($val['realname'])) {
            $this->db->where('realname', $val['realname']);
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
        if (!empty($val['type_id'])) {
            $this->db->where('type_id', $val['type_id']);
        }
        if (!empty($val['time'])) {
            $this->db->where('time', $val['time']);
        }
        if (!empty($val['where'])) {
            $this->db->where($val['where']);
        }
        if (!empty($val['select'])) {
            $this->db->select($val['select']);
        }
        if (!empty($this->session->user)) {
            if ($this->session->user['type'] != 1) {
                $this->db->where('(type = '.$this->session->user['type'].' and type_id = '.$this->session->user['type_id'].') or (root_id = '.$this->session->user['type_id'].')');
            }
        }
    }

	public function get($val = array())
	{
        $this->_init($val);
        return $this->db->get($this->_table)->row_array();
    }
    
    public function top($val = array())
	{
        $this->_init($val);
        return $this->db->get($this->_table)->result_array();
    }

    public function count($val = array())
	{
        $this->_init($val);
        $this->db->select('count(*) as count');
        return $this->db->get($this->_table)->row_array()['count'];
    }
    
    public function lists($val = array())
	{
        $this->_init($val);
        
        $this->db->limit($this->pagination->per_page, $this->uri->segment(4));
        return $this->db->get($this->_table)->result_array();
    }
    
    public function add($val = array())
	{
        $val['status'] = 1;
        $val['time'] = date('Y-m-d H:i:s');
        if ($this->db->insert($this->_table, $val)) {
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    public function delete($val = array())
	{
        $this->_init($val);
        return $this->db->delete($this->_table);
    }
    
    public function update($val = array())
	{
        $this->db->where('adm_id', $val['adm_id']);
        return $this->db->update($this->_table, $val);
    }
}
