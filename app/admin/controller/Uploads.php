<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/10
 * Time: 11:28
 */
namespace app\admin\Controller;

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


}