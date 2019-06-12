<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>应用软件研究所-考勤打卡</title>
    <link rel="stylesheet" href="/attendance/Public//css/index.css">
    <link rel="stylesheet" href="/attendance/Public//css/style-add.css">
    <script src="/attendance/Public//js/flexible.js"></script>
    <script type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.js"></script>
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
            <span class="black magl1">首页<span class="blue"> > 考勤打卡 </span></span>
        </div>
        <div id="bodybox">
            <div id="addbox">
                <div></div>
                <button class="addbutton"><a style="text-decoration: none" class="link"  onclick="window.location.assign('/attendance/index.php/Home/User/sign_out');">注&emsp;销</a></button>
            </div>
            <div id="checkbox">
                <div id="check">
                    <div id="time">
                        当前时间：
                    </div>
                    <div id="clock">
                        <span id="current-time"></span>
                    </div>
                    <div id="around" onclick="play()">
                        <span>打卡</span>
                    </div>
                </div>
                <div id="care">
                    <span>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        注意事项：<br>
                    1、打卡时间为八点，晚五点；<br>
                    2、晚于早八点记迟到；<br>
                    3、早于晚五点记早退；
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script>
        function play(){
            $.ajax({
                url : '/attendance/index.php/Home/User/kaoqin',
                method : 'post',
                success : function(result)
                {
                    if(result === 0)
                    {
                        alert('打卡失败！');
                    }
                    else if(result[0] == 0)
                    {
                        if(result[1] == 0)
                        {
                            alert('按时上班哦！打卡成功');
                        }
                        else
                        {
                            alert('你迟到了！');
                        }
                    }
                    else if(result[0] == 1)
                    {
                        if(result[1] == 1)
                        {
                            alert('按时下班哦~ 晚安');
                        }   
                        else
                        {
                            alert('你提前下班了！');
                        }
                    }
                },
                error : function (err)
                {
                    console.log(err);
                }
            });
        }
        var now = (new Date()).toLocaleString();
            $('#current-time').text(now);
        setInterval(function() {
            var now = (new Date()).toLocaleString();
            $('#current-time').text(now);
        }, 1000);
    </script>
</body>
</html>