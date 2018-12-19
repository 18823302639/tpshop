<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/19
 * Time: 15:55
 * 文章管理
 */
namespace app\admin\controller;
use \think\Controller;
use \think\Db;


class Article extends Controller
{

    public function index(){
        $arr = db('article')->select();
        $this->assign('arr',$arr);
        return $this->fetch();
    }

    public function article_add(){
        return $this->fetch();
    }

}