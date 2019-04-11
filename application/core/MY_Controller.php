<?php
class MY_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $aUrl = explode('index.php', current_url());
        if (!isset($this->session->user) || !$this->session->user['username']) {
            if ($aUrl[1] != '/admin/user/login') {
                header("Location: /admin/user/login");
            }
        }

    }
    public function assign($key, $val)
    {
        $this->ci_smarty->assign($key, $val);
    }
    public function display($html)
    {
        $this->ci_smarty->display($html);
    }
}