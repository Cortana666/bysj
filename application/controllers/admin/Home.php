<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
    {
        parent::_constructAdmin();
    }

	public function index()
	{
		$this->display('admin/index.html');
	}

	public function welcome()
	{
		$this->display('admin/welcome.html');
	}
}
