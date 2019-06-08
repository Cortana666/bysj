<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class College extends MY_Controller {

	public function __construct()
    {
		parent::_constructAdmin();
		$this->load->model('Model_college', 'oCollege');
    }

	public function lists()
	{

		$this->load->library('pagination');
		$config = $this->config->item('app_page');
		$config['base_url'] = '/admin/college/lists';
		$config['total_rows'] = $this->oCollege->count($this->input->get(null, true));
		$this->pagination->initialize($config);
		$page_link = $this->pagination->create_links();

		$aCollege = $this->oCollege->lists($this->input->get(null, true));

		$this->assign('aCollege', $aCollege);
		$this->assign('page_links', $page_link);
		$this->assign('total_rows', $config['total_rows']);

		$this->display('admin/college_lists.html');
	}

	public function add()
	{
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('college_add', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			if ($this->oCollege->get(array('code'=>$aReceive['code']))) {
				$this->error('学院代码已存在');
			}
			
			$aCollege = $this->oCollege->add($aReceive);
			if (!$aCollege) {
				$this->error('添加失败');
			}

			$this->oLog->add(array('content'=>'添加学院['.$aCollege.']'.$aReceive['name']));

			$this->success('添加成功');
		}

		$this->display('admin/college_add.html');
    }
    
    public function delete()
	{
		
		if ($this->input->get('act') == 'do') {
            
            if (!$id = $this->input->post('col_id', true)) {
                $this->error('参数错误');
			}

			$aCollege = $this->oCollege->delete(array('col_id'=>$id));
			if (!$aCollege) {
				$this->error('删除失败');
			}
			$this->success('删除成功');
		}

        $this->error('参数错误');
    }
    
    public function update()
	{

        if (!$iId = $this->input->get_post('col_id', true)) {
            $this->display('error.html');
        }

        $aCollege = $this->oCollege->get(array('col_id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('college_add', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			if ($this->oCollege->get(array('code'=>$aReceive['code'], 'where'=>'col_id != '.$aReceive['col_id']))) {
				$this->error('专业代码已存在');
			}

			$aCollege = $this->oCollege->update($aReceive);
			if (!$aCollege) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
        }

        $this->assign('aCollege', $aCollege);

		$this->display('admin/college_update.html');
	}
}
