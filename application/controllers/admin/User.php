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
			$aAdmin = $this->oAdmin->get(array('username' => $data['username']));

			if (!$aAdmin) {
				$result['code'] = 2;
				$result['message'] = '账号不存在';
			}else{
				if (md5(md5($data['password']).$aAdmin['salt']) != $aAdmin['password']) {
					$result['code'] = 2;
					$result['message'] = '密码错误';
				}else{
					$this->load->library('session');
					$aSession['user']['username'] = $aAdmin['username'];
					$aSession['user']['realname'] = $aAdmin['realname'];
					if ($aAdmin['type'] > 0) {
						$aSession['user']['col_id'] = $aAdmin['type'];
					}
					$this->session->set_userdata($aSession);

					$result['code'] = 1;
					$result['url'] = '/admin/home/index';
				}
			}

			echo json_encode($result);exit;
		}
		
		$this->display('admin/login.html');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header("Location: /admin/user/login");
	}
}
