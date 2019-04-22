<?php
/* Smarty version 3.1.33, created on 2019-04-18 14:42:34
  from 'C:\Users\nginx-1.14.2\html\bysj\application\views\templates\admin\teacher_lsits.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb81c5ad72957_68034592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '150ff6250fe33c957ac54867ba38281c1cc93bc2' => 
    array (
      0 => 'C:\\Users\\nginx-1.14.2\\html\\bysj\\application\\views\\templates\\admin\\teacher_lsits.html',
      1 => 1555569749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb81c5ad72957_68034592 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a href="">系统管理</a>
            <a href="">管理员用户管理</a>
            <a>
                <cite>列表</cite></a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
            href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so">
                <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input"
                    value="<?php echo (($tmp = @$_GET['username'])===null||$tmp==='' ? '' : $tmp);?>
">
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="importExcel()"><i class="layui-icon"></i>导入</button>
            <button class="layui-btn" onclick="x_admin_show('添加用户','/admin/admin/add')"><i
                    class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：<?php echo $_smarty_tpl->tpl_vars['total_rows']->value;?>
 条</span>
        </xblock>

        <table class="layui-table x-admin">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i
                                class="layui-icon">&#xe605;</i></div>
                    </th>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>邮箱</th>
                    <th>角色</th>
                    <th>状态</th>
                    <th>操作</th>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aAdmin']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td>
                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'><i
                                    class="layui-icon">&#xe605;</i></div>
                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['realname'];?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>

                        </td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] > 0) {?>学院<?php } else { ?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == -1) {?>学校<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == -2) {?>导师<?php }?> <?php }?> </td> <td
                                                class="td-status">
                                                <span
                                                    class="layui-btn layui-btn-normal layui-btn-mini <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] != 1) {?>layui-btn-disabled<?php }?>">
                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>已启用<?php } else { ?>已停用<?php }?> </span> </td> <td
                                                                class="td-manage">
                                                                <a onclick="member_stop(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')"
                                                                    href="javascript:;"
                                                                    title="<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] != 1) {?>启用<?php } else { ?>停用<?php }?>">
                                                                    <i class="layui-icon">
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] != 1) {?>&#xe62f;<?php } else { ?>
                                                                                &#xe601;<?php }?> </i> </a> <a title="编辑"
                                                                                    onclick="x_admin_show('编辑','/admin/admin/update?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')"
                                                                                    href="javascript:;">
                                                                                    <i class="layui-icon">&#xe642;</i>
                                                                </a>
                                                                <a title="删除" onclick="member_del(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')"
                                                                    href="javascript:;">
                                                                    <i class="layui-icon">&#xe640;</i>
                                                                </a>
                        </td>
                    </tr>
                    <?php
}
} else {
?>
                        <tr>
                            <td colspan="20" style="text-align: center;">
                                暂无数据
                            </td>
                        </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </tbody> </table> <div class="page">
                            <div>
                                <?php echo $_smarty_tpl->tpl_vars['page_links']->value;?>

                            </div>
    </div>

    </div>
    <?php echo '<script'; ?>
>

        /*用户-停用*/
        function member_stop(obj, id) {
            layer.confirm('确认要更改状态吗？', function (index) {

                if ($(obj).attr('title') == '启用') {

                    //发异步把用户状态进行更改
                    $.ajax({
                        url: '/admin/admin/change?act=do',
                        data: { 'id': id, 'status': 1 },
                        dataType: 'JSON',
                        type: 'POST',
                        success: function (data) {
                            if (data.code == 1) {
                                $(obj).attr('title', '停用')
                                $(obj).find('i').html('&#xe601;');

                                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                                layer.msg('已启用!', { icon: 1, time: 1000 });
                            } else {
                                layer.msg(data.message, { icon: 2, time: 1000 });
                            }
                        }
                    });


                } else {
                    $.ajax({
                        url: '/admin/admin/change?act=do',
                        data: { 'id': id, 'status': 2 },
                        dataType: 'JSON',
                        type: 'POST',
                        success: function (data) {
                            if (data.code == 1) {
                                $(obj).attr('title', '启用')
                                $(obj).find('i').html('&#xe62f;');

                                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                                layer.msg('已停用!', { icon: 2, time: 1000 });
                            } else {
                                layer.msg(data.message, { icon: 2, time: 1000 });
                            }
                        }
                    });


                }

            });
        }

        /*用户-删除*/
        function member_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                //发异步删除数据
                $.ajax({
                    url: '/admin/admin/delete?act=do',
                    data: { 'id': id },
                    dataType: 'JSON',
                    type: 'POST',
                    success: function (data) {
                        if (data.code == 1) {
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!', { icon: 1, time: 1000 });
                        } else {
                            layer.msg(data.message, { icon: 1, time: 1000 });
                        }
                    }
                });

            });
        }

        function delAll(argument) {

            var data = tableCheck.getData();

            if (data) {
                layer.confirm('确认要删除吗？', function (index) {
                    //捉到所有被选中的，发异步进行删除
                    $.ajax({
                        url: '/admin/admin/delete?act=do',
                        data: { 'id': data },
                        dataType: 'JSON',
                        type: 'POST',
                        success: function (data) {
                            if (data.code == 1) {
                                layer.msg('删除成功', { icon: 1 });
                                $(".layui-form-checked").not('.header').parents('tr').remove();
                            } else {
                                layer.msg(data.message, { icon: 2, time: 1000 });
                            }
                        }
                    });

                });
            } else {
                layer.msg('未勾选', { icon: 2 });
            }
        }

        function importExcel() {
            location.href="/admin/teacher/import";
        }
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
