<?php
/**
 * 得到新订单号
 * @return  string
 */
function get_order_sn()
{
    /* 选择一个随机的方案 */
    mt_srand((double) microtime() * 1000000);

    return date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
}

//echo date('Y-m-d');
//echo "<br>";
echo strtotime('2017-09');
echo "<br>";
echo strtotime('2017-09 +1 month');