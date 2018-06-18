<?php
namespace Admin\Model;
use Think\Model;

class NavModel extends Model {
	
	//获取菜单导航
	public function getNav($id = 0) {
		$map['nid'] = $id;
		return $this->field('id,text,state,url,iconCls')->where($map)->select();
	}
}