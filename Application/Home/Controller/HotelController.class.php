<?php
namespace Home\Controller;

use Think\Controller;

class HotelController extends CommonController
{
    public function index()
    {
        $hotelList = D("Hotel")->getHotelList();
        $this->assign('hotelList', $hotelList);

        $total = D("Hotel")->getTotal();
        $this->assign('total', $total);

        $this->display();
    }

    public function add()
    {
        if ($_POST) {
            // 数据强校验
            if (!isset($_POST['hotel_name']) || !$_POST['hotel_name']) {
                return show_msg(0, '酒店名不能为空');
            }
            if (!isset($_POST['hotel_number']) || !$_POST['hotel_number']) {
                return show_msg(0, '酒店编号不能为空');
            }

            $data = [];
            $data['hotel_id'] = $_POST['hotel_id'];
            $data['hotel_name'] = $_POST['hotel_name'];
            $data['hotel_number'] = $_POST['hotel_number'];
            $data['update_time'] = time();

            // 若是编辑则直接更新
            if($data['hotel_id']) {
                return $this->save($data);
            }

            $ret = D('Hotel')->getHotelByName($data['hotel_name']);
            if($ret) {
                return show_msg(0,'酒店名已经存在');
            }

            $ret = D('Hotel')->getHotelByNumber($data['hotel_number']);
            if($ret) {
                return show_msg(0,'酒店编号已经存在');
            }

            $hotelId = D("Hotel")->insert($data);
            if ($hotelId) {
                // 添加日志
                $log = "新增酒店：酒店ID为$hotelId";
                D("Log")->insertLog($log);

                return show_msg(1, '新增成功', $hotelId);
            }
            return show_msg(0, '新增失败', $hotelId);
        } else {
            $this->display();
        }
    }

    public function edit() {
        $hotelId = $_GET['id'];

        $hotel = D("Hotel")->find($hotelId);
        $this->assign('hotel', $hotel);
        $this->display('add');
    }

    public function save($data) {
        $ret = D('Hotel')->getHotelByName($data['hotel_name'], $data['hotel_id']);
        if($ret) {
            return show_msg(0,'酒店名已经存在');
        }

        $ret = D('Hotel')->getHotelByNumber($data['hotel_number'], $data['hotel_id']);
        if($ret) {
            return show_msg(0,'酒店编号已经存在');
        }

        try {
            $id = D("Hotel")->updateByHotelId($data['hotel_id'], $data);
            if($id === false) {
                return show_msg(0,'更新失败');
            }

            // 添加日志
            $log = "修改酒店信息：酒店ID为$data[hotel_id]";
            D("Log")->insertLog($log);

            return show_msg(1,'更新成功');
        }catch(Exception $e) {
            return show_msg(0,$e->getMessage());
        }

    }

    public function setStatus()
    {
        // 判断酒店下是否有订单数据
        $res = D("Order")->getOrderByHotelId(intval($_POST['id']));
        if($res){
            return show_msg(0, '该酒店下有订单数据，无法删除');
        }
        $data = array(
            'id'=>intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($data,'Hotel');
    }
}