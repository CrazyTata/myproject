<?php
namespace Think\Cart\Driver;

class MysqlCart{
    //购物车实例
    private $cart;
    
    function __construct(){
        //实例化Cart模型
        $this->cart = D('Cart');
    }
    
    function addCart($goods_info){
        return $this->cart->add($goods_info);
    }
    
    //获取当前用户购物车中的总商品数和总价格
    function getPriceNumber($memid){
        //获取当前用户购车中商品总数
        $num = $this->cart->where("cart_memid=".$memid)->sum('cart_num');
        //获取当前用户购物车中商品总价格
        $price = $this->cart->alias('c')
            ->join('LEFT JOIN sp_goods g ON c.cart_goodsid=g.goods_id')
            ->where('c.cart_memid='.$memid)
            ->sum('c.cart_num*g.goods_price');
        $result = array(
            'number' => $num,
            'price'  => $price
        );
        return $result;
    }
    
    function getCartList($memid){
        // 原生SQL
        // SELECT c.cart_id,g.goods_id,g.goods_name,g.goods_small_logo,c.cart_goodsattr
        //   ,g.goods_price,c.cart_num,g.goods_price*c.cart_num AS total_price  FROM sp_cart c
        //    LEFT JOIN sp_goods g ON c.cart_goodsid=g.goods_id
        //    WHERE cart_memid=4;
        $cart_list = $this->cart->alias('c')
            ->field('c.cart_id,g.goods_id,g.goods_name,g.goods_small_logo,c.cart_goodsattr,
                g.goods_price,c.cart_num,c.cart_num*g.goods_price as total_price')
            ->join("left join sp_goods g on c.cart_goodsid=g.goods_id")
            ->where("c.cart_memid=".$memid)
            ->select();
        return $cart_list;
    }
    
    function delCart($cart_id){
        //调用Model类中的delete方法删除数据
        return $this->cart->delete($cart_id);
    }
    
    function changeCartNum($cart_id, $num){
        //1. 构造要修改的数据
        $save_data = array(
            'cart_id' => $cart_id,
            'cart_num' => $num
        );
        
        //2. 调用save方法，修改数据表
        return $this->cart->save($save_data);
    }
    
    function getPrice($cart_id){
        $cart_info = $this->cart->alias('c')
            ->field("g.goods_price*c.cart_num as total_price")
            ->join("left join sp_goods g on c.cart_goodsid=g.goods_id")
            ->find($cart_id);
        return $cart_info['total_price'];
    }
    
    function cookieToMysql($memid){
        //从cookie中获取cart数据
        $cart_tmp = cookie('cart');
        $cart_tmp = unserialize($cart_tmp);
        //遍历$cart_tmp,补充$memid,删除cart_id
        foreach($cart_tmp as $key=>$value){
            $cart_tmp[$key]['cart_memid'] = $memid;
            unset($cart_tmp[$key]['cart_id']);
        }
        
        //将重构好的购物车数组写入cart表
        //addAll方法中参数的也必须是下标从0开始递增的结构
        $this->cart->addAll($cart_tmp);
        
        //将cookie中的数据删除
        cookie('cart', null);
    }
    
    function clearCart($memid){
        return $this->cart->where("cart_memid=".$memid)->delete();
    }
}


















