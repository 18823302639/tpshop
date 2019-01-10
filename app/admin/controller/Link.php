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
        return view("website/link_index");
    }

    //编辑友情链接
    public function link_edit($id = ''){
        if(request()->isPost()){
            $lid = input('post.link_id');
            $data['link_name'] = input('post.link_name');
            $data['link_url'] = input('post.link_url');
            if($lid != ''){
                $res = db('link')->where('link_id',$lid)->update($data);
            }else{
                $res = db('link')->insert($data);
            }

            if($res){
                $this->success("编辑成功",url('Link/index'));
            }else{
                $this->error("编辑失败");
            }
        }
        $arr = db("link")->where('link_id',$id)->find();
        $this->assign("arr",$arr);
        return view("website/link_edit");

    }

    //删除友情链接
    public function del($id){
        $res = db('link')->delete($id);
        if($res){
            $this->success("删除成功",url('Link/link_index'));
        }else{
            $this->error("删除失败");
        }
    }

}