<?php
/* Smarty version 3.1.33, created on 2019-06-08 11:22:59
  from 'D:\html\bysj\application\views\templates\teacher\menu.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfb9a93caee83_49236458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce00cab89e36442499c1840b9935aed4a5ead346' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\teacher\\menu.html',
      1 => 1559989789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfb9a93caee83_49236458 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>课题申报管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li date-refresh="1">
                        <a _href="/teacher/subject/listsadd">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>课题申报管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>学生选题管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li date-refresh="1">
                        <a _href="/teacher/subject/listscheck">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>学生选题管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>相关材料审核</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/teacher/report/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>开题报告</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/teacher/mission/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>任务书</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/teacher/translate/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>外文翻译</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>论文审核</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/teacher/paper/listsself">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>指导学生</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/teacher/paper/listssecond">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>复审核学生</cite>
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
                        <a _href="/teacher/notice/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>通知管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- 左侧菜单结束 --><?php }
}
