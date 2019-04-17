<?php
    $config['admin_login'] = array(
        array(
            'field' => 'username',
            'label' => 'username',
            'rules' => 'trim|required',
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

    $config['admin_add'] = array(
        array(
            'field' => 'username',
            'label' => 'username',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '用户名不能为空',
            )
        ),
        array(
            'field' => 'realname',
            'label' => 'realname',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '姓名不能为空',
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
        array(
            'field' => 'repass',
            'label' => 'repass',
            'rules' => 'trim|required|matches[password]',
            'errors' => array(
                'required' => '重复密码不能为空',
                'matches' => '两次密码不同'
            )
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'trim|required|valid_email',
            'errors' => array(
                'required' => '邮箱不能为空',
                'valid_email' => '邮箱格式错误'
            )
        ),
        array(
            'field' => 'type',
            'label' => 'type',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '角色未选择'
            )
        )
    );

    $config['admin_update'] = array(
        array(
            'field' => 'id',
            'label' => 'id',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '参数错误'
            )
        ),
        array(
            'field' => 'realname',
            'label' => 'realname',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '姓名不能为空',
            )
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'trim'
        ),
        array(
            'field' => 'repass',
            'label' => 'repass',
            'rules' => 'trim|matches[password]',
            'errors' => array(
                'matches' => '重复密码错误'
            )
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'trim|required|valid_email',
            'errors' => array(
                'required' => '邮箱不能为空',
                'valid_email' => '邮箱格式错误'
            )
        ),
        array(
            'field' => 'type',
            'label' => 'type',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '角色未选择'
            )
        )
    );

    $config['status_change'] = array(
        array(
            'field' => 'id',
            'label' => 'id',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '参数错误'
            )
        ),
        array(
            'field' => 'status',
            'label' => 'status',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '状态参数错误'
            )
        )
    );