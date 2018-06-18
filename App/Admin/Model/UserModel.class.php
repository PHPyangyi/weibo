<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class UserModel extends RelationModel {
	//用户表自动验证
	protected $_validate = array(
		//-1,'帐号长度不合法！'
		array('username', '/^[^@]{2,20}$/i', -1, self::EXISTS_VALIDATE),
		//-2,'密码长度不合法！'
		array('password', '6,30', -2, self::EXISTS_VALIDATE,'length', self::MODEL_INSERT),
		//-2,'密码长度不合法！'
		array('password', '6,30', -2, self::VALUE_VALIDATE,'length', self::MODEL_UPDATE),
		//-3,'邮箱格式不正确！'
		array('email', 'email', -3, self::EXISTS_VALIDATE),

		//-4,'帐号被占用！'
		array('username', '', -4, self::EXISTS_VALIDATE, 'unique', self::MODEL_INSERT),
		//-5,'邮箱被占用！'
		array('email', '', -5, self::EXISTS_VALIDATE, 'unique', self::MODEL_UPDATE),
		
		//-6,'个性域名不合法！'
		array('domain', '/^\w{4,10}$/i', -6, self::VALUE_VALIDATE),
		//-7,'个性域名被占用！'
		array('domain', '', -7, self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
			
	);
	
	/*
	//用户表自动完成
	protected $_auto = array(
			array('password', 'sha1', self::MODEL_BOTH, 'function'),
			array('create', 'time', self::MODEL_INSERT, 'function'),
	);
	*/
	
	//一对一关联用户
	protected $_link = array(
		'extend'=>array(
				'mapping_type'=>self::HAS_ONE,
				'class_name'=>'UserExtend',
				'foreign_key'=>'uid',
				'mapping_fields'=>'intro',
		),
	);
	
	//获取数据列表
	public function getList($page, $rows, $sort, $order, $username, $date_from, $date_to) {
		$map = array();
		
		if ($username) {
			$map['username'] = array('like', '%'.$username.'%');
		}
		
		if ($date_from && $date_to) {
			$map['create'] = array(array('egt', strtotime($date_from)), array('elt', strtotime($date_to)));
		} else if ($date_from) {
			$map['create'] = array('egt', strtotime($date_from));
		} else if ($date_to) {
			$map['create'] = array('elt', strtotime($date_to));
		}
		
		$obj = $this->field('id,username,email,domain,create,last_login,last_ip')
					->where($map)
					->order(array($sort=>$order))
					->limit(($rows * ($page - 1)), $rows)
					->select();
	
		foreach ($obj as $key=>$value) {
			$obj[$key]['create'] = date('Y-m-d H:i:s', $value['create']);
			$obj[$key]['last_login'] = date('Y-m-d H:i:s', $value['last_login']);
			$obj[$key]['last_ip'] = long2ip($value['last_ip']);
		}
		
		//echo $this->getLastSql();
		
		return array(
			'total'=>$this->where($map)->count(),
			'rows'=>$obj ? $obj : '',
		);
	}
	
	//新增会员
	public function register($username, $password, $email, $domain, $intro) {
		$data = array(
			'username'=>$username,
			'password'=>$password,
			'email'=>$email,
			'domain'=>$domain ? $domain : null,
			'extend'=>array(
				'intro'=>$intro,
			),
		);
		
		if ($this->create($data)) {
			$data['password'] = sha1($password);
			$data['create'] = NOW_TIME;
			$uid = $this->relation(true)->add($data);
			//echo $this->getLastSql();
			return $uid ? $uid : 0;
		} else {
			return $this->getError();
		}
	}
	
	//修改用户
	public function update($id, $password, $email, $domain, $intro, $source_intro) {
		$data = array(
			'id'=>$id,
			'email'=>$email,
			'domain'=>$domain ? $domain : null,
			'extend'=>array(
				'intro'=>$intro,
			),
		);
		
		if ($password) {
			$data['password'] = $password;
		}
		
		if ($this->create($data)) {
			if ($password) {
				$data['password'] = sha1($password);
			}
			$uid = $this->relation(true)->save($data);
			
			if ($uid || $intro != $source_intro) {
				return 1;
			} else {
				return 0;
			}			
			//return $uid ? $uid : 0;
		} else {
			return $this->getError();
		}
	}
	
	//通过一对一关联获取用户信息
	public function getUser($id) {
		$map['id'] = $id;
		return $this->relation(true)->field('id,username,email,face,domain')->where($map)->find();
	}
	
	//删除会员
	public function remove($ids) {
		return $this->relation(true)->delete($ids);
	}
	
	
	
	
	
	
}