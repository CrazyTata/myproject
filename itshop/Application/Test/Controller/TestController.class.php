<?php
namespace Test\Controller;
use Think\Controller;
use Think\Cart;

class TestController extends Controller{
    function add(){
       session('mem_id', 1);
       //1. 实例化Cart类 (Think\Cart)
       $cart = new Cart(); 
       //2. 调用addCart方法
       $cart->addCart();
    }
}