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
        $verifycode = I('post.verifycode');

        if(!check_verify($verifycode)){
            $this->error('验证码错误！');
        }

        if(!trim($username)){
            $this->error('用户名不能为空！');
        }

        if(!trim($password)){
            $this->error('密码不能为空！');
        }

        // 判断用户名和密码是否一致
        $ret = D(Admin)->checkAdmin($username, $password);
        if(!$ret){
            $this->error('用户名或者密码错误！');
        }

        session('adminUser', $ret);

        $this->success('登录成功！');

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