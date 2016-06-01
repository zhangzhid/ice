<?php
//由ThinkphpHelper自动生成,请根据需要修改
namespace Index\Controller;
use Think\Controller;

class ConfigController extends Controller {
public function all(){
	$configModel = M('Config');
	$count = $configModel->where()->count();
	$Page = new \Think\Page($count,15);	//实例化分页类 传入总记录数和每页显示的记录数(15)
	$show = $Page->show();	//分页显示输出
	$configList = $configModel->where()->limit($Page->firstRow.','.$Page->listRows)->select();	//分页查询
	$this->assign('page',$show);	//赋值分页输出
	$this->assign('configList', $configList);
	$this->display();
}

public function add(){
	if(IS_POST){
		$configModel = M('Config');
		$configModel ->create();
		$flag = $configModel ->add();
		if($flag){
			$this->success('新建成功',U('Config/all')); 
		}else{
			$this->error('新建失败',U('Config/all')); 
		}
	}else{
		$this->display(); 
	}
}

public function edit(){
	$configModel = M('Config');
	if(IS_POST){
		$configModel ->create();
		$flag = $configModel ->save();
		if($flag){
			$this->success('编辑成功',U('Config/all')); 
		}else{
			$this->error('编辑失败',U('Config/all')); 
		}
	}else{
		$id = I('id'); 
		$config = $configModel->find($id);
		$this->assign('config', $config);
		$this->display();
	}
}

public function delete(){
	$configModel = M('config');
	$id = I('id'); 
	$flag = $configModel->where('id='.$id)->delete();
	if($flag){
		$this->success('删除成功', U('Config/all'));
	}else{
		$this->error('删除失败', U('Config/all'));
	}
}

}