<?php

namespace Yd\Controller;
use Think\Controller;

class EmController extends AuthController {

    //邮箱配置
    public function index()
    {
        $em = M('em')->where(array('id' => 1))->find();
        $this->assign('em', $em);
        $this->display(':em');
    }
    public function save()
    {
        $data['email_title']      = I('email_title', '');
        $data['email_host']      = I('email_host', '');
        $data['email_name']  = I('email_name', '');
        $data['email_user']  = I('email_user', '');
        $data['email_password'] = I('email_password', '');
        M('em')->where(array('id' => 1))->save($data);
        $this->success('修改成功', U('index'));
    }


    //Email
    public function email(){
        if (IS_POST) {
            $pz = get_em();
            $et = I('et');
            $eb = I('eb');
            $en = I('en');
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
            $this->success('测试发送成功！','index');
        } else {
            $this->error('错误','index');
        }
        } else {
            $this->error('非法访问！');
        }
    }

}