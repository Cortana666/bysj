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
		$config['total_rows'] = $this->oAdmin->count($this->input->get(null, true));
		$this->pagination->initialize($config);
		$page_link = $this->pagination->create_links();

		$aAdmin = $this->oAdmin->lists($this->input->get(null, true));

		$this->assign('aAdmin', $aAdmin);
		$this->assign('page_links', $page_link);
		$this->assign('total_rows', $config['total_rows']);

		$this->display('admin/admin_lsits.html');
	}

	public function add()
	{
		
		if ($this->input->get('act') == 'do') {
			$data = $this->input->post(null, true);

			$result = $this->oForm->formValidation('admin_add', $data);
			if ($result['code'] != 1) {
				$this->error($result['message']);
			}

			if ($this->oAdmin->get(array('username'=>$data['username']))) {
				$this->error('用户名已存在');
			}
			if ($this->oAdmin->get(array('email'=>$data['email']))) {
				$this->error('邮箱已被使用');
			}
			
			if ($data['type'] == 1) {
				$data['type'] = $data['college_id'];
			}
			unset($data['col_id']);
			unset($data['repass']);
			$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
			$data['salt'] = $chars[rand(0,35)].$chars[rand(0,35)].$chars[rand(0,35)].$chars[rand(0,35)];
			$data['password'] = md5(md5($data['password']).$data['salt']);
			
			$aAdmin = $this->oAdmin->add($data);
			if (!$aAdmin) {
				$this->error('添加失败');
			}
			$this->success('添加成功');
		}

		$this->display('admin/admin_add.html');
    }
    
    public function delete()
	{
		
		if ($this->input->get('act') == 'do') {
            
            if (!$sId = $this->input->post('id', true)) {
                $this->error('参数错误');
			}
			
			$aId = array_unique(array_filter(explode(',', $sId)));

			$aAdmin = $this->oAdmin->delete(array('id'=>$aId));
			if (!$aAdmin) {
				$this->error('删除失败');
			}
			$this->success('删除成功');
		}

        $this->error('参数错误');
    }
    
    public function update()
	{

        if (!$iId = $this->input->get_post('id', true)) {
            $this->display('error.html');
        }

        $aAdmin = $this->oAdmin->get(array('id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$data = $this->input->post(null, true);

			$result = $this->oForm->formValidation('admin_update', $data);
			if ($result['code'] != 1) {
				$this->error($result['message']);
			}

			if ($this->oAdmin->get(array('username'=>$data['username'], 'where'=>'id != '.$data['id']))) {
				$this->error('用户名已存在');
			}
			if ($this->oAdmin->get(array('email'=>$data['email'], 'where'=>'id != '.$data['id']))) {
				$this->error('邮箱已被使用');
			}

			if ($data['type'] == 1) {
				$data['type'] = $data['college_id'];
			}
			unset($data['repass']);
			unset($data['college_id']);
            if (!$data['password']) {
                unset($data['password']);
            }else{
                $data['password'] = md5(md5($data['password']).$aAdmin['salt']);
            }
            
			$aAdmin = $this->oAdmin->update($data);
			if (!$aAdmin) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
        }

        $this->assign('aAdmin', $aAdmin);

		$this->display('admin/admin_update.html');
	}

	public function change()
	{
		
		if ($this->input->get('act') == 'do') {
			$data = $this->input->post(null, true);
			
			$result = $this->oForm->formValidation('status_change', $data);
			if ($result['code'] != 1) {
				$this->error($result['message']);
			}

			$aAdmin = $this->oAdmin->update($data);
			if (!$aAdmin) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
        }
	}
}
