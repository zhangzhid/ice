<?php
namespace Yd\Controller;
use Think\Controller;
class TopController extends AuthController {
    public function index(){
    	$db = M('top');
    	$list = $db->limit(5)->select();
        $this->assign('list', $list);
    	$this->display(':top');
    }

    public function edit(){
        $id = I('id');
        $info = M('top')->find($id);
        $this->assign('info', $info);
        $this->display(':topedit');
    }


    public function save()
    {
        $id = I('id');
		$db = M('top');
		$info = $db->find($id);
        $data['title']    = I('title', '');
		$data['time']    = time();
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