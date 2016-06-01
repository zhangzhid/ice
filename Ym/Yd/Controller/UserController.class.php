<?php

namespace Yd\Controller;
use Think\Controller;

class UserController extends AuthController {

    public function _empty($action='index')
    {
        $Goods = M('User');

        //搜索条件
        $search  = I('search', array());

        $username   = $search['username'];

        if($username && isset($username)){
            $filter['username'] = array('like',"%{$username}%");
        }
		
		$qq   = $search['qq'];

        if($qq && isset($qq)){
            $filter['qq'] = array('like',"%{$qq}%");
        }


        //分页
        $total      = $Goods->where($filter)->count();

        if($total){
            $perNum = 12;
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

        $goods_list = $Goods->where($filter)->order('uid desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        if($action == 'export'){
        	if(!$goods_list){
        	    $this->error('没有搜索结果');
        	}
        	$this->goods_export($goods_list);
        }
        $this->assign('search', $search);
        $this->assign('goods_list', $goods_list);

        $this->display(':user');
    }




    //编辑
    public function edit()
    {
        $id = I('uid');
        $user_info = M('user')->find($id);


        $this->assign('user_info', $user_info);
        $this->display(':useradd');
    }

    //保存
    public function save()
    {
        $id = I('uid');

        $Goods = M('user');
        $info = $Goods->find($id);
        $data['username']    = I('username', '');
		$data['qq']    = I('qq', '');
		$data['email']    = I('email', '');
		$data['tel']    = I('tel', '');
		$data['xy']    = I('xy', '');
        $data['ck']    = I('ck', '');
        if($info){
            //更新操作
            $result = $Goods->where(array('uid' => $id))->save($data);
            if($result || $result === 0){
                $this->ajaxReturn(array('status' => 'ok', 'info' => '修改成功'));
            }else if($result === FALSE){
                $this->ajaxReturn(array('status' => 'error', 'info' => '修改失败'));
            }
        }else{
            //入库操作
        }

    }


    public function del()
    {
        $id = I('uid');
        $result = M('user')-> delete($id);
        if($result){
            $this->success('删除成功,正在转跳到列表');
        }else if($result){
            $this->erroe('删除失败');
        }
    }



}