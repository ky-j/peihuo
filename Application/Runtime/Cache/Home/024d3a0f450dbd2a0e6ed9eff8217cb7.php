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
</style>
<title>酒店订单</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 打印 <span class="c-gray en">&gt;</span> 酒店订单 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form method="get" class="form form-horizontal" id="peihuo-form">
        <input type="hidden" name="c" value="count">
        <input type="hidden" name="a" value="hotel">
        <div class="text-c search-input">
         <span class="select-box inline">
 				<select name="hotel_id" class="select">
                    <option value="">-=请选择酒店=-</option>
                     <?php if(is_array($hotelList)): foreach($hotelList as $key=>$hotel): ?><option value="<?php echo ($hotel["hotel_id"]); ?>" <?php if($hotel['hotel_id'] == $hotelId): ?>selected="selected"<?php endif; ?>><?php echo ($hotel["hotel_name"]); ?></option><?php endforeach; endif; ?>
				</select>
		</span>
            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜订单</button>
        </div>
    </form>

    <div class="mt-20 pl-20 pr-20">
        <?php if(isset($hotelId)): ?><table class="table table-border table-bordered table-bg table-hover table-sort peihuo-table">
                <thead>
                <tr class="text-c">
                    <!--<th width="80">ID</th>-->
                    <th width="150">订单编号</th>
                    <!--<th width="200">酒店</th>-->
                    <!--<th width="80">酒店编号</th>-->
                    <th width="100">配送日期</th>
                    <!--<th width="50">菜品数量</th>-->
                    <th width="100">状态</th>
                    <!--<th width="150">操作更新时间</th>-->
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
                        <!--<td><?php echo ($vo["order_id"]); ?></td>-->
                        <td><?php echo ($vo["order_sn"]); ?></td>
                        <!--<td><?php echo ($vo["hotel_name"]); ?></td>-->
                        <!--<td><?php echo ($vo["hotel_number"]); ?></td>-->
                        <td><?php echo (date("Y-m-d",$vo["delivery_date"])); ?></td>
                        <!--<td></td>-->
                        <td><?php echo (orderStatus($vo["status"])); ?></td>
                        <!--<td><?php echo (date("Y-m-d H:i",$vo["update_time"])); ?></td>-->
                        <td class="td-manage">
                            <button class="btn btn-primary size-MINI radius peihuo-check" attr-id="<?php echo ($vo["order_id"]); ?>" attr-a="order" attr-message="查看" onclick="order_show('查看订单','index.php?c=order&a=check&id=<?php echo ($vo["order_id"]); ?>')">查看</button>
                            <!--<span class="pipe">|</span>-->
                            <!--<button class="btn btn-secondary size-MINI radius peihuo-edit <?php if($vo[status] > 2): ?>disabled<?php endif; ?>" attr-id="<?php echo ($vo["order_id"]); ?>" attr-a="order" attr-message="修改" onclick="order_show('修改订单','index.php?c=order&a=edit&id=<?php echo ($vo["order_id"]); ?>')">修改</button>-->
                            <!--<span class="pipe">|</span>-->
                            <!--<button class="btn btn-success size-MINI radius peihuo-delivery_x <?php if($vo[status] > 1): ?>disabled<?php endif; ?>" attr-id="<?php echo ($vo["order_id"]); ?>" attr-a="order" attr-message="配送" onclick="order_show('配送情况','index.php?c=order&a=delivery&id=<?php echo ($vo["order_id"]); ?>')">配送情况</button>-->
                            <!--<span class="pipe">|</span>-->
                            <!--<button class="btn btn-warning size-MINI radius peihuo-complete <?php if($vo[status] > 2): ?>disabled<?php endif; ?>" attr-id="<?php echo ($vo["order_id"]); ?>" attr-a="order" attr-message="终结">终结</button>-->
                            <!--<span class="pipe">|</span>-->
                            <!--<button class="btn btn-danger size-MINI radius peihuo-delete" attr-id="<?php echo ($vo["order_id"]); ?>" attr-a="order" attr-message="删除">删除</button>-->
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table><?php endif; ?>
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
<script type="text/javascript" src="/peihuo/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/peihuo/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/peihuo/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/peihuo/Public/js/printThis.min.js"></script>
<script type="text/javascript" src="/peihuo/Public/js/common.js"></script>
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
    function order_show(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }

    $(function () {
        $("#peihuo-form").validate({
            rules: {
                hotel_id: {
                    required: true,
                    digits:true,
//                    rangelength:[13,13]
                }
            },
            onkeyup: false,
            success: "valid",
            // 通过验证后运行的函数
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>