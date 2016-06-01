<?php
namespace Index\Controller;
use Think\Controller;
class SoController extends SbseController {
	public function index() {
		$this->selectCon();
      $this->display(':so');
    }
	public function selectCon(){
		// 获取带翻页的数据
			$model = D('Data');
			$data = $model->sousuo();
			foreach($data['data'] as $k =>$v){
				 switch($v['w7']){
				 	case '1':$data['data'][$k]['url']="<a href='http://weibo.com/".$v['w2']."' title='".点击进入查看."'>".$v['w2']."</a>";break;
					case '2':$data['data'][$k]['url']=$v['w2'];break ;
					case '3':$data['data'][$k]['url']="<a href='https://www.zhihu.com/people/".$v['w2']."' title='".点击进入查看."'>".$v['w2']."</a>";break;
					case '4':$data['data'][$k]['url']=$v['w2'];break ;
				 }
			}
		$this->assign(array(
				'data' => $data['data'],
				'page' => $data['page'],
				'yq' => $data['yq']));
	}
}