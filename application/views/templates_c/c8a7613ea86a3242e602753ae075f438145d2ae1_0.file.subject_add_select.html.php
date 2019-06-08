<?php
/* Smarty version 3.1.33, created on 2019-06-06 05:03:16
  from 'D:\html\bysj\application\views\templates\student\subject_add_select.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf89e94afe213_00091132',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8a7613ea86a3242e602753ae075f438145d2ae1' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\student\\subject_add_select.html',
      1 => 1559797388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf89e94afe213_00091132 (Smarty_Internal_Template $_smarty_tpl) {
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
            <div class="layui-form-item" id="college_div">
                <label class="layui-form-label"><span class="x-red">*</span>题目</label>
                <div class="layui-input-inline">
                    <select lay-filter="college" name='value' lay-verify="required">
                        <option value="">请选择</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aSubject']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sub_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item" id="college_div">
                <label class="layui-form-label"><span class="x-red">*</span>性质</label>
                <div class="layui-input-inline">
                    <select lay-filter="college" name='value' lay-verify="required">
                        <option value="">请选择</option>
                        <option value="1">软件</option>
                        <option value="2">软硬件</option>
                        <option value="3">综合</option>
                        <option value="4">虚拟</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item" id="college_div">
                <label class="layui-form-label"><span class="x-red">*</span>来源</label>
                <div class="layui-input-inline">
                    <select lay-filter="college" name='source' lay-verify="required">
                        <option value="">请选择</option>
                        <option value="1">自选</option>
                        <option value="2">项目</option>
                        <option value="3">科研</option>
                        <option value="4">其他</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>是否需要</label>
                <div class="layui-input-block">
                    <input lay-filter="type" type="radio" name="need" value="1" lay-skin="primary" title="调查"
                        checked="">
                    <input lay-filter="type" type="radio" name="need" value="2" lay-skin="primary" title="实验">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="content" class="layui-form-label">
                    <span class="x-red">*</span>简介
                </label>
                <div class="layui-input-inline">
                    <textarea readonly name="content" placeholder="请输入内容" required="" class="layui-textarea" lay-verify="required" autocomplete="off"></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="technology" class="layui-form-label">
                    <span class="x-red">*</span>技术说明
                </label>
                <div class="layui-input-inline">
                    <textarea name="technology" placeholder="请输入内容" required="" class="layui-textarea" lay-verify="required" autocomplete="off"></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    增加
                </button>
            </div>
            <input type="hidden" name="type" value="1">
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
                    url: '/student/subject/add?act=do',
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
        });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
