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

// 密码加密
function password_encode($password, $salt)
{
    return md5($password . $salt);
}
