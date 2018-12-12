<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/12
 * Time: 11:52
 */
namespace app\admin\controller;
use \think\Controller;
use \think\Request;

class Index extends Controller
{

    //模板继承
    public function base(){
        return $this->fetch();
    }

    //会员信息
    public function member(){
        return $this->fetch();
    }

    //添加会员信息
    public function member_add(){
        if(Request::instance()->isPost()){
            $data = input('post./a');
            return $data;
        }
        return $this->fetch();
    }

    //首页
    public function index(){
        return $this->fetch();
    }



}
