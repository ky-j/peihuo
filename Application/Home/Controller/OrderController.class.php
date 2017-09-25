<?php
namespace Home\Controller;

use Think\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orderList = D("Order")->getOrderList();
        $this->assign('orderList', $orderList);

        $total = D("Order")->getTotal();
        $this->assign('total', $total);

        $this->display();
    }

    public function add()
    {
        if ($_POST) {
//            print_r($_POST);
//            exit();

            // 数据强校验
            if (!isset($_POST['hotel_id']) || !$_POST['hotel_id']) {
                return show_msg(0, '酒店不能为空');
            }

//            $hotel = D("Hotel")->getHotelById($_POST['hotel_id']);

            $data = [];
            $data['hotel_id'] = $_POST['hotel_id'];
//            $data['hotel_name'] = $hotel['hotel_name'];
//            $data['hotel_number'] = $hotel['hotel_number'];
            $data['order_sn'] = get_order_sn();
            $data['order_date'] = time();
            $data['delivery_date'] = strtotime($_POST['delivery_date']);
            $data['update_time'] = time();

            // 插入order表
            $orderId = D("Order")->insert($data);

            if ($orderId) {
                // 依据下单数量，处理各个部门的数据
                $num = count($_POST['order_number']);

                for($i=0; $i<$num; ++$i) {
                    if($_POST['order_number'][$i]){
                        $detailData['order_id'] = $orderId;
                        $detailData['hotel_id'] = $_POST['hotel_id'];
                        $detailData['update_time'] = time();
//                        $detailData['hotel_name'] = $hotel['hotel_name'];
//                        $detailData['hotel_number'] = $hotel['hotel_number'];
                        $detailData['depart_id'] = $departID = $_POST['depart_id'][$i];
                        $detailData["depart_number_$departID"] = $_POST['order_number'][$i];

                        $detailData['category_id'] = $_POST['category_id'][$i];
//                        $category = D("Category")->getCategoryById($_POST['category_id'][$i]);
//                        $detailData['category_name'] = $category['category_name'];

                        $detailData['food_id'] = $_POST['food_id'][$i];
//                        $food = D("Food")->getFoodById($_POST['food_id'][$i]);
                        $detailData['food_price'] = $_POST['food_price'][$i];
//                        $detailData['food_name'] = $food['food_name'];
//                        $detailData['food_unit'] = $food['food_unit'];

                        $detailData['order_number'] = $_POST['order_number'][$i];
                        $detailData['delivery_number'] = $_POST['delivery_number'][$i];

                        // 只有选择菜品和填写下单数量才会插入detail表
                        if($detailData['food_id'] && $detailData['order_number']) {
                            $detaiId = D("Detail")->insert($detailData);
                            $countId = D("Count")->insert($detailData);
                            unset($detailData["depart_number_$departID"]); //销毁depart_number_$i
                        }
                    }
                }

                return show_msg(1, '新增成功', $orderId);
            }
            return show_msg(0, '新增失败', $orderId);

        } else {
            $hotelList = D("Hotel")->getHotelList();
            $this->assign('hotelList', $hotelList);

            $categoryList = D("Category")->getCategoryList();
            $this->assign('categoryList', $categoryList);

//            $today =  get_today_date();
//            $this->assign('today', $today);

            $tomorrow =  get_tomorrow_date();
            $this->assign('tomorrow', $tomorrow);

            $this->display();
        }
    }

    // 修改订单
    public function edit() {
        if ($_POST) {
//            print_r($_POST);
//            exit();

            // 数据强校验
            if (!isset($_POST['hotel_id']) || !$_POST['hotel_id']) {
                return show_msg(0, '酒店不能为空');
            }

            $data = Array();
            $orderId = $data['order_id'] = $_POST['order_id'];
            $data['hotel_id'] = $_POST['hotel_id'];
            $data['delivery_date'] = strtotime($_POST['delivery_date']);
            $data['update_time'] = time();

            if ($orderId) {
                // 更新order表
                $this->save($data);

                // 删除detail表中原有数据
                D("Detail")->deleteByOrderId($orderId);

                // 删除count表中原有数据
                D("Count")->deleteByOrderId($orderId);

                // 依据下单数量，处理各个部门的数据
                $num = count($_POST['order_number']);
//                print_r($_POST['order_number']);
//                echo $num;
//                exit;
                for($i=0; $i<$num; ++$i) {
                    if($_POST['order_number'][$i]){
                        $detailData['order_id'] = $orderId;
                        $detailData['hotel_id'] = $_POST['hotel_id'];
                        $detailData['update_time'] = time();

                        $detailData['depart_id'] = $departID = $_POST['depart_id'][$i];
                        $detailData["depart_number_$departID"] = $_POST['order_number'][$i];

                        $detailData['category_id'] = $_POST['category_id'][$i];

                        $detailData['food_id'] = $_POST['food_id'][$i];
                        $detailData['food_price'] = $_POST['food_price'][$i];

                        $detailData['order_number'] = $_POST['order_number'][$i];
                        $detailData['delivery_number'] = $_POST['delivery_number'][$i];

//                        print_r($detailData);
//                        exit();

                        // 只有选择菜品和填写下单数量才会插入detail和count表
                        if($detailData['food_id'] && $detailData['order_number']) {
                            $detaiId = D("Detail")->insert($detailData);
                            $countId = D("Count")->insert($detailData);
                            unset($detailData["depart_number_$departID"]); //销毁depart_number_$i
                        }
                    }
                }
                return show_msg(1, '修改成功', $orderId);
            }
            return show_msg(0, '修改失败', $orderId);
        } else {
            $orderId = $_GET['id'];

            $order = D("Order")->find($orderId);
            $this->assign('order', $order);

            $hotelList = D("Hotel")->getHotelList();
            $this->assign('hotelList', $hotelList);

            $categoryList = D("Category")->getCategoryList();
            $this->assign('categoryList', $categoryList);

            $foodList = D("Food")->getFoodList();
            $this->assign('foodList', $foodList);

            $list_1 = D("Detail")->getDetailByOrderId($orderId, 1);
            $this->assign('list_1', $list_1);

            $list_2 = D("Detail")->getDetailByOrderId($orderId, 2);
            $this->assign('list_2', $list_2);
            $list_3 = D("Detail")->getDetailByOrderId($orderId, 3);
            $this->assign('list_3', $list_3);
            $list_4 = D("Detail")->getDetailByOrderId($orderId, 4);
            $this->assign('list_4', $list_4);
            $list_5 = D("Detail")->getDetailByOrderId($orderId, 5);
            $this->assign('list_5', $list_5);

//        print_r($list_1);

            $this->display('');
        }
    }

    // 保存修改
    public function save($data) {
        try {
            $id = D("Order")->updateByOrderId($data['order_id'], $data);
            if($id === false) {
                return show_msg(0,'更新失败');
            }
//            return show_msg(1,'更新成功');
        }catch(Exception $e) {
            return show_msg(0,$e->getMessage());
        }

    }

    // 查看订单
    public function check(){
        $orderId = $_GET['id'];

        $order = D("Order")->getOrderById($orderId);
        $this->assign('order', $order);

        $countPrint = D("Count")->getCountPrintList($orderId);
        //print_r($countPrint);
        $this->assign('countPrint', $countPrint);

        $this->display('');
    }

    public function setStatus()
    {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                $status = $_POST['status'];

                // 标记已配送时，检查配送数量是否都填了
                if($status == 2){
                    $res = D("Detail")->getDetailByOrderId($id);
                    foreach($res as $value){
                        if($value['delivery_number'] == ""){
                            return show_msg(0, '需填写完整的配送数量才能进行标记');
                        }
                    }
                }

                // 终结订单时，确保订单状态为已配送
                if($status == 3){
                    $res = D("Order")->find($id);
                    if($res['status'] < 2){
                        return show_msg(0, '只有状态为已配送的订单才能进行终结操作');
                    }
                }

                // 执行数据更新操作
                $res = D("Order")->updateStatusById($id, $status);
                if ($res) {
                    return show_msg(1, '操作成功');
                } else {
                    return show_msg(0, '操作失败');
                }

            }
        } catch (Exception $e) {
            return show_msg(0, $e->getMessage());
        }

        return show_msg(0, '没有提交的数据');
    }

}