<?php
/**
 * 
 * @authors  马廷广
 * @date    2016-03-28 21:04:32
 * 此控制器作用：学生课程下的页面
 */
namespace Student\Controller;
use Think\Controller;


class CourseController extends Controller {

    public function index($course='',$tname='')
    {
    	if (empty(session('sid'))) {

		$this->error('请先登录',U('Student/login'),3);
		}
		

    	$task_data		 = get_task_info($course,$tname);
    	$staskModel 	 = M('stask');
    	$sid 			 = session('sid');
    	$color 			 = array('active','success','warning','danger');
    	$i 				 = 0;
    	/*
    	 *此处的作用是：
    	 *取出学生作业对应的数据，判断此学生该作业是否完成，并取出作业id当学生需要修改作业
    	 *时，传递该id
    	 */
    	foreach ($task_data as $key => $value) {
    	$tid 			 = $value['id'];
    	$id 			 = $staskModel->where("sid=$sid AND task_id=$tid")->getField('id');
    	$task_data[$key]['color'] 	  = $color[$i];
    	$i++;
    	if ($i 	== 4 ) {
    		$i=0;
    	}

    	if ($id) {

    	$task_data[$key]['is_finish'] = 1;

    	}

    	else{

    	$task_data[$key]['is_finish'] = 0; 

    	}
    	$task_data[$key]['s_task_id'] = $id;
    	}

    	$this->assign('name',session('sname')."同学");
    	$this->assign('task_data',$task_data);
    	$this->assign('course',$course);
    	$this->assign('is_announce',1);
    	$this->display();
    }
}