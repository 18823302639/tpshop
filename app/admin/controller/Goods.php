<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 16:44
 * 商品
 */

namespace app\admin\controller;

use app\admin\model\ModelGoods;
use \think\Db;
use \think\Request;

class Goods extends Index
{
    public function index(){
        $mc = new ModelGoods();
        $arr = $mc->goods_msel();
        $this->assign("arr",$arr);
        return $this->fetch();
    }

    public function goods_cate(){
        $arr = Db::table('tp_goods')->select();
        return $arr;
    }

    //添加商品类别
    public function goods_add(){
        if(Request::instance()->isPost()){
            $data = input('post.');
            $res = Db::table('tp_goods')->insert($data);
            if($res){
                $this->success("添加成功",url('Goods/index'));
            }else{
                $this->error('添加失败');
            }
        }
        //获取所有栏目
        $arr = $this->goods_cate();
        $this->assign('arr',$arr);
        return $this->fetch();
    }

    //修改栏目
    public function goods_upd(){

    }

    //删除栏目
    public function goods_del($id){

        $mc = new ModelGoods();
        $arr = $mc->goods_mdel($id);
        $res = Db::table('tp_goods')->delete($arr);

        if($res){
            $this->success("删除成功",url('Goods/index'));
        }else{
            $this->error("删除失败");
        }

    }



}
