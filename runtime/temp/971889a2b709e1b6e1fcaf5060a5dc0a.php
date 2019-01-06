<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"E:\myphp_www\WWW\tpshop\public/../app/admin\view\article\index.html";i:1546749000;s:54:"E:\myphp_www\WWW\tpshop\app\admin\view\index\base.html";i:1546749000;}*/ ?>
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
        


    <fieldset class="layui-elem-field site-demo-button" style="margin-top: 30px;">
        <legend>文章列表</legend>
        <div>
            <button class="layui-btn layui-btn-primary">全选/反选</button>
            <a href="<?php echo url('Article/article_add'); ?>"><button class="layui-btn">添加文章</button></a>
            <button class="layui-btn layui-btn-danger">删除文章</button>
        </div>
    </fieldset>

    <div class="layui-form">
        <table class="layui-table">
            <colgroup>
                <col width="50">
                <col width="100">
                <col width="200">
                <col width="250">
                <col width="100">
                <col width="150">
                <col width="100">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th> 全选/反选 </th>
                <th> 缩略图 </th>
                <th> 标题 </th>
                <th> 内容 </th>
                <th> 作者 </th>
                <th> 分类 </th>
                <th> 操作 </th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td> <input class="input" type="checkbox"> </td>
                <td><img height="50px" src="/uploads/<?php echo $vo['article_thum']; ?>" alt=""> </td>
                <td><?php echo $vo['article_title']; ?></td>
                <td><?php echo $vo['article_text']; ?></td>
                <td><?php echo $vo['article_author']; ?></td>
                <td><?php echo $vo['article_type']; ?></td>
                <td>
                    <div class="layui-btn-group">
                        <button class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                        <button class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody>
        </table>
        <?php echo $arr->render(); ?>
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


</body>
</html>