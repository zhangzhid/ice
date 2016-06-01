<?php

namespace Yd\Controller;
use Think\Controller;

class SxController extends AuthController {

    public function index()
    {
        $Goods = M('brand');
        //分页
        $total      = $Goods->where($filter)->count();

        if($total){
            $perNum = 20;
            $Page       = new \Think\Page($total,$perNum);

            $Page->setConfig('prev', "上一页");//上一页
            $Page->setConfig('next', '下一页');//下一页
            $Page->setConfig('first', '首页');//第一页
            $Page->setConfig('last', "末页");//最后一页
            $Page -> setConfig ( 'theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );

            $show       = $Page->show();

            $this->assign('total',$total);
            $this->assign('page',$show);

        }

        $goods_list = $Goods->where($filter)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('search', $search);
        $this->assign('goods_list', $goods_list);

        $this->display(':sx');
    }

    //添加
    public function add()
    {
        $this->display(':sxadd');
    }

    //检查
    public function check_title()
    {
        $title = I('param');
        $result = check_title('brand', $title);

        if($result){
            $this->ajaxReturn(array('status' => 'n', 'info' => '该类别已经存在'));
        }else{
            $this->ajaxReturn(array('status' => 'y', 'info' => ''));
        }

    }


    //编辑
    public function edit()
    {
        $id = I('id');
        $goods_info = M('brand')->find($id);

        $this->assign('goods_info', $goods_info);
        $this->display(':sxadd');
    }

    //保存
    public function save()
    {
        $id = I('id');

        $Goods = M('brand');
        $info = $Goods->find($id);

        $data['title']    = I('title', '');

        if($info){
            //更新操作
            $result = $Goods->where(array('id' => $id))->save($data);
            if($result || $result === 0){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '类别修改成功'));
            }else if($result === FALSE){
                $this->ajaxReturn(array('status' => 'error', 'info' => '类别修改失败'));
            }
        }else{
            //入库操作
            $data['add_time'] = date('Y-m-d H:i:s', time());
            $result = $Goods->add($data);
            if($result){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '类别添加成功'));
            }else{
                $this->ajaxReturn(array('status' => 'error', 'info' => '类别添加失败'));
            }
        }

    }

    //删除
    public function del()
    {
        $id = I('id');
        $result = M('brand')-> delete($id);
        if($result){
            $this->success('数据删除成功,正在转跳到列表');
        }else if($result){
            $this->erroe('数据删除失败');
        }
    }
	
    }