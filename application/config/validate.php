<?php
    $config['admin_login'] = array(
        array(
            'field' => 'username',
            'label' => 'username',
            'rules' => 'trim|required|alpha_numeric',
            'errors' => array(
                'required' => '用户名不能为空',
            )
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '密码不能为空',
            )
        ),
    );