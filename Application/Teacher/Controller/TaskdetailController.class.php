<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/21
 * Time: 21:31
 */

namespace Teacher\Controller;
use Think\Controller;

class TaskdetailController extends Controller
{	

	

	public function index($id='')

	{
		
		$staskModel 	= M('stask');
		$task_data 		= $staskModel->where("task_id=$id")->select();
		
		$this->assign('task_data',$task_data);
		$this->display();
	}

}