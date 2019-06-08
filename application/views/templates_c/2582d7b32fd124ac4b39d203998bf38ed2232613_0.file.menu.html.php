<?php
/* Smarty version 3.1.33, created on 2019-06-05 10:45:43
  from 'D:\html\bysj\application\views\templates\student\menu.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf79d57e3fc86_12400232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2582d7b32fd124ac4b39d203998bf38ed2232613' => 
    array (
      0 => 'D:\\html\\bysj\\application\\views\\templates\\student\\menu.html',
      1 => 1559731536,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf79d57e3fc86_12400232 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <a _href="/student/subject/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>课题申报管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>材料提交管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/student/report/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>开题报告管理</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/student/mission/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>任务书管理</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/student/translate/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>外文翻译管理</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="/student/paper/lists">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>论文管理</cite>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- 左侧菜单结束 --><?php }
}
