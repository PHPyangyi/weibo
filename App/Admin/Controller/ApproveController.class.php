<?php
namespace Admin\Controller;
use Think\Controller;

class ApproveController extends Controller {
	//显示认证审核列表
	public function index(){
		$this->display();
	}
	//获取认证审核列表
	public function getList() {
		if (IS_AJAX) {
			$Approve = D('Approve');
			$this->ajaxReturn($Approve->getList(I('post.page'),I('post.rows'), I('post.order'), I('post.sort')));
		} else {
			$this->error('非法操作！');
		}
	}
	//通过认证
	public function update() {
		if (IS_AJAX) {
			$Approve = D('Approve');
			echo $Approve->update(I('post.id'));
		} else {
			$this->error('非法操作！');
		}
	}
}