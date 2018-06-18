<?php
namespace Admin\Controller;
use Think\Controller;

class CommentController extends Controller {
	//显示评论列表
	public function index(){
	    if (session('admin')) {
        	$this->display();
    	} else {
    		$this->redirect('Login/index');
    	}
    }
    
    //获取评论数据
    public function getList() {
    	if (IS_AJAX) {
    		$Comment = D('Comment');
    		$this->ajaxReturn($Comment->getList(I('post.page'),I('post.rows'), I('post.sort'), I('post.order')));
    	} else {
    		$this->error('非法操作！');
    	}
    }
    
}