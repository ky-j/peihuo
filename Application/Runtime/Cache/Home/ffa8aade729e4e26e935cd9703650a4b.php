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

    <title>订单列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><!--<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> --><a class="btn btn-primary radius" onclick="order_add('添加订单','index.php?c=order&a=add')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加订单</a></span> <span class="r">共有数据：<strong><?php echo ($total); ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort peihuo-table">
            <thead>
            <tr class="text-c">
                <th width="80">ID</th>
                <th width="150">订单编号</th>
                <th width="200">酒店</th>
                <th width="80">酒店编号</th>
                <th width="100">配送日期</th>
                <th width="50">菜品数量</th>
                <th width="100">状态</th>
                <th width="150">更新时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
                <td><?php echo ($vo["order_id"]); ?></td>
                <td><?php echo ($vo["order_sn"]); ?></td>
                <td><?php echo ($vo["hotel_name"]); ?></td>
                <td><?php echo ($vo["hotel_number"]); ?></td>
                <td><?php echo (date("Y-m-d",$vo["delivery_date"])); ?></td>
                <td></td>
                <td></td>
                <td><?php echo (date("Y-m-d H:i",$vo["update_time"])); ?></td>
                <td class="td-manage"><button class="btn btn-secondary size-MINI radius peihuo-edit" attr-id="<?php echo ($vo["order_id"]); ?>" attr-a="order" attr-message="修改" onclick="layer_show('修改订单','index.php?c=order&a=edit&id=<?php echo ($vo["order_id"]); ?>','',400)">修改</button> | <button class="btn btn-danger size-MINI radius peihuo-delete" attr-id="<?php echo ($vo["order_id"]); ?>" attr-a="order" attr-message="删除">删除</button></td>
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
        "aaSorting": [[ 0, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
//        "aoColumnDefs": [
//            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
//            {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
//        ]
    });

    /*全屏弹出下单页面*/
    function order_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
</script>
<script>
    var SCOPE = {
        'set_status_url' : 'index.php?c=order&a=setStatus',
    }
</script>
<script type="text/javascript" src="/peihuo/Public/js/common.js"></script>
</body>
</html>