<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/6
 * Time: 21:23
 */
namespace app\admin\Controller;

use think\Controller;
use think\Request;

class Link extends Controller
{
    //查看友情链接
    public function index(){
        $arr = db("link")->select();
        $this->assign("arr",$arr);
        return view();
    }

    //编辑友情链接
    public function edit($id = ''){

        if(request()->isPost()){
            if($id == ''){

            }else{

            }
        }
        $arr = db("link")->select();
        $this->assign("arr",$arr);
        return view();

    }

    //删除友情链接
    public function del(){

    }

}