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
<link rel="stylesheet" href="/peihuo/Public/lib/jquery.chosen/1.8.2/chosen.css">
<style>
    .chosen-container .chosen-results {
        max-height: 100%;
    }
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
<title>每日菜品清单</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 打印 <span class="c-gray en">&gt;</span> 每日菜品清单 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form method="get" class="form form-horizontal" id="peihuo-form">
        <input type="hidden" name="c" value="count">
        <input type="hidden" name="a" value="foodbyday">
        <div class="text-c search-input">
        <!--<span class="select-box inline">-->
            <!--<select name="category_id" class="select category-id">-->
                <!--<option value="">-=请选择菜品分类=-</option>-->
                <!--<?php if(is_array($categoryList)): foreach($categoryList as $key=>$cate): ?>-->
                    <!--<option value="<?php echo ($cate["category_id"]); ?>" <?php if($cate['category_id'] == $info['categoryId']): ?>selected="selected"<?php endif; ?>><?php echo ($cate["category_name"]); ?></option>-->
                <!--<?php endforeach; endif; ?>-->
            <!--</select>-->
		<!--</span>-->
            <span class="select-box inline">
            <select name="food_id" class="select food-id">
                <option value="">-=请选择菜品=-</option>
                <?php if(is_array($foodList)): foreach($foodList as $key=>$food): ?><option value="<?php echo ($food["food_id"]); ?>" <?php if($food['food_id'] == $info['foodId']): ?>selected="selected"<?php endif; ?>><?php echo ($food["food_name"]); ?></option><?php endforeach; endif; ?>
            </select>
        </span>
            配送日期：
            <input type="text" onfocus="WdatePicker()" value="<?php echo ($info["date"]); ?>" name="delivery_date" class="input-text Wdate" style="width:120px;">
            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜清单</button>
        </div>
    </form>
    <!--<div class="text-c mt-20"><mark>（数据只统计“已终结”订单）</mark></div>-->
    <div class="mt-30 print-box <?php if(!isset($info["foodName"])): ?>hide<?php endif; ?>">
        <div id="printArea">
            <div class="text-c"><h2><?php echo ($info["foodName"]); ?>配送清单</h2></div>
            <div class="order-info">
                <span>配送日期：<?php echo ($info["date"]); ?></span>
            </div>
            <table class="table table-border table-bg table-bordered">
                <thead>
                <tr class="table-head">
                    <td>序号</td>
                    <td>酒店</td>
                    <td>酒店编号</td>
                    <td>中餐</td>
                    <td>西餐</td>
                    <td>日料</td>
                    <td>点心</td>
                    <td>味部</td>
                    <td>小计</td>
                    <td>备注</td>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($data)): ?><tr><td colspan="10">没有数据</td></tr>
                    <?php else: ?>
                    <?php if(is_array($data)): foreach($data as $key=>$data): ?><tr>
                            <td><?php echo ($key+1); ?></td>
                            <td><?php echo ($data["hotel_name"]); ?></td>
                            <td><?php echo ($data["hotel_number"]); ?></td>
                            <td class="format-number zc-number"><?php echo ($data["total1"]); ?></td>
                            <td class="format-number xc-number"><?php echo ($data["total2"]); ?></td>
                            <td class="format-number rl-number"><?php echo ($data["total3"]); ?></td>
                            <td class="format-number dx-number"><?php echo ($data["total4"]); ?></td>
                            <td class="format-number wb-number"><?php echo ($data["total5"]); ?></td>
                            <td class="format-number all-number"><?php echo ($data["total"]); ?></td>
                            <td></td>
                        </tr><?php endforeach; endif; ?>
                    <tr>
                        <td colspan="3" class="text-c">合计</td>
                        <td id="zcTotal"></td>
                        <td id="xcTotal"></td>
                        <td id="rlTotal"></td>
                        <td id="dxTotal"></td>
                        <td id="wbTotal"></td>
                        <td id="allTotal"></td>
                        <td></td>
                    </tr><?php endif; ?>
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
<script type="text/javascript" src="/peihuo/Public/lib/jquery.chosen/1.8.2/chosen.jquery.js"></script>
<script type="text/javascript" src="/peihuo/Public/js/printThis.min.js"></script>
<script type="text/javascript" src="/peihuo/Public/js/common.js"></script>
<script type="text/javascript">
    $(function () {
//        $('.food-id').chosen({
//            search_contains: true, // 全字段模糊匹配
//            no_results_text: '找不到菜品'
//        });

        $("#peihuo-form").validate({
            rules: {
                category_id: {
                    required: true,
                },
                food_id: {
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

        var zcTotal = 0;
        $(".zc-number").each(function(i){
            zcTotal = zcTotal + parseFloat($(this).text());
        });
        $("#zcTotal").text(zcTotal);

        var xcTotal = 0;
        $(".xc-number").each(function(i){
            xcTotal = xcTotal + parseFloat($(this).text());
        });
        $("#xcTotal").text(xcTotal);

        var rlTotal = 0;
        $(".rl-number").each(function(i){
            rlTotal = rlTotal + parseFloat($(this).text());
        });
        $("#rlTotal").text(rlTotal);

        var dxTotal = 0;
        $(".dx-number").each(function(i){
            dxTotal = dxTotal + parseFloat($(this).text());
        });
        $("#dxTotal").text(dxTotal);

        var wbTotal = 0;
        $(".wb-number").each(function(i){
            wbTotal = wbTotal + parseFloat($(this).text());
        });
        $("#wbTotal").text(wbTotal);

        var allTotal = 0;
        $(".all-number").each(function(i){
            allTotal = allTotal + parseFloat($(this).text());
        });
        $("#allTotal").text(allTotal);

        $("#printBtn").on("click",function () {
            $('#printArea').printThis({
                importStyle: true,
            });
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>