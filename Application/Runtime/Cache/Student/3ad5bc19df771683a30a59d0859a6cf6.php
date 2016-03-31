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
	<script src="/studentMange/Public/sm/sm.js"> </script>
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

     

   


  <div align="center"><font size="5"><?php echo ($course); ?>  </font></div>
 <table class="table">
   <caption>近期作业情况统计</caption>
   <thead>
      <tr>
         <th>时间</th>
         <th>作业标题(点击查看作业)</th>
         <th>作业类型</th>
     
         <th>是否已完成</th>
         <th>老师回复</th>
         <th>成绩查看</th>
        
      </tr>
   </thead>
   <tbody>
<?php if(is_array($task_data)): $i = 0; $__LIST__ = $task_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr class="<?php echo ($value['color']); ?>">
        <td> <?php echo date('n-j H:i 周L',$value['start_time']);?> </td>
         <td> <a href="<?php echo U('Student/task/index',array('task_id'=>$value['id']));?>"><?php echo ($value['title']); ?></a></td>
         <td> <?php echo ($value['type']); ?> </td>
         <?php if($value['is_finish'] == 1): ?><td> <a href="<?php echo U('Student/task/index',array('s_task_id'=>$value['s_task_id'],'task_id'=>$value['id']));?>">已完成-点击修改</a></td>
        <?php else: ?>
         <td>未完成</td><?php endif; ?>
         <td>查看</td>
         <td>查看</td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</tbody>
</table>
</div>
 
	
</body>
</html>