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
<title>酒店统计</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 数据统计 <span class="c-gray en">&gt;</span> 酒店统计 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form method="get" class="form form-horizontal" id="peihuo-form">
        <input type="hidden" name="c" value="count">
        <input type="hidden" name="a" value="hotelbymonth">
        <div class="text-c search-input">
        <span class="select-box inline">
 				<select name="hotel_id" class="select">
                    <option value="">-=请选择酒店=-</option>
                     <?php if(is_array($hotelList)): foreach($hotelList as $key=>$hotel): ?><option value="<?php echo ($hotel["hotel_id"]); ?>" <?php if($hotel['hotel_id'] == $info['hotelId']): ?>selected="selected"<?php endif; ?>><?php echo ($hotel["hotel_name"]); ?></option><?php endforeach; endif; ?>
				</select>
		</span>
            统计月份：
            <input type="text" onfocus="selectDate()" value="<?php echo ($info["date"]); ?>" name="delivery_date" autocomplete="off" class="input-text Wdate" style="width:120px;">
            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe61c;</i> 统计数据</button>
        </div>
    </form>
    <div class="text-c mt-20"><mark>（数据只统计“已终结”订单）</mark></div>
    <div class="mt-30 print-box <?php if(!isset($info["hotelId"])): ?>hide<?php endif; ?>">
        <div id="printArea">
            <div class="text-c"><h2><?php echo ($info["chineseDate"]); echo ($info["hotelName"]); ?>菜品配送情况统计表</h2></div>
            <div class="order-info text-r">
                <span>统计日期：<?php echo ($info["today"]); ?></span>
            </div>
            <table class="table table-border table-bg table-bordered">
                <thead>
                <tr class="table-head">
                    <td>序号</td>
                    <td>菜品</td>
                    <td>订单数量</td>
                    <td>实际数量</td>
                    <td>单位</td>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($data)): ?><tr><td colspan="10">没有数据</td></tr>
                    <?php else: ?>
                    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr>
                            <td><?php echo ($key+1); ?></td>
                            <td><?php echo ($data["food_name"]); ?></td>
                            <td class="format-number"><?php echo ($data["total1"]); ?></td>
                            <td class="format-number"><?php echo ($data["total2"]); ?></td>
                            <td><?php echo ($data["food_unit"]); ?></td>
                        </tr><?php endforeach; endif; endif; ?>
                </tbody>
            </table>
        </div>
        <div class="text-c mt-50"><input class="btn btn-secondary radius size-L" id="printBtn" type="button" value="打印数据"></div>
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
<script type="text/javascript" src="/peihuo/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/peihuo/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/peihuo/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/peihuo/Public/js/printThis.min.js"></script>
<script type="text/javascript" src="/peihuo/Public/js/common.js"></script>
<script type="text/javascript">
    $(function () {
        $("#peihuo-form").validate({
            rules: {
                hotel_id: {
                    required: true,
                },
                delivery_date: {
                    required: true,
                },
            },
            onkeyup: false,
            success: "valid",
            // 通过验证后运行的函数
            submitHandler: function (form) {
                form.submit();
            }
        });

        var foodData = {};
        $(".category-id").change(function () {
            var ele = $(this).parent().parent();
            var foodSelect = ele.find(".food-id");

            foodSelect.html("");
            $("<option value=''>-=请选择菜品=-</option>").appendTo(foodSelect);

            var cateValue = $(this).val();
            if (cateValue != "") {
                var postData = {
                    'category_id': cateValue
                };
                $.post('index.php?c=food&a=getFoodData', postData, function (result) {
                    if (result.status == 1) {
                        //成功
                        //console.log(result.data);
                        foodData = result.data;
                        $.each(foodData, function (k, v) {
                            $("<option value ='" + v['food_id'] + "'> " + v['food_name'] + "</option>").appendTo(foodSelect);
                        });
                    } else if (result.status == 0) {
                        // 失败
                        return dialog.error(result.message);
                    }
                }, "JSON");
            }
        });

        $(".format-number").each(function (index) {
            if ($(this).html() == parseInt($(this).html())) {
                $(this).html(parseInt($(this).html()));
            }
        });

        $("#printBtn").on("click",function () {
            $('#printArea').printThis({
                importStyle: true,
            });
        });
    });
    function selectDate(){
        WdatePicker({dateFmt:'yyyy-MM'});
    }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>