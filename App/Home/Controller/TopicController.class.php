<?php
namespace Home\Controller;

class TopicController extends HomeController {
	//发布微博
	public function publish() {
		if (IS_AJAX) {
			//先发布一条微博
			$Topic = D('Topic');
			$tid = $Topic->publish(I('post.content'), session('user_auth')['id']);
			if ($tid) {
				$img = I('post.img', '', false);
				if (is_array($img)) {
					$Image = D('Image');
					$iid = $Image->storage($img, $tid);
					echo $iid ? $tid : 0;
				} else {
					echo $tid;
				}
			}
		} else {
			$this->error('非法访问！');
		}
	}
	
	//转发微博
	public function reBoardCast() {
		if (IS_AJAX) {
			$Topic = D('Topic');
			$tid = $Topic->publish(I('post.content'), session('user_auth')['id'], I('post.reid'));
			echo $tid;
		} else {
			$this->error('非法访问！');
		}
	}
	
	//Ajax获取微博列表
	public function ajaxList() {
		if (IS_AJAX) {
			$Topic = D('Topic');
			$ajaxList = $Topic->getList(I('post.first'),10);
			$this->assign('ajaxList', $ajaxList);
			$this->display();
		} else {
			$this->error('非法访问！');
		}
	}
	
	//Ajax获取总页码
	public function ajaxCount() {
		if (IS_AJAX) {
			$Topic = D('Topic');
			$count = $Topic->where('1=1')->count();
			echo ceil($count / 10);
		} else {
			$this->error('非法访问！');
		}
	}
	
	
	
	
	
	
}