<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paper extends MY_Controller {

	public function __construct()
    {
		parent::_constructStudent();
		$this->load->model('Model_paper', 'oPaper');
		$this->load->model('Model_subject', 'oSubject');
		$this->load->model('Model_student', 'oStudent');
    }

	public function listsSelf()
	{

		$aReceive['status'] = 2;
		$aReceive['tea_id'] = $this->session->teacher['id'];
		$aReceive['where'] = "stu_id != 0";
		$aReceive['check'] = 2;
		$aReceive['select'] = 'stu_id';
		$aSubject = $this->oSubject->top($aReceive);

		$aStudent = array();
		$aPaper = array();
		if ($aSubject) {
			
			$aReceive = array();
			$aReceive['stu_id'] = array_column($aSubject, 'stu_id');

			$this->load->library('pagination');
			$config = $this->config->item('app_page');
			$config['base_url'] = '/teacher/paper/listsself';
			$config['total_rows'] = $this->oStudent->count($aReceive);
			$this->pagination->initialize($config);
			$page_link = $this->pagination->create_links();

			$aStudent = $this->oStudent->lists($aReceive);

			$aPaper = array_column($this->oPaper->top(array('stu_id'=>array_column($aStudent, 'stu_id'))), null, 'stu_id');
		}

		$this->assign('aStudent', $aStudent);
		$this->assign('aPaper', $aPaper);

		$this->display('teacher/paper_listsself.html');
	}

	public function listsSecond()
	{

		$aReceive['sec_tea_id'] = $this->session->teacher['id'];
		$aPaper = $this->oPaper->top($aReceive);

		$aStudent = array();
		if ($aPaper) {
			
			$aReceive = array();
			$aReceive['stu_id'] = array_column($aPaper, 'stu_id');

			$this->load->library('pagination');
			$config = $this->config->item('app_page');
			$config['base_url'] = '/teacher/paper/listssecond';
			$config['total_rows'] = $this->oStudent->count($aReceive);
			$this->pagination->initialize($config);
			$page_link = $this->pagination->create_links();

			$aStudent = $this->oStudent->lists($aReceive);

			$aPaper = array_column($aPaper, null, 'stu_id');
		}

		$this->assign('aStudent', $aStudent);
		$this->assign('aPaper', $aPaper);

		$this->display('teacher/paper_listssecond.html');
	}

	public function download()
	{
		if ($this->input->get('act') == 'do') {

			if (!$iId = $this->input->get('pap_id', true)) {
				$this->error('参数错误');
			}

			$aPaper = $this->oPaper->get(array('pap_id'=>$iId));
			$appPath = array_filter(explode('\\', APPPATH));
			unset($appPath[count($appPath)-1]);
			$appPath = implode('\\', $appPath);
			$aPaper['file_url'] = $appPath.$aPaper['file_url'];
			$fileHandle = fopen ( $aPaper['file_url'], "rb" );
			$fileSize   = filesize ( $aPaper['file_url'] );
			Header ( "Content-type: application/octet-stream" );
			Header ( "Accept-Ranges: bytes" );
			Header ( "Accept-Length: " . $fileSize );
			Header ( "Content-Disposition: attachment; filename=" . $aPaper['file_name'] );
			echo fread ( $fileHandle, $fileSize );
			fclose ( $fileHandle );
			exit;
		}

		$this->display('error.html');
    }
    
    public function update()
	{
		if (!$iId = $this->input->get_post('id', true)) {
            $this->display('error.html');
		}
		if (!$sType = $this->input->get_post('type', true)) {
            $this->display('error.html');
        }

        $aPaper = $this->oPaper->get(array('pap_id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('status_change', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			if ($sType == 1) {
				$aReceive['pap_id'] = $aReceive['id'];
			}else{
				$aReceive['pap_id'] = $aReceive['id'];
				$aReceive['sec_status'] = $aReceive['status'];
				$aReceive['sec_remark'] = $aReceive['remark'];
				unset($aReceive['status']);
				unset($aReceive['remark']);
			}
			unset($aReceive['id']);
			unset($aReceive['type']);

			$aPaper = $this->oPaper->update($aReceive);
			if (!$aPaper) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
		}

		$this->assign('aPaper', $aPaper);

		$this->display('teacher/paper_update.html');
	}
}
