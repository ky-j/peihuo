<?php
namespace Home\Controller;

use Think\Controller;

class HotelController extends Controller
{
    public function index()
    {
        $hotelList = D("Hotel")->getHotelList();
        $this->assign('hotelList', $hotelList);

        $total = D("Hotel")->getTotal();
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
                $res = D("Hotel")->updateStatusById($id, $status);
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