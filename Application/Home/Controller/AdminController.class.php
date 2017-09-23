<?php
/**
 * 后台Index相关
 */
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

class AdminController extends CommonController {


    public function index() {
        $admins = D('Admin')->getAdmins();
        $this->assign('admins', $admins);

        $total = D("Admin")->getTotal();
        $this->assign('total', $total);

        $this->display();
    }

    public function add() {

        // 保存数据
        if(IS_POST) {

            if(!isset($_POST['username']) || !$_POST['username']) {
                return show_msg(0, '用户名不能为空');
            }
            if(!isset($_POST['password']) || !$_POST['password']) {
                return show_msg(0, '密码不能为空');
            }
            $_POST['password'] = getMd5Password($_POST['password']);
            // 判定用户名是否存在
            $admin = D("Admin")->getAdminByUsername($_POST['username']);
            if($admin && $admin['status']!=-1) {
                return show_msg(0,'用户已经存在');
            }

            $_POST['update_time'] = time();
            // 新增
            $id = D("Admin")->insert($_POST);
            if(!$id) {
                return show_msg(0, '新增失败');
            }
            return show_msg(1, '新增成功');
        }
        $this->display();
    }

    public function setStatus() {
        if(intval($_POST['id']) == 1){
            return show_msg(0,'初始管理员不允许删除');
        }
        $data = array(
            'admin_id'=>intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($_POST,'Admin');
    }

    public function edit() {
        if(IS_POST) {
            if (!isset($_POST['admin_id']) || !$_POST['admin_id']) {
                return show_msg(0, '用户不能为空');
            }
            $adminId = $_POST['admin_id'];

            if($_POST['password'] && !$_POST['password2']) {
                return show_msg(0, '新密码不能为空');
            }
            if(!$_POST['password'] && $_POST['password2']) {
                return show_msg(0, '原密码不能为空');
            }

            // 如果原密码新密码都不为空
            if($_POST['password'] && $_POST['password2']) {
                $user = D("Admin")->getAdminByAdminId($adminId);
                if(getMd5Password($_POST['password']) != $user['password']) {
                    return show_msg(0,'原密码验证失败');
                }
                return $this->save($adminId, $_POST['password2']);
            }

            return $this->save($adminId);
        }

        $adminId = $_GET['id'];
        $user = D("Admin")->getAdminByAdminId($adminId);
        $this->assign('admin',$user);
        $this->display('');
    }

    public function save($adminId,$newPassword='') {
        $user = D("Admin")->getAdminByAdminId($adminId);
        if(!$user) {
            return show_msg(0,'用户不存在');
        }
        if($newPassword){
            $data['password'] = getMd5Password($newPassword);
        }

        $data['update_time'] = time();
        $data['realname'] = $_POST['realname'];
        $data['mobile'] = $_POST['mobile'];

        try {
            $id = D("Admin")->updateByAdminId($user['admin_id'], $data);
            if($id === false) {
                return show_msg(0, '配置失败');
            }
            return show_msg(1, '配置成功');
        }catch(Exception $e) {
            return show_msg(0, $e->getMessage());
        }
    }

}