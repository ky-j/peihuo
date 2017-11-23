<?php
namespace Home\Controller;

use Think\Controller;

class FoodController extends CommonController
{
    public function index()
    {
        $foodList = D("Food")->getFoodList();
        $this->assign('foodList', $foodList);

        $total = D("Food")->getTotal();
        $this->assign('total', $total);

        $category = D("Category")->getCategoryList();
        $this->assign('category', $category);

        $this->display();
    }

    public function add()
    {
        if ($_POST) {
            // 数据强校验
            if (!isset($_POST['food_name']) || !$_POST['food_name']) {
                return show_msg(0, '菜品名不能为空');
            }
//            if (!isset($_POST['category_id']) || !is_numeric($_POST['category_id'])) {
//                return show_msg(0, '菜品分类不能为空');
//            }

            $data = [];
            $data['food_id'] = $_POST['food_id'];
            $data['food_name'] = $_POST['food_name'];
//            $data['category_id'] = $_POST['category_id'];
            $data['food_price'] = $_POST['food_price'];
            $data['food_unit'] = $_POST['food_unit'];
            $data['update_time'] = time();

            // 若是编辑则直接更新
            if($data['food_id']) {
                return $this->save($data);
            }

            $ret = D('Food')->getFoodByName($data['food_name']);
            if($ret) {
                return show_msg(0,'菜品名已经存在');
            }

            $foodId = D("Food")->insert($data);
            if ($foodId) {
                // 添加日志
                $log = "新增菜品：菜品ID为$foodId";
                D("Log")->insertLog($log);

                return show_msg(1, '新增成功', $foodId);
            }
            return show_msg(0, '新增失败', $foodId);

        } else {
//            $category = D("Category")->getCategoryList();
//            $this->assign('category', $category);

            $this->display();
        }
    }

    public function edit() {
        $foodId = $_GET['id'];

        $food = D("Food")->find($foodId);
        $this->assign('food', $food);

//        $category = D("Category")->getCategoryList();
//        $this->assign('category', $category);

        $this->display('add');
    }

    public function save($data) {
        $ret = D('Food')->getFoodByName($data['food_name'], $data['food_id']);
        if($ret) {
            return show_msg(0,'菜品名已经存在');
        }

        try {
            $id = D("Food")->updateByFoodId($data['food_id'], $data);
            if($id === false) {
                return show_msg(0,'更新失败');
            }
            // 添加日志
            $log = "修改菜品信息：菜品ID为$data[food_id]";
            D("Log")->insertLog($log);
            return show_msg(1,'更新成功');
        }catch(Exception $e) {
            return show_msg(0,$e->getMessage());
        }

    }

    public function setStatus()
    {
        $data = array(
            'id'=>intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($data,'Food');
    }

    public function getFoodData()
    {
        try {
            if ($_POST) {
                $categoryID = $_POST['category_id'];

                $res = D("Food")->getFoodData($categoryID);
                return show_msg(1, '操作成功', $res);
            }
        } catch (Exception $e) {
            return show_msg(0, $e->getMessage());
        }

        return show_msg(0, '没有提交的数据');
    }
}