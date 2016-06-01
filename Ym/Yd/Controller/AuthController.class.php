<?php
namespace Yd\Controller;
use Think\Controller;
class AuthController extends Controller {
	public function _initialize() {
    	 $config_list = get_config_value();
        $this->assign('config_list', $config_list);
		$admin_id = session('admin_id');
		if (!$admin_id) {
			$this -> redirect(__MODULE__.'/Login/index');
		}
	}

}