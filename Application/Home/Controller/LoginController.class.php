<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index() {
        $this->webname = C('WEBNAME');
        $this->display();
    }

    public function check() {
        $username = I('post.username');
        $password = I('post.password');

        if(!trim($username)){
            return show_msg(0,'用户名不能为空！');
        }

        if(!trim($password)){
            return show_msg(0,'密码不能为空！');
        }

        $ret = D('Admin')->getAdminByUsername($username);
        if(!$ret || $ret['status'] !=1) {
            return show_msg(0,'该用户不存在');
        }

        if($ret['password'] != getMd5Password($password)) {
            return show_msg(0,'密码错误');
        }

        D("Admin")->updateByAdminId($ret['admin_id'],array('lastlogintime'=>time()));

        session('adminUser', $ret);
        return show(1,'登录成功');

    }

    public function loginVerify() {
        // 配置验证码
        $config = array(
            'fontSize'  =>    18,
            'length'    =>    4,
            'imageW'    =>    120,
            'imageH'    =>    36,
            // 'useCurve'  =>    false,

        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function logout() {
        session('adminUser', null);
        $this->redirect('admin.php?c=login');
    }
}