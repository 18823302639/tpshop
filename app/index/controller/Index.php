<?php
namespace app\index\controller;
use \think\Controller;
use \think\Request;
use app\admin\Controller\Uploads;

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
}
