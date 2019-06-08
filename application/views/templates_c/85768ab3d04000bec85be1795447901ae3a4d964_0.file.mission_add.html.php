<?php
/* Smarty version 3.1.33, created on 2019-06-06 03:11:24
  from 'D:\html\bysj\application\views\templates\student\mission_add.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf8845c5de264_96728127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85768ab3d04000bec85be1795447901ae3a4d964' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\student\\mission_add.html',
      1 => 1559790673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf8845c5de264_96728127 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html class="x-admin-sm">
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.1</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="/public/static/css/font.css">
    <link rel="stylesheet" href="/public/static/css/xadmin.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/lib/layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/js/xadmin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/js/cookie.js"><?php echo '</script'; ?>
>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">材料提交管理</a>
        <a href="/admin/teacher/lists">任务书管理</a>
        <a>
          <cite>提交</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12  layui-form-pane">
          <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
            <legend></legend>
          </fieldset>
          
          <div class="layui-upload">
            <button type="button" class="layui-btn" id="template">下载模板</button>
            <button type="button" class="layui-btn layui-btn-normal" id="choose">选择文件</button>
            <button type="button" class="layui-btn" id="submit">开始上传</button>
          </div>
          <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
            <legend></legend>
          </fieldset>
        </form>
      </div>
      <blockquote class="layui-elem-quote"></blockquote>
      <pre class="layui-code" lay-title="JavaScript" lay-skin="notepad">
          
      </pre>
    </div>
    <?php echo '<script'; ?>
>
      layui.use('upload', function () {
          var $ = layui.jquery
            , upload = layui.upload;
          upload.render({
              elem: '#choose'
              , url: '/student/mission/add?act=do'
              , auto: false
              , exts: 'doc|docx'
              , size: 10240 //限制文件大小，单位 KB
              //,multiple: true
              , bindAction: '#submit'
              , done: function (res) {
                // console.log(res)
                if (res.code == 1) {
                  $('.layui-elem-quote').html('上传成功');
                  $('.layui-code').html('');
                }else{
                  $('.layui-elem-quote').html('上传失败');
                  $('.layui-code').html(res.message);
                }
              }
            });
        });

        $('#template').click(function(){
          location.href='/student/mission/add?act=template';
        });
    <?php echo '</script'; ?>
>
  </body>

</html><?php }
}
