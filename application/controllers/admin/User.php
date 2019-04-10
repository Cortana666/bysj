<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function login()
	{
		if ($this->input->get('act') == 'do') {
			$data = $this->input->post(null, true);
			$data['status'] = 1;
			
			$this->load->model('Form', 'oForm');
			$result = $this->oForm->formValidation('admin_login', $data);
			if ($result['code'] != 1) {
				echo json_encode($result);exit;
			}

			$this->load->model('Model_admin', 'oAdmin');
			$aAdmin = $this->oAdmin->get($data);

			$result['code'] = 1;
			if ($aAdmin) {
				$this->load->library('session');
				$aSession['user'] = array(
					'username' => $aAdmin['username'],
					'realname' => $aAdmin['realname']
				);
				$this->session->set_userdata($aSession);
				$result['url'] = '/admin/home/index';
			}else{
				$result['code'] = 2;
				$result['message'] = '账号密码不匹配';
			}

			echo json_encode($result);exit;
		}
		
		$this->display('admin/login.html');
	}
}
