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
            // 数据强校验
            if (!isset($_POST['order_name']) || !$_POST['order_name']) {
                return show_msg(0, '菜品名不能为空');
            }
            if (!isset($_POST['parent_id']) || !is_numeric($_POST['parent_id'])) {
                return show_msg(0, '菜品分类不能为空');
            }

            $data = [];
            $data['order_id'] = $_POST['order_id'];
            $data['order_name'] = $_POST['order_name'];
            $data['parent_id'] = $_POST['parent_id'];
            $data['order_price'] = $_POST['order_price'];
            $data['order_unit'] = $_POST['order_unit'];
            $data['update_time'] = time();

            // 若是编辑则直接更新
            if($data['order_id']) {
                return $this->save($data);
            }

            $ret = D('Order')->getOrderByName($data['order_name']);
            if($ret) {
                return show_msg(0,'菜品名已经存在');
            }

            $orderId = D("Order")->insert($data);
            if ($orderId) {
                return show_msg(1, '新增成功', $orderId);
            }
            return show_msg(0, '新增失败', $orderId);

        } else {
            $hotel = D("Hotel")->getHotelList();
            $this->assign('hotel', $hotel);

            $this->display();
        }
    }

    public function edit() {
        $orderId = $_GET['id'];

        $order = D("Order")->find($orderId);
        $this->assign('order', $order);

        $category = D("Category")->getCategoryList();
        $this->assign('category', $category);

        $this->display('add');
    }

    public function save($data) {
        $ret = D('Order')->getOrderByName($data['order_name'], $data['order_id']);
        if($ret) {
            return show_msg(0,'菜品名已经存在');
        }

        try {
            $id = D("Order")->updateByOrderId($data['order_id'], $data);
            if($id === false) {
                return show_msg(0,'更新失败');
            }
            return show_msg(1,'更新成功');
        }catch(Exception $e) {
            return show_msg(0,$e->getMessage());
        }

    }

    public function setStatus()
    {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                $status = $_POST['status'];
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