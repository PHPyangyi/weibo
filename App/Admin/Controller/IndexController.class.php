<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	//显示后台框架
    public function index(){
    	if (session('admin')) {
        	$this->display();
    	} else {
    		$this->redirect('Login/index');
    	}
    }
    
    //获取菜单导航
    public function getNav() {
    	$Nav = D('Nav');
    	$this->ajaxReturn($Nav->getNav(I('post.id')));
    }
}