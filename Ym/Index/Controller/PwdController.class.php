<?php
namespace Index\Controller;
use Think\Controller;
class PwdController extends BaseController {
	public function index() {
		$this -> display(':pwd');
	}


	public function pm() {
		$uid = session('uid');
		if (!$uid <1) {
			$this -> success('您已经登录, 正在跳转.....！', '/index/user/index');
			exit ;
		}
		if (IS_POST) {
			$post=I('post.');
			$username = $post['username'];

			if ($username == '') {
				$post['msg']='用户名不能为空';
				$post['status']=0;
				$this->ajaxReturn($post,'json',true);
			}

			$user = M('user')->where(array('username' => $username))->find();

			if (!$user) {
				$post['msg']='用户名不存在';
				$post['status']=0;
				$this->ajaxReturn($post,'json',1);
			}else{
				$pz = get_em();
				$et = $user['email'];
				$eb = get_config_value('site_title').'找回密码服务';
				$wz = get_config_value('site_url');
				$oldnum=rand(10000,99999);//获取一串随机数
				$num=md5($oldnum);//对随机数进行加密后传递
				$emailpwd=M('user')->where(array('username'=>$username))->setField('mdemail',$num);
				$en = "尊敬的用户，您好：<br>您当前的操作为找回密码，请点击以下链接重新设置密码<br><a href=$wz/pwd/checkpwd/emailpwd/$num.html>$wz/pwd/checkpwd/emailpwd/$num.html</a>";
				//邮件发送服务器
				$emailHost= $pz['email_host'];
				$emailPort='25';
				$emailTimeout='20';
				$emailUserName= $pz['email_name'];
				$emailPassword= $pz['email_password'];
				$emailFormName= $pz['email_title'];
				$toemail= $et;
				$subject= $eb;
				$message= $en;
				Vendor('mailer.EMailer');
				$mailer=new \EMailer();
				$mailer->SetLanguage('zh_cn');
				$mailer->Host = $emailHost;
				$mailer->Port = $emailPort;
				$mailer->Timeout = $emailTimeout;
				$mailer->ContentType = 'text/html';//设置html格式
				$mailer->SMTPAuth = true;
				$mailer->Username = $emailUserName;
				$mailer->Password = $emailPassword;
				$mailer->IsSMTP ();
				$mailer->From = $mailer->Username; // 发件人邮箱
				$mailer->FromName =$emailFormName;
				$mailer->AddReplyTo ( $mailer->Username );
				$mailer->CharSet = 'UTF-8';

				// 发送邮件
				$mailer->AddAddress ( $toemail );
				$mailer->Subject = $subject;
				$mailer->Body = $message;
				if ($mailer->Send () === true) {
					$post['msg']='找回密码邮件已经发送到你的邮箱';
					$post['status']=1;
					$this->ajaxReturn($post,'json',1);
				} else {
					$post['msg']='邮件发送失败,请联系管理员！';
					$post['status']=0;
					$this->ajaxReturn($post,'json',1);
				}
			}
		}else {
			$this->error('非法访问！');
		}
	}

	public function pwc() {
		$this -> display(':pwc');
	}

	//打开修改密码页面
	public function pwb(){
		$admin_mdemail=I('emailpwd');
		$this->assign('mdemail',$admin_mdemail);
		$this->display(':pwb');
	}

	//修改密码操作
	public function pwg(){
		if (IS_POST) {
		$admin_mdemail=I('mdemail');//获取加密过后的随机值
			$pwd = I('password');
			$pwds = I('passwords');
			if(strlen($pwd) < 5 || strlen($pwds) > 20) {
				$post['msg']='密码长度不正确 长度：6-16个字符!';
				$post['status']=0;
				$this->ajaxReturn($post,'json',1);
			}
			if($pwd != $pwds) {
				$post['msg']='确认密码不正确!';
				$post['status']=0;
				$this->ajaxReturn($post,'json',1);
			}else{
				$admin_pwd= I('password','','md5'. C('MD5_KEY'));//获取新密码，并且加密
			}
		$checkadmin=M('user')->where(array('mdemail'=>$admin_mdemail))->find();//验证用户是否存在
		if(!$checkadmin){
			$post['msg']='邮箱不存在！';
			$post['status']=0;
			$this->ajaxReturn($post,'json',1);
		}else{
			$admin=M('user')->where(array('mdemail'=>$admin_mdemail))->setField('password',$admin_pwd);
			$post['msg']='密码修改成功';
			$post['status']=1;
			$this->ajaxReturn($post,'json',1);
		}

		}

	}

}
