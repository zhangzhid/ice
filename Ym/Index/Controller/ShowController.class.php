<?php
namespace Index\Controller;
use Think\Controller;
class ShowController extends BaseController {
    public function _empty($action){
    	if(is_numeric($action)){
    		$id = $action;
            $news = M('news')->find($id);
            $this->assign('news',$news);
            $this->display(':show');
		}else{
			$this->error('地址不存在！');
		}
	}
}