<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"E:\myphp_www\WWW\tpshop\public/../app/admin\view\index\member.html";i:1546749000;s:54:"E:\myphp_www\WWW\tpshop\app\admin\view\index\base.html";i:1546749000;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/layui/css/style.css">
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">layui 后台布局</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="<?php echo url('Goods/index'); ?>">商品管理</a></li>
            <li class="layui-nav-item"><a href="<?php echo url('Index/member'); ?>">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    <?php echo \think\Session::get('name'); ?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a  onclick="unset()">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">控制面板</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item ">
                    <a class="" href="javascript:;">文档管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('Article/column_index'); ?>">栏目管理</a></dd>
                        <dd><a href="<?php echo url('Article/index'); ?>">文章列表</a></dd>
                        <dd><a href="<?php echo url('Article/category_index'); ?>">类别管理</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item ">
                    <a class="" href="javascript:;">系统管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo url('Index/member'); ?>">用户管理</a></dd>
                        <dd><a href="javascript:;">角色管理</a></dd>
                        <dd><a href="javascript:;">权限管理</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">解决方案</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">友情链接</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">云市场</a></li>
                <li class="layui-nav-item"><a href="">发布商品</a></li>
            </ul>
        </div>
    </div>
    <div class="layui-body" style="padding:25px;">
        

    <div class="layui-container-fluid">
        <div class="layui-row ">
            <div class="layui-col-md6">
                <div class="layui-elem-quote ">搜索框</div>
                <button data-method="notice" class="layui-btn ">示范一个公告层</button>
            </div>
            <div class="layui-col-md12 ">
                <div class="layui-elem-quote ">
                    <a href="http://www.layui.com" class="layui-btn layui-btn-normal">删除会员</a>
                    <a href="<?php echo url('Index/member_add'); ?>" class="layui-btn layui-btn-warm">添加会员</a>
                </div>
            </div>

            <table class="layui-table">
                <colgroup>
                    <col width="250">
                    <col width="300">
                    <col width="600">
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>注册时间</th>
                    <th>用户密码</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['member_name']; ?></td>
                    <td><?php echo $vo['member_time']; ?></td>
                    <td><input class="layui-input" type="text" value="<?php echo $vo['member_pwd']; ?>"></td>
                    <td><a class="layui-btn notice"  >删除</a> <a href="" class="layui-btn ">修改</a> <input type="hidden" name="member_id" value="<?php echo $vo['member_id']; ?>"> </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td>许闲心</td>
                    <td>2016-11-28</td>
                    <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
                    <td><a  class="layui-btn notice">删除</a> <a href="" class="layui-btn ">修改</a> </td>
                </tr>
                <tr>
                    <td>许闲心</td>
                    <td>2016-11-28</td>
                    <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
                    <td><a  class="layui-btn notice">删除</a> <a href="" class="layui-btn ">修改</a> </td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php echo $page; ?>


    </div>



    </div>


    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
    <a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action"> 公共查询 </a>
</div>
<script src="/layui/layui.js"></script>

<script>

    //JavaScript代码区域
    layui.use(['element','form'], function(){
        var element = layui.element,
            form = layui.form;

    });

    function unset(){
        var url = "<?php echo url('Index/unse'); ?>";
        $.ajax({
           url:url,
           type:'post',
           success:function(){
               window.location = "<?php echo url('Index/login'); ?>";
           }
        });
    }

</script>

<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script>
    window.onload = init;
    function init(){
        $('input').prop({'disabled':'disabled'});
    };

    layui.use('layer', function(){ //独立版的layer无需执行这一句
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句

        //触发事件
        $('.notice').on('click',function(){
                //示范一个公告层
            layer.msg('你确定要删除吗？', {
                time: 0 //不自动关闭
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    layer.close(index);
                    var url = "<?php echo url('Index/member_del'); ?>";
                    var data = $("input[name='member_id']").val();
                    console.log(data);
                    $.ajax({
                        url:url,
                        type:'post',
                        dataType:'json',
                        data:{id:data},
                        success:function(succ){
                            //console.log('成功：'+succ);
                            layer.msg("删除成功",{icon:6});

                        },
                        error:function(error){
                            console.log('错误：'+error);
                        }

                    });

                    // layer.msg('雅蠛蝶 O.o', {
                    //     icon: 6
                    //     ,btn: ['嗷','嗷','嗷']
                    // });
                }
            });

        });





    });
</script>


</body>
</html>