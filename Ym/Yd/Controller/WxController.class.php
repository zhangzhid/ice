<?php

namespace Yd\Controller;
use Think\Controller;

class WxController extends AuthController {
	
	public function _initialize() {
		$Brand = M('Brand');
		$brand_list = $Brand -> where(array('status' => 1)) -> order('id desc') -> limit(30) -> select();
		$this -> assign('brand_list', $brand_list);
		
	}

	public function _empty($action = 'index') {
		$Goods = M('data');

		//搜索条件
		$search = I('search', array());
		
		
		$filter['w7'] = 2;


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
		$this -> display(':wx');
	}

	//添加
	public function add() {
		$this -> display(':wxadd');
	}

	//检查
	public function check_title() {
		$title = I('param');
		$result = check_title('data', $title);
		if ($result) {
			$this -> ajaxReturn(array('status' => 'n', 'info' => '该账号已经存在'));
		} else {
			$this -> ajaxReturn(array('status' => 'y', 'info' => ''));
		}
	}

	//编辑
	public function edit() {
		$id = I('id');
		$goods_info = M('data') -> find($id);
		$this -> assign('goods_info', $goods_info);
		$this -> display(':wxadd');
	}

	//保存数据
	public function save() {
		$id = I('id');
		$Goods = M('data');
		$info = $Goods -> find($id);

		$data['w1'] = I('w1', '');
		$data['title'] = I('title', '');
		$data['w2'] = I('w2', '');
		$data['w3'] = I('w3', '');
		$data['w4'] = I('w4', '');
		$data['w5'] = I('w5', '');
		$data['z1'] = I('z1', '');
		$data['z2'] = I('z2', '');
		$data['w7'] = I('w7', '');
		$data['type_v'] = I('type_v', '0');

		/*//新增上传头像
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类
		$upload->savePath  =      '/'; // 设置附件上传目录
		$zx   =   $upload->uploadOne($_FILES['z1']);
			if($zx){
				$tz = __ROOT__.'/Uploads'.$zx['savepath'].$zx['savename'];
				$data['z1']    = $tz;
		}*/
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
		$this -> display(':wxim');
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
				$date['z1'] = $v['A'];
				$brand_title = $v['B'];
				$brand_id = M('Brand') -> where(array('title' => $brand_title)) -> getField('id');
				if ($brand_id) {
					$date['w1'] = $brand_id;
				} else {
					$new_brand_id = M('Brand') -> add(array('title' => $brand_title, 'add_time' => $add_time));
					$date['w1'] = $new_brand_id;
				}
				$date['title'] = $v['C'];
				$date['w2'] = $v['D'];
				$date['w3'] = $v['E'];
				$date['w4'] = $v['F'];
				$date['w5'] = $v['G'];
				$date['z2'] = $v['H'];
				$date['type_v'] = $v['I'];
				$date['w7'] = 2;
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

	public function exportExcel($expTitle,$expCellName,$expTableData){
		$xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
		$fileName = $_SESSION['account'].date('YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
		$cellNum = count($expCellName);
		$dataNum = count($expTableData);

		import("Org.Util.PHPExcel");

		$objPHPExcel = new \PHPExcel();
		$cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

		$objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
		// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
		for($i=0;$i<$cellNum;$i++){
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
		}
		// Miscellaneous glyphs, UTF-8
		for($i=0;$i<$dataNum;$i++){
			for($j=0;$j<$cellNum;$j++){
				$objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
			}
		}

		header('pragma:public');
		header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
		header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}

	/**
	 *
	 * 导出Excel
	 */
	function expUser(){//导出Excel
		$xlsName  = "User";
		$xlsCell  = array(
			array('id','序列'),
			array('z1','头像'),
			array('w1','类别'),
			array('title','账号'),
			array('w2','微信ID'),
			array('w3','粉丝量'),
			array('w4','头条报价'),
			array('w5','非头条报价'),
			array('z2','阅读数'),
			array('type_v','加V标识')

		);
		$xlsModel = M('data');

		$xlsData  = $xlsModel->where(array('w7' => 2))->Field('id,z1,w1,title,w2,w3,w4,w5,z2,type_v')->select();
		foreach ($xlsData as $k => $v)
		{
			if ($xlsData[$k]['w1']== 1){
				$xlsData[$k]['w1']='新闻|资讯';
			}
			if ($xlsData[$k]['w1']== 2){
				$xlsData[$k]['w1']='IT|科技';
			}
			if ($xlsData[$k]['w1']== 3){
				$xlsData[$k]['w1']='金融|财经';
			}
			if ($xlsData[$k]['w1']== 4){
				$xlsData[$k]['w1']='电商|创业';
			}
			if ($xlsData[$k]['w1']== 5){
				$xlsData[$k]['w1']='广告|营销';
			}
			if ($xlsData[$k]['w1']== 6){
				$xlsData[$k]['w1']='搞笑|娱乐';
			}
			if ($xlsData[$k]['w1']== 7){
				$xlsData[$k]['w1']='女性|时尚';
			}
			if ($xlsData[$k]['w1']== 8){
				$xlsData[$k]['w1']='管理|职场';
			}

		}
		$this->exportExcel($xlsName,$xlsCell,$xlsData);

	}

}
