<?php
namespace app\index\controller;
use \think\Controller;
use \think\Request;
use app\admin\Controller\Uploads;
//引入云之讯短信类
use \sms\UcpaasClass;

class Index extends Controller
{
    public function index()
    {
        $arr = db("column")->select();
        $this->assign("arr",$arr);
        return view();
    }

    public function base(){
        $arr = db("column")->select();
        $this->assign("arr",$arr);
    }

    public function the_base(){
        $arr = db("column")->select();
        $this->assign("arr",$arr);
    }

    public function about($id = ''){

        $res = db('column')->alias('co')
                        ->join("column_content coc","co.column_id = coc.column_id","LEFT")
                        ->where("co.column_id",$id)
                        ->find();
        $this->base();
        $this->assign("res",$res);
        return view();


    }

    //留言、文件上传
    public function worte(){
        if(request()->isPost()){
            $mc = new Uploads();
            $file = $_FILES['leaving_file'];
            //文件大小
            $size = 10000;
            //上传文件格式
            $extarr = array('jpeg','jpg','png','txt','tif','xls','xlsx','pdf','doc','docx');
            $path = $mc->uplod($file,$extarr,$size);
            $data = input("post.");
            $data['leaving_file'] = $path;
            $res = db('leaving')->insert($data);
            if($res){
                $this->success("您的留言已经提交");
            }else{
                $this->error("写入失败");
            }
        }
        $this->base();
        return view();
    }

    public function add(){

    }

    public function column(){
        $column_id = $_GET['column_id'];

        $this->fetch('column');
    }

    public function sms(){
        if(request()->isPost()){
            //初始化必填
            //填写在开发者控制台首页上的Account Sid
            $options['accountsid'] = '08e9739a5c725147a91c8c180e24c277';
            //填写在开发者控制台首页上的Auth Token
            $options['token'] = '91fb59c67b4f90c58dfd19ef15b84020';

            //初始化 $options必填
            $ucpass = new \sms\UcpaasClass($options);

            $appid = "26bca8343ca34783a0213d20f8c100d1";	//应用的ID，可在开发者控制台内的短信产品下查看
            $templateid = "395397";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
            $param = $_POST['yzm']; //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
            $mobile = $_POST['yzmtel'];
            $uid = "";

            //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

            echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);


        }
        return view("sms/index");
    }
}
