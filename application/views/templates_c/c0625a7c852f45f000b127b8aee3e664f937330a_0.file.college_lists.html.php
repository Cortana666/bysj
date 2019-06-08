<?php
/* Smarty version 3.1.33, created on 2019-06-05 10:44:56
  from 'D:\html\bysj\application\views\templates\admin\college_lists.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf79d285e9802_50975673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0625a7c852f45f000b127b8aee3e664f937330a' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\admin\\college_lists.html',
      1 => 1559727291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf79d285e9802_50975673 (Smarty_Internal_Template $_smarty_tpl) {
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
            <a href="">学院管理</a>
            <a href="">学院管理</a>
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
                <input type="text" name="name" placeholder="请输入学院名称" autocomplete="off" class="layui-input" value="<?php echo (($tmp = @$_GET['name'])===null||$tmp==='' ? '' : $tmp);?>
">
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="x_admin_show('添加学院','/admin/college/add')"><i
                    class="layui-icon"></i>添加</button>
            <span class="x-right" style="line-height:40px">共有数据：<?php echo $_smarty_tpl->tpl_vars['total_rows']->value;?>
 条</span>
        </xblock>
        
        <table class="layui-table x-admin">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                    </th>
                    <th>ID</th>
                    <th>学院代码</th>
                    <th>学院名称</th>
                    <th>操作</th>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aCollege']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td>
                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $_smarty_tpl->tpl_vars['item']->value['col_id'];?>
'><i class="layui-icon">&#xe605;</i></div>
                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['col_id'];?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                        </td>
                        <td class="td-manage">
                            <a title="编辑" onclick="x_admin_show('编辑','/admin/college/update?col_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['col_id'];?>
')" href="javascript:;">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" onclick="member_del(this,'<?php echo $_smarty_tpl->tpl_vars['item']->value['col_id'];?>
')" href="javascript:;">
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

        /*用户-删除*/
        function member_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                //发异步删除数据
                $.ajax({
                    url: '/admin/college/delete?act=do',
                    data: { 'col_id': id },
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
                        url: '/admin/college/delete?act=do',
                        data: { 'col_id': data },
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
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
