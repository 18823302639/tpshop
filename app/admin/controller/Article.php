<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/19
 * Time: 15:55
 * 文章、栏目、类别管理
 */
namespace app\admin\controller;
use app\admin\Model\ModelGoods;
use \think\Controller;

class Article extends Controller
{

    public function index(){
        $arr = db('article')->order('article_time desc')->paginate(10);
        $this->assign('arr',$arr);
        return $this->fetch();
    }


    //添加文章
    public function article_add(){

        if(request()->isPost()){
            $data = input('post.');
            $mc = new ModelGoods();
            $article_thum = $mc->uploads();
            $data['article_time'] = date('Y-m-d H:i:s',time());
            $data['article_thum'] = $article_thum;
            $res = db('article')->insert($data);
            if($res){
                $this->success("添加成功",url('Article/index'));
            }else{
                $this->error("添加失败".$data['article_thum']);
            }

        }
        return $this->fetch();
    }

    //*****栏目管理********/
    public function column_index(){
        $mc = new ModelGoods();
        $arr = db('column')->alias('co')
                        ->join("category ca","co.category_id = ca.category_id ")
                        ->select();
        $data = $mc->column_msele($arr);

        $this->assign("arr",$data);

        return $this->fetch();

    }

    //编辑栏目内容
    public function column_edit($id = ''){

        if(request()->isPost()){

            $data = input("post.");
            $sql = db('column_content')->where("column_id",$data['column_id'])->find();
            if($sql){
                $res = db('column_content')->where("content_id",$sql['content_id'])->update($data);
            }else{
                $res = db('column_content')->insert($data);
            }
            if($res){
                $this->success("编辑栏目成功",url('Article/column_index'));
            }else{
                $this->error("编辑栏目失败");
            }
        }

        $arra = db('column')->alias('co')
                            ->join("category ca","co.category_id = ca.category_id")
                            ->join("column_content coc","co.column_id = coc.column_id",'LEFT')
                            ->fetchSql(false)
                            ->where("co.column_id",$id)
                            ->find();
//        print_r($arra);die;
        $list = db('category')->select();
        $this->assign("arra",$arra);
        $this->assign("list",$list);
        return $this->fetch();
    }
    
    //栏目添加
    public function column_add(){
        if(request()->isPost()){
            $data = input('post.');
            $data['column_time'] = date("Y-m-d H:i:s",time());
            $res = db('column')->insert($data);
            if($res){
                $this->success("添加栏目成功",url('Article/column_index'));
            }else{
                $this->error("添加栏目失败");
            }
        }
        $mc = new ModelGoods();
        $arr = $mc->column_msel('tp_article');
        $list = db('category')->select();
//        print_r($arr);die;
        $this->assign("arr",$arr);
        $this->assign("list",$list);
        return $this->fetch();
    }

    //删除栏目
    public function column_del($id = ''){

        $arr = db('column')->select();
        $mc = new ModelGoods();
        $res = $mc->column_mdel($arr,$id);
        $sql = db('column')->delete($res);
        if($sql){
            $this->success("删除成功",url('Article/column_index'));
        }else{
            $this->error("删除失败");
        }

    }




    //******类别管理*******/
    public function category_index(){
        $arr = db('category')->select();
        $this->assign('arr',$arr);
        return $this->fetch();
    }

    public function category_add(){
        if(request()->isPost()){
            $data = input("post.");
            $res = db('category')->insert($data);
            if($res){
                $this->success("添加类别成功",url('Article/category_index'));
            }else{
                $this->error("添加类别失败");
            }
        }
        return $this->fetch();
    }



}