<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"E:\myphp_www\WWW\tpshop\public/../app/admin\view\article\column_edit.html";i:1546765517;s:54:"E:\myphp_www\WWW\tpshop\app\admin\view\index\base.html";i:1546749000;}*/ ?>
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
        

<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;endforeach; endif; else: echo "" ;endif; ?>
<form class="layui-form" action="<?php echo url('Article/column_edit'); ?>" method="post">
    <input name="column_id" type="hidden" value="<?php echo $arra['column_id']; ?>">

    <div class="layui-form-item">
        <label class="layui-form-label">选择栏目</label>
        <div class="layui-input-block">
            <select name="column_pid" lay-verify="required" disabled="disabled">

                <option value="<?php echo $arra['column_id']; ?>"><?php echo $arra['column_center']; ?></option>

            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">栏目类别</label>
        <div class="layui-input-block">
            <select name="category_id" disabled="disabled" >
                <option value="<?php echo $arra['category_id']; ?>" ><?php echo $arra['category_name']; ?></option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">栏目名称</label>
        <div class="layui-input-block">
            <input type="text" name="column_center" disabled="disabled"  lay-verify="required"  autocomplete="off" class="layui-input" value="<?php echo $arra['column_center']; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">SEO标题</label>
        <div class="layui-input-block">
            <input type="text" name="content_stitle" required  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input" value="<?php echo $arra['content_stitle']; ?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">SEO关键字</label>
        <div class="layui-input-block">
            <input type="text" name="content_sdesc" required  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input" value="<?php echo $arra['content_skeyw']; ?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">SEO描述</label>
        <div class="layui-input-block">
            <textarea name="content_skeyw" placeholder="请输入内容" class="layui-textarea"><?php echo $arra['content_sdesc']; ?></textarea>
        </div>
    </div>

    <div class="layui-form-item ">
        <label class="layui-form-label">文本域</label>
        <div class="layui-input-block">
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content_text" type="text/plain">
                <?php echo $arra['content_text']; ?>
            </script>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>

</form>

<!-- 配置文件 -->
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');

</script>


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