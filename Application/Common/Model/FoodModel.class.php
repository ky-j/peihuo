<?php
namespace Common\Model;

use Think\Model;

/**
 * 菜品操作
 */
class FoodModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('food');
    }

    // 获取列表
    public function getFoodList()
    {
        $data = array(
            'status' => array('neq', -1),
        );
        return $this->_db->where($data)->order('food_id desc')->select();
    }

    // 根据id获取数据
    public function getFoodById($foodId=0) {
        $res = $this->_db->where('food_id='.$foodId)->find();
        return $res;
    }

    // 根据category_id获取数据
    public function getFoodByCateId($cateId=0) {
        $res = $this->_db->where('category_id='.$cateId)->order('food_id desc')->select();
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
        return $this->_db->where('food_id=' . $id)->save($data); // 根据条件更新记录

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
    public function updateByFoodId($id, $data)
    {

        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('food_id=' . $id)->save($data); // 根据条件更新记录
    }

    // 根据名称获取数据，分添加和修改两种情况
    public function getFoodByName($foodName = '', $foodID = '')
    {
        if ($foodID) {
            $condition = array(
                'food_name' => "$foodName",
                'food_id' => array('neq', $foodID),
                'status' => array('neq', -1),
            );
            $res = $this->_db->where($condition)->find();
//            echo $this->_db->getLastSql(); // 使用getLastSql来打印sql
        } else {
            $condition = array(
                'food_name' => "$foodName",
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
        return $this->_db->where('food_id=' . $id)->find();
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
    public function getFoodCategory() {
        $data = array(
            'status' => array('neq', -1),
            'category_id' => 0,
        );

        $res = $this->_db->where($data)
            ->order('food_id asc')
            ->select();
        return $res;
    }

    // 根据分类ID获取菜品数据
    public function getFoodData($categoryID){
        $data = array(
            'status' => array('neq', -1),
            'category_id' => $categoryID,
        );
        $res = $this->_db->where($data)
            ->order('food_id asc')
            ->select();
//            ->getField('food_id, food_name, food_price',true);
        return $res;
    }

}
