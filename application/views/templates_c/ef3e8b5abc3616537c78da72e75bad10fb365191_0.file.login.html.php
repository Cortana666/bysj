<?php
/* Smarty version 3.1.33, created on 2019-06-05 09:34:56
  from 'D:\html\bysj\application\views\templates\student\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf78cc03df0e1_27096079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef3e8b5abc3616537c78da72e75bad10fb365191' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\student\\login.html',
      1 => 1559727291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf78cc03df0e1_27096079 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>毕业设计管理系统后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/public/static/css/font.css">
	<link rel="stylesheet" href="/public/static/css/xadmin.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/static/lib/layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/js/xadmin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/js/cookie.js"><?php echo '</script'; ?>
>

</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">毕业设计管理管理学生登录</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" >
            <input id="code" name="code" placeholder="编号"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input id="password" name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <?php echo '<script'; ?>
>
        $(function  () {
            layui.use('form', function(){
              var form = layui.form;
                //监听提交
                form.on('submit(login)', function(data){
                    $.ajax({
                        url:'/student/user/login?act=do',
                        data: data.field,
                        dataType:'JSON',
                        type:'POST',
                        success:function(data){
                            if (data.code == 1) {
                                layer.msg('登录成功', function () {
                                    location.href = '/student/home/index';
                                });
                            }else{
                                layer.msg(data.message, function () {});
                            }
                        }
                    });
                    return false;
                });
            });
        })
    <?php echo '</script'; ?>
>
    <!-- 底部结束 -->
</body>
</html><?php }
}
