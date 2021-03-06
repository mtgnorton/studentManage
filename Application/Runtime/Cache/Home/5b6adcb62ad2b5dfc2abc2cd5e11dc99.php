<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <title>bookstore</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="/studentMange/Public/jquery/jquery-2.1.1.js"></script>
    <script src="/studentMange/Public/jquery/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="/studentMange/Public/Login/css/reset.css">
    <link rel="stylesheet" href="/studentMange/Public/Login/css/supersized.css">
    <link rel="stylesheet" href="/studentMange/Public/Login/css/style.css">
    <script src="/studentMange/Public/sweetalert-master/dist/sweetalert.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="/studentMange/Public/sweetalert-master/dist/sweetalert.css">
    <script language="JavaScript">
    function changeVerify() {
        var timenow = new Date().getTime();
        var pre     = "<?php echo U('Home/Login/verify');?>";
        var temp    = pre.indexOf('shtml');
        pre         = pre.substr(0, temp - 1);
        document.getElementById('verifyImg').src = pre + '/' + timenow;
    }
     function send_form() {
        $.ajax({
            cache   : true,
            type    : "POST",
            url     : '<?php echo U('Home/Login/login_judge');?>',
            data    : $('#Login').serialize(), // 你的formid
            async   : false,
            error   : function(data) {
            sweetAlert('连接错误','','error');
            },
            success: function(response) {
            if (response.flag   ==    0) 
            {

                sweetAlert(response.msg,'','error');
            }else{
                     url                  =  "<?php echo U('Home/Index');?>";
                     window.location.href = url;
                 }
             
            }
        });

    }
    </script>
</head>

<body>


    <div class="page-container">
        <h1>登录</h1>
        <form  method="post" id="Login" action="<?php echo U('Home/Login/login_judge');?>">
            <div>
                <input type="text" name="sid" class="sid" placeholder="用户名">
                <input type="password" name="password" class="password" placeholder="密码">
                          
                <font color="red">教师:</font>
                <input type="radio" checked="checked" name="identity" value="teacher" style="width:40px" /> 

                <font color="red">学生:</font> 
                <input type="radio" name="identity" value="student" style="width:40px"/>
                <input type="text" name="verify" value="请输入验证码" onfocus="this.value = '';">
            </div>
            <div style="margin-top:30px">
            <span>验证码：</span>
                <img id="verifyImg" src="<?php echo U('Home/Login/verify');?>" onClick="changeVerify()" title="点击刷新验证码" />
            </div>
       <!--    <button name="submit" type='button'  value="" onclick="send_form()"> 提交</button> -->
        <input type="submit" name="提交">
            <div class="error"><span>+</span></div>
        </form>
        <div class="connect">
        </div>
    </div>
    <!-- Javascript -->
    <script src="/studentMange/Public/Login/js/jquery-1.8.2.min.js"></script>
    <script src="/studentMange/Public/Login/js/supersized.3.2.7.min.js"></script>
    <script src="/studentMange/Public/Login/js/supersized-init.js"></script>
    <script src="/studentMange/Public/Login/js/scripts.js"></script>
</body>

</html>