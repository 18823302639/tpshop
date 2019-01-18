<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/8
 * Time: 17:38
 */
namespace app\admin\Controller;

use phpmailer\PHPMailer;
use app\admin\Controller\Uploads;
use app\admin\Controller\Common;

class Files extends Common
{

    public function xiazfile(){
        $fileName = $_GET['filename']; //得到文件名
        header( "Content-Disposition:  attachment;  filename=".$fileName); //告诉浏览器通过附件形式来处理文件
        header('Content-Length: ' . filesize($fileName)); //下载文件大小
        readfile($fileName);  //读取文件内容
    }

    //配置邮箱参数
    public function emails()
    {
        if(request()->isPost()){
            $data = input('post.');
            $arr = $this->dbsel('email');
            if(empty($arr)){
                $sql = db('email')->insert($data);
            }else{
                $sql = db('email')->fetchSql(false)->where("email_id",$arr[0]['email_id'])->update($data);
            }
            if($sql){
                $this->success("配置成功");
            }else{
                $this->error("配置失败");
            }
        }
        $arr = $this->dbsel('email');
//        print_r($arr);die;
        $this->assign("arr",$arr);
        return view("website/email");

    }

    //发送邮箱
    public function emailFn(){
        $arr = $this->dbsel('email');
        foreach($arr as $key=>$val){
            $val;
        }
        $name   = $val['email_name'];   //邮箱发件人
        $user   = $val['email_user'];   //发件人邮箱（qq号）
        $host   = $val['email_host'];   //服务器地址 smtp.qq.com
        $port   = $val['email_port'];   //服务器端口
        $pwd    = $val['email_pwd'];    //邮箱授权码
        $toname = $val['email_toname']; //收件人邮箱
        $title  = $val['email_title'];  //邮件主题
        $content= $val['email_content'];//邮件正文
        $mc = new Uploads();
        $aa = $mc->email($name,$user,$host,$port,$pwd,$toname,$title,$content);
        if($aa){
            return true;
            $this->success("发送成功",url('Files/emails'));
        }else{
            return false;
            $this->error("发送失败");
        }
    }


}