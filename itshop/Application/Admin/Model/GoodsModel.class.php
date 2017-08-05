<?php
namespace Admin\Model;
use Think\Model;

class GoodsModel extends Model{
    //定义数据表主键和字段
    protected $pk = 'goods_id';
    //定义数据表字段
    protected $fields = array(
        'goods_id', 'goods_name', 'goods_price', 'goods_vip_price',
        'goods_num', 'goods_weight', 'goods_introduce', 'goods_logo',
        'goods_small_logo', 'goods_cateid', 'goods_brandid', 'goods_addtime',
        'goods_udptime', 'goods_saletime', 'goods_isdel'
    );
    //定义字段映射
    protected $_map = array(
        'name' => 'goods_name',
        'price' => 'goods_price',
        'vip'   => 'goods_vip_price',
        'num'   => 'goods_num',
        'weight'=> 'goods_weight',
        'isdel' => 'goods_isdel',
        'intro' => 'goods_introduce'
    );
    //自动验证
    protected $_validate = array(
        //验证商品名称不能为空
        array('goods_name', 'require', '商品名称不能为空', 1, 'regex', 3),
        //验证商品价格必须为数字
        array('goods_price', 'currency', '商品价格格式不正确', 1, 'regex', 3),
    );
    //自动完成
    protected $_auto = array(
        //自动完成新增时间
        array('goods_addtime', 'time', 1, 'function'),
        //自动完成修改时间
        array('goods_udptime', 'time', 3, 'function'),
    );
    
    function addGoods($pic){
        //1. 调用create方法接收表单数据
        $goods_info = $this->create('', 1);
        // 将参数中接收的大图和小图路径直接合并到要写入数据表的数组中
        $goods_info = array_merge($goods_info, $pic);
        //$goods_info['goods_name'] = filterXSS($goods_info['goods_name']);
        //2. 判断goods_info的值
        if(!$goods_info){
            return $this->getError();
        } else {
            //如果goods_info正常，则写入数据表
            $add_result = $this->add($goods_info);
            if($add_result){
                return $add_result;
            } else {
                return false;
            }
        }
    }
}









