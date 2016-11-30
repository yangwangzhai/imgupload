<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?=PRODUCT_NAME?>-园长端</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet"	href="static/js/kindeditor410/themes/default/default.css" />
    <script type="text/javascript" src="static/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="static/plugin/layer-v2.1/layer.js"></script>
    <script charset="utf-8" src="static/js/kindeditor410/kindeditor.js?2"></script>
    <script charset="utf-8" src="static/js/kindeditor410/lang/zh_CN.js"></script>
    <link href="static/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="static/js/common.js?1"></script>
    <script type="text/javascript" src="static/plugin/uploadify/jquery.uploadify-3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="static/plugin/uploadify/uploadify.css"/>
    <script>
        $(document).ready(function(){
            $('#file_upload').uploadify({
                'auto'     : true,//关闭自动上传
                'formData':{'token':'<?=$token?>'},
                'removeTimeout' : 1,//文件队列上传完成1秒后删除
                'swf'      : 'static/plugin/uploadify/uploadify.swf',
                'uploader' : '<?=$this->baseurl?>&m=upload',
                'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
                'buttonText' : '选择附件',//设置按钮文本
                'multi'    : true,//允许同时上传多张图片
                'uploadLimit' : 500,//一次最多只允许上传多少张图片
                'fileTypeDesc' : 'Image Files',//只允许上传图像
                'fileTypeExts' : '*.mp3; *.jpg; *.png; *.xls;*.doc;*.flv;*.mp4;',//限制允许上传的图片后缀
                'fileSizeLimit' : 0,//限制上传的图片不得超过多大
                'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
                    if(data!='error')
                    {
                        var data= $.parseJSON(data);
                        $("#filesmd").prepend("<li id=\"" + data["id"] + "\"><img src=\"static/admin_img/icon_conservation.gif\" />" + data['filename'] + "<a href=\"javascript:Deletefileup('" + data['id'] + "','" + data['savename'] + "','" + data['filename'] + "')\">删除 </a></li>");
                    }
                },
                'onQueueComplete' : function(queueData) {//上传队列全部完成后执行的回调函数
                }
                // Put your options here
            });
        });
        function Deletefileup(objid, del, name) {
            layer.confirm('确定要删除此附件吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                Deletefileup_do(objid, del, name);
            }, function(){

            });
        }
        function Deletefileup_do(objid,del,name) {
            $.ajax({
                type: "POST",
                url: '<?php echo $this->baseurl?>&m=deletefileup',
                data:{id:objid,file_path:del},
                success: function (data) {
                    if(data=='success')
                    {
                        layer.msg(name+'删除成功', {icon: 1});
                        $("#" + objid).remove();
                    }
                    else
                    {
                        layer.msg(name+'删除失败', {icon: 5});
                    }
                }
            });
        }

    </script>
</head>
<body>
<form action="<?=$this->baseurl?>&m=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="token" value="<?=$token?>">
    <div class="container-fluid">
        <div style=" margin:20px; font-size:13px;">
            <style>
                .img-thumbnail{ width:90px; height:100px; }

                .stafftable th {
                    text-align:right; vertical-align:central;
                }

                .table>thead>tr>th,
                .table>tbody>tr>th,
                .table>tfoot>tr>th,
                .table>thead>tr>td,
                .table>tbody>tr>td,
                .table>tfoot>tr>td {
                    vertical-align:middle;
                }
            </style>
            <!-- 1 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    1.<?php echo $this->name?>
                </div>

                <div class="panel-body">

                    <table class="table table-condensed  stafftable">

                        <tbody>

                        <tr>
                            <th>附件上传：</th>
                            <td style="padding-left:5px">
                                <input type="file" name="file_upload" id="file_upload" style="height:30px;width:400px;" />
                                <br />
                                <div id="filesmd" name="filesmd"></div>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <input type="submit" name="" value="完成" onclick="javascript:history.back();" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>