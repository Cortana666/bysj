<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		if ($this->input->get('user') == 'admin') {
			redirect(base_url().'admin/home/index');
		}
		redirect(base_url().'web/home/index');
	}
}
