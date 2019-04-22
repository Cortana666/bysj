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

        $this->load->model('Form', 'oForm');
        $this->load->model('Model_log', 'oLog');

    }
    public function assign($key, $val)
    {
        $this->ci_smarty->assign($key, $val);
    }
    public function display($html)
    {
        $this->ci_smarty->display($html);
    }
    public function success($message = '', $url = '', $data = array())
    {
        $result['code'] = 1;
        $result['message'] = $message;
        $result['url'] = $url;
        $result['data'] = $data;
        echo json_encode($result);exit;
    }
    public function error($message = '', $url = '', $data = array())
    {
        $result['code'] = 2;
        $result['message'] = $message;
        $result['url'] = $url;
        $result['data'] = $data;
        echo json_encode($result);exit;
    }
}