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
<input type="hidden"  id="insert_announce" value="<?php echo U('Teacher/Index/insert_announce');?>">

 <div class="row clearfix" id="header">

          
            <div class="col-md-12 column">
                <h1 id='threed' class="text-center" style="">
                
              <a href="<?php echo U('Teacher/Index/index');?>"><img src="/studentMange/Public/picture/logo.png" href="" alt=""></a> 
            
                    </h1>
                <div >
                <?php if($announce == 1): else: ?>
                    <div style="float:left">
                  <button type="button" class="btn btn-danger" onclick="announce()">发布公告</button>
                  <div style="max-width:300px"><font size='5'><span id="announce_dis"><?php echo ($announcement); ?></span></font> </div>
                    </div><?php endif; ?>
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
   
    </div>
    <?php else: ?> 
    <div>
      <button type="button" class="btn btn-success" id="login">欢迎您<?php echo ($name); ?>
       <button type="button" class="btn btn-warning" id="register" onclick="send_logout()">登出</button>
     
      </button>
    </div><?php endif; ?>
                    <p>
                       O ever youthful,O ever weeping.
                    </p> <small>杰克·凯鲁亚克 <cite>达摩流浪者</cite></small>
                </blockquote>
            </div>
        </div>
        <div><input type="hidden" id="send_logout" value="<?php echo U('Teacher/index/logout');?>">
        <input type="hidden" id="login_page" value="<?php echo U('Student/login/index');?>">
        </div>

     
     
 <div align="center"><font size="5"><strong><?php echo ($course); ?> </strong> <a href="<?php echo U('Teacher/Course/send_work',array('course'=>$course));?>">   发布作业</a></font></div>

<table class="table table-bordered">
   <caption>近期作业情况统计</caption>
   <thead >
      <tr class="warning" >
         <th>时间</th>
         <th>作业标题</th>
         <th>作业类型</th>
        <th>查看完成情况</th>
         <th>总人数</th>
         <th>完成人数</th>
         <th >修改本次作业</th>
      </tr>
   </thead>
   <tbody>
   <?php if(is_array($recent_task)): $key = 0; $__LIST__ = $recent_task;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key;?><tr class="active">

         <td> <font size="4"><?php echo date('n-j H:i D',$value['start_time']);?> </font></td>
         <td> <font size="4"><?php echo ($value['title']); ?></font></td>
         <td><font size="4"> <?php echo ($value['type']); ?></font> </td>
         <td><font size="4"> <a href="<?php echo U('Teacher/taskdetail/index',array('id'=>$value['id']));?>">点击查看</a></font></td>
         <td> <font size="4"><?php echo ($value['total_number']); ?> </font></td>
         <td> <font size="4"><?php echo ($value['complete_number']); ?></font> </td>
         <td align="center"> <a href="<?php echo U('Teacher/Course/send_work',array('modify'=>1,'task_id'=>$value['id'],'course'=>$course));?>"><button class="btn btn-default">修改</button></a></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
         </tbody>

</table>

</div>
 
	
</body>
</html>