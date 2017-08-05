<?php
namespace Home\Controller;
//use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }
    
    function goodsList(){
        $this->display();
    }
    
    function detail(){
        //1. 获取goods_id
        $goods_id = I('get.goods_id');
        // 获取商品基本信息
        $goods_info = D('Goods')->find($goods_id);
        $this->assign('goods_info', $goods_info);
        
        //2. 根据goods_id从goodspic表中读取数据
        $pic_list = D('Goodspic')->where("pic_goodsid=".$goods_id)->select();
        $this->assign('pic_list', $pic_list);
        
        //3. 获取商品属性名和对应的值
        //原生sql：SELECT a.attr_name,g.ga_attrvals FROM sp_goodsattr g
        //        LEFT JOIN sp_attribute a ON g.ga_attrid=a.attr_id
        //        WHERE g.ga_goodsid=14;
        $attr = D('Goodsattr')->alias('g')
            ->field('a.attr_name,g.ga_attrvals')
            ->join("LEFT JOIN sp_attribute a ON g.ga_attrid=a.attr_id")
            ->where("g.ga_goodsid=".$goods_id)
            ->select();
        $this->assign('attr', $attr);
        
        //4.查询单选属性
        //原生sql：SELECT a.attr_name,g.ga_attrvals FROM sp_goodsattr g
        //        LEFT JOIN sp_attribute a ON g.ga_attrid=a.attr_id
        //        WHERE g.ga_goodsid=14 and a.attr_type='单选';
        $attr_select = D('Goodsattr')->alias('g')
            ->field('a.attr_name,g.ga_attrvals')
            ->join("LEFT JOIN sp_attribute a ON g.ga_attrid=a.attr_id")
            ->where("g.ga_goodsid=".$goods_id." and a.attr_type='单选'")
            ->select();
        //为了方便在模板中显示，需要将ga_attrvals字段拆分为数组
        foreach($attr_select as $key=>$value){
            $attr_select[$key]['ga_attrvals'] = explode(',', $value['ga_attrvals']);
        }
        //dump($attr_select);
        $this->assign('attr_select', $attr_select);
        
        $this->display();
    }
    
    function getGoodsByCateid(){
        $cate_id = I('get.cate_id');
        $level = I('get.level');
        
        $model = D();
        if($level == 2){
            //如果cate_id是第三级分类时的处理方式
            $sql = "select * from sp_goods where goods_cateid=".$cate_id;
            $goods_list = $model->query($sql);
        } else if($level == 1){
            //如果cate_id属于第二级分类时，需要嵌套cate表进行查询
            $sql = "SELECT * FROM sp_goods WHERE goods_cateid IN (
                        SELECT cate_id FROM sp_cate WHERE cate_pid=$cate_id
                    )";
            $goods_list = $model->query($sql);
        } else if($level == 0){
            //如果cate_id属于第一级分类时，需要嵌套两次cate表进行查询
            $sql = "SELECT * FROM sp_goods WHERE goods_cateid IN (
                      SELECT cate_id FROM sp_cate WHERE cate_pid IN (
                        SELECT cate_id FROM sp_cate WHERE cate_pid=$cate_id
                        )
                    )";
            $goods_list = $model->query($sql);
        }
        
        $this->assign('goods_list', $goods_list);
        $this->display();
    }
    
    function searchByType(){
        $type = I('post.type');
        if($type == '热卖商品'){
            $goods_list = D('Goods')->order("goods_salenum desc")
                ->limit(5)->select();
        } else if($type == '推荐商品'){
            $goods_list = D('Goods')->where("goods_tj=1")
                ->order('goods_addtime desc')->limit(5)->select();
        }
        $result = '';
        //将取得商品数据拼接程序前台需要的字符串形式
        foreach($goods_list as $value){
            $pic = ltrim($value['goods_small_logo'], '.');
            $name = substr($value['goods_name'], 0, 20);
            $result .= "<li>
							<dl>
								<dt><a href=''><img src='{$pic}' alt='' /></a></dt>
								<dd><a href=''>{$name}</a></dd>
								<dd><span>售价：</span><strong> ￥{$value['goods_price']}</strong></dd>
							</dl>
						</li>";
        }
        echo $result;
    }
    
    function search(){
        $key = I('get.name');
        //模糊查询
        $goods_list = D('Goods')
            ->where("goods_key like '%$key%' or goods_desc like '%$key%'")
            ->select();
        
        $this->assign('goods_list', $goods_list);
        $this->display();
    }
}



















