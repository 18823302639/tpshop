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
        return view();
    }

    public function add(){

    }

    public function column(){
        $column_id = $_GET['column_id'];
        
        $this->fetch('column');
    }
}
