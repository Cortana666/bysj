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
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('admin_add', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			if ($this->oAdmin->get(array('username'=>$aReceive['username']))) {
				$this->error('用户名已存在');
			}
			if ($this->oAdmin->get(array('email'=>$aReceive['email']))) {
				$this->error('邮箱已被使用');
			}
			
			if ($aReceive['type'] == 1) {
				$aReceive['type'] = $aReceive['college_id'];
			}
			unset($aReceive['college_id']);
			unset($aReceive['repass']);
			$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
			$aReceive['salt'] = $chars[rand(0,35)].$chars[rand(0,35)].$chars[rand(0,35)].$chars[rand(0,35)];
			$aReceive['password'] = md5(md5($aReceive['password']).$aReceive['salt']);
			
			$aAdmin = $this->oAdmin->add($aReceive);
			if (!$aAdmin) {
				$this->error('添加失败');
			}

			$this->oLog->add(array('content'=>'添加管理员账号['.$aAdmin.']'.$aReceive['username']));

			$this->success('添加成功');
		}

		$this->display('admin/admin_add.html');
    }
    
    public function delete()
	{
		
		if ($this->input->get('act') == 'do') {
            
            if (!$id = $this->input->post('id', true)) {
                $this->error('参数错误');
			}

			$aAdmin = $this->oAdmin->delete(array('id'=>$id));
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
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('admin_update', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			if ($this->oAdmin->get(array('username'=>$aReceive['username'], 'where'=>'id != '.$aReceive['id']))) {
				$this->error('用户名已存在');
			}
			if ($this->oAdmin->get(array('email'=>$aReceive['email'], 'where'=>'id != '.$aReceive['id']))) {
				$this->error('邮箱已被使用');
			}

			if ($aReceive['type'] == 1) {
				$aReceive['type'] = $aReceive['college_id'];
			}
			unset($aReceive['repass']);
			unset($aReceive['college_id']);
            if (!$aReceive['password']) {
                unset($aReceive['password']);
            }else{
                $aReceive['password'] = md5(md5($aReceive['password']).$aAdmin['salt']);
            }
            
			$aAdmin = $this->oAdmin->update($aReceive);
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
			$aReceive = $this->input->post(null, true);
			
			$aResult = $this->oForm->formValidation('status_change', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			$iType = $this->oAdmin->get(array('id'=>$aReceive['id'], 'select'=>'type'))['type'];
			if ($iType == -1) {
				if ($aReceive['status'] == 2) {
					if ($this->oAdmin->count(array('type'=>-1, 'status'=>1)) <= 1) {
						$this->error('学校管理最少要有一个账号开启');
					}
				}
			}

			$aAdmin = $this->oAdmin->update($aReceive);
			if (!$aAdmin) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
        }
	}
}
