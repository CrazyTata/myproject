<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/6/25
 * Time: 20:09
 */
namespace Think\Cart\Driver;
class MysqlCart
{
    public function addCart($cart_data)
    {
        $cart_data['cart_mem_id'] = session('mem_id');
        return D('Cart')->add($cart_data);
    }

    public function getPrice()
    {
        $mem_id = session('mem_id');
        return D('Cart')->alias('c')
            ->join('left join sp_goods g on g.goods_id = c.cart_goods_id ')
            ->where('c.cart_mem_id =' . $mem_id)
            ->sum('c.cart_num * g.goods_price');
    }
    public function getSum(){
        $mem_id = session('mem_id');
        return D('Cart')->where('cart_mem_id='.$mem_id)->sum('cart_num');
    }
    public function getFlow(){
        $mem_id = session('mem_id');
        return D('Cart')->alias('c')
            ->join('left join sp_goods g on g.goods_id = c.cart_goods_id ')
            ->where('c.cart_mem_id =' . $mem_id)
            ->select();
    }
    public function changeNum($cart_id,$cart_num){
        $data = array('cart_num'=>$cart_num);
        return D('Cart')->where('cart_id='.$cart_id)->save($data);
    }
    public function delOne($cart_id){
        return D('Cart')->where('cart_id=' . $cart_id)->delete();
    }
    public function delAll(){
        return D('Cart')->where('cart_mem_id=' .session('mem_id'))->delete();
    }

}
