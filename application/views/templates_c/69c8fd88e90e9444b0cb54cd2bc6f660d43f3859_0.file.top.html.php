<?php
/* Smarty version 3.1.33, created on 2019-04-11 19:19:52
  from 'C:\Users\nginx-1.14.2\html\bysj\application\views\templates\admin\top.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5caf22d8840dc6_39622736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69c8fd88e90e9444b0cb54cd2bc6f660d43f3859' => 
    array (
      0 => 'C:\\Users\\nginx-1.14.2\\html\\bysj\\application\\views\\templates\\admin\\top.html',
      1 => 1554978429,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5caf22d8840dc6_39622736 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 顶部开始 -->
<div class="container">
    <div class="logo"><a href="/admin/home/index">毕业设计管理系统 v1</a></div>
    <div class="left_open">
        <i title="展开左侧栏" class="iconfont">&#xe699;</i>
    </div>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;"><?php echo (($tmp = @(($tmp = @$_SESSION['user']['realname'])===null||$tmp==='' ? $_SESSION['user']['username'] : $tmp))===null||$tmp==='' ? '(未知)' : $tmp);?>
</a>
            <dl class="layui-nav-child">
                <!-- 二级菜单 -->
                <!-- <dd><a onclick="x_admin_show('个人信息','/admin/user/index')">个人信息</a></dd>
                <dd><a onclick="x_admin_show('切换帐号','/admin/user/change')">切换帐号</a></dd> -->
                <dd><a href="/admin/user/logout">退出</a></dd>
            </dl>
        </li>
        <!-- <li class="layui-nav-item to-index"><a href="/teacher/user/index">导师前台</a></li> -->
        <li class="layui-nav-item to-index"><a href="/student/user/index">学生前台</a></li>
    </ul>

</div>
<!-- 顶部结束 --><?php }
}
