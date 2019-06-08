<?php
/* Smarty version 3.1.33, created on 2019-06-05 06:26:58
  from 'D:\html\bysj\application\views\templates\admin\student_add.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf760b23d73d4_45255684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '190cbc460df8a679c5c2aa90f7c7deae4737a17d' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\admin\\student_add.html',
      1 => 1559716007,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf760b23d73d4_45255684 (Smarty_Internal_Template $_smarty_tpl) {
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
                <label for="year" class="layui-form-label">
                    <span class="x-red">*</span>年级
                </label>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input" id="year" name="year" required="" autocomplete="off" lay-verify="required">
                </div>
            </div>
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
">[<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
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
                        <option value="">请选择学院</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="code" class="layui-form-label">
                    <span class="x-red">*</span>编号
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="code" name="code" required="" lay-verify="number"
                        autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="name" class="layui-form-label">
                    <span class="x-red">*</span>姓名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="name" name="name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                    <label for="card_id" class="layui-form-label">
                        <span class="x-red">*</span>身份证号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="card_id" name="card_id" required="" lay-verify="identity"
                            autocomplete="off" class="layui-input">
                    </div>
                </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>性别</label>
                <div class="layui-input-block">
                    <input lay-filter="type" type="radio" name="sex" value="1" lay-skin="primary" title="男"
                        checked="">
                    <input lay-filter="type" type="radio" name="sex" value="2" lay-skin="primary" title="女">
                </div>
            </div>
            <div class="layui-form-item">
                    <label for="age" class="layui-form-label">
                        <span class="x-red">*</span>年龄
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="age" name="age" required="" lay-verify="number"
                            autocomplete="off" class="layui-input">
                    </div>
                </div>
            <div class="layui-form-item">
                <label for="email" class="layui-form-label">
                    <span class="x-red">*</span>邮箱
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="email" name="email" required="" lay-verify="email" autocomplete="off"
                        class="layui-input">
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
                
            });

            //监听提交
            form.on('submit(add)', function (data) {
                $.ajax({
                    url: '/admin/student/add?act=do',
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

        layui.use('laydate', function(){
            var laydate = layui.laydate;
            
            laydate.render({
                elem: '#year'
                ,type: 'year'
            });
        });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
