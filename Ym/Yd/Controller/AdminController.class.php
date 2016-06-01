<?php

namespace Yd\Controller;
use Think\Controller;

class AdminController extends AuthController {

    public function index()
    {
        $db = M('admin');
        $data = $db->select();
        $this->assign('data', $data);
        $this->display(':admin');
    }

    //添加
    public function add()
    {
        $this->display(':adminadd');
    }

    //编辑
    public function edit()
    {
        $id = I('aid');
        $user_info = M('admin')->find($id);

        $this->assign('info', $user_info);
        $this->display(':adminadd');
    }

    //保存
    public function save()
    {
        $id = I('aid');

        $Goods = M('admin');
        $info = $Goods->find($id);
        $data['admin_name']    = I('admin_name', '');
		$data['admin_password']    = I('admin_password','','md5');
        if($info){
            //更新操作
            $result = $Goods->where(array('aid' => $id))->save($data);
            if($result || $result === 0){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '修改成功'));
            }else if($result === FALSE){
                $this->ajaxReturn(array('status' => 'error', 'info' => '修改失败'));
            }
        }else{
            $data['dtime'] = time();
            $result = $Goods->add($data);
            if($result){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '添加成功'));
            }else{
                $this->ajaxReturn(array('status' => 'error', 'info' => '添加失败'));
            }
        }

    }


    public function del()
    {
        $id = I('aid');
        $result = M('admin')-> delete($id);
        if($result){
            $this->success('删除成功');
        }else if($result){
            $this->erroe('删除失败');
        }
    }



}