<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>职工考勤管理系统-职员信息</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/style-add.css">
    <script src="/js/flexible.js"></script>
    <script type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.js"></script>
</head>
<body>
    <div id="leftbox">
        <div class="imgbox">
            <a href="/index.php/Home/User/kaoqin" style="text-decoration: none" class="link">
                <img src="/image/worker_rui.png" alt="">
                <br>
                <span class="white">考勤打卡</span>
            </a>
        </div>
        <div class="imgbox">
            <a href="/index.php/Home/KaoqinInfo" style="text-decoration: none" class="link">
                <img src="/image/tongji_rui.png" alt="">
                <br>
                <span class="white">考勤统计</span>
            </a>
        </div>
        <div class="imgbox">
            <a href="/index.php/Home/UserInfo" style="text-decoration: none" class="link">
                <img src="/image/information_rui.png" alt="">
                <br>
                <span class="white">职员信息</span>
            </a>
        </div>
    </div>
<div id="box">
    <div id="headbox">
        <span class="black magl1">首页<span class="blue"> > 职员信息 </span></span>
    </div>
    <div id="bodybox">
        <div id="addbox">
            <span class="orange">职员信息</span>
            <button class="addbutton"><a onclick="window.location.assign('/index.php/Home/User/add');" style="text-decoration: none" class="link">添&emsp;加</a></button>
        </div>
        <table id="tablebox" cellspacing="0" cellpadding="0">
            <tr class="bluebox blackbig" align="center">
                <th class="namebox">姓名</th>
                <th class="numbox">工号</th>
                <th class="workbox">部门</th>
                <th class="workbox">职位</th>
                <th class="phonebox">手机</th>
                <th class="phonebox">部门电话</th>
                <th class="emailbox">邮箱</th>
                <th class="dobox" align="center">操作</th>
            </tr>
            <?php
 $i = 0; for($i = 0; $i < count($data) ; $i++) { ?>
            <tr align="center">
                <td><?=$data[$i]['name']?></td>
                <td><?=$data[$i]['work_id']?></td>
                <td><?=$data[$i]['dep']?></td>
                <td><?=$data[$i]['job']?></td>
                <td><?=$data[$i]['tel']?></td>
                <td><?=$data[$i]['dep_tel']?></td>
                <td><?=$data[$i]['eml']?></td>
                <td align="center">
                    <img src="/image/delete_rui.png" class="delete" onclick="del(<?=$data[$i]['work_id']?>);">
                    <img src="/image/exit_rui.png" class="exit" onclick="upd(<?=$data[$i]['work_id']?>);">
                </td>
            </tr>
            <?php } for(; $i < 10; $i++) { ?>
            <tr align="center">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script type="text/javascript">
    function del(work_id)
    {
        $.ajax({
            url : '/index.php/Home/UserInfo/deleteinfo',
            method : 'post',
            data : {'work_id' : work_id},
            success : function()
            {
                alert("工号为 " + work_id + " 已被删除！！！！");
               window.location.assign('/index.php/Home/UserInfo');
            }
        })
    }
    function upd(work_id)
    {
        window.location.assign('/index.php/Home/User/add');
    }
</script>
</body>
</html>