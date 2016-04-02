<?php
/**
 * 
 * @authors  马廷广
 * @date    2016-04-01 17:34:20
 * 此控制器作用：
 */
namespace Teacher\Controller;
use Think\Controller;


class ViewtaskController extends Controller {

    public function index($stask_id='',$course='')
    {

    	if ( empty(session('tid'))) {
			$this->error('请先登录',U('Student/login/index'),3);
		}
		$this->assign('name',	session('tname')."老师");
		$t_course 				=  session('t_course');
		foreach ($t_course as $key => $value) {

		$te_course[$key]['course'] 	= $value;
		$te_course[$key]['color'] 	= $color[$i];
		}
		$this->assign('course',$te_course);
		$this->assign('now_course',$course);

    	$staskModel 	=	M('stask');
    	$sql 			= "select a.*,b.title from sm_stask a join sm_ttask b on a.task_id=b.id where a.id=$stask_id";
    	$task_data 		= $staskModel->query($sql);
    	$task_data['0']['content']=htmlspecialchars_decode($task_data['0']['content']);
    	$this->assign('task_data',$task_data['0']);
    	$this->assign('modify',1);
    	$this->display();
    	
    }
}