<?php
/* Smarty version 3.1.33, created on 2019-04-10 18:36:01
  from 'C:\Users\nginx-1.14.2\html\bysj\application\views\templates\admin\welcome.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cadc711b3c6b7_69563560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21449412e520cf68c2b69021dc719ed48cef212e' => 
    array (
      0 => 'C:\\Users\\nginx-1.14.2\\html\\bysj\\application\\views\\templates\\admin\\welcome.html',
      1 => 1554892556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cadc711b3c6b7_69563560 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\nginx-1.14.2\\html\\bysj\\application\\libraries\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-毕业设计管理系统</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/public/static/admin/css/font.css">
        <link rel="stylesheet" href="/public/static/admin/css/xadmin.css">
    </head>
    <body>
    <div class="x-body">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red"><?php echo (($tmp = @(($tmp = @$_SESSION['user']['realname'])===null||$tmp==='' ? $_SESSION['user']['username'] : $tmp))===null||$tmp==='' ? '(未知)' : $tmp);?>
</span>！当前时间:<?php echo smarty_modifier_date_format(time(),'%y-%m-%d %H:%M:%S');?>

        </blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>学生人数</h3>
                                                <p>
                                                    <cite>66</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>选题人数</h3>
                                                <p>
                                                    <cite>12</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>开题人数</h3>
                                                <p>
                                                    <cite>99</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>提交论文人数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>达辨人数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>毕设通过人数</h3>
                                                <p>
                                                    <cite>6766</cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统操作</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                        <!-- <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aLog']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td >
                                <a class="x-a" href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</a>
                            </td>
                        </tr>
                        <?php
}
} else {
?> -->
                        <tr>
                            <td>
                                <a class="x-a" href="javascript:;">
                                    暂无记录
                                </a>
                            </td>
                        </tr>
                        <!-- <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> -->
                    </tbody>
                </table>
            </div>
        </fieldset>
        <!-- <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>xxx版本</th>
                            <td>1.0.180420</td></tr>
                        <tr>
                            <th>服务器地址</th>
                            <td>x.xuebingsi.com</td></tr>
                        <tr>
                            <th>操作系统</th>
                            <td>WINNT</td></tr>
                        <tr>
                            <th>运行环境</th>
                            <td>Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9</td></tr>
                        <tr>
                            <th>PHP版本</th>
                            <td>5.6.27</td></tr>
                        <tr>
                            <th>PHP运行方式</th>
                            <td>cgi-fcgi</td></tr>
                        <tr>
                            <th>MYSQL版本</th>
                            <td>5.5.53</td></tr>
                        <tr>
                            <th>ThinkPHP</th>
                            <td>5.0.18</td></tr>
                        <tr>
                            <th>上传附件限制</th>
                            <td>2M</td></tr>
                        <tr>
                            <th>执行时间限制</th>
                            <td>30s</td></tr>
                        <tr>
                            <th>剩余空间</th>
                            <td>86015.2M</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset> -->
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>版权所有</th>
                            <td>杨剑(yangjian)
                                <a href="javascript:;" class='x-a' target="_blank">访问官网</a></td>
                        </tr>
                        <tr>
                            <th>开发者</th>
                            <td>杨剑(635446559@qq.com)</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <!-- <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本系统由x-admin提供技术支持。</blockquote> -->
    </div>
    </body>
</html><?php }
}
