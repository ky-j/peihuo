<?php
namespace Home\Controller;

use Think\Controller;

class CategoryController extends CommonController
{
    public function index()
    {
        $categoryList = D("Category")->getCategoryList();
        $this->assign('categoryList', $categoryList);

        $total = D("Category")->getTotal();
        $this->assign('total', $total);

        $this->display();
    }

    public function add()
    {
        if ($_POST) {
            // 数据强校验
            if (!isset($_POST['category_name']) || !$_POST['category_name']) {
                return show_msg(0, '菜品名不能为空');
            }

            $data = [];
            $data['category_id'] = $_POST['category_id'];
            $data['category_name'] = $_POST['category_name'];
            $data['update_time'] = time();

            // 若是编辑则直接更新
            if($data['category_id']) {
                return $this->save($data);
            }

            $ret = D('Category')->getCategoryByName($data['category_name']);
            if($ret) {
                return show_msg(0,'菜品名已经存在');
            }

            $categoryId = D("Category")->insert($data);
            if ($categoryId) {
                // 添加日志
                $log = "新增菜品分类：菜品分类ID为$categoryId";
                D("Log")->insertLog($log);

                return show_msg(1, '新增成功', $categoryId);
            }
            return show_msg(0, '新增失败', $categoryId);

        } else {
            $this->display();
        }
    }

    public function edit() {
        $categoryId = $_GET['id'];

        $category = D("Category")->find($categoryId);
        $this->assign('category', $category);

        $this->display('add');
    }

    public function save($data) {
        $ret = D('Category')->getCategoryByName($data['category_name'], $data['category_id']);
        if($ret) {
            return show_msg(0,'菜品名已经存在');
        }

        try {
            $id = D("Category")->updateByCategoryId($data['category_id'], $data);
            if($id === false) {
                return show_msg(0,'更新失败');
            }
            // 添加日志
            $log = "修改菜品分类信息：菜品分类ID为$data[category_id]";
            D("Log")->insertLog($log);
            return show_msg(1,'更新成功');
        }catch(Exception $e) {
            return show_msg(0,$e->getMessage());
        }

    }

    public function setStatus()
    {
        // 判断分类下是否有数据
        $res = D("Food")->getFoodData(intval($_POST['id']));
        if($res){
            return show_msg(0, '该菜品分类下有菜品数据，无法删除');
        }
        $data = array(
            'id'=>intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($data,'Category');
    }
}