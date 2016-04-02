<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/21
 * Time: 21:31
 */

namespace Student\Controller;
use Think\Controller;

class IndexController extends Controller
{	

	
	public function index($value='')
	{	

		/*
		 *此处的作用是：
		 *判断用户是否登录
		 *
		 */
		if (empty(session('sid'))) {

		$this->error('请先登录',U('Student/login'),3);
		}
		$this->assign('name',session('sname')."同学");
		
		
		/*
		 *此处的作用是：
		 *将学生的课程信息对应的老师信息和是否有作业，传递到首页
		 *
		 */
		
		$course 			= session('s_course');
		$taskModel 			= M('ttask');
		foreach ($course as $key => $value) {
		$is_suc 		= $taskModel->where("course='$key' AND tname='$value'")->find();
		if ($is_suc) {

		$course_task_data[]	= array('course'=>$key,'tname'=>$value,'is_task'=>1);
		}else{

		$course_task_data[]	= array('course'=>$key,'tname'=>$value,'is_task'=>0);
		}
		}
		
		$this->assign('course_task_data',$course_task_data);
		

		$this->display();
	}
	public function FunctionName($value='')
	{
		# code...
	}
	public function logout($value='')
	{
		if ( I('post.logout') ) {
		session(null);
		$response['flag']=1;
		$response['message']='您已经成功退出';
		$this->ajaxReturn($response,0);
		}
	}
	
	
		public function test($value='')
		{
			$temp = array('sadf'=>123);
			list($aa,$cc)= each($temp);
			echo $cc;
		}
}