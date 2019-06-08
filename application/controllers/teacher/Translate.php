<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Translate extends MY_Controller {

	public function __construct()
    {
		parent::_constructStudent();
		$this->load->model('Model_translate', 'oTranslate');
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
		$aTranslate = array();
		if ($aSubject) {
			
			$aReceive = array();
			$aReceive['stu_id'] = array_column($aSubject, 'stu_id');

			$this->load->library('pagination');
			$config = $this->config->item('app_page');
			$config['base_url'] = '/teacher/translate/lists';
			$config['total_rows'] = $this->oStudent->count($aReceive);
			$this->pagination->initialize($config);
			$page_link = $this->pagination->create_links();

			$aStudent = $this->oStudent->lists($aReceive);

			$aTranslate = array_column($this->oTranslate->top(array('stu_id'=>array_column($aStudent, 'stu_id'))), null, 'stu_id');
		}

		$this->assign('aStudent', $aStudent);
		$this->assign('aTranslate', $aTranslate);

		$this->display('teacher/translate_lists.html');
	}

	public function download()
	{
		if ($this->input->get('act') == 'do') {

			if (!$iId = $this->input->get('tra_id', true)) {
				$this->error('参数错误');
			}

			$aTranslate = $this->oTranslate->get(array('tra_id'=>$iId));
			$appPath = array_filter(explode('\\', APPPATH));
			unset($appPath[count($appPath)-1]);
			$appPath = implode('\\', $appPath);
			$aTranslate['file_url'] = $appPath.$aTranslate['file_url'];
			$fileHandle = fopen ( $aTranslate['file_url'], "rb" );
			$fileSize   = filesize ( $aTranslate['file_url'] );
			Header ( "Content-type: application/octet-stream" );
			Header ( "Accept-Ranges: bytes" );
			Header ( "Accept-Length: " . $fileSize );
			Header ( "Content-Disposition: attachment; filename=" . $aTranslate['file_name'] );
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

        $aTranslate = $this->oTranslate->get(array('tra_id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('status_change', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			$aReceive['tra_id'] = $aReceive['id'];
			unset($aReceive['id']);

			$aTranslate = $this->oTranslate->update($aReceive);
			if (!$aTranslate) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
		}

		$this->assign('aTranslate', $aTranslate);

		$this->display('teacher/translate_update.html');
	}
}
