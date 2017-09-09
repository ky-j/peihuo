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
function getCatName($catgories, $id) {
    foreach($catgories as $cat) {
        $catList[$cat['category_id']] = $cat['category_name'];
    }
    return isset($catList[$id]) ? $catList[$id] : '';
}

// 密码加密
function password_encode($password, $salt)
{
    return md5($password . $salt);
}
