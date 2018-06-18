<?php
namespace Admin\Controller;
use Think\Controller;

class TopicController extends Controller {
	//显示微博列表
	public function index(){
	    if (session('admin')) {
        	$this->display();
    	} else {
    		$this->redirect('Login/index');
    	}
    } 
    
    //获取微博数据
    public function getList() {
    	if (IS_AJAX) {
    		$Topic = D('Topic');
    		$this->ajaxReturn($Topic->getList(I('post.page'),I('post.rows'), I('post.sort'), I('post.order')));
    	} else {
    		$this->error('非法操作！');
    	}
    }
    
}