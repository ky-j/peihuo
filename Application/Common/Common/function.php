<?php

// 向前端输出状态和文本
function show_msg($status, $message, $data = array())
{
    $result = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );

    exit(json_encode($result));
}

// 根据分类id获取对应的分类名
function getCatName($catgories, $id)
{
    foreach ($catgories as $cat) {
        $catList[$cat['category_id']] = $cat['category_name'];
    }
    return isset($catList[$id]) ? $catList[$id] : '';
}

// 获取订单状态
function orderStatus($status) {
    if($status == 1) {
        $str = '未配送';
    }elseif($status == 2) {
        $str = '<span class="c-success">已配送</span>';
    }elseif($status == 3) {
        $str = '<span class="c-orange">已终结</span>';
    }
    return $str;
}

// 获取删除日志信息
function getDeleteLog($models, $id, $status='-1') {
    if($models == "Admin") {
        $logs = "删除用户：用户ID为$id";
    }elseif($models == "Hotel") {
        $logs = "删除酒店：酒店ID为$id";
    }elseif($models == "Category") {
        $logs = "删除菜品分类：菜品分类ID为$id";
    }elseif($models == "Food") {
        $logs = "删除菜品：菜品ID为$id";
    }elseif($models == "Order") {
        if($status == '-1'){
            $logs = "删除订单：订单ID为$id";
        }elseif($status == '2'){
            $logs = "标记订单为“已配送”状态：订单ID为$id";
        }elseif($status == '3'){
            $logs = "标记订单为“已终结”状态：订单ID为$id";
        }
    }
    return $logs;
}

/**
 * 得到新订单号，参考ecshop
 * @return  string
 */
function get_order_sn()
{
    /* 选择一个随机的方案 */
    mt_srand((double)microtime() * 1000000);

    return date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
}

// 返回今天的日期
function get_today_date()
{
    return date("Y-m-d");
}

// 返回明天的日期
function get_tomorrow_date()
{
    $tomorrow = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
    return date("Y-m-d", $tomorrow);
}

// 密码加密
function password_encode($password, $salt)
{
    return md5($password . $salt);
}

// 获取加密过的密码
function getMd5Password($password) {
    return md5($password . C('MD5_PRE'));
}