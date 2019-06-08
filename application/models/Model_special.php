<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_special extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    protected $_table = 'special';

    public function _init($val = array()){
        if (!empty($val['spe_id'])) {
            if (is_array($val['spe_id'])) {
                $this->db->where_in('spe_id', $val['spe_id']);
            }else{
                $this->db->where('spe_id', $val['spe_id']);
            }
        }
        if (!empty($val['col_id'])) {
            $this->db->where('col_id', $val['col_id']);
        }
        if (!empty($val['name'])) {
            $this->db->like('name', $val['name']);
        }
        if (!empty($val['code'])) {
            if (is_array($val['code'])) {
                $this->db->where_in('code', $val['code']);
            }else{
                $this->db->where('code', $val['code']);
            }
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
        if ($this->session->user['type'] == 2) {
            $this->db->where('col_id = '.$this->session->user['type_id']);
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
        $this->db->where('spe_id', $val['spe_id']);
        return $this->db->update($this->_table, $val);
    }
}
