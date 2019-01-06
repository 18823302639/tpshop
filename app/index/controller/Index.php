<?php
namespace app\index\controller;
use \think\Controller;


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


    public function add(){

    }

    public function column(){
        $column_id = $_GET['column_id'];

        $this->fetch('column');
    }
}
