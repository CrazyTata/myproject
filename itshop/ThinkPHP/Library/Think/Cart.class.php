<?php
namespace Think;

class Cart
{
    private $cart;

    public function __construct()
    {
        if (session('?mem_id')) {
            $class = 'Think\\Cart\\Driver\\MysqlCart';
        } else {
            $class = 'Think\\Cart\\Driver\\CookieCart';
        }
        $this->cart = new $class();
    }

    public function addCart($cart_data)
    {
        return $this->cart->addCart($cart_data);
    }

    public function getPrice()
    {
        return $this->cart->getPrice();
    }

    public function getFlow()
    {
        return $this->cart->getFlow();
    }

    public function getSum()
    {
        return $this->cart->getSum();
    }
    public function changeNum($cart_id,$cart_num){
        return $this->cart->changeNum($cart_id,$cart_num);
    }
    public function delOne($cart_id){
        return $this->cart->delOne($cart_id);
    }

    public function delAll()
    {
        return $this->cart->delAll();
    }

}