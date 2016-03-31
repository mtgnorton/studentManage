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
	<script src="/studentMange/Public/sm/sm.js"></script>
    <script>$(function () 
      { $("[data-toggle='popover']").popover();
      });
   </script>
	<title>Document</title>
</head>
<body>
<div class="container">
 <div class="row clearfix" id="header">

          
            <div class="col-md-12 column">
                <h1 id='threed' class="text-center" style="">
   
                  <a href="<?php echo U('Student/Index/index');?>"><img src="/studentMange/Public/picture/logo.png" href="" alt=""></a> 
            
                    </h1>
                <div >
                    <div style="float:left">
                 <!--  <button type="button" class="btn btn-danger" onclick="announce()">发布公告</button> -->
                 <?php if($is_announce == 1): ?><button type="button" class="btn btn-success" title="Popover title"  
      data-container="body" data-toggle="popover" data-placement="bottom" 
      data-content="底部的 Popover 中的一些内容">
     点击查看课程公告
   </button>
   <?php else: endif; ?>
              <!--     <div style="max-width:10px"><font size='5'><span id="announce_dis"><?php echo ($announcement); ?></span></font> </div>
                    </div> -->
 
                </div>

              <!--   <ul class="nav nav-pills" style="margin-left:80px">
                    <li class="active">
                        <a href="<?php echo U('Student/Manage');?>"> <span class="badge pull-right"></span>个人中心</a>
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
                <?php if($username == 1 ): else: ?> 
    <div>
      <button type="button" class="btn btn-default" id="login">欢迎您<?php echo ($name); ?>
       <button type="button" class="btn btn-default" id="register" onclick="send_logout()">登出</button>
     
      </button>
    </div><?php endif; ?>
                    <p>
                       O ever youthful,O ever weeping.
                    </p> <small>杰克·凯鲁亚克 <cite>达摩流浪者</cite></small>
                </blockquote>
            </div>
        </div>
       <div><input type="hidden" id="send_logout" value="<?php echo U('Student/index/logout');?>">
        <input type="hidden" id="login_page" value="<?php echo U('Student/login/index');?>">
        </div>

     
<table class="table table-bordered">
  <thead>
      <tr class="warning">
         <th>课程</th>
         <th>老师姓名</th>
         <th>是否有作业</th>
      </tr>
   </thead>
   <tbody>
<?php if(is_array($course_task_data)): $i = 0; $__LIST__ = $course_task_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
  	  <td>
      <a href="<?php echo U('Student/Course/index',array('course'=>$value['course'],'tname'=>$value['tname']));?>">
  	<button type="button" class="<?php echo ($value['color']); ?>">
 	<?php echo ($value["course"]); ?>
	</button>
  </a>
     </td>
         <td><font size="4"><strong><?php echo ($value["tname"]); ?></strong></font></td>
         <?php if($value["is_task"] == 0): ?><td><font size="4"><strong>无</strong></font></td>
         <?php else: ?>
       <td><font size="4"><strong>有新作业</strong></font></td><?php endif; ?>
     </tr><?php endforeach; endif; else: echo "" ;endif; ?>
 </tbody>
</table>
</div>
 
	
</body>
</html>