<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/12
 * Time: 11:52
 * 会员操作
 */
namespace app\admin\controller;
use \think\Controller;
use \think\Request;
use \think\Db;
use \think\Session;

class Index extends Controller
{

    public function __construct(){
        parent::__construct();
//        if(!Session::has('name')){
//            $this->error("您还为登陆，请登陆",url('Index/login'));
//        }
    }


    //模板继承
    public function base(){
        return $this->fetch();
    }

    //会员信息
    public function member(){
        $arr = Db::table('tp_member')->order('member_id asc')->paginate(15);
        // 获取分页显示
        $page = $arr->render();
        // 模板变量赋值
        $this->assign('page', $page);
        $this->assign('arr',$arr);
        return $this->fetch();
    }

    //添加会员信息
    public function member_add(){
        if(Request::instance()->isPost()){
            $data = input('post.');
            $data['member_time'] = date("Y:m:d H-i-s",time());
            $data['member_pwd'] = md5($data['member_pwd']);
            $res = Db::name('member')->insert($data);
            if($res){
                $this->success("添加成功",url('Index/member'));
            }else{
                $this->error(error."添加失败，请重试");
            }
        }
        return $this->fetch();
    }

    public function member_upd(){
        if(Request::instance()->isPost()){
            $data = input('post');

            $res = Db::name('member')->where()->update();

        }
    }

    public function member_del(){
        $data = input('post.');
//        print_r($data);die;
        $res = Db::table('tp_member')->delete($data);
        if($res){
            return $arr = Db::table('tp_member')->order('member_id asc')->paginate(15);
        }else{
            return false;
        }
    }

    //首页
    public function index(){

        return $this->fetch();
    }

    //登陆
    public function login(){
        if(Request::instance()->isPost()){
//            echo 444;die;
            $data = input('post.');
            $data['member_pwd'] = md5($data['member_pwd']);
            $res = Db::table('tp_member')->where($data)->select();
            if($res){
                Session::set('name',$data['member_name']);
                $this->success("登陆成功，正在跳转，请稍等……",url('Index/index'));
            }else{
                $this->error("用户名或者密码错误");
            }
        }
        return $this->fetch();
    }

    public function unse(){
        Session::delete('name');
    }

}
