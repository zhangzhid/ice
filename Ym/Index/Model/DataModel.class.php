<?php
namespace Index\Model;
use Think\Model;

class DataModel extends Model {
 
	 
	public function sousuo(){
		/************ 搜索 ****************/
		$where = array();
		// 平台搜索
				$w7 = I('get.t_id', -1);
		if($w7 != -1)
			$where['w7'] = array('eq', $w7);
		// 类别搜索 
		$w1 = I('get.type_id', -1);
		if($w1 != -1)
			$where['w1'] = array('eq', $w1);
		// 标题搜索
		$title = I('get.title');
		if($title){
			$where['title'] = array('like', "%$title%");
		}
		// 粉丝搜索
		$startPrice = I('get.s_price');
		$endPrice = I('get.d_price');
		if($startPrice && $endPrice)
			$where['w3'] = array('between', array($startPrice, $endPrice));
		elseif ($startPrice)
			$where['w3'] = array('like', $startPrice);
		elseif ($endPrice)
			$where['w3'] = array('like', $endPrice);
		// 头价价格搜索
		$tPrice = I('get.t_price');
		$ePrice = I('get.e_price');
		if($tPrice && $ePrice)
			$where['w4'] = array('between', array($tPrice, $ePrice));
		elseif ($tPrice)
			$where['w4'] = array('like', $tPrice);
		elseif ($ePrice)
			$where['w4'] = array('like', $ePrice);
		// 普通价格搜索
		$qPrice = I('get.q_price');
		$wPrice = I('get.w_price');
		if($qPrice && $wPrice)
			$where['w5'] = array('between', array($qPrice, $wPrice));
		elseif ($qPrice)
			$where['w5'] = array('like', $qPrice);
		elseif ($wPrice)
			$where['w5'] = array('like', $wPrice);
		// 阅读曝光搜索
		$tz2 = I('get.t_z2');
		$ez2 = I('get.e_z2');
		if($tz2 && $ez2)
			$where['z2'] = array('between', array($tz2, $ez2));
		elseif ($tz2)
			$where['z2'] = array('like', $tz2);
		elseif ($ez2)
			$where['z2'] = array('like', $ez2);
		/************ 翻页 *************/
		// 总的记录数
		$count = $this->where($where)->count();
		// 生成翻页对象
		$page = new \Think\Page($count, 30);
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		
		// 获取翻页字符串
		
		$pageString = $page->show();
		// 取出当前页的数据
		
		$data = $this->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$sid = session('uid');
		$sj['r1'] = $w7;
		$sj['r2'] = $w1;
		$sj['r3'] = $title;
		$sj['r4'] = $startPrice;
		$sj['r5'] = $endPrice;
		$sj['r6'] = $tPrice;
		$sj['r7'] = $ePrice;
		$sj['uid'] = $sid;
		$sj['rtime'] = time();
		M('notes')->add($sj);
		//echo $this->getLastSql();
		
		return array(
			'page' => $pageString,
			'data' => $data,
			'yq' => $count,
		);
	}


}
