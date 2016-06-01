<?php
namespace Index\Model;
use Think\Model;
class UserModel extends Model 
{
	// 注册时表单中允许提交的字符
	protected $insertFields = array('username','qq','tel','email', 'password','xy');
	// 登录时使用的表单验证规则
	public $_login_validate = array(
	array('username', 'require', '用户名不能为空！', 1),
	array('username', '3,20', '用户名不得小于3位或大于15位！', 1, 'length'),
		array('password', 'require', '密码不能为空！', 1),
		array('password', '6,20', '密码必须是6-20位的字符！', 1, 'length'),
	);
	// 注册时的表单验证规则
	protected $_validate = array(
	    array('username', 'require', '用户名不能为空！', 1),
	     array('username', '3,20', '用户名不得小于3位或大于15位！', 1, 'length'),
		array('email', 'require', 'email不能为空！', 1),
		array('email', 'email', 'email格式不正确！', 1),
		array('qq', 'require', 'QQ号码不能为空！', 1),
		array('qq', 'number', 'QQ号码格式不正确！', 1),
		array('tel', 'require', '手机号码不能为空！', 1),
		array('tel', 'number', '手机号码格式不正确！', 1),
		array('password', 'require', '密码不能为空！', 1),
		array('password', '6,20', '密码必须是6-20位的字符！', 1, 'length'),
		array('xy', 'require', '从事行业不能为空！', 1),
		array('username', '', '用户名已经被注册过了！', 1, 'unique'),
		array('email', '', 'email已经被注册过了！', 1, 'unique'),
	);
	// 在会员记录插入到数据库之前
	protected function _before_insert(&$data, $option)
	{
		$data['zctime'] = time();  // 注册的当前时间
		// 先把会员的密码加密
		$data['password'] = md5($data['password'] . C('MD5_KEY'));
	}
	// 在会员注册成功之后
	protected function _after_insert($data, $option)
	{
		// heredoc的语法
		$content =<<<HTML
		<p>欢迎您成为本站会员。</p>
HTML;
		// 把生成的验证码发到会员的邮箱中
		
	}
	public function login()
	{
		$username = $this->username;
		$password = $this->password;
		$user = $this->where(array('username'=>array('eq', $username)))->find();
		if($user)
		{
				// 判断密码是否正确
				if($user['password'] == md5($password . C('MD5_KEY')))
				{
					session('uid', $user['uid']);
					session('username', $user['username']);
					return TRUE;
				}
				else 
				{
					$this->error = '密码不正确！';
					return FALSE;
				}
		}
		else 
		{
			$this->error = '账号不存在！';
			return FALSE;
		}
	}
}














