<?php
namespace Admin\Model;
use Think\Model;

class TopicModel extends Model {
	
	//获取数据列表
	public function getList($page, $rows, $sort, $order) {
		
		$obj = $this->field('id,content,reid,recount,comcount,create,ip')
					->order(array($sort=>$order))
					->limit(($rows * ($page - 1)), $rows)
					->select();
	
		foreach ($obj as $key=>$value) {
			$obj[$key]['create'] = date('Y-m-d H:i:s', $value['create']);
			$obj[$key]['ip'] = long2ip($value['ip']);
			if (mb_strlen($obj[$key]['content'], 'utf8') > 20) {
				$obj[$key]['content'] = mb_substr($obj[$key]['content'], 1, 20 , 'utf8').'...';
			}
		}
		
		
		return array(
			'total'=>$this->count(),
			'rows'=>$obj ? $obj : '',
		);
	}

	
	
}