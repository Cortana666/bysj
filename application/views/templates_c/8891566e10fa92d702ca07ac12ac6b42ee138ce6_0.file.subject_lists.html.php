<?php
/* Smarty version 3.1.33, created on 2019-06-08 08:13:10
  from 'D:\html\bysj\application\views\templates\student\subject_lists.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfb6e1677d2b6_53721731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8891566e10fa92d702ca07ac12ac6b42ee138ce6' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\student\\subject_lists.html',
      1 => 1559981583,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfb6e1677d2b6_53721731 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>学院管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
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
            <a href="">课题申报管理</a>
            <a href="">课题申报管理</a>
            <a>
                <cite>列表</cite></a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
            href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
    </div>
    <div class="x-body">
        <div class="layui-row">
        </div>
            <?php if (empty($_smarty_tpl->tpl_vars['aSubject']->value)) {?>
        <xblock>
            <button class="layui-btn" onclick="x_admin_show('选择课题','/student/subject/add?type=1')"><i
                    class="layui-icon"></i>选择教师课题</button>
            <span class="x-right" style="line-height:40px"></span>
            <button class="layui-btn" onclick="x_admin_show('提交课题','/student/subject/add?type=2')"><i
                    class="layui-icon"></i>提交自命课题</button>
            <span class="x-right" style="line-height:40px"></span>
        </xblock>
            <?php }?> 
        <table class="layui-table x-admin">
            <thead>
                <tr>
                    <th>题目</th>
                    <th>性质</th>
                    <th>来源</th>
                    <th>是否需要</th>
                    <th>简介</th>
                    <th>技术说明</th>
                    <th>审核状态</th>
                    <?php if ($_smarty_tpl->tpl_vars['aSubject']->value['status'] != 3) {?>
                    <th>操作</th>
                    <?php }?>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['aSubject']->value)) {?>
                    <tr>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['aSubject']->value['title'];?>

                        </td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['aSubject']->value['value'] == 1) {?>软件
                            <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['value'] == 2) {?>软硬件
                            <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['value'] == 3) {?>综合
                            <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['value'] == 4) {?>虚拟
                            <?php }?>
                        </td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['aSubject']->value['source'] == 1) {?>自选
                            <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['source'] == 2) {?>项目
                            <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['source'] == 3) {?>科研
                            <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['source'] == 4) {?>其他
                            <?php }?>
                        </td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['aSubject']->value['need'] == 1) {?>调查
                            <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['need'] == 2) {?>实验
                            <?php }?>
                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['aSubject']->value['content'];?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['aSubject']->value['technology'];?>

                        </td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['aSubject']->value['type'] == 2) {?>
                                <?php if ($_smarty_tpl->tpl_vars['aSubject']->value['status'] == 1) {?>待审核
                                <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['status'] == 2) {?>审核已通过
                                <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['status'] == 3) {?>审核未通过，请修改后重新提交
                                <?php }?>
                            <?php } else { ?>
                                <?php if ($_smarty_tpl->tpl_vars['aSubject']->value['check'] == 1) {?>待审核
                                <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['check'] == 2) {?>审核已通过
                                <?php } elseif ($_smarty_tpl->tpl_vars['aSubject']->value['check'] == 3) {?>审核未通过，请重新选择课题
                                <?php }?>
                            <?php }?>
                        </td>
                        <?php if ($_smarty_tpl->tpl_vars['aSubject']->value['status'] != 3) {?>
                        <td class="td-manage">
                            <a title="编辑" onclick="x_admin_show('编辑','/student/subject/update?sub_id=<?php echo $_smarty_tpl->tpl_vars['aSubject']->value['sub_id'];?>
')" href="javascript:;">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                        </td>
                        <?php }?>
                    </tr>
                    <?php } else { ?>
                        <tr>
                            <td colspan="20" style="text-align: center;">
                                暂无数据
                            </td>
                        </tr>
                        <?php }?> </tbody> </table> <div class="page">
                            <div>
                            </div>
    </div>

    </div>
</body>

</html><?php }
}
