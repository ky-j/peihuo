<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
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
<style>
    .order-info {
        margin: 10px auto;
    }
    .order-info span{
        display: inline-block;
        width: 220px;
    }
    .page-container{
        width: 700px;
        margin: 0 auto;
    }
    .table-head{
        font-weight: bold;
    }
    .btn-print{
        text-align: center;
        margin: 50px;
    }
</style>
<title>查看订单</title>
</head>
<body>

<div class="page-container">
    <div id="printArea">
    <div class="text-c"><h2><?php echo ($order["hotel_name"]); ?>订单</h2></div>
    <div class="order-info">
        <span>订单编号：<?php echo ($order["order_sn"]); ?></span>
        <span>酒店编号：<?php echo ($order["hotel_number"]); ?></span>
        <span>配送日期：<?php echo (date("Y-m-d",$order["delivery_date"])); ?></span>
    </div>
    <table class="table table-border table-bg table-bordered">
        <thead>
        <tr class="table-head">
            <td>序号</td>
            <td>菜品</td>
            <td>中餐</td>
            <td>西餐</td>
            <td>日料</td>
            <td>点心</td>
            <td>味部</td>
            <td>合计</td>
            <td>备注</td>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($countPrint)): foreach($countPrint as $key=>$data): ?><tr>
            <td><?php echo ($key+1); ?></td>
            <td><?php echo ($data["food_name"]); ?></td>
            <td class="format-number"><?php echo ($data["total1"]); ?></td>
            <td class="format-number"><?php echo ($data["total2"]); ?></td>
            <td class="format-number"><?php echo ($data["total3"]); ?></td>
            <td class="format-number"><?php echo ($data["total4"]); ?></td>
            <td class="format-number"><?php echo ($data["total5"]); ?></td>
            <td class="format-number"><?php echo ($data["total"]); ?></td>
            <td></td>
        </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    </div>
    <div class="btn-print"><input class="btn btn-secondary radius size-L" id="printBtn" type="button" value="打印订单"></div>
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
<script type="text/javascript" src="/peihuo/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/peihuo/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/peihuo/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/peihuo/Public/js/printThis.min.js"></script>
<script type="text/javascript" src="/peihuo/Public/js/common.js"></script>
<script type="text/javascript">
    $(function () {
        $(".format-number").each(function (index) {
            if ($(this).html() == parseInt($(this).html())) {
                $(this).html(parseInt($(this).html()));
            }
        })

        $("#printBtn").on("click",function () {
            $('#printArea').printThis({
                importStyle: true,
            });
        })
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>