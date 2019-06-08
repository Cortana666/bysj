<?php
    $config['admin_login'] = array(
        array('field'=>'username','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'用户名不能为空')),
        array('field'=>'password','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'密码不能为空')),
    );

    $config['admin_add'] = array(
        array('field'=>'username','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'用户名不能为空')),
        array('field'=>'realname','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'姓名不能为空')),
        array('field'=>'password','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'密码不能为空')),
        array('field'=>'repass','label'=>'','rules'=>'trim|required|matches[password]','errors'=>array('required'=>'重复密码不能为空','matches'=>'两次密码不同')),
        array('field'=>'email','label'=>'','rules'=>'trim|required|valid_email','errors'=>array('required'=>'邮箱不能为空','valid_email'=>'邮箱格式错误')),
        array('field'=>'type','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'角色未选择'))
    );

    $config['admin_update'] = array(
        array('field'=>'admin_id','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'参数错误')),
        array('field'=>'realname','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'姓名不能为空')),
        array('field'=>'password','label'=>'','rules'=>'trim'),
        array('field'=>'repass','label'=>'','rules'=>'trim|matches[password]','errors'=>array('matches'=>'重复密码错误')),
        array('field'=>'email','label'=>'','rules'=>'trim|required|valid_email','errors'=>array('required'=>'邮箱不能为空','valid_email'=>'邮箱格式错误')),
        array('field'=>'type','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'角色未选择'))
    );

    $config['status_change'] = array(
        array('field'=>'id','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'参数错误')),
        array('field'=>'status','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'状态参数错误'))
    );

    $config['college_add'] = array(
        array('field'=>'code','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'学院代码不能为空')),
        array('field'=>'name','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'学院名称不能为空')),
    );

    $config['special_add'] = array(
        array('field'=>'col_id','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'所属学院不能为空')),
        array('field'=>'code','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'专业代码不能为空')),
        array('field'=>'name','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'专业名称不能为空')),
    );

    $config['teacher_add'] = array(
        array('field'=>'col_id','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择学院')),
        array('field'=>'spe_id','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择专业')),
        array('field'=>'code','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'编号不能为空','integer'=>'编号格式错误')),
        array('field'=>'name','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'姓名不能为空')),
        array('field'=>'card_id','label'=>'','rules'=>'trim|required|regex_match[/^[0-9a-zA_Z]{18}$/]','errors'=>array('required'=>'身份证号不能为空','regex_match'=>'性别格式错误')),
        array('field'=>'sex','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择性别')),
        array('field'=>'age','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'年龄不能为空','integer'=>'年龄格式错误')),
        array('field'=>'email','label'=>'','rules'=>'trim|required|valid_email','errors'=>array('required'=>'邮箱不能为空','valid_email'=>'邮箱格式错误'))
    );

    $config['student_add'] = array(
        array('field'=>'year','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'选择年级')),
        array('field'=>'col_id','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择学院')),
        array('field'=>'spe_id','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择专业')),
        array('field'=>'code','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'编号不能为空','integer'=>'编号格式错误')),
        array('field'=>'name','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'姓名不能为空')),
        array('field'=>'card_id','label'=>'','rules'=>'trim|required|regex_match[/^[0-9a-zA_Z]{18}$/]','errors'=>array('required'=>'身份证号不能为空','regex_match'=>'性别格式错误')),
        array('field'=>'sex','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择性别')),
        array('field'=>'age','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'年龄不能为空','integer'=>'年龄格式错误')),
        array('field'=>'email','label'=>'','rules'=>'trim|required|valid_email','errors'=>array('required'=>'邮箱不能为空','valid_email'=>'邮箱格式错误'))
    );

    $config['user_login'] = array(
        array('field'=>'code','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'编号不能为空','integer'=>'编号为纯数字')),
        array('field'=>'password','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'密码不能为空')),
    );

    $config['subject_add'] = array(
        array('field'=>'title','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请输入题目')),
        array('field'=>'col_id','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'登录信息错误')),
        array('field'=>'spe_id','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'登录信息错误')),
        array('field'=>'value','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请选择性质')),
        array('field'=>'source','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请选择来源')),
        array('field'=>'need','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择的是否需要','integer'=>'是否需要格式错误')),
        array('field'=>'content','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请输入简介')),
        array('field'=>'technology','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请输入技术说明')),
        array('field'=>'type','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'登录信息错误')),
    );

    $config['subject_update'] = array(
        array('field'=>'title','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请输入题目')),
        array('field'=>'value','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请选择性质')),
        array('field'=>'source','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请选择来源')),
        array('field'=>'need','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择的是否需要','integer'=>'是否需要格式错误')),
        array('field'=>'content','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请输入简介')),
        array('field'=>'technology','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请输入技术说明'))
    );

    $config['subject_select'] = array(
        array('field'=>'sub_id','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择题目')),
        array('field'=>'stu_id','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'登录信息错误')),
        array('field'=>'value','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请选择性质')),
        array('field'=>'source','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请选择来源')),
        array('field'=>'need','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'请选择的是否需要','integer'=>'是否需要格式错误')),
        array('field'=>'technology','label'=>'','rules'=>'trim|required','errors'=>array('required'=>'请输入技术说明')),
        array('field'=>'type','label'=>'','rules'=>'trim|required|integer','errors'=>array('required'=>'登录信息错误')),
    );