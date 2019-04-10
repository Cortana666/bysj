<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function _init($val = array()){
        if ($val['username']) {
            $this->db->where('username', $val['username']);
        }
        if ($val['password']) {
            $this->db->where('password', $val['password']);
        }
        if ($val['status']) {
        $this->db->where('status', $val['status']);
        }
    }

	public function get($val = array())
	{
        $this->_init($val);
        return $this->db->get('admin')->row_array();
	}
}
