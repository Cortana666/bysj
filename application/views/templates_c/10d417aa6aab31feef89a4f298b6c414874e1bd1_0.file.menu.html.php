<?php
/* Smarty version 3.1.33, created on 2019-06-05 07:39:51
  from 'D:\html\bysj\application\views\templates\admin\menu.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf771c76783a5_99887020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10d417aa6aab31feef89a4f298b6c414874e1bd1' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\admin\\menu.html',
      1 => 1559720390,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf771c76783a5_99887020 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 左侧菜单开始 -->
<?php if ($_SESSION['user']['type'] == 1) {?>
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>用户管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li date-refresh="1">
                        <a _href="/admin/admin/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员用户管理</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/admin/teacher/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>教师用户管理</cite>
                        </a>
                    </li>
                    <li date-refresh="1">
                        <a _href="/admin/student/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>学生用户管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>学院管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/college/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>学院管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>专业管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/special/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>专业管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>毕业设计管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/main/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>毕业设计情况查看</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>通知管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/notice/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>通知管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<?php } elseif ($_SESSION['user']['type'] == 2) {?>
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>用户管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li date-refresh="1">
                        <a _href="/admin/admin/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员用户管理</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/admin/teacher/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>教师用户管理</cite>
                        </a>
                    </li>
                    <li date-refresh="1">
                        <a _href="/admin/student/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>学生用户管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>专业管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/special/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>专业管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>毕业设计管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/main/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>毕业设计情况查看</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>通知管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/notice/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>通知管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<?php } elseif ($_SESSION['user']['type'] == 3) {?>
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>课题管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li date-refresh="1">
                        <a _href="/admin/admin/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>教师提交课题管理</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/admin/teacher/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>学生提交课题管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>选题管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/special/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>学生选题管理</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/admin/special/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>指导教师分配管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>审核教师分配管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/main/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>审核教师分配管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>答辩管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/main/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>答辩许可管理</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/admin/main/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>答辩结果管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>毕业设计审核管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/main/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>毕业设计审核管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>通知管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/notice/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>通知管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<?php }?>
<!-- 左侧菜单结束 --><?php }
}
