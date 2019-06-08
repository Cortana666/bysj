<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_subject extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    protected $_table = 'subject';

    public function _init($val = array()){
        if (!empty($val['sub_id'])) {
            if (is_array($val['sub_id'])) {
                $this->db->where_in('sub_id', $val['sub_id']);
            }else{
                $this->db->where('sub_id', $val['sub_id']);
            }
        }
        if (!empty($val['spe_id'])) {
            $this->db->where('spe_id', $val['spe_id']);
        }
        if (!empty($val['col_id'])) {
            $this->db->where('col_id', $val['col_id']);
        }
        if (!empty($val['stu_id'])) {
            $this->db->where('stu_id', $val['stu_id']);
        }
        if (!empty($val['tea_id'])) {
            $this->db->where('tea_id', $val['tea_id']);
        }
        if (!empty($val['title'])) {
            $this->db->where('title', $val['title']);
        }
        if (!empty($val['status'])) {
            $this->db->where('status', $val['status']);
        }
        if (!empty($val['check'])) {
            $this->db->where('check', $val['check']);
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
        $val['time'] = date('Y-m-d H:i:s');
        $val['status'] = 1;
        $val['check'] = 1;
        return $this->db->insert($this->_table, $val);
    }
    
    public function delete($val = array())
	{
        $this->_init($val);
        return $this->db->delete($this->_table);
    }
    
    public function update($val = array())
	{
        $this->db->where('sub_id', $val['sub_id']);
        return $this->db->update($this->_table, $val);
    }
}
