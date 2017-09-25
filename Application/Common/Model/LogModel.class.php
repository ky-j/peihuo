<?php
namespace Common\Model;
use Think\Model;

/**
 * 日志操作
 */
class LogModel extends Model {
    private $_db = '';

    public function __construct() {
        $this->_db = M('log');
    }

    public function getLogs() {
        return $this->_db->order('log_id desc')->select();
    }

    public function insertLog($log) {
        $data = array(
            'log_time' => time(),
            'log_info' => $log,
            'admin_id' => $_SESSION['adminUser']['admin_id'],
            'admin_user' => $_SESSION['adminUser']['username'],
        );
        return $this->_db->add($data);
    }

    public function getLogByUsername($username='') {
        $res = $this->_db->where('username="'.$username.'"')->find();
        return $res;
    }
    public function getLogByLogId($logId=0) {
        $res = $this->_db->where('log_id='.$logId)->find();
        return $res;
    }

    public function updateByLogId($id, $data) {

        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return  $this->_db->where('log_id='.$id)->save($data); // 根据条件更新记录
    }

    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }


    /**
     * 通过id更新的状态
     * @param $id
     * @param $status
     * @return bool
     */
    public function updateStatusById($id, $status) {
        if(!is_numeric($status)) {
            throw_exception("status不能为非数字");
        }
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        $data['status'] = $status;
        return  $this->_db->where('log_id='.$id)->save($data); // 根据条件更新记录

    }

    public function getLastLoginUsers() {
        $time = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $data = array(
            'status' => 1,
            'lastlogintime' => array("gt",$time),
        );

        $res = $this->_db->where($data)->count();
        return $res['tp_count'];
    }

    // 获取总数
    public function getTotal()
    {
        $data = array(
            'status' => array('neq', -1),
        );
        return $this->_db->where($data)->count();
    }

}
