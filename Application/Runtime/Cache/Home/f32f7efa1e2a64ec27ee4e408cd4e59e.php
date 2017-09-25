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
<article class="page-container">
    <form action="index.php?c=food&a=add" method="post" class="form form-horizontal" id="peihuo-form">
        <input type="hidden" name="food_id" value="<?php echo ($food["food_id"]); ?>">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span> 菜品名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($food["food_name"]); ?>" placeholder="" id="food_name" name="food_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span>
                所属分类：</label>
            <div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="category_id" name="category_id" onchange="SetSubID(this);">
							<option value="">-=请选择分类=-</option>
                            <?php if(is_array($category)): foreach($category as $key=>$cate): ?><option value="<?php echo ($cate["category_id"]); ?>" <?php if($cate['category_id'] == $food['category_id']): ?>selected="selected"<?php endif; ?>><?php echo ($cate["category_name"]); ?></option><?php endforeach; endif; ?>
						</select>
						</span>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">默认单价：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($food["food_price"]); ?>" placeholder="不超过小数点两位，如7.85" id="food_price" name="food_price">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">默认单位：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($food["food_unit"]); ?>" placeholder="如：斤、瓶、箱" id="food_unit" name="food_unit">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

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
    $(function(){
        $("#peihuo-form").validate({
            rules:{
                food_name:{
                    required:true,
                },
                category_id:{
                    required:true,
                    digits:true
                },
                food_price:{
                    number:true
                },
            },
            onkeyup:false,
            success:"valid",
            // 通过验证后运行的函数
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    dataType: 'json',
                    success: function (data) {
                        if(data.status === 1){
                            dialog.msg("操作成功！");
                            window.parent.location.reload();
                        }else{
                            dialog.error(data.message);
                        }
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript" src="/peihuo/Public/js/common.js"></script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>