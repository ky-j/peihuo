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

<title>添加菜品</title>
</head>
<body>
<div class="page-container">
    <form action="index.php?c=order&a=add" method="post" class="form form-horizontal" id="peihuo-form">
        <div class="row cl">
            <label class="form-label col-sm-2"><span class="c-red">*</span> 下单酒店：</label>
            <div class="formControls col-sm-8">
				<span class="select-box">
				<select name="hotel_id" class="select">
                    <option value="">-=请选择酒店=-</option>
                    <?php if(is_array($hotelList)): foreach($hotelList as $key=>$hotel): ?><option value="<?php echo ($hotel["hotel_id"]); ?>"><?php echo ($hotel["hotel_name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span>
            </div>
        </div>
        <!--<div class="row cl">-->
        <!--<label class="form-label col-sm-2"><span class="c-red">*</span> 下单日期：</label>-->
        <!--<div class="formControls col-sm-9">-->
        <!--<input type="text" onfocus="WdatePicker()" id="order_date" name="order_date" value="<?php echo ($today); ?>" class="input-text Wdate">-->
        <!--</div>-->
        <!--</div>-->
        <div class="row cl">
            <label class="form-label col-sm-2"><span class="c-red">*</span> 配送日期：</label>
            <div class="formControls col-sm-8">
                <input type="text" onfocus="WdatePicker()" id="delivery_date" name="delivery_date" value="<?php echo ($tomorrow); ?>"
                       class="input-text Wdate">
            </div>
        </div>
        <!--<div class="row cl">-->
            <!--<label class="form-label col-sm-2"><span class="c-red">*</span> 订单状态：</label>-->
            <!--<div class="formControls col-sm-8">-->
				<!--<span class="select-box">-->
				<!--<select name="hotel_id" class="select">-->
                    <!--<option value="">-=请选择酒店=-</option>-->
                    <!--<?php if(is_array($hotelList)): foreach($hotelList as $key=>$hotel): ?>-->
                        <!--<option value="<?php echo ($hotel["hotel_id"]); ?>"><?php echo ($hotel["hotel_name"]); ?></option>-->
                    <!--<?php endforeach; endif; ?>-->
				<!--</select>-->
				<!--</span>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="row cl">-->
        <!--<label class="form-label col-sm-2">中餐：</label>-->
        <!--</div>-->
        <!--<div class="row cl">-->
        <!--<div class="line col-xs-12"></div>-->
        <!--</div>-->
        <div class="row cl">
            <label class="form-label col-sm-2">中餐：</label>
            <input type="hidden" name="depart_id[]" value="1">
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="category_id[]" class="select category-id">
                    <option value="">-=请选择菜品分类=-</option>
                    <?php if(is_array($categoryList)): foreach($categoryList as $key=>$category): ?><option value="<?php echo ($category["category_id"]); ?>"><?php echo ($category["category_name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="food_id[]" class="select food-id">
                    <option value="1">-=请选择菜品=-</option>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-price" value="" placeholder="单价" id="" name="food_price[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-unit" value="" placeholder="单位" id="" name="food_unit[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text order-number" value="" placeholder="下单数量" id="" name="order_number[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text delivery-number" value="" placeholder="配送数量" id="" name="delivery_number[]">
            </div>
            <div class="formControls col-sm-1">
                <a href="javascript:" class="add-item" title="新增一条中餐记录"><i class="Hui-iconfont c-success">&#xe600;</i></a>
                &nbsp;&nbsp;
                <a href="javascript:" class="remove-item hide" title="删除该条中餐记录" attr-depart="中餐"><i class="Hui-iconfont c-danger">&#xe6a1;</i></a>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-sm-2">西餐：</label>
            <input type="hidden" name="depart_id[]" value="2">
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="category_id[]" class="select category-id">
                    <option value="">-=请选择菜品分类=-</option>
                    <?php if(is_array($categoryList)): foreach($categoryList as $key=>$category): ?><option value="<?php echo ($category["category_id"]); ?>"><?php echo ($category["category_name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="food_id[]" class="select food-id">
                    <option value="2">-=请选择菜品=-</option>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-price" value="" placeholder="单价" id="" name="food_price[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-unit" value="" placeholder="单位" id="" name="food_unit[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text order-number" value="" placeholder="下单数量" id="" name="order_number[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text delivery-number" value="" placeholder="配送数量" id="" name="delivery_number[]">
            </div>
            <div class="formControls col-sm-1">
                <a href="javascript:" class="add-item" title="新增一条西餐记录"><i class="Hui-iconfont c-success">&#xe600;</i></a>
                &nbsp;&nbsp;
                <a href="javascript:" class="remove-item hide" title="删除该条西餐记录" attr-depart="西餐" ><i class="Hui-iconfont c-danger">&#xe6a1;</i></a>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-sm-2">日本料理：</label>
            <input type="hidden" name="depart_id[]" value="3">
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="category_id[]" class="select category-id">
                    <option value="">-=请选择菜品分类=-</option>
                    <?php if(is_array($categoryList)): foreach($categoryList as $key=>$category): ?><option value="<?php echo ($category["category_id"]); ?>"><?php echo ($category["category_name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="food_id[]" class="select food-id">
                    <option value="2">-=请选择菜品=-</option>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-price" value="" placeholder="单价" id="" name="food_price[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-unit" value="" placeholder="单位" id="" name="food_unit[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text order-number" value="" placeholder="下单数量" id="" name="order_number[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text delivery-number" value="" placeholder="配送数量" id="" name="delivery_number[]">
            </div>
            <div class="formControls col-sm-1">
                <a href="javascript:" class="add-item" title="新增一条日本料理记录"><i class="Hui-iconfont c-success">&#xe600;</i></a>
                &nbsp;&nbsp;
                <a href="javascript:" class="remove-item hide" title="删除该条日本料理记录" attr-depart="日本料理" ><i class="Hui-iconfont c-danger">&#xe6a1;</i></a>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-sm-2">点心：</label>
            <input type="hidden" name="depart_id[]" value="4">
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="category_id[]" class="select category-id">
                    <option value="">-=请选择菜品分类=-</option>
                    <?php if(is_array($categoryList)): foreach($categoryList as $key=>$category): ?><option value="<?php echo ($category["category_id"]); ?>"><?php echo ($category["category_name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="food_id[]" class="select food-id">
                    <option value="2">-=请选择菜品=-</option>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-price" value="" placeholder="单价" id="" name="food_price[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-unit" value="" placeholder="单位" id="" name="food_unit[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text order-number" value="" placeholder="下单数量" id="" name="order_number[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text delivery-number" value="" placeholder="配送数量" id="" name="delivery_number[]">
            </div>
            <div class="formControls col-sm-1">
                <a href="javascript:" class="add-item" title="新增一条点心记录"><i class="Hui-iconfont c-success">&#xe600;</i></a>
                &nbsp;&nbsp;
                <a href="javascript:" class="remove-item hide" title="删除该条点心记录" attr-depart="点心" ><i class="Hui-iconfont c-danger">&#xe6a1;</i></a>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-sm-2">味部：</label>
            <input type="hidden" name="depart_id[]" value="5">
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="category_id[]" class="select category-id">
                    <option value="">-=请选择菜品分类=-</option>
                    <?php if(is_array($categoryList)): foreach($categoryList as $key=>$category): ?><option value="<?php echo ($category["category_id"]); ?>"><?php echo ($category["category_name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-2">
				<span class="select-box">
				<select name="food_id[]" class="select food-id">
                    <option value="2">-=请选择菜品=-</option>
				</select>
				</span>
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-price" value="" placeholder="单价" id="" name="food_price[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text food-unit" value="" placeholder="单位" id="" name="food_unit[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text order-number" value="" placeholder="下单数量" id="" name="order_number[]">
            </div>
            <div class="formControls col-sm-1">
                <input type="text" class="input-text delivery-number" value="" placeholder="配送数量" id="" name="delivery_number[]">
            </div>
            <div class="formControls col-sm-1">
                <a href="javascript:" class="add-item" title="新增一条味部记录"><i class="Hui-iconfont c-success">&#xe600;</i></a>
                &nbsp;&nbsp;
                <a href="javascript:" class="remove-item hide" title="删除该条味部记录" attr-depart="味部" ><i class="Hui-iconfont c-danger">&#xe6a1;</i></a>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
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
                'food_price[]': {
                    number: true
                },
                'order_number[]': {
                    number: true
                },
            },
            onkeyup: false,
            success: "valid",
            // 通过验证后运行的函数
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    dataType: 'json',
                    success: function (data) {
                        if (data.status === 1) {
                            dialog.msg("操作成功！");
                            window.parent.location.reload();
                        } else {
                            dialog.error(data.message);
                        }
                    }
                });
            }
        });

        var foodData = {};

        $(".category-id").change(function () {
            var ele = $(this).parent().parent().parent();
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

        $(".food-id").change(function () {
            var ele = $(this).parent().parent().parent();
            foodValue = $(this).val();

            $.each(foodData, function (k, v) {
                if (foodValue == v['food_id']) {
                    ele.find('.food-price').val(v['food_price']);
                    ele.find('.food-unit').val(v['food_unit']);
                }
            });
        });

        $(".add-item").on('click',function () {
            var ele = $(this).parent().parent();
            ele.find('.remove-item').removeClass('hide');
            var copy = ele.clone(true);

            ele.after(copy.addClass('hui-fadein'));
            var newEle = ele.next();
            var newFoodSelect = newEle.find('.food-id');
            newFoodSelect.html('');
            $("<option value=''>-=请选择菜品=-</option>").appendTo(newFoodSelect);
            newEle.find('.food-price').val('');
            newEle.find('.food-unit').val('');
            newEle.find('.order-number').val('');
            newEle.find('.delivery-number').val('');
        })

        $(".remove-item").on('click',function () {
            var depart = $(this).attr('attr-depart');
            var confirmMessage = '确认要删除该条'+depart+'记录吗？';
            var ele = $(this).parent().parent();
            layer.confirm(confirmMessage,function(index){
                layer.close(index);
                ele.addClass('hui-bounceoutR');
                setTimeout(function () {
                    ele.remove();
                },1000);
            });
        })

    });
</script>
<script type="text/javascript" src="/peihuo/Public/js/common.js"></script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>