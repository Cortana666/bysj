<?php
/* Smarty version 3.1.33, created on 2019-06-05 07:05:13
  from 'D:\html\bysj\application\views\templates\admin\admin_add.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf769a93f5d61_48946620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa4cbc96a496160a0752414bafaee64590dc91b1' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\admin\\admin_add.html',
      1 => 1559718304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf769a93f5d61_48946620 (Smarty_Internal_Template $_smarty_tpl) {
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
            <div class="layui-form-item">
                <label for="username" class="layui-form-label">
                    <span class="x-red">*</span>用户名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="username" name="username" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="realname" class="layui-form-label">
                    <span class="x-red">*</span>姓名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="realname" name="realname" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>邮箱
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_email" name="email" required="" lay-verify="email" autocomplete="off"
                        class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>角色</label>
                <div class="layui-input-block">
                    <input lay-filter="type" type="radio" name="type" value="1" lay-skin="primary" title="学校" <?php if ($_SESSION['user']['type'] != 1) {?>disabled<?php }?>>
                    <input lay-filter="type" type="radio" name="type" value="2" lay-skin="primary" title="学院">
                    <input lay-filter="type" type="radio" name="type" value="3" lay-skin="primary" title="专业" checked>
                </div>
            </div>
            <div class="layui-form-item" id="college_div" <?php if ($_SESSION['user']['type'] == 1) {?>style="display: none;"<?php }?>>
                <label class="layui-form-label"><span class="x-red">*</span>学院</label>
                <div class="layui-input-inline">
                    <select lay-filter="college" name='college_id'>
                        <option value="">请选择</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aCollege']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <?php if ($_SESSION['user']['type'] == 1 || ($_SESSION['user']['type'] == 2 && $_smarty_tpl->tpl_vars['item']->value['col_id'] == $_SESSION['user']['type_id'])) {?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['col_id'];?>
">[<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
]<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item" id="special_div" <?php if ($_SESSION['user']['type'] == 1) {?>style="display: none;"<?php }?>>
                <label class="layui-form-label"><span class="x-red">*</span>专业</label>
                <div class="layui-input-inline">
                    <select lay-filter="special" name='special_id'>
                        <option value="">请选择学院</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_pass" name="password" required="" lay-verify="pass" autocomplete="off"
                        class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    6到16个字符
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                    <span class="x-red">*</span>确认密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_repass" name="repass" required="" lay-verify="repass"
                        autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    增加
                </button>
            </div>
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
                , pass: [/(.+){6,12}$/, '密码必须6到12位']
                , repass: function (value) {
                    if ($('#L_pass').val() != $('#L_repass').val()) {
                        return '两次密码不一致';
                    }
                }
            });

            //监听提交
            form.on('submit(add)', function (data) {
                $.ajax({
                    url: '/admin/admin/add?act=do',
                    data: data.field,
                    dataType: 'JSON',
                    type: 'POST',
                    success: function (data) {
                        if (data.code == 1) {
                            layer.alert("增加成功", { icon: 6 }, function () {
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

            form.on('radio(type)', function (data) {
                if (data.value == 2) {
                    $('#college_div').show();
                    $('#college_div select').attr('lay-verify', 'required');
                    $('#special_div').hide();
                    $('#special_div select').removeAttr("lay-verify");
                } else if (data.value == 3) {
                    $('#college_div').show();
                    $('#special_div').show();
                    $('#college_div select').attr('lay-verify', 'required');
                    $('#special_div select').attr('lay-verify', 'required');
                } else {
                    $('#college_div').hide();
                    $('#college_div select').removeAttr("lay-verify");
                    $('#special_div').hide();
                    $('#special_div select').removeAttr("lay-verify");
                }
                form.render();
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