<?php if (!defined('THINK_PATH')) exit();?>﻿<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/peihuo/Public/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/peihuo/Public/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/peihuo/Public/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/peihuo/Public/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/peihuo/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/peihuo/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/peihuo/Public/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/peihuo/Public/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>酒店列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 酒店管理 <span class="c-gray en">&gt;</span> 酒店列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <!--<div class="text-c">-->
        <!--<input type="text" name="" id="" placeholder=" 酒店名称" style="width:250px" class="input-text">-->
        <!--<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜酒店</button>-->
    <!--</div>-->
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l"><!--<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> --><a class="btn btn-primary radius" onclick="layer_show('添加酒店','index.php?c=hotel&a=add','',300)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加酒店</a></span> <span class="r">共有数据：<strong><?php echo ($total); ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort peihuo-table">
            <thead>
            <tr class="text-c">
                <!--<th width="40"><input name="" type="checkbox" value=""></th>-->
                <th width="80">ID</th>
                <th>酒店名称</th>
                <th width="100">酒店编号</th>
                <th width="150">操作更新时间</th>
                <!--<th width="60">发布状态</th>-->
                <th width="200">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($hotelList)): $i = 0; $__LIST__ = $hotelList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
                <!--<td><input name="" type="checkbox" value=""></td>-->
                <td><?php echo ($vo["hotel_id"]); ?></td>
                <td><?php echo ($vo["hotel_name"]); ?></td>
                <td><?php echo ($vo["hotel_number"]); ?></td>
                <td><?php echo (date("Y-m-d H:i",$vo["update_time"])); ?></td>
                <td class="td-manage">
                    <button class="btn btn-secondary size-MINI radius peihuo-edit" attr-id="<?php echo ($vo["hotel_id"]); ?>" attr-a="hotel" attr-message="修改" onclick="layer_show('修改酒店','index.php?c=hotel&a=edit&id=<?php echo ($vo["hotel_id"]); ?>','',300)">修改</button>
                    <span class="pipe">|</span>
                    <button class="btn btn-danger size-MINI radius peihuo-delete" attr-id="<?php echo ($vo["hotel_id"]); ?>" attr-a="hotel" attr-message="删除">删除</button></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/peihuo/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/peihuo/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/peihuo/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/peihuo/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/peihuo/Public/js/dialog.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/peihuo/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/peihuo/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/peihuo/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
//        "aoColumnDefs": [
//            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
//            {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
//        ]
    });

    /*酒店-删除*/
    function hotel_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
</script>

<script>
    var SCOPE = {
        'add_url' : '/admin.php?c=menu&a=add',
        'edit_url' : '/admin.php?c=menu&a=edit',
        'set_status_url' : 'index.php?c=hotel&a=setStatus',
    }
</script>
<script type="text/javascript" src="/peihuo/Public/js/common.js"></script>
</body>
</html>