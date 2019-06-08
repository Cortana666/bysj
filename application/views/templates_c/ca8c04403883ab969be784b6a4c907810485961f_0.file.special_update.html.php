<?php
/* Smarty version 3.1.33, created on 2019-06-03 10:09:47
  from 'D:\html\bysj\application\views\templates\admin\special_update.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf4f1ebd15f46_24512107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca8c04403883ab969be784b6a4c907810485961f' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\admin\\special_update.html',
      1 => 1559556520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf4f1ebd15f46_24512107 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.1</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="/public/static/admin/css/font.css">
    <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/admin/lib/layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/admin/js/xadmin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/static/admin/js/cookie.js"><?php echo '</script'; ?>
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
            <div class="layui-form-item" id="college_div">
                <label class="layui-form-label"><span class="x-red">*</span>学院</label>
                <div class="layui-input-inline">
                    <select name='col_id' lay-verify="required">
                        <option value="">请选择</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aCollege']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['col_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['col_id'] == $_smarty_tpl->tpl_vars['aSpecial']->value['col_id']) {?>selected<?php }?>>[<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
]<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="code" class="layui-form-label">
                    <span class="x-red">*</span>专业代码
                </label>
                <div class="layui-input-inline">
                    <input value="<?php echo $_smarty_tpl->tpl_vars['aSpecial']->value['code'];?>
" type="text" id="code" name="code" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="name" class="layui-form-label">
                    <span class="x-red">*</span>专业名称
                </label>
                <div class="layui-input-inline">
                    <input value="<?php echo $_smarty_tpl->tpl_vars['aSpecial']->value['name'];?>
" type="text" id="name" name="name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    修改
                </button>
            </div>
            <input type="hidden" name="spe_id" value="<?php echo $_smarty_tpl->tpl_vars['aSpecial']->value['spe_id'];?>
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
                    url: '/admin/special/update?act=do',
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
