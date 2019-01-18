<?php
namespace app\admin\Controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/18
 * Time: 11:25
 */

class Common extends \think\Controller
{

    public function dbsel($db){
        $res = db($db)->select();
        return $res;
    }

}