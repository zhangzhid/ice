<?php
namespace Yd\Controller;
use Think\Controller;
class NewsController extends AuthController {
	public function index(){
		$db = M('news');
		$list = $db->order('id desc')->limit(100)->select();
		$this->assign('list', $list);
		$this->display(':news');
	}

	public function edit(){
		$id = I('id');
		$info = M('news')->find($id);
		$this->assign('info', $info);
		$this->display(':newsedit');
	}

	public function save()
	{
		$id = I('id');
		$db = M('news');
		$info = $db->find($id);
		$data['title']    = I('title', '');
		$data['key']    = I('key', '');
		$data['des']    = I('des', '');
		$data['com']    = I('com', '');
		if($info){
			//更新操作
			$result = $db->where(array('id' => $id))->save($data);
			if($result || $result === 0){
				$this->ajaxReturn(array('status' => 'ok', 'info' => '修改成功'));
			}else if($result === FALSE){
				$this->ajaxReturn(array('status' => 'error', 'info' => '修改失败'));
			}
		}
	}

}