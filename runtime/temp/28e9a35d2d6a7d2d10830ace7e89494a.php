<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\myphp_www\WWW\tpshop\public/../app/admin\view\article\column_index.html";i:1546758001;s:54:"E:\myphp_www\WWW\tpshop\app\admin\view\index\base.html";i:1546749000;}*/ ?>
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
        

<div class="layui-col-md12">
    <div class="layui-elem-quote ">栏目列表</div>
</div>
<div class="layui-col-md12 ">
    <div class="layui-elem-quote ">
        <a href="http://www.layui.com" class="layui-btn layui-btn-normal">删除栏目</a>
        <a href="<?php echo url('Article/column_add'); ?>" class="layui-btn layui-btn-warm">添加栏目</a>
    </div>
</div>
<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="250">
        <col width="500">
        <col width="500">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>全选/全不选</th>
        <th>栏目名</th>
        <th>栏目类别</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><input type="checkbox" name=""></td>
        <td> <?php echo str_repeat('——',$vo['laver']); ?><?php echo $vo['column_center']; ?></td>
        <td> <?php echo $vo['category_name']; ?> </td>
        <td><?php echo substr($vo['column_time'],0,10); ?></td>
        <td>
            <a href="<?php echo url('Article/column_edit',['id'=>$vo['column_id']]); ?>" class="layui-btn notice">编辑</a>
            <a href="<?php echo url('Article/column_del',['id'=>$vo['column_id']]); ?>" class="layui-btn notice">删除</a>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>

    </tbody>
</table>


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


</body>
</html>