<?php
namespace Common\Model;

use Think\Model;

/**
 * 酒店操作
 */
class HotelModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('hotel');
    }

    // 获取列表
    public function getHotelList()
    {
        $data = array(
            'status' => array('neq', -1),
        );
        return $this->_db->where($data)->order('hotel_id asc')->select();
    }

    // 根据id获取数据
    public function getHotelById($hotelId=0) {
        $res = $this->_db->where('hotel_id='.$hotelId)->find();
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
        return $this->_db->where('hotel_id=' . $id)->save($data); // 根据条件更新记录

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
    public function updateByHotelId($id, $data)
    {

        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('hotel_id=' . $id)->save($data); // 根据条件更新记录
    }

    // 根据名称获取数据，分添加和修改两种情况
    public function getHotelByName($hotelName = '', $hotelID = '')
    {
        if ($hotelID) {
            $condition = array(
                'hotel_name' => "$hotelName",
                'hotel_id' => array('neq', $hotelID),
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
//            echo $this->_db->getLastSql(); // 使用getLastSql来打印sql
        } else {
            $condition = array(
                'hotel_name' => "$hotelName",
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
        }
        return $res;
    }

    // 根据编号获取数据，分添加和修改两种情况
    public function getHotelByNumber($hotelNumber = '', $hotelID = '')
    {
        if ($hotelID) {
            $condition = array(
                'hotel_number' => "$hotelNumber",
                'hotel_id' => array('neq', $hotelID),
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
        } else {
            $condition = array(
                'hotel_number' => "$hotelNumber",
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
        return $this->_db->where('hotel_id=' . $id)->find();
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
