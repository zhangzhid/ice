<?php
namespace Yd\Controller;
use Think\Controller;
class AdController extends AuthController {
    public function index(){
    	$db = M('ad');
    	$list = $db->order('id asc')->limit(100)->select();
        $this->assign('list', $list);
    	$this->display(':ad');
    }
	
    public function edit(){
        $id = I('id');
        $info = M('ad')->find($id);
        $this->assign('info', $info);
        $this->display(':adedit');
    }
	

	public function save(){
		$id = I('id');
		$db = M('ad');
		$info = $db->find($id);
		$upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类
        $upload->savePath  =      '/'; // 设置附件上传目录
        // 上传文件
        $data['title']    = I('title', '');
		$data['dz']    = I('dz', '');
		$data['wz']    = I('wz', '');
        if($info){
       $zx   =   $upload->uploadOne($_FILES['tp']);
        if($zx){
            $tz = __ROOT__.'/Uploads'.$zx['savepath'].$zx['savename'];
					$data['tp']    = $tz;
        }
            //更新操作
            $result = $db->where(array('id' => $id))->save($data);
            if($result || $result === 0){
                $this->success('广告位修改成功','index');
            }else if($result === FALSE){
                $this->erroe('广告位修改失败');
            }
        }
    }
	
}