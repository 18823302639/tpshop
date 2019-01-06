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

    //文件上传
    public function uploads(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('article_thum');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>200000,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
           $article_thum = $info->getSaveName();
           $article_thum = str_ireplace('\\','/',$article_thum);
            return $article_thum;
        }else{
            // 上传失败获取错误信息
            return $file->getError();
        }

    }


    public function index($table){

        $arr = Db::table($table)->select();
        return $arr;
    }
    /******* 商品分类 ********/
    public function goods_msel($arr = [],$pid = 0,$laver = 0){

        $arr = $this->index('tp_goods');

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

    //商品分类删除
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
//        return $da;
        //去重
        return array_unique($da);

    }


    /******栏目管理*****/
    public function column_msel($arr = [],$id = '',$laver = ''){
        $arr = $this->index('tp_column');
        static $data = [];
        foreach($arr as $key=>$val){
            if($val['column_pid'] == $id){
                $val['laver'] = $laver;
                $data[] = $val;
                $this->column_msel($arr,$val['column_id'],$laver+1);
            }
        }
        return $data;
    }

    public function column_msele($arr = [],$id = 0,$laver = 0){

        static $data = [];
        foreach($arr as $key=>$val){
            if($val['column_pid'] == $id){
                $val['laver'] = $laver;
                $data[] = $val;
                $this->column_msele($arr,$val['column_id'],$laver+1);
            }
        }
        return $data;
    }

    //栏目删除
    public function column_mdel($arr = [] ,$id = '' ){

        static $res = [];
        $res[] = $id;
        foreach($arr as $key=>$val){
            if($val['column_pid'] == $id){
                $res[] = $val['column_id'];
                $arr[] = $val;
                $this->column_mdel($arr,$val['column_id']);
            }
        }
        return array_unique($res);
    }

}
