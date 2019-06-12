<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta content="yes" name="apple-touch-fullscreen">
        <meta content="telephone=no,email=no" name="format-detection">
        <title>职员信息添加</title>
        <link rel="stylesheet" href="/css/style-add.css">
        <script src="/js/flexible.js"></script>
        <script type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.js"></script>
    </head>
    <body>
        <div id="box">
            <div id="headbox">
                <span class="black magl1">首页<span class="blue"> > 职员信息 </span></span>
            </div>
            <div id="bodybox">
                <div id="addbox">
                    <span class="orange">职员信息添加</span>
                    <button class="addbutton"><a onclick="window.location.assign('/index.php/Home/UserInfo');" style="text-decoration: none" class="link">返&emsp;回</a></button>
                </div>
                <div id="viewbox">
                    <div class="small">
                        <span class="black">姓名</span>
                        <input type="text" class="inbox" id="name">
                    </div>
                    <div class="small">
                        <span class="black">工号</span>
                        <input type="text" class="inbox" id="work_id">
                    </div>
                    <div class="small">
                        <span class="black">部门</span>
                        <input type="text" class="inbox" id="dep">
                    </div>
                    <div class="small">
                        <span class="black">职位</span>
                        <input type="text" class="inbox" id='job'>
                    </div>
                    <div class="small">
                        <span class="black">手机</span>
                        <input type="text" class="inbox" id="tel">
                    </div>
                    <div class="small">
                        <span class="black">邮箱</span>
                        <input type="text" class="inbox" id="eml">
                    </div>
                    <button id="buttonbox" onclick="add();">确&emsp;定</button>
                </div>
            </div>
        </div>
    <script>
    function add()
    {
    	var data = {
    		id : $('#work_id').val(),
    		name : $('#name').val(),
    		depart : $('#dep').val(),
    		job : $('#job').val(),
    		phone : $('#tel').val(),
    		email : $('#eml').val(),
    	};
    	$.ajax({
    		url : '/index.php/Home/User/add',
    		method : 'post',
    		data : data,
    		success : function(result)
    		{
    			if(result.length == 0)
    			{
    				alert("添加成功");
    				window.location.assign("/index.php/Home/User/add");
    			}
    			else
    			{
    				var errors = '';
    				for(var i = 0; i < result.length; i++)
    				{
    					switch(result[i])
    					{
    						case 0 :
    							errors += '请填写正确工号\n';
							break;
    						case 1 :
    							errors += '请填写姓名\n';
							break;
    						case 2 :
    							errors += '请填写正确部门\n';
							break;
    						case 3 :
    							errors += '请填写正确职位\n';
							break;
    					}
    				}
    				alert(errors);
    			}
    		},
    		error : function(err)
    		{
    			alert("用户已存在");
    		}
    	})
    }
    </script>
    </body>
</html>