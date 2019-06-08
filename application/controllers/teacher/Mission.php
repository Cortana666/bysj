<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mission extends MY_Controller {

	public function __construct()
    {
		parent::_constructStudent();
		$this->load->model('Model_mission', 'oMission');
		$this->load->model('Model_subject', 'oSubject');
		$this->load->model('Model_student', 'oStudent');
    }

	public function lists()
	{

		$aReceive['status'] = 2;
		$aReceive['tea_id'] = $this->session->teacher['id'];
		$aReceive['where'] = "stu_id != 0";
		$aReceive['check'] = 2;
		$aReceive['select'] = 'stu_id';
		$aSubject = $this->oSubject->top($aReceive);

		$aStudent = array();
		$aMission = array();
		if ($aSubject) {
			
			$aReceive = array();
			$aReceive['stu_id'] = array_column($aSubject, 'stu_id');

			$this->load->library('pagination');
			$config = $this->config->item('app_page');
			$config['base_url'] = '/teacher/mission/lists';
			$config['total_rows'] = $this->oStudent->count($aReceive);
			$this->pagination->initialize($config);
			$page_link = $this->pagination->create_links();

			$aStudent = $this->oStudent->lists($aReceive);

			$aMission = array_column($this->oMission->top(array('stu_id'=>array_column($aStudent, 'stu_id'))), null, 'stu_id');
		}

		$this->assign('aStudent', $aStudent);
		$this->assign('aMission', $aMission);

		$this->display('teacher/mission_lists.html');
	}

	public function download()
	{
		if ($this->input->get('act') == 'do') {

			if (!$iId = $this->input->get('mis_id', true)) {
				$this->error('参数错误');
			}

			$aMission = $this->oMission->get(array('mis_id'=>$iId));
			$appPath = array_filter(explode('\\', APPPATH));
			unset($appPath[count($appPath)-1]);
			$appPath = implode('\\', $appPath);
			$aMission['file_url'] = $appPath.$aMission['file_url'];
			$fileHandle = fopen ( $aMission['file_url'], "rb" );
			$fileSize   = filesize ( $aMission['file_url'] );
			Header ( "Content-type: application/octet-stream" );
			Header ( "Accept-Ranges: bytes" );
			Header ( "Accept-Length: " . $fileSize );
			Header ( "Content-Disposition: attachment; filename=" . $aMission['file_name'] );
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

        $aMission = $this->oMission->get(array('mis_id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('status_change', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			$aReceive['mis_id'] = $aReceive['id'];
			unset($aReceive['id']);

			$aMission = $this->oMission->update($aReceive);
			if (!$aMission) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
		}

		$this->assign('aMission', $aMission);

		$this->display('teacher/mission_update.html');
	}
}
