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

	
	public function index($class='',$course='')
	{
	/*
	 *此处的作用是：
	 *当点击首页的班级后，显示对应课程下班级的学生
	 *
	 */
	$student_info	 = get_class_student(session('t_course'));
	foreach ($student_info['course_student_data'][$course] as $key => $value) {
		list($temp_class,$temp_student) 	=each($value);
		
		if ($temp_class	 	==  $class 	) {
			$student[] 	= $temp_student;
		}
	}
	$this->assign('student',$student);
	$this->assign('index_path','index_teacher');
	$this->assign('class',$class);
	$this->assign('course',$course);
	$this->display();
	}
}