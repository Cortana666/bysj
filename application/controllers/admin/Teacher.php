<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_teacher', 'oTeacher');
    }

	public function lists()
	{

		$this->load->library('pagination');
		$config = $this->config->item('app_page');
		$config['base_url'] = '/admin/admin/lists';
		$config['total_rows'] = $this->oTeacher->count($this->input->get(null, true));
		$this->pagination->initialize($config);
		$page_link = $this->pagination->create_links();

		$aTeacher = $this->oTeacher->lists($this->input->get(null, true));

		$this->assign('aAdmin', $aTeacher);
		$this->assign('page_links', $page_link);
		$this->assign('total_rows', $config['total_rows']);

		$this->display('admin/teacher_lsits.html');
	}

	public function add()
	{
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('teacher_add', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			if ($this->oTeacher->get(array('username'=>$aReceive['username']))) {
				$this->error('用户名已存在');
			}
			if ($this->oTeacher->get(array('email'=>$aReceive['email']))) {
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
			
			$aTeacher = $this->oTeacher->add($aReceive);
			if (!$aTeacher) {
				$this->error('添加失败');
			}
			$this->success('添加成功');
		}

		$this->display('admin/teacher_add.html');
    }
    
    public function delete()
	{
		
		if ($this->input->get('act') == 'do') {
            
            if (!$id = $this->input->post('id', true)) {
                $this->error('参数错误');
			}

			$aTeacher = $this->oTeacher->delete(array('id'=>$id));
			if (!$aTeacher) {
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

        $aTeacher = $this->oTeacher->get(array('id'=>intval($iId)));
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);

			$aResult = $this->oForm->formValidation('teacher_update', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			if ($this->oTeacher->get(array('username'=>$aReceive['username'], 'where'=>'id != '.$aReceive['id']))) {
				$this->error('用户名已存在');
			}
			if ($this->oTeacher->get(array('email'=>$aReceive['email'], 'where'=>'id != '.$aReceive['id']))) {
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
                $aReceive['password'] = md5(md5($aReceive['password']).$aTeacher['salt']);
            }
            
			$aTeacher = $this->oTeacher->update($aReceive);
			if (!$aTeacher) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
        }

        $this->assign('aAdmin', $aTeacher);

		$this->display('admin/teacher_update.html');
	}

	public function change()
	{
		
		if ($this->input->get('act') == 'do') {
			$aReceive = $this->input->post(null, true);
			
			$aResult = $this->oForm->formValidation('status_change', $aReceive);
			if ($aResult['code'] != 1) {
				$this->error($aResult['message']);
			}

			$iType = $this->oTeacher->get(array('id'=>$aReceive['id'], 'select'=>'type'))['type'];
			if ($iType == -1) {
				if ($aReceive['status'] == 2) {
					if ($this->oTeacher->count(array('type'=>-1, 'status'=>1)) <= 1) {
						$this->error('学校管理最少要有一个账号开启');
					}
				}
			}

			$aTeacher = $this->oTeacher->update($aReceive);
			if (!$aTeacher) {
				$this->error('修改失败');
			}
			$this->success('修改成功');
        }
	}


	public function import()
	{
		if ($this->input->get('act') == 'template') {
			$this->load->library('PHPExcel');
			$oPhpExcel = new PHPExcel();
			$RowNum = array('A', 'B', 'C', 'D', 'E', 'F', 'G');
			foreach ($RowNum as $value) {
				$oPhpExcel->getActiveSheet()->getStyle($value)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
			}
			$oRow = $oPhpExcel->setActiveSheetIndex(0);
			$oRow->setCellValue("A1","导师编号");
			$oRow->setCellValue("B1","姓名");
			$oRow->setCellValue("C1","性别");
			$oRow->setCellValue("D1","年龄");
			$oRow->setCellValue("E1","学院");
			$oRow->setCellValue("F1","专业");
			$oRow->setCellValue("G1","邮箱");

			$oPhpExcel = PHPExcel_IOFactory::createWriter($oPhpExcel, 'Excel2007');
			$sExcelName  = '指导教师导入模板.xlsx';
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
			header("Content-Type:application/force-download");
			header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
			header("Content-Type:application/octet-stream");
			header("Content-Type:application/download");
			header("Content-Disposition:attachment;filename=".$sExcelName);
			header("Content-Transfer-Encoding:binary");
			$oPhpExcel->save('php://output');
			exit;
		}

		if ($this->input->get('act') == 'do') {
			if (empty($_FILES['file'])) {
                $this->smarty->error('请先选择一个文件');
            }

            $ext = explode('.', $_FILES['file']['name']);
            if (!in_array(end($ext), array('xls', 'xlsx'))) {
                $this->smarty->error('请使用xls或xlsx文件');
            }

            $this->load->library('PHPExcel');
            $PHPReader = new PHPExcel_Reader_Excel2007();
            if(!$PHPReader->canRead($_FILES['file']['tmp_name'])){
                $PHPReader = new PHPExcel_Reader_Excel5();
                if(!$PHPReader->canRead($_FILES['file']['tmp_name'])){
                    $this->smarty->error('文件不是真实的EXCEL文件，请另存为xls或xlsx文件');
                }
            }

            $PHPExcel = $PHPReader->load($_FILES['file']['tmp_name']);
            $sheet = $PHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumm = $sheet->getHighestColumn();
            $highestColumm++;

            if ($highestRow == 1) {
                $this->smarty->error('数据表为空');
            }

            for ($row = 2; $row <= $highestRow; $row++){
                for ($column = 'A'; $column != $highestColumm; $column++) {
					$columnRowValue = $sheet->getCell($column.$row)->getFormattedValue();
                    if ($column == 'A') {
                        if (!$columnRowValue) {
                            $this->smarty->error('导师编号不能为空');   
						}
                    } 
					$aData[($row - 2)][] = $columnRowValue;
                }
            }

			$success = 0;
			$error = 0;
			$errorinfo = '';
			$this->oTeacher->top();
			foreach ($aData as $key => $value) {
				$result = $this->oTeacher->update(array(
					'id'=>$value[0], 'written_score'=>$value[3], 'interview_score'=>$value[4], 'total_score'=>$value[5]));
				if ($result) {
					$success ++;
				}else{
					$error ++;
					$errorinfo .= $this->oEnrollInfo->date_error()."<br>";
				}
			}

            $this->oLogAct->add("导入成绩：成功{$success}条,失败{$error}条");
            $this->smarty->success("导入成绩完成，成功: $success  失败: $error  失败详情: $errorinfo", '/school/push/score/lists');
		}
		
		$this->display('admin/import.html');
	}
}
