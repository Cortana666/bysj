<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Special extends MY_Controller {

	public function __construct()
    {
		parent::_constructAdmin();
		$this->load->model('Model_special', 'oSpecial');
		$this->load->model('Model_college', 'oCollege');
    }

	public function lists()
	{

		$this->load->library('pagination');
		$config = $this->config->item('app_page');
		$config['base_url'] = '/admin/special/lists';
		$config['total_rows'] = $this->oSpecial->count($this->input->get(null, true));
		$this->pagination->initialize($config);
		$page_link = $this->pagination->create_links();

		$aSpecial = $this->oSpecial->lists($this->input->get(null, true));

		$aCollege = array();
		if ($aSpecial) {
			$aCollege = array_column($this->oCollege->top(array('col_id'=>array_unique(array_filter(array_column($aSpecial, 'col_id'))))), null, 'col_id');
		}

		$this->assign('aSpecial', $aSpecial);
		$this->assign('aCollege', $aCollege);
		$this->assign('page_links', $page_link);
		$this->assign('total_rows', $config['total_rows']);

		$this->display('admin/special_lists.html');
	}

	public function add()
	{
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('special_add', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			if ($this->oSpecial->get(array('code'=>$aReceive['code']))) {
				$this->error('专业代码已存在');
			}
			
			$aSpecial = $this->oSpecial->add($aReceive);
			if (!$aSpecial) {
				$this->error('添加失败');
			}

			$this->oLog->add(array('content'=>'添加专业['.$aSpecial.']'.$aReceive['name']));

			$this->success('添加成功');
		}

		$aCollege = $this->oCollege->top();

		$this->assign('aCollege', $aCollege);

		$this->display('admin/special_add.html');
    }
    
    public function delete()
	{
		
		if ($this->input->get('act') == 'do') {
            
            if (!$id = $this->input->post('spe_id', true)) {
                $this->error('参数错误');
			}

			$aSpecial = $this->oSpecial->delete(array('spe_id'=>$id));
			if (!$aSpecial) {
				$this->error('删除失败');
			}
			$this->success('删除成功');
		}

        $this->error('参数错误');
    }
    
    public function update()
	{

        if (!$iId = $this->input->get_post('spe_id', true)) {
            $this->display('error.html');
        }

        $aSpecial = $this->oSpecial->get(array('spe_id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('college_add', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			if ($this->oSpecial->get(array('code'=>$aReceive['code'], 'where'=>'spe_id != '.$aReceive['spe_id']))) {
				$this->error('专业代码已存在');
			}

			$aSpecial = $this->oSpecial->update($aReceive);
			if (!$aSpecial) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
		}
		
		$aCollege = $this->oCollege->top();

		$this->assign('aSpecial', $aSpecial);
		$this->assign('aCollege', $aCollege);

		$this->display('admin/special_update.html');
	}

	public function get()
	{

        if ($this->input->get('act') == 'do') {

			if (!$iCol_id = $this->input->post('col_id', true)) {
				$this->error('获取专业失败');
			}
            
			$aSpecial = $this->oSpecial->top(array('col_id'=>array($iCol_id)));
			
			$this->success('成功', '/', $aSpecial);
		
        }

		$this->error('获取专业失败');
	}
}
