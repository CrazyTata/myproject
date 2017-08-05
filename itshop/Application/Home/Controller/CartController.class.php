<?php
namespace Home\Controller;
use Think\Controller;
use Think\Cart;
class CartController extends Controller{
    function addCart(){
        //1. 接收ajax传递的商品信息，构造要写入数据表的商品数组
        $goods_info = array(
            'cart_goodsid' => I('post.goods_id'),
            'cart_memid' => session('mem_id'),
            'cart_num' => I('post.num'),
            'cart_goodsattr' => I('post.attr')
        );
        //2. 实例化Cart类，调用添加购物车方法将商品信息写入数据表
        $cart = new Cart();
        //调用底层addCart （MysqlCart、CookieCart里的方法）
        $add_result = $cart->addCart($goods_info);
        if($add_result){
            $pn = $cart->getPriceNumber(session('mem_id'));
            echo json_encode($pn);
        } else {
            echo 0;
        }
    }
    
    function aaa(){
        $c = cookie('cart');
        dump(unserialize($c)) ;
        /*session('mem_id', 2);
        $memid = session('mem_id');
        $cart = new Cart();
        $cart->cookieToMysql($memid);
          */
        /* $cart = new Cart();
        $result = $cart->getPriceNumber($memid);
        dump($result); */
    }
    
    function flow1(){
        
        $cart = new Cart();
        //获取当前用户的购物车信息
        $memid = session('mem_id');
        $cart_list = $cart->getCartList($memid);
        $this->assign('cart_list', $cart_list);
        
        dump($cart_list);
        
        //获取当前用户购物车的总金额
        $pn = $cart->getPriceNumber($memid);
        $this->assign('price', $pn['price']);
        
        $this->display();
    }
    
    function delCart(){
        //1. 接收cart_id
        $cart_id = I('post.cart_id');
        //2. 实例化Cart类，调用delCart方法从数据表删除数据
        $cart = new Cart();
        $del_result = $cart->delCart($cart_id);
        if($del_result){
            echo 1;
        } else {
            echo 0;
        }
    }
    
    function changeCartNum(){
        //1. 接收cart_id和num
        $cart_id = I('post.cart_id');
        $num = I('post.num');
        
        //2. 实例化Think\Cart类,调用修改数量的方法
        $cart = new Cart();
        $save_result = $cart->changeCartNum($cart_id, $num);
        if($save_result){
            //获取当个商品的小计价格
            $total_price = $cart->getPrice($cart_id);
            //获取购物车中所有商品的总价格
            $price = $cart->getPriceNumber(session('mem_id'));
            //构造返回到前台页面的json数据
            $result = array(
                'total_price' => $total_price,
                'price' => $price['price']
            );
            echo json_encode($result);
        } else {
            echo 0;
        }
        
    }
    
    function flow2(){
        if(session('mem_id')){
            $this->display();
        } else {
            //跳转时，将当前的控制器和方法名，传递到login页面
            //下标不要用 c和a，因为系统已经占用
            $jump = array(
                'tc' => CONTROLLER_NAME,
                'ta' => ACTION_NAME
            );
            $this->error('您尚未登录，请先登录再结账', U('Member/login', $jump), 3);
        }
    }
    
    function flow3(){
        $memid = session('mem_id');
        $cart = new Cart();
        $pn = $cart->getPriceNumber($memid);
        //1. 接收flow2的表单数据
        $order_form = I('post.');
        //2. 补全数据
        $order_form['order_memid'] = $memid;
        $order_form['order_number'] = 'whphp6'.date('YmdHis').rand(1000000000,99999999999);
        $order_form['order_price'] = $pn['price'];
        $order_form['order_title'] = ' ';
        $order_form['order_addtime'] = time();
        $order_form['order_updtime'] = time();
        //dump($order_form);
        //3. 实例化 order表模型，将数据写入order表
        $add_result = D('Order')->add($order_form);
        if($add_result){
            //在order表写入成功之后，将cart表中的数据，写入到order_goods表中
            //① 从Cart表中取出当前用户的购物车数据
            $cart_list = $cart->getCartList($memid);
            //② 遍历$cart_list, 补全og_orderid和og_memid,将字段下标改为order_goods表的字段
            $tmp = array();
            foreach($cart_list as $key=>$value){
                $tmp[$key]['og_orderid'] = $add_result;
                $tmp[$key]['og_memid'] = $memid;
                $tmp[$key]['og_goodsid'] = $value['goods_id'];
                $tmp[$key]['og_goodsname'] = $value['goods_name'];
                $tmp[$key]['og_goodsprice'] = $value['goods_price'];
                $tmp[$key]['og_goodsnum'] = $value['cart_num'];
                $tmp[$key]['og_totalprice'] = $value['total_price'];
            }
            //③ 将重构后的数据，写入order_goods表中
            //数据表名如果存在下划线，则链接每个单词，每个单词的首字母大写
            D('OrderGoods')->addAll($tmp);
            
            //④ 清空cart表中当前用户的数据
            $cart->clearCart($memid);
            
        } else {
            
        }
    }
}


















