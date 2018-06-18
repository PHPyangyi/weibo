<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller {
	//显示会员列表
	public function index(){
	    if (session('admin')) {
        	$this->display();
    	} else {
    		$this->redirect('Login/index');
    	}
    }
     
    //获取会员数据
    public function getList() {
    	if (IS_AJAX) {
    		$User = D('User');
    		$this->ajaxReturn($User->getList(I('post.page'),I('post.rows'), I('post.sort'), I('post.order'), I('post.username'), I('post.date_from'), I('post.date_to')));
    	} else {
    		$this->error('非法操作！');
    	}
    }
    
    //新增用户
    public function register() {
    	if (IS_AJAX) {
    		$User = D('User');
    		echo $User->register(I('post.username'), I('post.password'), I('post.email'), I('post.domain'), I('post.intro'));
    	} else {
    		$this->error('非法操作！');
    	}
    }
    
    //获取一条用户
    public function getUser() {
    	if (IS_AJAX) {
    		$User = D('User');
    		$this->ajaxReturn($User->getUser(I('post.id')));
    	} else {
    		$this->error('非法操作！');
    	}
    }
    
    //修改用户
    public function update() {
    	if (IS_AJAX) {
    		$User = D('User');
    		echo $User->update(I('post.id'), I('post.password'), I('post.email'), I('post.domain'), I('post.intro'), I('post.source_intro'));
    	} else {
    		$this->error('非法操作！');
    	}
    }
    
    //删除会员
    public function remove() {
    	if (IS_AJAX) {
    		$User = D('User');
    		echo $User->remove(I('post.ids'));
    	} else {
    		$this->error('非法操作！');
    	}
    }
    
}