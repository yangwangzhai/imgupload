<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="static/ql/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="static/ql/js/jquery.js"></script>
    <script charset="utf-8" src="static/js/kindeditor410/kindeditor.js?2"></script>
    <script charset="utf-8" src="static/js/kindeditor410/lang/zh_CN.js"></script>
    <script type="text/javascript" src="static/js/common.js?1"></script>
    <script type="text/javascript" src="static/js/datepicker/WdatePicker.js"></script>
    <style type="text/css">
        #date{background: url(static/js/datepicker/skin/datePicker.gif) no-repeat right;}
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".click").click(function(){
                $(".tip").fadeIn(200);
            });

            $(".tiptop a").click(function(){
                $(".tip").fadeOut(200);
            });

            $(".sure").click(function(){
                $(".tip").fadeOut(100);
                $("#my_form").submit();
            });

            $(".cancel").click(function(){
                $(".tip").fadeOut(100);
            });

            $(".add_click").click(function(){
                location.href="<?=$this->baseurl?>&m=add";
            });

            // 点击更改状态
            $(".updatestatus").click(function(){
                var tid = $(this).attr("name");
                var mystatus = 0;
                if($(this).text() == "已审")
                {
                    $(this).text("未审");
                    $(this).css("color","red");
                } else {
                    mystatus = 1;
                    $(this).text("已审");
                    $(this).css("color","");
                }

                $.get("<?=$this->baseurl?>&m=updatestatus", { id: tid, status: mystatus },function(data){

                });
            });

            $('#groupname').val('<?=$groupname?>');

        });

        function getgroup(){
            $('#mysearch').trigger('click');
        }

    </script>


</head>


<body>
<div class="rightinfo">

    <div class="tools">

        <ul class="toolbar">
            <li class="add_click"><span><img src="static/ql/images/t01.png" /></span>添加</li>
            <li class="click"><span><img src="static/ql/images/t03.png" /></span>删除</li>
        </ul>

        <div style="float: right;">
            <form action="<?=$this->baseurl?>&m=index" method="post">
                <input style="height: 35px;border: solid thin #000000;" type="text" id="date" value="<?=times($date)?>" onclick="WdatePicker({readOnly:true,onpicked:function(){var key = $('#stat_select').find('option:selected').val();var date = $('#date').val();location.href='index.php?d=admin&c=stat&m=PV&key='+key+'&date='+date;}})">
                <input class="btn btn-primary" type="submit" name="submit" value=" 搜索 " id="mysearch" style="width: 50px;">
            </form>
        </div>
    </div>

    <form action="<?=$this->baseurl?>&m=delete" method="post" id="my_form">
        <table class="tablelist">
            <thead>
            <tr>
                <th style="width: 50px;"><input type="checkbox" name="chkall" id="chkall" onclick="checkall('delete[]')" class="checkbox" />全选</th>
                <th style="width: 40px;">ID</th>
                <th style="width: 100px;">缩略图</th>
                <th style="width: 130px;">名称</th>
                <th style="width: 130px;">路径</th>
                <th style="width: 50px;">格式</th>
                <th style="width: 60px;">添加时间</th>
                <th style="width: 100px;">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($list as $key=>$r):?>
                <tr>
                    <td><input type="checkbox" name="delete[]" value="<?=$r['id']?>" class="checkbox" /></td>
                    <td><?=$r['id']?></td>
                    <td><img width="80" height="80" src="<?=$r['savename']?>"></td>
                    <td><?=$r['filename']?></td>
                    <td><?=base_url().$r['savename']?></td>
                    <td><?=$r['filetype']?></td>
                    <td><?=times($r['addtime'])?></td>
                    <td>
                        <a href="<?=$this->baseurl?>&m=edit&id=<?=$r['id']?>">修改</a>
                        <a href="<?=$this->baseurl?>&m=delete&id=<?=$r['id']?>" onclick="return confirm('确定要删除吗？');">删除</a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>

        <div style="margin-left: 10px;margin-top: 15px;">
            <hr style="margin-bottom: 0px;margin-top:0px;"/>
        </div>
        <div style="margin-left: 10px;margin-top: 10px;">
            <tr><?php echo $pages; ?></tr>
        </div>
        <div class="pagin" style="clear: both;float: right;">
            <div class="message">共<i class="blue"><?=$count?></i>条记录</div>
        </div>
    </form>

    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>

        <div class="tipinfo">
            <span><img src="static/ql/images/ticon.png" /></span>
            <div class="tipright">
                <p>是否删除所选信息 ？</p>
                <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
            </div>
        </div>

        <div class="tipbtn">
            <input name="" type="button"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
        </div>

    </div>




</div>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

</body>

</html>
