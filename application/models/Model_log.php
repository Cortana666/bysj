<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_log extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    protected $_table = 'log';

    public function _init($val = array()){
        if (!empty($val['log_id'])) {
            if (is_array($val['log_id'])) {
                $this->db->where_in('log_id', $val['log_id']);
            }else{
                $this->db->where('log_id', $val['log_id']);
            }
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
        if (!empty($val['type_id'])) {
            $this->db->where('type_id', $val['type_id']);
        }
        if (!empty($val['ip'])) {
            $this->db->where('ip', $val['ip']);
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
    }

	public function top($val = array())
	{
        $this->_init($val);
        return $this->db->get($this->_table)->result_array();
    }
    
    public function add($val = array())
	{
        $loginFlag = !empty($this->session->user)?'user':(!empty($this->session->teacher)?'teacher':(!empty($this->session->student)?'student':''));
        $this->load->helper('url');
        $aUrl = explode('/', current_url());
        $iCount = count($aUrl);
        $val['func'] = $aUrl[$iCount-3].'/'.$aUrl[$iCount-2].'/'.$aUrl[$iCount-1];
        $val['type'] = $this->session->$loginFlag['type'];
        $val['actor'] = $this->session->$loginFlag['id'];
        $val['ip'] = $this->input->ip_address();                
        $val['time'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->_table, $val);
    }
}
