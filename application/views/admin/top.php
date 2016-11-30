<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="static/ql/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="static/ql/js/jquery.js"></script>
    <script type="text/javascript">
        $(function(){
            //顶部导航切换
            $(".nav li a").click(function(){
                $(".nav li a.selected").removeClass("selected")
                $(this).addClass("selected");
            })
        })
    </script>
</head>

<body style="background:url(static/ql/images/topbg.gif) repeat-x;">
<div class="top">
    <div class="topright">
        <div class="user">
            <span>admin</span>
            <i>消息</i>
            <b>5</b>
        </div>
        <ul>
            <li><span><img src="static/ql/images/help.png" title="帮助"  class="helpimg"/></span><a href="#">帮助</a></li>
            <li><a href="#">关于</a></li>
            <li><a href="index.php?d=admin&c=common&m=login_out" target="_parent">退出</a></li>
        </ul>
    </div>
</div>
<ul class="nav">
    <li><a href="index.php?d=admin&c=common&m=right" target="rightFrame" class="selected"><img src="static/ql/images/icon01.png" title="主页管理" /><h2>主页管理</h2></a></li>
    <li><a href="index.php?d=admin&c=admin&m=index" target="rightFrame"><img src="static/ql/images/icon03.png" title="管理员管理" /><h2>管理员管理</h2></a></li>
</ul>
</body>
</html>

