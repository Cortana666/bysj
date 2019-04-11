<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_admin', 'oAdmin');
    }

	public function lists()
	{
		
		$this->load->library('pagination');
		$config = $this->config->item('app_page');
		$config['base_url'] = '/admin/admin/lists';
		$config['total_rows'] = $this->oAdmin->count();
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$aAdmin = $this->oAdmin->lists();

		$this->assign('page_links', $this->pagination->create_links());
		$this->assign('aAdmin', $aAdmin);

		$this->display('admin/admin_lsits.html');
	}

	public function add()
	{
		
		if ($this->input->get('act') == 'do') {
			$data = $this->input->post(null, true);
			
			$this->load->model('Form', 'oForm');
			$result = $this->oForm->formValidation('admin_add', $data);
			if ($result['code'] != 1) {
				echo json_encode($result);exit;
			}

			unset($data['repass']);
			$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
			$val['salt'] = $chars[rand(0,35)].$chars[rand(0,35)].$chars[rand(0,35)].$chars[rand(0,35)];
            $val['password'] = md5(md5($val['password']).$val['salt']);
            
			$aAdmin = $this->oAdmin->add($data);
			if (!$aAdmin) {
				$result['code'] = 2;
				$result['message'] = '添加失败';
			}else{
				$result['code'] = 1;
			}

			echo json_encode($result);exit;
		}

		$this->display('admin/admin_add.html');
    }
    
    public function delete()
	{
		
		if ($this->input->get('act') == 'do') {
            
            if (!$iId = $this->input->post('id', true)) {
                $result['code'] = 2;
		        $result['message'] = '参数错误';
            }

			$aAdmin = $this->oAdmin->delete(array('id'=>intval($iId)));
			if (!$aAdmin) {
				$result['code'] = 2;
				$result['message'] = '删除失败';
			}else{
				$result['code'] = 1;
			}

			echo json_encode($result);exit;
		}

        $result['code'] = 2;
		$result['message'] = '参数错误';
		echo json_encode($result);exit;
    }
    
    public function update()
	{

        if (!$iId = $this->input->get_post('id', true)) {
            $this->display('error.html');
        }

        $aAdmin = $this->oAdmin->get(array('id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$data = $this->input->post(null, true);
			
			$this->load->model('Form', 'oForm');
			$result = $this->oForm->formValidation('admin_update', $data);
			if ($result['code'] != 1) {
				echo json_encode($result);exit;
			}

            unset($data['repass']);
            if (!$data['password']) {
                unset($data['password']);
            }else{
                $data['password'] = md5(md5($data['password']).$aAdmin['salt']);
            }
            
			$aAdmin = $this->oAdmin->update($data);
			if (!$aAdmin) {
				$result['code'] = 2;
				$result['message'] = '修改失败';
			}else{
				$result['code'] = 1;
			}

			echo json_encode($result);exit;
        }

        $this->assign('aAdmin', $aAdmin);

		$this->display('admin/admin_update.html');
	}
}
