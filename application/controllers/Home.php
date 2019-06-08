<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
    {
        
    }

	public function index()
	{
		header("Location: /student/home/index");
	}
}
