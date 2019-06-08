<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends MY_Controller {

	public function __construct()
    {
		parent::_constructStudent();
		$this->load->model('Model_subject', 'oSubject');
    }

	public function lists()
	{
		$aSubject = $this->oSubject->get(array('stu_id'=>$this->session->student['id']));

		$this->assign('aSubject', $aSubject);

		$this->display('student/subject_lists.html');
	}

	public function add()
	{
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			if ($aReceive['type'] == 1) {

				$aReceive['stu_id'] = $this->session->student['id'];

				$aResult = $this->oForm->formValidation('subject_select', $aReceive);
				if ($aResult['code'] != 1) {
					$this->error($aResult['message']);
				}

				$aSubject = $this->oSubject->update($aReceive);
				if (!$aSubject) {
					$this->error('添加失败');
				}

				$this->oLog->add(array('content'=>'选择课程题目['.$aSubject.']'));
			}else{
				$aReceive['stu_id'] = $this->session->student['id'];
				$aReceive['col_id'] = $this->session->student['col_id'];
				$aReceive['spe_id'] = $this->session->student['spe_id'];

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
			}

			$this->success('提交成功');
		}

		if ($this->input->get('type') == 2) {
			$this->display('student/subject_add.html');
		}else{

			$aSubject = $this->oSubject->top(array('spe_id'=>$this->session->student['spe_id'], 'type'=>1, 'where'=>'stu_id = 0'));

			$this->assign('aSubject', $aSubject);

			$this->display('student/subject_select.html');
		}
		
    }
    
    public function update()
	{

        if (!$iId = $this->input->get_post('sub_id', true)) {
            $this->display('error.html');
        }

        $aSubject = $this->oSubject->get(array('sub_id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);
			$aReceive['stu_id'] = $this->session->student['id'];
			$aReceive['col_id'] = $this->session->student['col_id'];
			$aReceive['spe_id'] = $this->session->student['spe_id'];
			$aReceive['type'] = 2;

			$aResult = $this->oForm->formValidation('subject_add', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}
            
			$aSubject = $this->oSubject->update($aReceive);
			if (!$aSubject) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
		}

        $this->assign('aSubject', $aSubject);

		$this->display('student/subject_update.html');
	}
}
