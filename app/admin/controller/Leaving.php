<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/8
 * Time: 15:30
 */
namespace app\admin\Controller;

use think\Controller;
use think\Request;

class Leaving extends Controller
{
    public function index(){
        $arr = db("leaving")->select();
        $this->assign("arr",$arr);
        return view("website/leav_index");
    }

    public function leav_sel($id){

    }

    public function leav_del($id){
        $res = db('leaving')->delete($id);
        if($res){
            $this->success("删除成功",url('Leaving/index'));
        }else{
            $this->error("删除失败");
        }
    }

}