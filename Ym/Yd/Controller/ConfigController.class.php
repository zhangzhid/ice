<?php

namespace Admin\Controller;
use Think\Controller;

class ConfigController extends AuthController {

    //配置列表页面
    public function index()
    {
        $config_list = M('Config')->where(array('config_type' => 'site'))->order('sort DESC')->select();
        $this->assign('config_list', $config_list);
        $this->display('config_list');
    }

    //基本配置页面
    public function base()
    {
        $config_list = get_config_value();
        $this->assign('config_list', $config_list);
        $this->display('config_base');
    }


    //保存设置信息
    public function save()
    {
        $data['site_name']      = I('site_name', '');
        $data['site_style']     = I('site_style', 'default');
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
        $this->success('网站设置保存成功', U('Admin/Config/base'));
    }


}