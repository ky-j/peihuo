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
        $this->display();
    }
}