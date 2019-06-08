<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Translate extends MY_Controller {

	public function __construct()
    {
		parent::_constructStudent();
		$this->load->model('Model_translate', 'oTranslate');
    }

	public function lists()
	{
		$aTranslate = $this->oTranslate->get(array('stu_id'=>$this->session->student['id']));

		$this->assign('aTranslate', $aTranslate);

		$this->display('student/translate_lists.html');
	}

	public function add()
	{
		
		if ($this->input->get('act') == 'do') {

			$uploadUrl = '/uploads/'.date('Y').'/student/'.$this->session->student['code'].'/';
			$appPath = array_filter(explode('\\', APPPATH));
			unset($appPath[count($appPath)-1]);
			$appPath = implode('\\', $appPath);
			if (!is_dir($appPath.$uploadUrl)) {
				mkdir($appPath.$uploadUrl, 0777, true);
			}

			$config['upload_path']      = './uploads/'.date('Y').'/student/'.$this->session->student['code'].'/';
			$config['allowed_types']    = 'doc|docx';
			$config['max_size']     = 10240;
			$config['file_name']     = 'translate_'.time();
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')) {
				$this->error($this->upload->display_errors());
			}

			$aReceive['file_name'] = $_FILES['file']['name'];
			$aReceive['stu_id'] = $this->session->student['id'];
			$aReceive['file_url'] = $uploadUrl.$this->upload->data()['file_name'];

			$aTranslate = $this->oTranslate->add($aReceive);
			if (!$aTranslate) {
				$this->error('添加失败');
			}

			$this->oLog->add(array('content'=>'提交任务书['.$aTranslate.']'.$_FILES['file']['tmp_name']));

			$this->success('添加成功');
		}

		$this->display('student/translate_add.html');
    }
    
    public function update()
	{
		
		if ($this->input->get('act') == 'do') {
			$uploadUrl = '/uploads/'.date('Y').'/student/'.$this->session->student['code'].'/';
			$appPath = array_filter(explode('\\', APPPATH));
			unset($appPath[count($appPath)-1]);
			$appPath = implode('\\', $appPath);
			if (!is_dir($appPath.$uploadUrl)) {
				mkdir($appPath.$uploadUrl, 0777, true);
			}

			$config['upload_path']      = './uploads/'.date('Y').'/student/'.$this->session->student['code'].'/';
			$config['allowed_types']    = 'doc|docx';
			$config['max_size']     = 10240;
			$config['file_name']     = 'translate_'.time();
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')) {
				$this->error($this->upload->display_errors());
			}

			$aReceive['file_name'] = $_FILES['file']['name'];
			$aReceive['stu_id'] = $this->session->student['id'];
			$aReceive['file_url'] = $uploadUrl.$this->upload->data()['file_name'];
			$aReceive['status'] = 1;
            
			$aTranslate = $this->oTranslate->update($aReceive);
			if (!$aTranslate) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
		}

		$this->display('student/translate_update.html');
	}

	public function download()
	{
		if ($this->input->get('act') == 'do') {
			$aTranslate = $this->oTranslate->get(array('stu_id'=>$this->session->student['id']));
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
    
    public function template()
    {
        
		if ($this->input->get('act') == 'do') {
			
		}
    }
}
