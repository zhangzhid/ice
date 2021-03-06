<?php
namespace Index\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize() {
		$db = M('news');
    	$list = $db->order('id desc')->limit(4)->select();
		$gd = M('ad');
		$topdb = M('top');
		$top = $topdb ->limit(5) -> select();
    	$ad['1'] = $gd->where(array('id' => 1)) ->find();
		$ad['2'] = $gd->where(array('id' => 2)) ->find();
		$ad['3'] = $gd->where(array('id' => 3)) ->find();
		$ad['4'] = $gd->where(array('id' => 4)) ->find();
		$ad['5'] = $gd->where(array('id' => 5)) ->find();
		$ad['6'] = $gd->where(array('id' => 6)) ->find();
		$ad['7'] = $gd->where(array('id' => 7)) ->find();
		$ad['8'] = $gd->where(array('id' => 8)) ->find();
		$ckid['uid']= session('uid');
		$ckid['username']= session('username');
        $this->assign('list', $list);
		$this->assign('top', $top);
		$this->assign('ckid', $ckid);
		$this->assign(array(
			'ad1' => $ad['1'],
			'ad2' => $ad['2'],
			'ad3' => $ad['3'],
			'ad4' => $ad['4'],
			'ad5' => $ad['5'],
			'ad6' => $ad['6'],
			'ad7' => $ad['7'],
			'ad8' => $ad['8'],
		));
	}
}