<?php
namespace Common\Model;

use Think\Model;

/**
 * 订单操作
 */
class OrderModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('order');
    }

    // 获取列表
    public function getOrderList()
    {
        $data = array(
            'status' => array('neq', -1),
        );
        return $this->_db->where($data)->order('order_id desc')->select();
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
        return $this->_db->where('order_id=' . $id)->save($data); // 根据条件更新记录

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
    public function updateByOrderId($id, $data)
    {

        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('order_id=' . $id)->save($data); // 根据条件更新记录
    }

    // 根据名称获取数据，分添加和修改两种情况
    public function getOrderByName($orderName = '', $orderID = '')
    {
        if ($orderID) {
            $condition = array(
                'order_name' => "$orderName",
                'order_id' => array('neq', $orderID),
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
//            echo $this->_db->getLastSql(); // 使用getLastSql来打印sql
        } else {
            $condition = array(
                'order_name' => "$orderName",
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
        return $this->_db->where('order_id=' . $id)->find();
    }

    // 获取总数
    public function getTotal()
    {
        $data = array(
            'status' => array('neq', -1),
        );
        return $this->_db->where($data)->count();
    }

    // 获取菜品顶级分类
    public function getOrderCategory() {
        $data = array(
            'status' => 1,
            'parent_id' => 0,
        );

        $res = $this->_db->where($data)
            ->order('order_id asc')
            ->select();
        return $res;
    }

}
