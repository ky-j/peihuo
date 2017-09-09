<?php
namespace Home\Controller;

use Think\Controller;

class CategoryController extends Controller
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
                $res = D("Category")->updateStatusById($id, $status);
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