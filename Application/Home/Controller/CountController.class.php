<?php
namespace Home\Controller;

use Think\Controller;

class CountController extends CommonController
{
    // 打印 - 每日菜品清单
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

    // 打印 - 酒店订单
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

    // 数据统计 - 酒店
    public function hotelbymonth()
    {
        $hotelId = $_GET['hotel_id'];
        $deliveryDate = strtotime($_GET['delivery_date']);

        $info = array();
        if ($hotelId) {
            $thisHotel = D("Hotel")->getHotelById($hotelId);
            $info['hotelName'] = $thisHotel['hotel_name'];
            $info['hotelId'] = $hotelId;
        }

        $time = $_GET['delivery_date'] ? $deliveryDate : time();
        $info['date'] = date('Y-m',$time);
        $info['chineseDate'] = date('Y年n月',$time);
        $today = strtotime(get_today_date());
        $info['today'] = date('Y年n月j日',$today);
        $this->assign('info', $info);

        // 如有传参则执行查询操作
        if ($hotelId && $deliveryDate) {
            $endDate = strtotime("$_GET[delivery_date] +1 month");
            $data = D("Count")->getHotelFoodByMonth($hotelId, $deliveryDate, $endDate);
            $this->assign('data', $data);
        }

        $hotelList = D("Hotel")->getHotelList();
        $this->assign('hotelList', $hotelList);

        $this->display();
    }

    // 数据统计 - 所有菜品按月/按日进行统计
    public function foodbytime()
    {
        $countWay = $_GET['count_way'];
        $deliveryDate = strtotime($_GET['delivery_date']);

        $info = array();
        $info['countWay'] = $countWay;
        $today = get_today_date();
        $info['today'] = date('Y年n月j日',strtotime($today));
        $info['date'] = $_GET['delivery_date'] ? $_GET['delivery_date'] : $today;

        // 如有传参则执行查询操作
        if ($countWay && $deliveryDate) {
            if($countWay == 1){ //按月
                $month = date('Y-m',$deliveryDate);
                $startDate = strtotime($month);
                $endDate = strtotime("$month +1 month");
                $data = D("Count")->getFoodByTime($startDate, $endDate);
                $info['chineseDate'] = date('Y年n月',$deliveryDate);
            }elseif($countWay == 2){
                $startDate = $deliveryDate;
                $data = D("Count")->getFoodByTime($startDate);
                $info['chineseDate'] = date('Y年n月j日',$deliveryDate);
            }
            $this->assign('data', $data);
        }

        $this->assign('info', $info);
        $this->display();
    }

    // 单项菜品按月/按日进行统计
    public function onefoodbytime()
    {
        $categoryId = $_GET['category_id'];
        $foodId = $_GET['food_id'];
        $countWay = $_GET['count_way'];
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
            $info['foodUnit'] = $thisFood['food_unit'];
            $info['foodId'] = $foodId;
        }

        $info['countWay'] = $countWay;
        $today = get_today_date();
        $info['today'] = date('Y年n月j日',strtotime($today));
        $info['date'] = $_GET['delivery_date'] ? $_GET['delivery_date'] : $today;

        // 如有传参则执行查询操作
        if ($foodId && $countWay && $deliveryDate) {
            if($countWay == 1){ //按月
                $month = date('Y-m',$deliveryDate);
                $startDate = strtotime($month);
                $endDate = strtotime("$month +1 month");
                $data = D("Count")->getOneFoodByTime($foodId, $startDate, $endDate);
                $info['chineseDate'] = date('Y年n月',$deliveryDate);
            }elseif($countWay == 2){
                $startDate = $deliveryDate;
                $data = D("Count")->getOneFoodByTime($foodId, $startDate);
                $info['chineseDate'] = date('Y年n月j日',$deliveryDate);
            }
            $this->assign('data', $data);
        }

        $categoryList = D("Category")->getCategoryList();
        $this->assign('categoryList', $categoryList);

        $this->assign('info', $info);
        $this->display();
    }
}