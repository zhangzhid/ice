<?php

namespace Yd\Controller;
use Think\Controller;

class NotesController extends AuthController {

    public function _initialize() {
        $Brand = M('Brand');
        $brand_list = $Brand -> where(array('status' => 1)) -> order('id desc') -> limit(20) -> select();
        $this -> assign('brand_list', $brand_list);

    }

    public function _empty($action='index')
    {
        $Goods = D('NotesView');

        //搜索条件
        $search  = I('search', array());

        $username   = $search['username'];

        if($username && isset($username)){
            $filter['username'] = array('like',"%{$username}%");
        }

		$r1   = $search['r1'];

        if($r1 && isset($r1)){
            $filter['r1'] = array('like',"%{$r1}%");
        }
        $r2   = $search['r2'];

        if($r2 && isset($r2)){
            $filter['r2'] = array('like',"%{$r2}%");
        }

        //分页
        $total      = $Goods->where($filter)->count();

        if($total){
            $perNum = 100;
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

        $goods_list = $Goods->where($filter)->order('rid desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        if($action == 'export'){
        	if(!$goods_list){
        	    $this->error('没有搜索结果');
        	}
        	$this->goods_export($goods_list);
        }
        $this->assign('search', $search);
        $this->assign('goods_list', $goods_list);

        $this->display(':notes');
    }

    public function del()
    {

        $Model = M();
        $td =$Model->query("SELECT * FROM yf_notes WHERE  UNIX_TIMESTAMP(now()) >= UNIX_TIMESTAMP(DATE_ADD(FROM_UNIXTIME(rtime,'%Y-%m-%d'),INTERVAL 31 day))");
        if($td){
            $this->success('前30天记录删除成功');
        }else{
            $this->success('没有可以删除的记录');
        }
    }



}