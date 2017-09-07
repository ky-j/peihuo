<?php
namespace Home\Controller;
use Think\Controller;

class HotelController extends Controller {
    public function index() {
        $hotelList = D("Hotel")->getHotelList();
//        print_r($ret);
        $this->assign('hotelList',$hotelList);
        $this->display();
    }

    public function add() {
        if($_POST) {
            if(!isset($_POST['hotel_name']) || !$_POST['hotel_name']) {
                show_msg(0,'酒店名不能为空');
            }
            if(!isset($_POST['hotel_number']) || !$_POST['hotel_number']) {
                show_msg(0,'酒店编号不能为空');
            }
//            if($_POST['menu_id']) {
//                return $this->save($_POST);
//            }
            $hotelId = D("Hotel")->insert($_POST);
            if($hotelId) {
                show_msg(1,'新增成功',$hotelId);
            }
                show_msg(0,'新增失败',$hotelId);

        }else {
            $this->display();
        }
    }

    public function setStatus() {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                $status = $_POST['status'];
                // 执行数据更新操作
                $res = D("Hotel")->updateStatusById($id, $status);
                if ($res) {
                    show_msg(1, '操作成功');
                } else {
                    show_msg(0, '操作失败');
                }

            }
        }catch(Exception $e) {
            show_msg(0,$e->getMessage());
        }

        show_msg(0,'没有提交的数据');
    }
}