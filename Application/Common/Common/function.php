<?php

// 向前端输出状态和文本
function show_message($status, $msg){
    $result = array(
        'status' => $status,
        'msg' => $msg
    );
    exit(json_encode($result));
}

// 密码加密
function password_encode($password, $salt){
    return md5($password.$salt);
}
