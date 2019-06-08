<?php
/* Smarty version 3.1.33, created on 2019-06-08 11:50:19
  from 'D:\html\bysj\application\views\templates\teacher\paper_update.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfba0fb7173f2_36444085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf0cc3bd821620e885f723b2e15feeeea9cf3737' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\teacher\\paper_update.html',
      1 => 1559994615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfba0fb7173f2_36444085 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.1</title>
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
    <div class="x-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>审核结果</label>
                <div class="layui-input-inline">
                    <select name='status' lay-verify="required">
                        <option value="">请选择</option>
                        <option value="2" <?php if ($_GET['type'] == 2) {
if ($_smarty_tpl->tpl_vars['aPaper']->value['status'] == 2) {?>selected<?php }
} else {
if ($_smarty_tpl->tpl_vars['aPaper']->value['sec_status'] == 2) {?>selected<?php }
}?>>优</option>
                        <option value="3" <?php if ($_GET['type'] == 3) {
if ($_smarty_tpl->tpl_vars['aPaper']->value['status'] == 3) {?>selected<?php }
} else {
if ($_smarty_tpl->tpl_vars['aPaper']->value['sec_status'] == 3) {?>selected<?php }
}?>>良</option>
                        <option value="4" <?php if ($_GET['type'] == 4) {
if ($_smarty_tpl->tpl_vars['aPaper']->value['status'] == 4) {?>selected<?php }
} else {
if ($_smarty_tpl->tpl_vars['aPaper']->value['sec_status'] == 4) {?>selected<?php }
}?>>中</option>
                        <option value="5" <?php if ($_GET['type'] == 5) {
if ($_smarty_tpl->tpl_vars['aPaper']->value['status'] == 5) {?>selected<?php }
} else {
if ($_smarty_tpl->tpl_vars['aPaper']->value['sec_status'] == 5) {?>selected<?php }
}?>>及格</option>
                        <option value="6" <?php if ($_GET['type'] == 6) {
if ($_smarty_tpl->tpl_vars['aPaper']->value['status'] == 6) {?>selected<?php }
} else {
if ($_smarty_tpl->tpl_vars['aPaper']->value['sec_status'] == 6) {?>selected<?php }
}?>>不及格</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="remark" class="layui-form-label">
                    审核意见
                </label>
                <div class="layui-input-inline">
                    <input value="<?php if ($_GET['type'] == 1) {
echo $_smarty_tpl->tpl_vars['aPaper']->value['remark'];
} else {
echo $_smarty_tpl->tpl_vars['aPaper']->value['sec_remark'];
}?>" type="text" id="remark" name="remark" autocomplete="off" class="layui-input">
                </div>
                <span class="x-red">不必填</span>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    审核
                </button>
            </div>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['aPaper']->value['pap_id'];?>
">
            <input type="hidden" name="type" value="<?php echo $_GET['type'];?>
">
        </form>
    </div>
    <?php echo '<script'; ?>
>
        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form
                , layer = layui.layer;

            //监听提交
            form.on('submit(add)', function (data) {
                $.ajax({
                    url: '/teacher/paper/update?act=do',
                    data: data.field,
                    dataType: 'JSON',
                    type: 'POST',
                    success: function (data) {
                        if (data.code == 1) {
                            layer.alert("修改成功", { icon: 6 }, function () {
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.layer.close(index);
                                x_admin_father_reload();
                            });
                        } else {
                            layer.msg(data.message, { icon: 2, time: 3000 });
                        }
                    }
                });
                return false;
            });
        });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
