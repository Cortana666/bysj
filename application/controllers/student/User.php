<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
    {
        parent::_constructStudent();
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

			$this->load->model('Model_student', 'oStudent');
			$aStudent = $this->oStudent->get(array('code' => $data['code']));

			if (!$aStudent) {
				$result['code'] = 2;
				$result['message'] = '学生不存在';
			}else{
				if ($aStudent['status'] != 1) {
					$result['code'] = 2;
					$result['message'] = '学生已停用';
				}else{
					if (md5(md5($data['password']).$aStudent['salt']) != $aStudent['password']) {
						$result['code'] = 2;
						$result['message'] = '密码错误';
					}else{
						$aSession['student']['id'] = $aStudent['stu_id'];
						$aSession['student']['code'] = $aStudent['code'];
						$aSession['student']['name'] = $aStudent['name'];
						$aSession['student']['col_id'] = $aStudent['col_id'];
						$aSession['student']['spe_id'] = $aStudent['spe_id'];
						$aSession['student']['type'] = 5;

						$this->session->set_userdata($aSession);

						$this->oLog->add(array('content'=>'用户登录操作'));

						$result['code'] = 1;
						$result['url'] = '/student/home/index';
					}
				}
			}

			echo json_encode($result);exit;
		}
		
		$this->display('student/login.html');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header("Location: /student/user/login");
	}
}
