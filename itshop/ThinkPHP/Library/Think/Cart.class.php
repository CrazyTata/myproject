<?php
namespace Think;

class Cart{
    //购物车类
    private $cart;
    
    function __construct(){
        //根据是否存在session来实例化不同的底层类
        if(session('?mem_id')){
            $class = 'Think\Cart\Driver\MysqlCart';
        } else {
            $class = 'Think\Cart\Driver\CookieCart';
        }
        $this->cart = new $class();
    }
    
    function addCart($goods_info){
        return $this->cart->addCart($goods_info);
    }
    
    //获取当前用户购物车中的总商品数和总价格
    function getPriceNumber($memid){
        return $this->cart->getPriceNumber($memid);
    }
    
    //读取购物车信息列表
    function getCartList($memid){
        return $this->cart->getCartList($memid);
    }
    
    function delCart($cart_id){
        return $this->cart->delCart($cart_id);
    }
    
    function changeCartNum($cart_id, $num){
        return $this->cart->changeCartNum($cart_id, $num);
    }
    
    function getPrice($cart_id){
        return $this->cart->getPrice($cart_id);
    }
    
    function cookieToMysql($memid){
        $this->cart->cookieToMysql($memid);    
    }
    
    function clearCart($memid){
        return $this->cart->clearCart($memid);
    }
}


















