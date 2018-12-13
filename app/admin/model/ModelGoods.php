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
//        echo count($arr);die;
        static $data = [];

        foreach($arr as $key=>$val){

            if($val['goods_pid'] == $pid ){
                $data['laver'] = $laver;
                $data[] = $val;
                $this->goods_msel($arr,$val['goods_id'],$laver+1);
            }

        }
        return $data;

    }

}
