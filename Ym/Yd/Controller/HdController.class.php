<?php
namespace Yd\Controller;
use Think\Controller;
class HdController extends AuthController {
    public function index(){
    	$db = M('hd');
    	$list = $db->order('id asc')->limit(100)->select();
        $this->assign('list', $list);
    	$this->display(':hd');
    }
	
    public function edit(){
        $id = I('id');
        $info = M('hd')->find($id);
        $this->assign('info', $info);
        $this->display(':hdedit');
    }
	

	public function save(){
		$id = I('id');
		$db = M('hd');
		$info = $db->find($id);
		$upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类
        $upload->savePath  =      '/'; // 设置附件上传目录
        // 上传文件
        $data['title']    = I('title', '');
		$data['url']    = I('url', '');
		$data['time']    = time();
        if($info){
        $zx   =   $upload->uploadOne($_FILES['pic']);
        if($zx){
            $tz = __ROOT__.'/Uploads'.$zx['savepath'].$zx['savename'];
					$data['pic']    = $tz;
        }
            //更新操作
            $result = $db->where(array('id' => $id))->save($data);
            if($result || $result === 0){
                $this->success('幻灯修改成功','index');
            }else if($result === FALSE){
                $this->erroe('幻灯修改失败');
            }
        }
    }
	
}