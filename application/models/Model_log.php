<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_log extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function _init($val = array()){
        if (!empty($val['id'])) {
            $this->db->where_in('id', $val['id']);
        }
        if (!empty($val['func'])) {
            $this->db->where('func', $val['func']);
        }
        if (!empty($val['actor'])) {
            $this->db->where('actor', $val['actor']);
        }
        if (!empty($val['content'])) {
            $this->db->where('content', $val['content']);
        }
        if (!empty($val['type'])) {
            $this->db->where('type', $val['type']);
        }
        if (!empty($val['time'])) {
            $this->db->where('time', $val['time']);
        }
        if (!empty($val['ipaddress'])) {
            $this->db->where('ipaddress', $val['ipaddress']);
        }
        if (!empty($val['where'])) {
            $this->db->where($val['where']);
        }
        if (!empty($val['select'])) {
            $this->db->select($val['select']);
        }
    }

	public function top($val = array())
	{
        $this->_init($val);
        return $this->db->get('log')->result_array();
    }
    
    public function add($val = array())
	{
        $this->load->helper('url');
        $aUrl = explode('/', current_url());
        $iCount = count($aUrl);
        $val['func'] = $aUrl[$iCount-3].'/'.$aUrl[$iCount-2].'/'.$aUrl[$iCount-1];
		$val['type'] = $this->session->user['type']?$this->session->user['type']:$this->session->user['col_id'];
        $val['actor'] = $this->session->user['id'];
        $val['ipaddress'] = $this->input->ip_address();                
        $val['time'] = date('Y-m-d H:i:s');
        return $this->db->insert('log', $val);
    }
}
