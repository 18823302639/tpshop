<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/10
 * Time: 11:28
 */
namespace app\admin\Controller;
use \phpmailer\PHPMailer;

class Uploads extends \think\Controller
{

    //上传文件类
    public function uplod($file,$allowExt,$maxsize){
        //接收上传文件信息,临时信息
//        $file = $_FILES['leaving_file'];
        $filename = $file['name'];
        $filetmp_name = $file['tmp_name'];
        $filesize = $file['size'];
        $error=$file["error"];

        //服务端文件限制
//        $maxsize = 10485760; //10M,10*1024*1024
//        $allowExt = array('jpeg','jpg','png','text','tif','xls','xlsx','pdf','doc','docx'); //允许上传文件的扩展名
        $ext = pathinfo($filename,PATHINFO_EXTENSION); //提取上传文件的拓展名

        //文件存放路径
        $path = "uploads/".date("Ymd",time());
        if(!file_exists($path)){
            mkdir($path,0777,true); //创建目录
            chmod($path,0777); //改变权限
        }
        //得到唯一扩展名
        $uniName = md5(uniqid(microtime(true),true)).".".$ext; //md5加密，uniqid做唯一id，microtime做前缀

        //文件存放路径
        $destion = $path."/".$uniName ;

        //当文件上传成功进行判断
        if($error == 0){
            if($filesize>$maxsize){
                exit("上传文件过大");
            }
            if(!in_array($ext,$allowExt)){
                exit("上传的文件格式不对，请您重新上传");
            }
            //检查是否是真实的图片
//            if(!getimagesize($filetmp_name)){ //getimagesize 真实返回数组，否则返回false
//                exit("不是真正的图片类型");
//            }
            if(@move_uploaded_file($filetmp_name,$destion)){ //@抑制错误

            }else{
                echo "文件".$filename."上传失败";
            }

        }else{
            switch($error){
                case 1:
                    echo "超过了上传文件的最大值，请上传2M以下文件";
                    break;
                case 2:
                    echo "上传文件过多，请一次上传20个及以下文件！";
                    break;
                case 3:
                    echo "文件并未完全上传，请再次尝试！";
                    break;
                case 4:
                    echo "未选择上传文件！";
                    break;
                case 7:
                    echo "没有临时文件夹";
                    break;
            }
        }
        return $destion;
    }

    //
    public function xiazfile($id){
        $file = db('leaving')->where("leaving_id",$id)->field('leaving_file')->find();
        $fileName = $file['leaving_file'];
        header( "Content-Disposition:  attachment;  filename=".$fileName); //告诉浏览器通过附件形式来处理文件
        header('Content-Length: ' . filesize($fileName)); //下载文件大小
        readfile($fileName);  //读取文件内容
    }

    public function email($name,$user,$host,$port,$password,$toname,$title,$content){

        $mail = new PHPMailer();//实例化PHPMailer核心类
             $mail->SMTPDebug = 1;//是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        $mail->IsSMTP();//使用smtp鉴权方式发送邮件
        $mail->SMTPAuth = true;//smtp需要鉴权 这个必须是true
        $mail->Host = $host;//链接qq域名邮箱的服务器地址
        $mail->SMTPSecure = 'ssl';//设置使用ssl加密方式登录鉴权
        $mail->Port = $port;//设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
        $mail->CharSet = 'UTF-8';//设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
        $mail->FromName = $name; //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->Username = $user;//smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Password = $password;//smtp登录的密码 使用生成的授权码（就刚才叫你保存的最新的授权码）【非常重要：在网页上登陆邮箱后在设置中去获取此授权码】
        $mail->From = $user;//设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
        $mail->isHTML(true);//邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
        $mail->addAddress($toname);//设置收件人邮箱地址
        $mail->Subject = $title;//添加该邮件的主题
        $mail->Body = $content;//添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
        //简单的判断与提示信息
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }


}