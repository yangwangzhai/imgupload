<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?=PRODUCT_NAME?>-教师端</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet"	href="static/js/kindeditor410/themes/default/default.css" />
    <script type="text/javascript" src="static/js/jquery-1.11.2.min.js"></script>
    <script charset="utf-8" src="static/js/kindeditor410/kindeditor.js?2"></script>
    <script charset="utf-8" src="static/js/kindeditor410/lang/zh_CN.js"></script>
    <link href="static/admin_img/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="static/js/common.js?1"></script>
    <link rel="stylesheet" type="text/css" href="static/js/datepicker/default.css" />
    <script type="text/javascript" src="static/js/datepicker/zebra_datepicker.js"></script>
    <style>
        button { color: #666; font: 14px "Arial", "Microsoft YaHei", "微软雅黑", "SimSun", "宋体"; line-height: 20px; }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            // 日期
            $('#pubdate').Zebra_DatePicker({
                months:['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
                days:['日', '一', '二', '三', '四', '五', '六'],
                lang_clear_date:'清除',
                show_select_today:'今天'
            });
            // 弹出选择学生
            $("#studentname").click(function(){
                var classname = ($("#classname").val());
                var classid = ($("#classid").val());
                studentdialog = dialog_url('index.php?d=teacher&c=student&m=dialog&classid='+encodeURIComponent(classid),'选择'+classname+'学生：');
            });
        });
    </script>
</head>
<body>
<form action="<?=$this->baseurl?>&m=save" method="post">
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

            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <div class="pull-left">
                        <a href="javascript:history.back();" style="display:" class="btn btn-success">返回</a>

                    </div>
                    <div class="pull-right">

                    </div>

                </div>
            </div>

            <!-- 1 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    1.基本信息
                </div>

                <div class="panel-body">

                    <table class="table table-condensed  stafftable">

                        <tbody>
                        <tr>
                            <th width="20%">班级名称</th>
                            <td width="30%">
                                <input value="<?=$value['classname']?>" id="classname" readonly value="" type="text"  class="form-control">
                                <input type="hidden"  id="classid" value="<?=$value['classid']?>">

                            </td>
                            <th>学生姓名<font color="red">*</font></th>
                            <td>
                                <input id="studentname" value=""  type="text"  class="form-control">
                                <input type="hidden" name="value[studentid]" id="studentid" value="">

                            </td>
                        </tr>
                        <tr>
                            <th>评价老师</th>
                            <td>
                                <input readonly value="<?=$value['truename']?>" type="text"  class="form-control">
                                <input type="hidden" name="value[uid]"  value="<?=$value['teacherid']?>">

                            </td>
                            <th>评价学期</th>
                            <td>
                                <select name="value[semester]" class="form-control">
                                    <?=getSelect(config_item('semester'))?>
                                </select>
                            </td>

                        </tr>
                        <tr>
                            <th>评价日期</th>
                            <td>
                                <input name="value[pubdate]" id="pubdate" value="<?=$value['pubdate']?>"  type="text" class="form-control">

                            </td>
                            <th></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>基础素质</th>
                            <td class="td_right" colspan="3">
                                <textarea name="value[jcsz]" rows="2" cols="20"  class="form-control" style="height:80px;"></textarea>

                            </td>

                        </tr>
                        <tr>
                            <th>学科学习</th>
                            <td class="td_right" colspan="3">
                                <textarea name="value[xkxx]" rows="2" cols="20"  class="form-control" style="height:80px;"></textarea>

                            </td>

                        </tr>
                        <tr>
                            <th>综合实践活动</th>
                            <td class="td_right" colspan="3">
                                <textarea name="value[sjhd]" rows="2" cols="20"  class="form-control" style="height:80px;"></textarea>

                            </td>

                        </tr>
                        <tr>
                            <th>出勤情况</th>
                            <td class="td_right" colspan="3">
                                <textarea name="value[cqqk]" rows="2" cols="20"  class="form-control" style="height:80px;"></textarea>

                            </td>

                        </tr>
                        <tr>
                            <th>获奖记录</th>
                            <td class="td_right" colspan="3">
                                <textarea name="value[hjjl]" rows="2" cols="20"  class="form-control" style="height:80px;"></textarea>

                            </td>

                        </tr>
                        <tr>
                            <th>温馨提示</th>
                            <td class="td_right" colspan="3">
                                <textarea name="value[wxts]" rows="2" cols="20"  class="form-control" style="height:80px;"></textarea>

                            </td>

                        </tr>
                        <tr>
                            <th>教师评语</th>
                            <td class="td_right" colspan="3">
                                <textarea name="value[jspy]" rows="2" cols="20"  class="form-control" style="height:80px;"></textarea>

                            </td>

                        </tr>
                        </tbody></table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body text-center">

                    <input type="submit" name="" value="添加"  class="btn btn-primary">
                    <input type="submit" name="" value="取消" onclick="javascript:history.back();" class="btn btn-danger">
                </div>
            </div>
        </div>

</form>
</body></html>
<?php $this->load->view('teacher/footer');?>
