<?php

namespace Yd\Controller;
use Think\Controller;

class SzController extends AuthController {
	
	public function _initialize() {
		$Brand = M('Brand');
		$brand_list = $Brand -> where(array('status' => 1)) -> order('id desc') -> limit(10) -> select();
		$this -> assign('brand_list', $brand_list);
		
	}

	public function _empty($action = 'index') {
		$Goods = M('data');

		//搜索条件
		$search = I('search', array());
		
		$filter['w7'] = 3;

		$title = $search['title'];

		if ($title && isset($title)) {
			$filter['title'] = array('like', "%{$title}%");
		}

		$w1 = $search['w1'];

		if ($w1 && isset($w1)) {
			$filter['w1'] = array('like', "%{$w1}%");
		}

		//分页
		$total = $Goods -> where($filter) -> count();

		if ($total) {
			$perNum = 30;
			$Page = new \Think\Page($total, $perNum);

			$Page -> setConfig('prev', "上一页");
			//上一页
			$Page -> setConfig('next', '下一页');
			//下一页
			$Page -> setConfig('first', '首页');
			//第一页
			$Page -> setConfig('last', "末页");
			//最后一页
			$Page -> setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

			$show = $Page -> show();

			$this -> assign('total', $total);
			$this -> assign('page', $show);

		}

		$goods_list = $Goods -> where($filter) -> order('id desc') -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();
		if ($action == 'export') {
			if (!$goods_list) {
				$this -> error('没有搜索结果');
			}
			$this -> goods_export($goods_list);
		}
		
		$this -> assign('search', $search);
		$this -> assign('goods_list', $goods_list);
		$this -> display(':sz');
	}

	//添加
	public function add() {
		$this -> display(':szadd');
	}

	//检查
	public function check_title() {
		$title = I('param');
		$result = check_title('data', $title);
		if ($result) {
			$this -> ajaxReturn(array('status' => 'n', 'info' => '该微博已经存在'));
		} else {
			$this -> ajaxReturn(array('status' => 'y', 'info' => ''));
		}
	}

	//编辑
	public function edit() {
		$id = I('id');
		$goods_info = M('data') -> find($id);
		$this -> assign('goods_info', $goods_info);
		$this -> display(':szadd');
	}

	//保存数据
	public function save() {
		$id = I('id');
		$Goods = M('data');
		$info = $Goods -> find($id);
		$data['w1'] = I('w1', '');
		$data['w7'] = I('w7', '');
		$data['title'] = I('title', '');
		//新增上传头像
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类
		$upload->savePath  =      '/'; // 设置附件上传目录
		$zx   =   $upload->uploadOne($_FILES['z1']);
		if($zx){
			$tz = __ROOT__.'/Uploads'.$zx['savepath'].$zx['savename'];
			$data['z1']    = $tz;
		}
		if ($info) {
			//更新操作
			$result = $Goods -> where(array('id' => $id)) -> save($data);
			if ($result || $result === 0) {
				$this -> success('成功','index');
			} else if ($result === FALSE) {
				$this -> error('错误','index');
			}
		} else {
			//入库操作
			$data['add_time'] = time();
			$result = $Goods -> add($data);
			if ($result) {
				$this -> success('成功','index');
			} else {
				$this -> error('错误','index');
			}
		}

	}

	public function del() {
		$id = I('id');
		$result = M('data') -> delete($id);
		if ($result) {
			$this -> success('删除成功,正在转跳到列表');
		} else if ($result) {
			$this -> erroe('删除失败');
		}
	}

	public function upload() {
		header("Content-Type:text/html;charset=utf-8");
		$upload = new \Think\Upload();
		// 实例化上传类
		$upload -> maxSize = 3145728;
		// 设置附件上传大小
		$upload -> exts = array('xls', 'xlsx');
		// 设置附件上传类
		$upload -> savePath = '/';
		// 设置附件上传目录
		// 上传文件
		$info = $upload -> uploadOne($_FILES['file']);
		$filename = 'Uploads' . $info['savepath'] . $info['savename'];
		$exts = $info['ext'];
		if (!$info) {// 上传错误提示错误信息
			$this -> error($upload -> getError());
		} else {// 上传成功
			$this -> goods_import($filename, $exts);
		}
	}

	//导入数据页面
	public function import() {
		$this -> display(':szim');
	}

	//导入数据方法
	protected function goods_import($filename, $exts = 'xls') {
		//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
		import("Org.Util.PHPExcel");
		//创建PHPExcel对象，注意，不能少了\
		$PHPExcel = new \PHPExcel();
		//如果excel文件后缀名为.xls，导入这个类

		if ($exts == 'xls') {
			import("Org.Util.PHPExcel.Reader.Excel5");
			$PHPReader = new \PHPExcel_Reader_Excel5();
		} else if ($exts == 'xlsx') {
			import("Org.Util.PHPExcel.Reader.Excel2007");
			$PHPReader = new \PHPExcel_Reader_Excel2007();
		}
		//载入文件
		$PHPExcel = $PHPReader -> load($filename);
		//获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
		$currentSheet = $PHPExcel -> getSheet(0);
		//获取总列数
		$allColumn = $currentSheet -> getHighestColumn();
		//获取总行数
		$allRow = $currentSheet -> getHighestRow();
		//循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
		for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
			//从哪列开始，A表示第一列
			for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
				//数据坐标
				$address = $currentColumn . $currentRow;
				//读取到的数据，保存到数组$arr中
				$data[$currentRow][$currentColumn] = $currentSheet -> getCell($address) -> getValue();
			}
		}
		$this -> save_import($data);
	}

	//保存导入数据
	public function save_import($data) {
		$add_time = time();
		foreach ($data as $k => $v) {
			if ($k > 1) {
				$brand_title = $v['A'];
				$brand_id = M('Brand') -> where(array('title' => $brand_title)) -> getField('id');
				if ($brand_id) {
					$date['w1'] = $brand_id;
				} else {
					$new_brand_id = M('Brand') -> add(array('title' => $brand_title, 'add_time' => $add_time));
					$date['w1'] = $new_brand_id;
				}
				$date['title'] = $v['B'];
				$date['w2'] = $v['C'];
				$date['w3'] = $v['D'];
				$date['w4'] = $v['E'];
				$date['w5'] = $v['F'];
				$date['z2'] = $v['G'];
				$date['w7'] = 1;
				$date['add_time'] = $add_time;
				$result = M('data') -> add($date);
			}
		}
		if ($result) {
			$this -> success('导入成功','index');
		} else {
			$this -> error('导入失败');
		}
	}

}
