<?php
/* Smarty version 3.1.33, created on 2019-06-05 03:44:28
  from 'D:\html\bysj\application\views\templates\admin\teacher_update.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf73a9c6bbe31_94263905',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3823a5d3f96cfc1f7b1990701f8efbbf59a9ab46' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\admin\\teacher_update.html',
      1 => 1559706262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf73a9c6bbe31_94263905 (Smarty_Internal_Template $_smarty_tpl) {
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
                            <select lay-filter="college" name='col_id' lay-verify="required">
                                <option value="">请选择</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aCollege']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['col_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['col_id'] == $_smarty_tpl->tpl_vars['aTeacher']->value['col_id']) {?>selected<?php }?>>[<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
]<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item" id="special_div">
                        <label class="layui-form-label"><span class="x-red">*</span>专业</label>
                        <div class="layui-input-inline">
                            <select lay-filter="special" name='spe_id' lay-verify="required">
                                <option value="">请选择</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aSpecial']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['spe_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['spe_id'] == $_smarty_tpl->tpl_vars['aTeacher']->value['spe_id']) {?>selected<?php }?>>[<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
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
                            <span class="x-red">*</span>编号
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="code" name="code" required="" lay-verify="number"
                                autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['aTeacher']->value['code'];?>
">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="name" class="layui-form-label">
                            <span class="x-red">*</span>姓名
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="name" name="name" required="" lay-verify="required"
                                autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['aTeacher']->value['name'];?>
">
                        </div>
                    </div>
                    <div class="layui-form-item">
                            <label for="card_id" class="layui-form-label">
                                <span class="x-red">*</span>身份证号
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="card_id" name="card_id" required="" lay-verify="identity"
                                    autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['aTeacher']->value['card_id'];?>
">
                            </div>
                        </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><span class="x-red">*</span>性别</label>
                        <div class="layui-input-block">
                            <input lay-filter="type" type="radio" name="sex" value="1" lay-skin="primary" title="男"
                            <?php if (1 == $_smarty_tpl->tpl_vars['aTeacher']->value['sex']) {?>checked<?php }?>>
                            <input lay-filter="type" type="radio" name="sex" value="2" lay-skin="primary" title="女" <?php if (2 == $_smarty_tpl->tpl_vars['aTeacher']->value['sex']) {?>checked<?php }?>>
                        </div>
                    </div>
                    <div class="layui-form-item">
                            <label for="age" class="layui-form-label">
                                <span class="x-red">*</span>年龄
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="age" name="age" required="" lay-verify="number"
                                    autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['aTeacher']->value['age'];?>
">
                            </div>
                        </div>
                    <div class="layui-form-item">
                        <label for="email" class="layui-form-label">
                            <span class="x-red">*</span>邮箱
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="email" name="email" required="" lay-verify="email" autocomplete="off"
                                class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['aTeacher']->value['email'];?>
">
                        </div>
                    </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    修改
                </button>
            </div>
            <input type="hidden" name="tea_id" value="<?php echo $_smarty_tpl->tpl_vars['aTeacher']->value['tea_id'];?>
">
        </form>
    </div>
    <?php echo '<script'; ?>
>
        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form
                , layer = layui.layer;

            //自定义验证规则
            form.verify({
                nikename: function (value) {
                    if (value.length < 5) {
                        return '昵称至少得5个字符啊';
                    }
                }
                , pass: [/(.+){6,12}$|^$/, '密码必须6到12位']
                , repass: function (value) {
                    if ($('#L_pass').val() != $('#L_repass').val()) {
                        return '两次密码不一致';
                    }
                }
            });

            //监听提交
            form.on('submit(add)', function (data) {
                $.ajax({
                    url: '/admin/teacher/update?act=do',
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

            form.on('select(college)', function (data) {
                if (data.value == '') {
                    $('#special_div select').html('<option value="">请选择学院</option>');
                    form.render();
                } else {
                    $.ajax({
                        url: '/admin/special/get?act=do',
                        data: {'col_id':data.value},
                        dataType: 'JSON',
                        type: 'POST',
                        success: function (data) {
                            if (data.code == 1) {
                                var html = '<option value="">请选择</option>';
                                $.each(data.data, function(key,value){
                                    html += '<option value="'+value['spe_id']+'">[' + value['code'] +']' + value['name'] +'</option>';
                                })
                                $('#special_div select').html(html);
                                form.render();
                            } else {
                                layer.msg(data.message, { icon: 2, time: 3000 });
                            }
                        }
                    });
                }
            });
        });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
