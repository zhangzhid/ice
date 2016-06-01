<?php
namespace Index\Controller;
use Think\Controller;
class UserController extends BaseController {
	public function index() {
		$uid = session('uid');
		if (!$uid) {
		$this -> success('你还未登录,前往登录页面！', '/index/user/login');
		exit ;
		}
		$user = M('user') ->where(array('uid' => $uid)) -> find();
		$notes = M('notes'); // 实例化User对象
		$count= $notes->where(array('uid' => $uid))->count();// 查询满足要求的总记录数
		$Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 (共%TOTAL_ROW%条)');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$show       = $Page->show();// 分页显示输出
		$list = $notes->where(array('uid' => $uid))->order('rtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this ->assign('user', $user);
		$this ->assign('notes', $list);
		$this->assign('page',$show);
		$this -> display(':user');
	}

	public function reg() {
		$uid = session('uid');
		if (!$uid <1) {
			$this -> success('您已经登录, 正在跳转.....！', '/index/user/index');
			exit ;
		}
		if (IS_POST) {
			$model = D('User');
			if ($model -> create(I('post.'), 1)) {
				if ($model -> add()) {
					$post['msg']='注册成功';
					$post['status']=1;
					$this->ajaxReturn($post,'json',1);
				}
			}
			$post['msg']= $model -> getError();
			$post['status']=0;
			$this->ajaxReturn($post,'json',1);
		}
		$this -> display(':reg');
	}

	public function login() {
		$uid = session('uid');
		if (!$uid <1) {
			$this -> success('您已经登录, 正在跳转.....！', '/index/user/index');
			exit ;
		}
		if (IS_POST) {
		$post=I('post.');
		$username = $post['username'];
		$password = $post['password'];

		if ($username == '' || $password == '') {
			$post['msg']='用户名或密码不能为空';
			$post['status']=0;
			$this->ajaxReturn($post,'json',true);
		}

		$user = M('user')->where(array('username' => $username))->find();

		if (!$user || ($user['password'] != md5($password. C('MD5_KEY')))) {
			$post['msg']='用户名或密码错误';
			$post['status']=0;
			$this->ajaxReturn($post,'json',1);
		}else{
			//保存Session
			session('uid', $user['uid']);
			session('username', $username);
			$post['msg']='登录成功';
			$post['status']=1;
			$this->ajaxReturn($post,'json',1);

		}
		}
		$this -> display(':login');
	}

	public function logout() {
		session('uid', null);
		session('username', null);
		$this -> success('退出成功！', '/');
	}

	    public function mi(){
			$uid = session('uid');
			if (!$uid) {
				$this -> success('你还未登录,前往登录页面！', '/index/user/login');
				exit ;
			}
	   	if (IS_POST) {
	   		$id =session('uid');
            $old_pwd = I('post.old_pwd');
            $new_pwd = I('post.new_pwd');
            $re_pwd = I('post.re_pwd');
            if($new_pwd != $re_pwd || strlen($new_pwd) < 5 || strlen($new_pwd) > 20) {
                $this->error('新密码格式错误或不一致！');
            }
			$db = M('user');
            $user = $db->find($id);
            if(md5($old_pwd . C('MD5_KEY')) != $user['password']) {
                $this->error('原始密码错误！');
            }
            if ($db->where(array('uid' => $id))->save(array('password' => md5($new_pwd . C('MD5_KEY')))) !== false) {
                $this->success('密码修改成功！');
            } else {
                $this->error('密码修改失败！');
            }
        } else {
        	$this->error('非法访问！');
        }
    }

	public function buy() {
		$uid = session('uid');
		if (!$uid) {
			$this -> success('你还未登录,前往登录页面！', '/index/user/login');
			exit ;
		}
		$buy = M('news')->where(array('id' => 1))->find();
		$this -> assign('buy', $buy);
		$this -> display(':buy');
	}

}
