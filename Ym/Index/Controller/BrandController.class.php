<?php
//由ThinkphpHelper自动生成,请根据需要修改
namespace Index\Controller;
use Think\Controller;

class BrandController extends Controller {
public function all(){
	$brandModel = M('Brand');
	$count = $brandModel->where()->count();
	$Page = new \Think\Page($count,15);	//实例化分页类 传入总记录数和每页显示的记录数(15)
	$show = $Page->show();	//分页显示输出
	$brandList = $brandModel->where()->limit($Page->firstRow.','.$Page->listRows)->select();	//分页查询
	$this->assign('page',$show);	//赋值分页输出
	$this->assign('brandList', $brandList);
	$this->display();
}

public function add(){
	if(IS_POST){
		$brandModel = M('Brand');
		$brandModel ->create();
		$flag = $brandModel ->add();
		if($flag){
			$this->success('新建成功',U('Brand/all')); 
		}else{
			$this->error('新建失败',U('Brand/all')); 
		}
	}else{
		$this->display(); 
	}
}

public function edit(){
	$brandModel = M('Brand');
	if(IS_POST){
		$brandModel ->create();
		$flag = $brandModel ->save();
		if($flag){
			$this->success('编辑成功',U('Brand/all')); 
		}else{
			$this->error('编辑失败',U('Brand/all')); 
		}
	}else{
		$id = I('id'); 
		$brand = $brandModel->find($id);
		$this->assign('brand', $brand);
		$this->display();
	}
}

public function delete(){
	$brandModel = M('brand');
	$id = I('id'); 
	$flag = $brandModel->where('id='.$id)->delete();
	if($flag){
		$this->success('删除成功', U('Brand/all'));
	}else{
		$this->error('删除失败', U('Brand/all'));
	}
}

}