<?php
/**
 * Created by PhpStorm.
 * User: MoganWang
 * Date: 2017/6/25
 * Time: 20:09
 */

namespace Think\Cart\Driver;


class CookieCart
{
    //定义一个私有属性保存cookie对象
    private $cart;
    public function __construct(){
        $this->cart = cookie('cart');
        if(empty($this->cart)){
            $this->cart = array();
        }else{
            $this->cart = unserialize($this->cart);
        }
    }
    public function addCart($cart_data)
    {
        $cart_data['cart_id'] = count($this->cart);
        $key = array_push($this->cart,$cart_data);
        cookie('cart',serialize($this->cart));
        return $key;
    }
    public function getPrice(){
        $total_price = '';
        foreach($this->cart as $key => $value){
            $total_price .= D('Goods')
                ->field("{$value['cart_num']}*goods_price")
                ->find();
        }
        return $total_price;
    }
    public function getSum(){
       return D('Cart')->sum('cart_num');
    }
    public function getFlow(){
        foreach($this->cart as $key => $value){
            $goodsInfo= D('Goods')->find($value['cart_goods_id']);
            $this->cart[$key] = array_merge($this->cart,$goodsInfo);
        }
        return $this->cart;
    }
    public function delOne($cart_id){
        unset($this->cart[$cart_id]);
        $tmp = array();
        $i = 0;
        foreach ($this->cart as $k=>$v){
            $v['cart_id'] = $i;
            $tmp[$i] = $v;
            $i++;
        }
        $this->cart = $tmp;
        cookie('cart',serialize($this->cart));
        return true;
    }
}