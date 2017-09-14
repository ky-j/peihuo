<?php
namespace Common\Model;

use Think\Model;

/**
 * 统计操作
 */
class CountModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('count');
    }

    // 获取列表
    public function getCountList()
    {
        $data = array(
            'status' => array('neq', -1),
        );
        return $this->_db->where($data)->order('count_id asc')->select();
    }

    // 获取打印列表
    public function getCountPrintList($orderId)
    {
        if (!$orderId || !is_numeric($orderId)) {
            throw_exception("orderId不合法");
        }
        $data = array(
            'status' => array('neq', -1),
        );
        return $this->_db->field('food_name,
        SUM(depart_number_1) AS total1,
        SUM(depart_number_2) AS total2,
	    SUM(depart_number_3) AS total3,
	    SUM(depart_number_4) AS total4,
	    SUM(depart_number_5) AS total5,
	    SUM(order_number) AS total')->where($data)->order('count_id asc')->group('food_name')->select();
    }

    // 根据id获取数据
    public function getCountByOrderId($orderId = '', $departID = '')
    {
        if ($departID) {
            $condition = array(
                'depart_id' => "$departID",
                'order_id' => "$orderId",
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->order('count_id asc')->select();
//            echo $this->_db->getLastSql(); // 使用getLastSql来打印sql
        } else {
            $condition = array(
                'order_id' => "$orderId",
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->order('count_id asc')->select();
        }
        return $res;
    }

    // 更新状态值
    public function updateStatusById($id, $status)
    {
        if (!is_numeric($status)) {
            throw_exception("status不能为非数字");
        }
        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        $data['status'] = $status;
        return $this->_db->where('count_id=' . $id)->save($data); // 根据条件更新记录

    }

    // 插入数据
    public function insert($data = array())
    {
        if (!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    // 根据id更新数据
    public function updateByCountId($id, $data)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('count_id=' . $id)->save($data); // 根据条件更新记录
    }

    // 根据order_id删除数据
    public function deleteByOrderId($orderId)
    {
        if (!$orderId || !is_numeric($orderId)) {
            throw_exception("orderId不合法");
        }
        return $this->_db->where('order_id=' . $orderId)->delete(); // 根据条件删除记录
    }

    // 根据名称获取数据，分添加和修改两种情况
    public function getCountByName($countName = '', $countID = '')
    {
        if ($countID) {
            $condition = array(
                'count_name' => "$countName",
                'count_id' => array('neq', $countID),
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
//            echo $this->_db->getLastSql(); // 使用getLastSql来打印sql
        } else {
            $condition = array(
                'count_name' => "$countName",
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
        }
        return $res;
    }

    // 根据编号获取数据，分添加和修改两种情况
    public function getCountByNumber($countNumber = '', $countID = '')
    {
        if ($countID) {
            $condition = array(
                'count_number' => "$countNumber",
                'count_id' => array('neq', $countID),
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
        } else {
            $condition = array(
                'count_number' => "$countNumber",
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
        }
        return $res;
    }

    // 根据ID获取数据
    public function find($id)
    {
        if (!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('count_id=' . $id)->find();
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
