<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="/studentMange/Public/jquery/jquery-2.1.1.js"></script>
    <script src="/studentMange/Public/jquery/jquery-2.1.1.min.js"></script>
    <script src="/studentMange/Public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/studentMange/Public/sweetalert-master/dist/sweetalert.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="/studentMange/Public/sweetalert-master/dist/sweetalert.css">
	<link rel="stylesheet" href="/studentMange/Public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/studentMange/Public/sm/sm.css">
	<title>Document</title>
</head>
<body>
<div class="container">
 <div class="row clearfix">

            <div class="col-md-12 column">
                <h1 id='threed' class="text-center" style="">
              <a href="<?php echo U('Home/Index');?>"><img src="/studentMange/Public/picture/logo.png" href="" alt=""></a> 
                    </h1>
                <div class="row clearfix">
                    <div class="col-md-12 column">
                    </div>
                </div>
              <!--   <ul class="nav nav-pills" style="margin-left:80px">
                    <li class="active">
                        <a href="<?php echo U('Home/Manage');?>"> <span class="badge pull-right"></span>个人中心</a>
                    </li>
                    <li class="active" id="showLeft">
                        <a href="#"> <span class="badge pull-right" id="cart_value"><?php echo ($sum); ?></span> 购物车</a>

                    </li>
                       <?php if($coin == 'coin' ): else: ?>
                          <li class="active">
                        <a href="#"> <span class="badge pull-right" id="now_coin"><?php echo ($coin); ?></span> coin:</a>

                    </li><?php endif; ?>
                </ul> -->
              
                <blockquote class="pull-right">
                <?php if($username == 1 ): ?><div>
   <button type="button" class="btn btn-success" id="login" onclick="window.location='<?php echo U('Home/Login');?>';">登录</button>
     <button type="button" class="btn btn-warning" id="register" onclick="register()">注册</button>
    </div>
    <?php else: ?> 
    <div>
      <button type="button" class="btn btn-success" id="login">欢迎您<?php echo ($name); ?>
       <button type="button" class="btn btn-warning" id="register" onclick="send_logout()">登出</button>
      }
      </button>
    </div><?php endif; ?>
                    <p>
                       O ever youthful,O ever weeping.
                    </p> <small>杰克·凯鲁亚克 <cite>达摩流浪者</cite></small>
                </blockquote>
            </div>
        </div>
     

<?php if(is_array($course)): $key = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key;?><div id="course" class="course" > 
	<a href="http://www.baidu.com">
	<button type="button" class="btn btn-primary btn-lg">
	<?php if($judge == 1): echo ($value); ?>
	<?php else: ?> 
   	<?php echo ($value); ?>-<?php echo ($key); endif; ?>
	 </button>
	 <span class="badge">
	 50
	 </span>
	 </a>
	 </div><?php endforeach; endif; else: echo "" ;endif; ?>
	
</div>
 
	
</body>
</html>