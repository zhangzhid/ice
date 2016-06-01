<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
    	$db = M('data');
		$s1['w7'] = 1;
		$s2['w7'] = 2;
		$s3['w7'] = 3;
		$s4['w7'] = 4;
		//微信分页
		$twx = $db -> where($s2) -> count();
		if ($twx) {
			$perNum = 8;
			$Page = new \Think\Page($twx, $perNum);
			$Page -> setConfig('prev', "上一页");
			$Page -> setConfig('next', '下一页');
			$Page -> setConfig('first', '首页');
			$Page -> setConfig('last', "末页");
			$Page -> setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
			$show = $Page -> show();
			$this -> assign('total', $twx);
			$this -> assign('pwx', $show);
		}
		$wx = $db -> where($s2) -> order('id desc') -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();
		//微博分页
		$twb = $db -> where($s1) -> count();
		if ($twb) {
			$perNum = 8;
			$Page = new \Think\Page($twb, $perNum);
			$Page -> setConfig('prev', "上一页");
			$Page -> setConfig('next', '下一页');
			$Page -> setConfig('first', '首页');
			$Page -> setConfig('last', "末页");
			$show = $Page -> show();
			$this -> assign('total', $twb);
			$this -> assign('pwb', $show);
		}
		$wb = $db -> where($s1) -> order('id desc') -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();
		//数字分页
		$tsz = $db -> where($s3) -> count();
		if ($tsz) {
			$perNum = 8;
			$Page = new \Think\Page($tsz, $perNum);
			$Page -> setConfig('prev', "上一页");
			$Page -> setConfig('next', '下一页');
			$Page -> setConfig('first', '首页');
			$Page -> setConfig('last', "末页");
			$Page -> setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
			$show = $Page -> show();
			$this -> assign('total', $tsz);
			$this -> assign('psz', $show);
		}
		$sz = $db -> where($s3) -> order('id desc') -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();

		//数字分页
		$twl = $db -> where($s4) -> count();
		if ($twl) {
			$perNum = 8;
			$Page = new \Think\Page($twl, $perNum);
			$Page -> setConfig('prev', "上一页");
			$Page -> setConfig('next', '下一页');
			$Page -> setConfig('first', '首页');
			$Page -> setConfig('last', "末页");
			$Page -> setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
			$show = $Page -> show();
			$this -> assign('total', $twl);
			$this -> assign('pwl', $show);
		}
		$sz = $db -> where($s3) -> order('id desc') -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();



		$hdb = M('hd');
        // $tg = M('news')->where(array('id' =>6))->find();
		$hd = $hdb ->limit(3) -> select();
		$this -> assign('wb', $wb);
		$this -> assign('wx', $wx);
		$this -> assign('sz', $sz);
		$this -> assign('hd', $hd);
		//$this -> assign('tg', $tg);
		$this->display(':index');
    }
	
}