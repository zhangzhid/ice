<?php
namespace Yd\Controller;
use Think\Controller;
class IndexController extends AuthController {
    public function index(){
    	$this->display(':index');
    }
	
    public function logout()
    {
        session(null); // 清空当前的session
        $this->redirect(__MODULE__.'/login/index');
    }
	
	public function save()
    {
        $data['site_url']      = I('site_url', '');
        $data['site_name']      = I('site_name', '');
		$data['site_title']      = I('site_title', '');
        $data['site_keywords']  = I('site_keywords', '');
        $data['site_descript']  = I('site_descript', '');
        $data['site_copyright'] = I('site_copyright', '');

        //logo上传
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类
        $upload->savePath  =      '/'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->uploadOne($_FILES['site_logo']);
        if($info){
            $data['site_logo'] = __ROOT__.'/Uploads'.$info['savepath'].$info['savename'];
        }

        foreach ($data as $k => $v) {
            $result = M('Config')->where(array('field' => $k))->save(array('value' => $v));
        }
        $this->success('网站基本设置修改成功', U('index'));
    }
	
}