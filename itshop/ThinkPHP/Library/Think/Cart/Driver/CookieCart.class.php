<?php
namespace Think\Cart\Driver;

class CookieCart{
    //定义购物车实例
    private $cart;
    
    function __construct(){
        //1. 从cookie中取出购物车数据
        $this->cart = cookie('cart');
        //判断当前购物车中是否有数据
        if(empty($this->cart)){
            //如果没有，则定义成一个空数组
            $this->cart = array();
        } else {
            //如果有，则反序列化成一个数组
            $this->cart = unserialize($this->cart);
        }
    }
    
    function addCart($goods_info){
        //1. 获取当前购物车数组的长度
        $length = count($this->cart);
        //2. 给$goods_info增加 cart_id字段，该字段等于$length
        $goods_info['cart_id'] = $length;
        //3. 调用array_push函数，将新商品数据，压入$this->cart购物车数组中
        // array_push() 传址操作，会直接修改 $this->cart的地址，新单元直接压入$this->cart数组了
        // 返回值是新数组的长度，可以视为 cart_id
        $index = array_push($this->cart, $goods_info);
        //4. 将新的$this->cart写回到cookie中,注意需要序列化
        cookie('cart', serialize($this->cart));
        return $index;
    }
    
    function getPriceNumber($memid){
        //1. 实例化goods模型
        $goods_model = D('Goods');
        //2. 循环$this->cart,根据cart_goodsid从goods表中获取goods_price
        foreach($this->cart as $key=>$value){
            $goods_info = $goods_model->field("goods_price")->find($value['cart_goodsid']);
            $this->cart[$key]['cart_price'] = $goods_info['goods_price'];
        }
        //3. 计算总数量和总价格
        $number = 0;
        $price  = 0;
        //循环$this->cart数组，进行累加即可
        foreach($this->cart as $value){
            $number += $value['cart_num'];
            $price  += $value['cart_num']*$value['cart_price'];
        }
        $result = array(
            'number' => $number,
            'price'  => $price
        );
        return $result;
    }
    
    function getCartList($memid){
        $goods_model = D('Goods');
        foreach($this->cart as $key=>$value){
            //根据cart_goodsid从goods表查询需要补充的数据
            $goods_info = $goods_model
                ->field("goods_id,goods_name,goods_price,goods_small_logo,
                    {$value['cart_num']}*goods_price as total_price")
                ->find($value['cart_goodsid']);
            //将查询出的数据，补充到对应的单元
            $this->cart[$key] = array_merge($this->cart[$key], $goods_info);
        }
        return $this->cart;
    }
    
    function delCart($cart_id){
        //因为 $cart_id和数组的下标是一致的。
        //所以删除购物车中的某条数据，就直接unset对应的下标即可
        unset($this->cart[$cart_id]);
        //删除完成后，需要重组购物车数组，cart_id变为从0开始递增的状态
        //定义临时数组来保存购物车数据
        $tmp = array();
        $i = 0;
        foreach($this->cart as $value){
            //将cart_id修改为从0递增
            $value['cart_id'] = $i;
            $tmp[$i] = $value;
            $i++;
        }
        //将$tmp中的数据重新保存到$this->cart
        $this->cart = $tmp;
        //将修改后的购物车数据，重新写入cookie中
        cookie('cart', serialize($this->cart));
        return true;
    }
}






















