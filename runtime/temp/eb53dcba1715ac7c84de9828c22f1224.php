<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"E:\myphp_www\WWW\tpshop\public/../app/index\view\index\about.html";i:1546780794;s:58:"E:\myphp_www\WWW\tpshop\app\index\view\index\the_base.html";i:1546780818;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>物业管理,物业管理软件,设施管理软件系统供应商</title>
    <link href="/static/css/style.css" rel=stylesheet>
    <script type="text/javascript" src="/static/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/static/js/index_brand.js"></script>
    <script type="text/javascript" src="/static/js/jquery.superslide.js"></script>
    <!--[if IE 6]><script type="text/javascript" src="/static/js/dd_belatedpng.js"></script>
<script type="text/javascript">
    DD_belatedPNG.fix('img');
</script>
    <![endif]-->

</head>
<body>
<div class="header">
    <div class="header01">
        <div class="logo"><a href="" ><img src="/static/images/logo.png" width="218" height="65" class="png" /></a></div>
        <div class="nav">
            <ul>
                <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo url('Index/about',['id'=>$vo['column_id']]); ?>"><?php echo $vo['column_center']; ?><span>HOME</span></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="tel">15012345678<br /></div>
    </div>
</div>






<div class="sub_cont">
  <div class="sub_cont01">
    <div class="sub_cont02">
        <?php echo $res['content_text']; ?>
     </div> 
    </div>
  </div>


<div class="link">
    <div class="linkw">
        <span> 友情链接：</span>
        <a href="">百度</a>
    </div>
</div>
<div class="footer">
    <div class="footer01">
        <div class="footer02">
            地址：某省某市某区	某街某号
            热线电话：400-99999999
            手机：15012345678<br />
            版权所有：某某物业管理有限公司
            <a href="">ICP备案编号：XXXX</a>&nbsp;&nbsp;&nbsp;
            技术支持：<a href="">某某网络公司</a></div>
    </div>
</div>
<script type="text/javascript" src="js/banner.js"></script>
</body>
</html>