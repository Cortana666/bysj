<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
    {
        parent::_constructTeacher();
    }

	public function login()
	{
		if ($this->input->get('act') == 'do') {
			$data = $this->input->post(null, true);
			$data['status'] = 1;
			
			$result = $this->oForm->formValidation('user_login', $data);
			if ($result['code'] != 1) {
				echo json_encode($result);exit;
			}

			$this->load->model('Model_teacher', 'oTeacher');
			$aTeacher = $this->oTeacher->get(array('code' => $data['code']));

			if (!$aTeacher) {
				$result['code'] = 2;
				$result['message'] = '教师不存在';
			}else{
				if ($aTeacher['status'] != 1) {
					$result['code'] = 2;
					$result['message'] = '教师已停用';
				}else{
					if (md5(md5($data['password']).$aTeacher['salt']) != $aTeacher['password']) {
						$result['code'] = 2;
						$result['message'] = '密码错误';
					}else{
						$aSession['teacher']['id'] = $aTeacher['tea_id'];
						$aSession['teacher']['code'] = $aTeacher['code'];
						$aSession['teacher']['name'] = $aTeacher['name'];
						$aSession['teacher']['col_id'] = $aTeacher['col_id'];
						$aSession['teacher']['spe_id'] = $aTeacher['spe_id'];
						$aSession['teacher']['type'] = 4;

						$this->session->set_userdata($aSession);

						$this->oLog->add(array('content'=>'用户登录操作'));

						$result['code'] = 1;
						$result['url'] = '/teacher/home/index';
					}
				}
			}

			echo json_encode($result);exit;
		}
		
		$this->display('teacher/login.html');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header("Location: /teacher/user/login");
	}
}
