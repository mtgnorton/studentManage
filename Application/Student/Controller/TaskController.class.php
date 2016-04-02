<?php
/**
 * 
 * @authors  马廷广
 * @date    2016-03-28 21:04:32
 * 此控制器作用：作业的查看和提交
 */
namespace Student\Controller;
use Think\Controller;


class TaskController extends Controller {

    public function index($task_id="",$course='')
    {
        if (empty(session('sid'))) {

        $this->error('请先登录',U('Student/login'),3);
        }
        $this->assign('name',session('sname')."同学");
        $this->assign('course',$course);

        
        /*
         *此处的作用是：
         *将学生的课程信息对应的老师信息和是否有作业，传递到首页
         *
         */
        
        $course             = session('s_course');

        $taskModel          = M('ttask');
        foreach ($course as $key => $value) {
        $is_suc         = $taskModel->where("course='$key' AND tname='$value'")->find();
        if ($is_suc) {

        $course_task_data[] = array('course'=>$key,'tname'=>$value,'is_task'=>1);
        }else{

        $course_task_data[] = array('course'=>$key,'tname'=>$value,'is_task'=>0);
        }
        }
        
        $this->assign('course_task_data',$course_task_data);
        $s_task_id                  = I('get.s_task_id');

        /*
         *此处的作用是：
         *当学生要修改作业时，根据是否传递过来学生作业id来判断，如果是修改
         *则查询数据库，获得学生的作业数据
         */
        if ($s_task_id) {
        $staskModel                 = M('stask');
        $s_task_data                = $staskModel->where("id=$s_task_id")->find();
        $this->assign('s_task_data',$s_task_data);

        $this->assign('modify',1);
        }
        else{
        $this->assign('modify',0);
        }
    	$task_data 				    = 	get_task_info($task_id,'',1);
    	$task_data[0]['content'] 	= 	htmlspecialchars_decode($task_data[0]['content']);

    	
        /*
         *此处的作用是：
         *task_data代表老师布置作业的内容
         *
         */
        $this->assign('name',session('sname')."同学");
    	$this->assign('task_data',$task_data[0]);
    
    	$this->display();
    	
    }

    /*
     *此处的作用是：
     *将学生的作业提交到数据库
     *
     */
    public function send_task($task_id='',$task_type="")
    {   
        $staskModel                         = M('stask');
        $s_task_id                          = I('post.id');
        if ($s_task_id) {
        $modify_stask_data['content']       = I('post.content');
        $is_suc                             = $staskModel->where("id=$s_task_id")->save($modify_stask_data);
        if ($is_suc) {
        $response['flag']    = 1;
        $response['msg']     = '作业修改成功';
        $this->ajaxReturn($response,0);
        }
        else{
        $response['flag']    = 0;
        $response['msg']     = '作业修改失败';
        $this->ajaxReturn($response,0);
        }
        }
        $insert_stask_data['content']       = I('post.content');
        $insert_stask_data['sid']           = session('sid');
        $insert_stask_data['task_id']       = $task_id;
        $insert_stask_data['sname']         = session('sname');
        $insert_stask_data['submit_time']   = time();
        $insert_stask_data['is_mark']       = 0;
        $insert_stask_data['type']          = $task_type;
        $is_suc                             = $staskModel->add($insert_stask_data);
        if ($is_suc) {
        $response['flag']    = 1;
        $response['msg']     = '作业提交成功';
        $this->ajaxReturn($response,0);
        }
        else{
        $response['flag']    = 0;
        $response['msg']     = '作业提交失败';
        $this->ajaxReturn($response,0);
        }
     
    }
}