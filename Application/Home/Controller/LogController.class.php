<?php
/**
 * 后台Index相关
 */
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

class LogController extends CommonController {


    public function index() {
        $logs = D('Log')->getLogs();
        $this->assign('logs', $logs);

        $total = D("Log")->getTotal();
        $this->assign('total', $total);

        $this->display();
    }


    public function save($logId,$newPassword='') {
        $user = D("Log")->getLogByLogId($logId);
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
            $id = D("Log")->updateByLogId($user['log_id'], $data);
            if($id === false) {
                return show_msg(0, '配置失败');
            }
            return show_msg(1, '配置成功');
        }catch(Exception $e) {
            return show_msg(0, $e->getMessage());
        }
    }

}