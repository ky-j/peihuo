/**
 * 全局ajax的loading效果
 */
$(document).ready(function(){
    var layerLoad;
    $(document).ajaxStart(function(){
        layerLoad = layer.load(2);
    }).ajaxStop(function () {
        layer.close(layerLoad);
    });
});

/**
 * 添加按钮操作
 */
$("#button-add").click(function(){
    var url = SCOPE.add_url;
    window.location.href=url;
});

/**
 * 提交form表单操作
 */
$("#singcms-button-submit").click(function(){
    var data = $("#singcms-form").serializeArray();
    postData = {};
    $(data).each(function(i){
        postData[this.name] = this.value;
    });
    console.log(postData);
    // 将获取到的数据post给服务器
    url = SCOPE.save_url;
    jump_url = SCOPE.jump_url;
    $.post(url,postData,function(result){
        if(result.status == 1) {
            //成功
            return dialog.success(result.message,jump_url);
        }else if(result.status == 0) {
            // 失败
            return dialog.error(result.message);
        }
    },"JSON");
});
/*
 编辑模型
 */
$('.peihuo-table #singcms-edit').on('click',function(){
    var id = $(this).attr('attr-id');
    var url = SCOPE.edit_url + '&id='+id;
    window.location.href=url;
});


/**
 * 删除记录操作JS
 */
$('.peihuo-table .peihuo-delete').on('click',function(){
    var id = $(this).attr('attr-id');
    var a = $(this).attr('attr-a');
    var message = $(this).attr('attr-message');
    var url = SCOPE.set_status_url;

    data = {};
    data['id'] = id;
    data['status'] = -1;

    var confirmMessage = '确认要删除ID为'+id+'的记录吗？';
    var that = this;
    layer.confirm(confirmMessage,function(index){
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            success: function(result){
                if(result.status === 1){
                    // $(that).parents("tr").remove();
                    dialog.msg('删除成功！');
                    location.reload();
                }else{
                    dialog.error(result.message);
                }
            },
        });
    });
});

/**
 * 标记配送记录操作JS
 */
// $('.peihuo-table .peihuo-delivery').on('click',function(){
//     var id = $(this).attr('attr-id');
//     var a = $(this).attr('attr-a');
//     var message = $(this).attr('attr-message');
//     var url = SCOPE.set_status_url;
//
//     data = {};
//     data['id'] = id;
//     data['status'] = 2;
//
//     var confirmMessage = '确认要标记ID为'+id+'的记录的状态为已配送吗？';
//     var that = this;
//     layer.confirm(confirmMessage,function(index){
//         $.ajax({
//             type: 'POST',
//             url: url,
//             data: data,
//             dataType: 'json',
//             success: function(result){
//                 if(result.status === 1){
//                     // $(that).parents("tr").remove();
//                     dialog.msg('标记成功！');
//                     location.reload();
//                 }else{
//                     dialog.error(result.message);
//                 }
//             },
//         });
//     });
// });

/**
 * 终结记录操作JS
 */
$('.peihuo-table .peihuo-complete').on('click',function(){
    var id = $(this).attr('attr-id');
    var a = $(this).attr('attr-a');
    var message = $(this).attr('attr-message');
    var url = SCOPE.set_status_url;

    data = {};
    data['id'] = id;
    data['status'] = 3;

    var confirmMessage = '确认要终结ID为'+id+'的记录吗？';
    var that = this;
    layer.confirm(confirmMessage,function(index){
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            success: function(result){
                if(result.status === 1){
                    // $(that).parents("tr").remove();
                    dialog.msg('终结成功！');
                    location.reload();
                }else{
                    dialog.error(result.message);
                }
            },
        });
    });
});

/**
 * 排序操作
 */
$('#button-listorder').click(function() {
    // 获取 listorder内容
    var data = $("#singcms-listorder").serializeArray();
    postData = {};
    $(data).each(function(i){
        postData[this.name] = this.value;
    });
    console.log(data);
    var url = SCOPE.listorder_url;
    $.post(url,postData,function(result){
        if(result.status == 1) {
            //成功
            return dialog.success(result.message,result['data']['jump_url']);
        }else if(result.status == 0) {
            // 失败
            return dialog.error(result.message,result['data']['jump_url']);
        }
    },"JSON");
});

/**
 * 修改状态
 */
$('.singcms-table #singcms-on-off').on('click', function(){

    var id = $(this).attr('attr-id');
    var status = $(this).attr("attr-status");
    var url = SCOPE.set_status_url;

    data = {};
    data['id'] = id;
    data['status'] = status;

    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定更改状态",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url, data);
        },

    });

});

/**
 * 推送JS相关
 */
$("#singcms-push").click(function(){
    var id = $("#select-push").val();
    if(id==0) {
        return dialog.error("请选择推荐位");
    }
    push = {};
    postData = {};
    $("input[name='pushcheck']:checked").each(function(i){
        push[i] = $(this).val();
    });

    postData['push'] = push;
    postData['position_id']  =  id;
    //console.log(postData);return;
    var url = SCOPE.push_url;
    $.post(url, postData, function(result){
        if(result.status == 1) {
            // TODO
            return dialog.success(result.message,result['data']['jump_url']);
        }
        if(result.status == 0) {
            // TODO
            return dialog.error(result.message);
        }
    },"json");

});