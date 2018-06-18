<?php
namespace Home\Controller; 

class IndexController extends HomeController {
    public function index(){
		if ($this->login()) {
			$Topic = D('Topic');
			//S('weibo19', null);
			//print_r(S('weibo9'));
			$topicList = $Topic->getList(0,10);
			$this->assign('topicList', $topicList);
			$this->assign('smallFace', session('user_auth')['face']->small);
			$this->assign('bigFace', session('user_auth')['face']->big);
			S('user'.session('user_auth')['id'], NOW_TIME);
			$this->display();
		}
    }
    
    public function getWeibo() {
    	$ids = array();
    	$weibo = array_merge(S('weibo9'),S('weibo19'));
    	foreach ($weibo as $value) {
    		if ($value[1] > S('user'.session('user_auth')['id'])) {
    			$ids[] = $value[0];
    		}
    	}
    	$this->ajaxReturn($ids);
    }
    
}