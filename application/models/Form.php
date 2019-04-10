<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Model {

	public function formValidation($module = '', $data = array())
	{
        $this->config->load('validate');
        $config = $this->config->item($module);
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules($config);

        $result['code'] = 1;
        if ($this->form_validation->run() == false) {
            $result['code'] = 2;
            $result['message'] = $this->form_validation->error_array();
        }
        
        return $result;
	}
}
