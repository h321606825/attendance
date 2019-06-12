<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>职工考勤管理系统-考勤统计</title>
    <link rel="stylesheet" href="/attendance/Public//css/index.css">
    <link rel="stylesheet" href="/attendance/Public//css/style-add.css">
    <script src="/attendance/Public//js/flexible.js"></script>
    <script type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.js"></script>
<style type="text/css">
body{
    overflow: auto;
}
</style>
</head>

<body>
    <div id="leftbox">
        <div class="imgbox">
            <a href="/attendance/index.php/Home/User/kaoqin" style="text-decoration: none" class="link">
                <img src="/attendance/Public//image/worker_rui.png" alt="">
                <br>
                <span class="white">考勤打卡</span>
            </a>
        </div>
        <div class="imgbox">
            <a href="/attendance/index.php/Home/KaoqinInfo" style="text-decoration: none" class="link">
                <img src="/attendance/Public//image/tongji_rui.png" alt="">
                <br>
                <span class="white">考勤统计</span>
            </a>
        </div>
        <div class="imgbox">
            <a href="/attendance/index.php/Home/UserInfo" style="text-decoration: none" class="link">
                <img src="/attendance/Public//image/information_rui.png" alt="">
                <br>
                <span class="white">职员信息</span>
            </a>
        </div>
    </div>

    <div id="box">
        <div id="headbox">
            <span class="black magl1">首页<span class="blue"> > 考勤统计 </span></span>
        </div>
        <div id="bodybox">
            <div id="addbox">
                <span class="orange">考勤统计</span>
            </div>
            <table id="tablebox" cellspacing="0" cellpadding="0">
                <tr class="bluebox blackbig" align="center">
                    <th class="namebox">姓名</th>
                    <th class="numbox">工号</th>
                    <th class="workbox">部门</th>
                    <th class="workbox">职位</th>
                    <th class="phonebox">早打卡时间</th>
                    <th class="phonebox">晚打卡时间</th>
                    <th class="phonebox">连续打卡</th>
                    <th class="emailbox">状态</th>
                </tr>
                <?php
 $i = 0; for($i = 0; $i < count($data) ; $i++) { ?>
                <tr align="center">
                    <td><?=$data[$i]['name'] ?></td>
                    <td><?=$data[$i]['work_id'] ?></td>
                    <td><?=$data[$i]['dep'] ?></td>
                    <td><?=$data[$i]['job'] ?></td>
                    <td><?=$data[$i]['start'] ?></td>
                    <td><?=$data[$i]['end'] ?></td>
                    <td><?=$data[$i]['day'] ?></td>
                    <td><?=$data[$i]['status'] ?></td>
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
</body>
</html>