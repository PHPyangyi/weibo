<?php
namespace Admin\Model;
use Think\Model;

class ApproveModel extends Model {
	//获取微博列表
	public function getList($page, $rows, $order, $sort) {
		$obj = $this->field('id,name,info,create,state')
					->order(array($sort=>$order))
					->limit(($rows * ($page - 1)), $rows)
					->select();
		foreach ($obj as $key=>$value) {
			$obj[$key]['create'] = date("Y-m-d H:i:s",$value['create']) ;
			if (mb_strlen($obj[$key]['info'], 'utf8') > 40) {
				$obj[$key]['info'] = mb_substr($obj[$key]['info'], 0, 40, 'utf8').'...';
			}
		}
		return array(
				'total'=>$this->count(),
				'rows'=>$obj ? $obj : '',
		);
	}
	//通过审核
	public function update($id) {
		$data = array(
				'id'=>$id,
				'state'=>1,
		);
		return $this->save($data);
	}
}