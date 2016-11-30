<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="static/ql/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="static/ql/js/jquery.js"></script>

    <script type="text/javascript">
        $(function(){
            //导航切换


            $('.title').click(function(){
                var $ul = $(this).next('ul.menuson');
                $('dd').find('ul.menuson').slideUp();
                if($ul.is(':visible')){
                    $(this).next('ul.menuson').slideUp();
                }else{
                    $(this).next('ul.menuson').slideDown();
                }
            });

            $('.sub_title').click(function(){
                $(this).toggleClass("active");
                var $sul = $(this).next('ul.sonsub');
                $('.sub_title').find('ul').slideUp();
                if($sul.is(':visible')){
                    $(this).next('ul.sonsub').slideUp();
                }else{
                    $(this).next('ul.sonsub').slideDown();
                }
            });



        })
    </script>


</head>

<body style="background:#0f7700;">
<dl class="leftmenu">
    <dd>
        <div class="title">图片管理</div>
        <ul class="menuson">
            <li><cite></cite><a href="index.php?d=admin&c=resource&m=index" target="rightFrame">图片列表</a><i></i></li>
            <li><cite></cite><a href="index.php?d=admin&c=resource&m=out_url" target="rightFrame">导出列表</a><i></i></li>
        </ul>
    </dd>
    <dd>
        <div class="title">后台管理</div>
        <ul class="menuson">
            <li><cite></cite><a href="index.php?d=admin&c=admin&m=index" target="rightFrame">后台信息</a><i></i></li>
        </ul>
    </dd>
</dl>

</body>
</html>
