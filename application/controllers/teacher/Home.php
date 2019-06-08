<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
    {
        parent::_constructTeacher();
    }

	public function index()
	{
		$this->display('teacher/index.html');
	}

	public function welcome()
	{
		$this->display('teacher/welcome.html');
	}
}
