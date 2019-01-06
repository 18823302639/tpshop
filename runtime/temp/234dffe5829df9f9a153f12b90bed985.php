<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"E:\myphp_www\WWW\tpshop\public/../app/admin\view\article\article_add.html";i:1545307263;s:54:"E:\myphp_www\WWW\tpshop\app\admin\view\index\base.html";i:1545307263;}*/ ?>
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
                        <dd><a href="javascript:;">列表一</a></dd>
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
        

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>默认风格的Tab</legend>
</fieldset>
<form action="<?php echo url('Article/article_add'); ?>" method="post" class="layui-form" enctype="multipart/form-data" >
<div class="layui-tab">

    <ul class="layui-tab-title">
        <li class="layui-this">文章内容</li>
        <li>SEO管理</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">


                <div class="layui-form-item">
                    <label class="layui-form-label">文章标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="article_title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">文章类型</label>
                    <div class="layui-input-block">
                        <select name="article_type" lay-filter="aihao">
                            <option value=""></option>
                            <option value="0">写作</option>
                            <option value="1">阅读</option>
                            <option value="2">游戏</option>
                            <option value="3">音乐</option>
                            <option value="4">旅行</option>
                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">文章作者</label>
                        <div class="layui-input-inline">
                            <input type="tel" name="article_author"  autocomplete="off" placeholder="一叶知秋" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">文章来源</label>
                        <div class="layui-input-inline">
                            <input type="text" name="article_source"  autocomplete="off" placeholder="中港星" class="layui-input">
                        </div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">文章封面图</label>
                    <input id="file" type="file" name="article_thum">
                    <div class="layui-inline layui-word-aux">
                        限制在2M以内
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">文本域</label>
                    <div class="layui-input-block">
                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="article_text" type="text/plain">

                        </script>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit"  class="layui-btn"  lay-filter="demo1">立即提交</button>
                    </div>
                </div>


        </div>
        <div class="layui-tab-item">

                <div class="layui-form-item">
                    <label class="layui-form-label">SEO标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="article_stitle"  autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">SEO关键字</label>
                    <div class="layui-input-block">
                        <input type="text" name="article_skeyw"  placeholder="请输入" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">SEO描述</label>
                    <div class="layui-input-block">
                        <textarea name="article_sdes" placeholder="请输入内容" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-block">
                        <button type="submit"  class="layui-btn layui-btn-normal">立即提交</button>
                    </div>
                </div>


        </div>
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

<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js">
</script>
<script>
    function fn(){
        var data = $('form').serializeArray();
        console.log(data);
        var files = $('#file').prop('files');
        // var file = this.files[0];

        var formdata = new FormData();
        console.log(files[0]);
        formdata.append("file",'123',files[0]);

        console.log(formdata);
        url = "<?php echo url('Article/article_add'); ?>";
        $.ajax({

            type:'post',
            url:url,
            dataType:'json',
            cache:false,
            processDate:false,
            contentType:false,
            data:data,
            success:function(succ){
                console.log('成功：'+succ);
            },
            error:function(error){
             console.log('失败：'+error);
            }

        });

    }
</script>


</body>
</html>