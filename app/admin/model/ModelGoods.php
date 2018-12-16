<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 17:46
 *
 */
namespace app\admin\Model;

use \think\Db;
use \think\Model;

class ModelGoods extends Model
{
    public function index(){
        $arr = Db::table('tp_goods')->select();
        return $arr;
    }

    public function goods_msel($arr = [],$pid = 0,$laver = 0){

        $arr = $this->index();

        static $data = [];

        foreach($arr as $key=>$val){

            if($val['goods_pid'] == $pid ){
                $val['laver'] = $laver;
                $data[] = $val;
                $this->goods_msel($arr,$val['goods_id'],$laver+1);
            }

        }
        return $data;

    }

    public function goods_mdel($id,$arr=[]){
        //获取栏目数据
        $arr = $this->index();
        //定义静态数组
        static $data = [];
        //
        $da[] = $id;

        foreach($arr as $key=>$val){

            if($val['goods_pid'] == $id){

                $data[] = $val;
                $da[] = $val['goods_id'];
                $this->goods_mdel($val['goods_id'],$arr);
            }

        }
        return $da;
        return array_unique($da);

    }

}
