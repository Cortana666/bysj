<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paper extends MY_Controller {

	public function __construct()
    {
		parent::_constructStudent();
		$this->load->model('Model_paper', 'oPaper');
    }

	public function lists()
	{
		$aPaper = $this->oPaper->get(array('stu_id'=>$this->session->student['id']));

		$this->assign('aPaper', $aPaper);

		$this->display('student/paper_lists.html');
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
			$config['file_name']     = 'paper_'.time();
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')) {
				$this->error($this->upload->display_errors());
			}

			$aReceive['file_name'] = $_FILES['file']['name'];
			$aReceive['stu_id'] = $this->session->student['id'];
			$aReceive['file_url'] = $uploadUrl.$this->upload->data()['file_name'];

			$aPaper = $this->oPaper->add($aReceive);
			if (!$aPaper) {
				$this->error('添加失败');
			}

			$this->oLog->add(array('content'=>'提交任务书['.$aPaper.']'.$_FILES['file']['tmp_name']));

			$this->success('添加成功');
		}

		$this->display('student/paper_add.html');
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
			$config['file_name']     = 'paper_'.time();
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')) {
				$this->error($this->upload->display_errors());
			}

			$aReceive['file_name'] = $_FILES['file']['name'];
			$aReceive['stu_id'] = $this->session->student['id'];
			$aReceive['file_url'] = $uploadUrl.$this->upload->data()['file_name'];
			$aReceive['status'] = 1;
            
			$aPaper = $this->oPaper->update($aReceive);
			if (!$aPaper) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
		}

		$this->display('student/paper_update.html');
	}

	public function download()
	{
		if ($this->input->get('act') == 'do') {
			$aPaper = $this->oPaper->get(array('stu_id'=>$this->session->student['id']));
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
    
    public function template()
    {
        
		if ($this->input->get('act') == 'do') {
			
		}
    }
}
