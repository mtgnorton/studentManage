<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/21
 * Time: 21:31
 */

namespace Teacher\Controller;
use Think\Controller;

	/*
	 *此处的作用是：
	 *该页面属于老师
	 *
	 */

class ClassController extends Controller
{	

	
	public function index($course='',$tran_class='')
	{
	/*
	 *此处的作用是：
	 *当点击首页的班级后，显示对应课程下班级的学生
	 *
	 */

	if ( empty(session('tid'))) {
			$this->error('请先登录',U('Student/login/index'),3);
		}
		$this->assign('name',	session('tname')."老师");
		/*
		 *此处的作用是：
		 *获得老师首页下每个课程对应的班级和学生
		 *
		 */
		$t_course 				=  session('t_course');
		foreach ($t_course as $key => $value) {

		$te_course[$key]['course'] 	= $value;
		$te_course[$key]['color'] 	= $color[$i];
		}
		
		$this->assign('course',$te_course);
		$this->assign('now_course',$course);
		/*
		 *此处的作用是：
		 *获得每个课程对应的所有班级，并对他们添加颜色all_class
		 *
		 */
		$student_info				= get_class_student(array($course));	
    	$class 						= $student_info['class_data'][$course];
    	asort($class);
    	$color=array( 'primary' , 'green' , 'yellow' , 'red' );
    	$i=0;
    	foreach ($class as $key => $value) {
    		$class[$key] 	= array('class'=>$value,'color'=>$color[$i]);
    		$i++;
    		if ($i == 3) {
    			$i = 0;
    		}
    	}
   
    	$this->assign( 'all_class' , $class);
    	reset($class);
    	list($temp,$value)=each($class);
    	$now_class=$value['class']; 
		$this->assign( 'now_class' ,$now_class);

		/*
		 *此处的作用是：
		 *获得默认班级下所有的学生now_class_student和数量number
		 *
		 */
		if (!empty($tran_class)) {
			$now_class = $tran_class;
			$this->assign('now_class',$now_class);
		}
		$all_student 				= $student_info['course_student_data'][$course];	
		foreach ($all_student as $key => $value) {
			
		list($temp_class,$info) 	= 	each($value);
		if ($temp_class  			== $now_class) {
			$now_class_student[] 	= $info;
		}
		}
		$now_class_student_number 	= count($now_class_student);
		$this->assign('number' , $now_class_student_number);
		$this->assign('now_class_student', $now_class_student);

		$this->assign('now_course',$course);
		$this->display();
	
	}
	

}