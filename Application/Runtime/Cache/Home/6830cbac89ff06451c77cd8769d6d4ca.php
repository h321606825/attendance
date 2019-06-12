<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no,email=no" name="format-detection">
    <title>应用软件研究所</title>
    <link rel="stylesheet" href="/attendance/Public//css/style.css">
    <script src="/attendance/Public//js/flexible.js"></script>
    <script type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.js"></script>
</head>
<style type="text/css">
    body {
        background-image: url("/attendance/Public//image/background.jpg"); 
    }
</style>
<body>
    <div>
        <div id="head">
            <span id="writing">签到登录</span>
        </div>
        <div id="main">
            <div id="box">
                <input type="text" class="inbox" id="work_id" placeholder="请输入账号">
            </div>
            <div>
                <input type="password" class="inbox" id="password" placeholder="请输入密码">
            </div>
            <div id="care">
                <input type="checkbox">下次自动登录
                <a href="#" id="mag1">忘记密码？</a>
            </div>
            <button id="buttonbox" onclick="login();">登&emsp;录</button>
        </div>

    </div>
    <script type="text/javascript">
        function login()
        {
            var data = {
                work_id : $('#work_id').val(),
                password : $('#password').val()
            };
            $.ajax({
                url : '/attendance/index.php/Home/User',
                method : 'post',
                data : data,
                success : function(result)
                {
                    console.log(result);
                    if(result == 1)
                    {
                        window.location.assign('/attendance/index.php/Home/User/kaoqin');
                    }
                    else if(result == 2)
                    {
                        window.location.assign('/attendance/index.php/Home/User/kaoqin2017');
                    }
                    else
                    {
                        alert("账号不存在或密码错误");
                    }
                },
                error : function (err)
                {
                    console.log(err);
                }
            })
        }
    </script>
</body>
</html>