<?php
namespace Home\Controller;

use Think\Controller;

class CountController extends Controller
{
    public function foodbyday()
    {
        $categoryId = $_GET['category_id'];
        $foodId = $_GET['food_id'];
        $deliveryDate = strtotime($_GET['delivery_date']);

        $info = array();
        if ($categoryId) {
            $foodList = D("Food")->getFoodByCateId($categoryId);
            $this->assign('foodList', $foodList);
            $info['categoryId'] = $categoryId;
        }
        if ($foodId) {
            $thisFood = D("Food")->getFoodById($foodId);
            $info['foodName'] = $thisFood['food_name'];
            $info['foodId'] = $foodId;
        }

        $today = get_today_date();
        $info['date'] = $_GET['delivery_date'] ? $_GET['delivery_date'] : $today;
        $this->assign('info', $info);

        // 如有传参则执行查询操作
        if ($foodId && $deliveryDate) {
            $data = D("Count")->getFoodByDate($foodId, $deliveryDate);
            $this->assign('data', $data);
        }

        $categoryList = D("Category")->getCategoryList();
        $this->assign('categoryList', $categoryList);

        $this->display();
    }

    public function hotelbysn()
    {
        $orderSn = $_GET['order_sn'];
        $this->assign('orderSn', $orderSn);

        // 如有传参则执行查询操作
        if ($orderSn) {
            $order = D("Order")->getOrderBySn($orderSn);
            $this->assign('order', $order);

            if($order){
                $data = D("Count")->getCountPrintList($order['order_id']);
                $this->assign('data', $data);
            }
        }

        $this->display();
    }

}