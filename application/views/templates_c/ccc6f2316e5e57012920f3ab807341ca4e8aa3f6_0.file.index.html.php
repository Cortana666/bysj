<?php
/* Smarty version 3.1.33, created on 2019-04-10 07:53:17
  from 'C:\Users\nginx-1.14.2\html\bysj\application\views\templates\admin\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cada0ed91ba58_18458816',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccc6f2316e5e57012920f3ab807341ca4e8aa3f6' => 
    array (
      0 => 'C:\\Users\\nginx-1.14.2\\html\\bysj\\application\\views\\templates\\admin\\index.html',
      1 => 1554882768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/menu.html' => 1,
  ),
),false)) {
function content_5cada0ed91ba58_18458816 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>毕业设计管理系统</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
	<link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript"src="https://cdn.bootcss.com/blueimp-md5/2.10.0/js/md5.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/static/admin/lib/layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/admin/js/xadmin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/admin/js/cookie.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        // 是否开启刷新记忆tab功能
        // var is_remember = false;
    <?php echo '</script'; ?>
>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender('file:admin/top.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- 中部开始 -->
    <?php $_smarty_tpl->_subTemplateRender('file:admin/menu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>欢迎页</li>
          </ul>
          <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                <dl>
                    <dd data-type="this">关闭当前</dd>
                    <dd data-type="other">关闭其它</dd>
                    <dd data-type="all">关闭全部</dd>
                </dl>
          </div>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='/admin/home/welcome' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
          <div id="tab_show"></div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">Copyright ©2019 毕业设计管理系统 v1 All Rights Reserved</div>  
    </div>
    <!-- 底部结束 -->
</body>
</html><?php }
}
