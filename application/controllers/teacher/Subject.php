<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends MY_Controller {

	public function __construct()
    {
		parent::_constructTeacher();
		$this->load->model('Model_subject', 'oSubject');
		$this->load->model('Model_student', 'oStudent');
    }

	public function listsAdd()
	{
		$aReceive = $this->input->get(null, true);
		$aReceive['type'] = 1;
		$aReceive['tea_id'] = $this->session->teacher['id'];

		$this->load->library('pagination');
		$config = $this->config->item('app_page');
		$config['base_url'] = '/teacher/subject/listsadd';
		$config['total_rows'] = $this->oSubject->count($aReceive);
		$this->pagination->initialize($config);
		$page_link = $this->pagination->create_links();

		$aSubject = $this->oSubject->lists($aReceive);

		$this->assign('aSubject', $aSubject);
		$this->assign('page_links', $page_link);
		$this->assign('total_rows', $config['total_rows']);

		$this->display('teacher/subject_listsadd.html');

	}

	public function listsCheck()
	{
		$aReceive = $this->input->get(null, true);
		$aReceive['type'] = 1;
		$aReceive['tea_id'] = $this->session->teacher['id'];
		$aReceive['where'] = "stu_id != 0";

		$this->load->library('pagination');
		$config = $this->config->item('app_page');
		$config['base_url'] = '/teacher/subject/listscheck';
		$config['total_rows'] = $this->oSubject->count($aReceive);
		$this->pagination->initialize($config);
		$page_link = $this->pagination->create_links();

		$aSubject = $this->oSubject->lists($aReceive);

		$aStudent = array();
		if ($aSubject) {
			$aStudent = array_column($this->oStudent->top(array('select'=>'stu_id,name','stu_id'=>array_column($aSubject, 'stu_id'))), 'name', 'stu_id');
		}

		$this->assign('aSubject', $aSubject);
		$this->assign('aStudent', $aStudent);
		$this->assign('page_links', $page_link);
		$this->assign('total_rows', $config['total_rows']);

		$this->display('teacher/subject_listscheck.html');

	}

	public function add()
	{
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			
			$aReceive['tea_id'] = $this->session->teacher['id'];
			$aReceive['col_id'] = $this->session->teacher['col_id'];
			$aReceive['spe_id'] = $this->session->teacher['spe_id'];

			$aResult = $this->oForm->formValidation('subject_add', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			$aSubject = $this->oSubject->get(array('title'=>$aReceive['title']));
			if (!empty($aSubject)) {
				$this->error('课程题目已存在，不允许重复');
			}

			$aSubject = $this->oSubject->add($aReceive);
			if (!$aSubject) {
				$this->error('添加失败');
			}

			$this->oLog->add(array('content'=>'提交课程题目['.$aSubject.']'.$aReceive['title']));

			$this->success('提交成功');
		}

		$this->display('teacher/subject_add.html');
		
    }
    
    public function update()
	{

        if (!$iId = $this->input->get_post('sub_id', true)) {
            $this->display('error.html');
        }

        $aSubject = $this->oSubject->get(array('sub_id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('subject_update', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			$aSubject = $this->oSubject->get(array('title'=>$aReceive['title']));
			if (!empty($aSubject)) {
				$this->error('课程题目已存在，不允许重复');
			}
            
			$aSubject = $this->oSubject->update($aReceive);
			if (!$aSubject) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
		}

        $this->assign('aSubject', $aSubject);

		$this->display('teacher/subject_update.html');
	}

	public function delete()
	{
		
		if ($this->input->get('act') == 'do') {
            
            if (!$id = $this->input->post('sub_id', true)) {
                $this->error('参数错误');
			}

			$aSubject = $this->oSubject->delete(array('sub_id'=>$id));
			if (!$aSubject) {
				$this->error('删除失败');
			}
			$this->success('删除成功');
		}

        $this->error('参数错误');
	}
	
	public function change()
	{
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);
			
			$aResult = $this->oForm->formValidation('status_change', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			$aReceive['sub_id'] = $aReceive['id'];
			$aReceive['check'] = $aReceive['status'];
			unset($aReceive['id']);
			unset($aReceive['status']);
			$aSubject = $this->oSubject->update($aReceive);
			if (!$aSubject) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
        }
	}
}
