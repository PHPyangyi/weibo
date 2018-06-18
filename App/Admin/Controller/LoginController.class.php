<?php
namespace Admin\Controller;
use Think\Controller; 
class LoginController extends Controller {
    //显示登录页
	public function index(){
		if (session('admin')) {
			$this->redirect('Index/index');
		} else {
    		$this->display();
		}
    }
    
    //验证管理员
    public function checkManager() {
    	if (IS_AJAX) {
			$Manage = D('Manage');
			$mid = $Manage->checkManager(I('post.manager'), I('post.password'));
    		echo $mid;
    	} else {
    		$this->error('非法操作！');
    	}
    }
    
    //退出登录
   	public function out() {
   		session('admin',null);
   		$this->redirect('Login/index');
   	}
    
    
    
    
    
}