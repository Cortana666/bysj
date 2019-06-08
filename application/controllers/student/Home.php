<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
    {
        parent::_constructStudent();
    }

	public function index()
	{
		$this->display('student/index.html');
	}

	public function welcome()
	{
		$this->display('student/welcome.html');
	}
}
