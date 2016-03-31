<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/21
 * Time: 21:31
 */
/*
	 *此处的作用是：
	 *该页面属于老师
	 *
	 */

namespace Teacher\Controller;
use Think\Controller;

class CourseController extends Controller
{
	public function index($course='')
	{	
		$this->assign('name',	session('tname')."老师");
		$this->assign('course',$course);
		$student_info 					= get_class_student(array($course),1);


		/*
		 *此处的作用是：
		 *获得老师对应的公告
		 *
		 */
		$teacherModel 		= M('teacher');
    	$tid 				= session('tid');
    	$announcement 		= $teacherModel->where("tid=$tid")->getField('announcement');
    	$this->assign('announcement',$announcement);

    	/*
    	 *此处的作用是：
    	 *将以布置的作业在数据库中读取出来
    	 */
    	$ttaskModel 					= M('ttask');
    	$task_result 					= $ttaskModel->where("tid=$tid AND status=0 AND course='$course'")->select();
    	$this->assign('recent_task',$task_result);			
		$this->display();
	}

		/*
		 *此处的作用是：
		 *对应老师发布作业的页面和修改作业的页面
		 *
		 */
	public function send_work($course='')
	{	
		$this->assign('modify',0);
		if (I('get.modify') == 1) {

		/*
		 *此处的作用是：
		 *修改作业的操作
		 *
		 */
		$ttaskModel 		= M('ttask');
		$task_id 			= I('get.task_id');
		$task_data 			= $ttaskModel->where("id=$task_id")->find();
		$this->assign('modify',1);
		$this->assign('task_data',$task_data);
		if ($task_data['type'] == '课前') {
		$this->assign('task_type',1);
		}
		}
		$this->assign('name',	session('tname')."老师");
		
	    $this->assign('course',$course);
	   	$this->assign('announce',1);
		$this->display();
	}

		/*
		 *此处的作用是：
		 *将老师布置的作业存入数据库
		 *
		 */
	public function send_content($value='')
	{	
		$ttaskModel 					= M('ttask');
		$task_id 						= I('post.id');
		if ( $task_id	!= '') {

		$update_data['title']			= I('post.title');
		$update_data['content'] 		= I('post.content');
		$update_data['type']			= I('post.type');
		$is_suc 						= $ttaskModel->where("id=$task_id")->save($update_data);
			if ($is_suc) {
		$response['msg']				= '更新作业成功';
		$response['flag']				= 1;
		$this->ajaxReturn($response,0);
		}
		else{
		$response['msg']				= '更新作业失败';
		$response['flag']				= 0;
		$this->ajaxReturn($response,0);
		}
		}
		$course 						= I('get.course');
		$student_info 					= get_class_student(array($course),1);

		$student_number 				= count($student_info);	
		$insert_data['title'] 			= I('post.title');
		$insert_data['content']			= I('post.content');
		$insert_data['course']			= I('get.course');
		$insert_data['tid'] 			= session('tid');
		$insert_data['tname'] 			= session('tname');
		$insert_data['start_time']		= time();
		$insert_data['total_number']	= $student_number;
		$insert_data['complete_number']	= 0;
		$insert_data['status'] 			= 0;
		$insert_data['type'] 			= I('post.type');
		$is_suc 						= $ttaskModel->add($insert_data);
		if ($is_suc) {
		$response['msg']				= '布置作业成功';
		$response['flag']				= 1;
		$this->ajaxReturn($response,0);
		}
		else{
		$response['msg']				= '布置作业失败';
		$response['flag']				= 0;
		$this->ajaxReturn($response,0);
		}
		
	}
}