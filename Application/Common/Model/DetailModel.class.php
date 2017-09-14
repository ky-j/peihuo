<?php
namespace Common\Model;

use Think\Model;

/**
 * 酒店操作
 */
class DetailModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('detail');
    }

    // 获取列表
    public function getDetailList()
    {
        $data = array(
            'status' => array('neq', -1),
        );
        return $this->_db->where($data)->order('detail_id asc')->select();
    }

    // 获取打印列表
    public function getDetailPrintList($orderId)
    {
        if (!$orderId || !is_numeric($orderId)) {
            throw_exception("orderId不合法");
        }
        $data = array(
            'status' => array('neq', -1),
        );
        return $this->_db->field('food_name,SUM(order_number) AS total ')->where($data)->order('detail_id asc')->group('food_name')->select();
    }

    // 根据id获取数据
    public function getDetailByOrderId($orderId = '', $departID = '')
    {
        if ($departID) {
            $condition = array(
                'depart_id' => "$departID",
                'order_id' =>  "$orderId",
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->order('detail_id asc')->select();
//            echo $this->_db->getLastSql(); // 使用getLastSql来打印sql
        } else {
            $condition = array(
                'order_id' =>  "$orderId",
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->order('detail_id asc')->select();
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
        return $this->_db->where('detail_id=' . $id)->save($data); // 根据条件更新记录

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
    public function updateByDetailId($id, $data)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('detail_id=' . $id)->save($data); // 根据条件更新记录
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
    public function getDetailByName($detailName = '', $detailID = '')
    {
        if ($detailID) {
            $condition = array(
                'detail_name' => "$detailName",
                'detail_id' => array('neq', $detailID),
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
//            echo $this->_db->getLastSql(); // 使用getLastSql来打印sql
        } else {
            $condition = array(
                'detail_name' => "$detailName",
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
        }
        return $res;
    }

    // 根据编号获取数据，分添加和修改两种情况
    public function getDetailByNumber($detailNumber = '', $detailID = '')
    {
        if ($detailID) {
            $condition = array(
                'detail_number' => "$detailNumber",
                'detail_id' => array('neq', $detailID),
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
        } else {
            $condition = array(
                'detail_number' => "$detailNumber",
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
        return $this->_db->where('detail_id=' . $id)->find();
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
