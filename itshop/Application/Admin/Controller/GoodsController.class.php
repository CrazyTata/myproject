<?php
namespace Admin\Controller;
//use Think\Controller;

class GoodsController extends CommonController{
    function goodslist(){
        //1. 实例化Goods模型
        $goods_model = D('Goods');
        //2. 调用select方法查询数据
        $goods_list = $goods_model->select();
        //3. 调用assign方法将数据分配到模板
        $this->assign('goods_list', $goods_list);
        
        $this->display();
    }
    
    
    function addGoods(){
        if(!session('?mg_id')){
            $this->error('您尚未登录，请登陆后再访问', U('Index/login'), 3);
        }
        //使用IS_POST来区分是否是POST表单提交
        if(IS_POST){
            //如果是POST表单提交
            //首先接收商品图片
            if($_FILES['logo']['error'] == 0){
                //1.使用load函数载入文件
                load('@/imgfunc');
                //2. 调用文件上传函数
                $result = upload_imgs();
                //3. 判断上传结果
                if(is_string($result)){
                    echo $result;
                } else {
                    //拼接大图路径
                    $big_path = C('UPLOAD_IMG')['rootPath'].$result['logo']['savepath'].$result['logo']['savename'];
                    //制作缩略图,直接封装为函数
                    //注意点:因为$result是一个二维数组，要将logo下标的一维数组传入
                    $small_path = thumb_img($result['logo']);
                    // 将大图和小图的路径保存到数组中，注意下标需要和数据表字段一致
                    $pic = array(
                        'goods_logo' => $big_path,
                        'goods_small_logo'  => $small_path
                    );
                }
                    
            }
            
            // 实例化Goods模型
            $goods_model = D('Goods');
            // 调用模型中addGoods方法
            $add_goods_result = $goods_model -> addGoods($pic);
            if($add_goods_result){
                //添加商品成功后，再进行商品属性的写入
                //构造写入goodsattr表的数据
                $attrvals = array();
                //① 接收表单提交属性数据
                $attr = I('post.ga_attrvals');
                foreach($attr as $key=>$value){
                    $attrvals[] = array(
                        'ga_goodsid' => $add_goods_result,
                        'ga_attrid'  => $key,
                        'ga_attrvals'=> implode(',', $value)
                    );
                }

                D('Goodsattr')->addAll($attrvals);
            
                $this->success('添加商品成功');
            } else if(is_string($add_goods_result)){
                $this->error($add_goods_result);
            } else {
                $this->error('添加商品失败');
            }
            
            //传统$_POST方式来接收表单提交数据
            /* $goods_info = array(
                'goods_name' => $_POST['name'],
                'goods_price' => $_POST['price'],
                'goods_vip_price' => $_POST['vip']
            );
            // 实例化Goods模型来将数据写入
            $goods_model = D('Goods');
            $goods_model -> add($goods_info); */
            
        } else {
            //查询一级分类的数据
            $cate_list = D('Cate')->where("cate_pid=0")->select();
            $this->assign('cate_list', $cate_list);
            $this->display();
        }
    }
    
    function delGoods(){
        //1. 接收Goods_id
        $goods_id = I('post.goods_id');
        //2. 实例化Goods模型
        $goods_model = D('Goods');
        // 构造修改数组
        $arr = array(
            'goods_id' => $goods_id,
            'goods_isdel' => '下架'
        );
        //3. 调用save方法修改,修改成功返回1，修改失败返回0
        if($goods_model->save($arr)){
            echo 1;
        } else {
            echo 0;
        }
        echo json_encode($arr);
    }
    
    function photos(){
        //1. 接收goods_id
        $goods_id = I('get.goods_id');
        if(IS_POST){
            if(D('Goodspic')->addPic($goods_id)){
                $this->success('添加相册成功');
            } else {
                $this->error('添加相册失败');
            }
        } else {
            //2. 查询Goods表，获取goods_name
            $goods_info = D('Goods')->field("goods_name")->find($goods_id);
            $goods_name = $goods_info['goods_name'];
            //3. 将goods_name分配到模板
            $this->assign('goods_name', $goods_name);
            
            //4. 根据goods_id从Goodspic表中读取图片信息
            $pic_list = D('Goodspic')->where("pic_goodsid=".$goods_id)->select();
            //5. 分配到模板
            $this->assign('pic_list', $pic_list);
            
            $this->display();
        }
    }
    
    function delPic(){
        //1. 接收pic_id
        $pic_id = I('get.pic_id');
        //2. 实例化Goodspic模型，删除数据，因为数据删除之后，就无法找到图片路径了，所以必须先将图片路径取出
        $goodspic_model = D('Goodspic');
        // 将图片路径数据取出
        $pic_info = $goodspic_model->field("pic_ori,pic_big,pic_mid,pic_sma")->find($pic_id);
        // 删除pic_id对应的数据
        if($goodspic_model->delete($pic_id)){
            //删除数据成功后，删除图片
            unlink($pic_info['pic_ori']);
            unlink($pic_info['pic_big']);
            unlink($pic_info['pic_mid']);
            unlink($pic_info['pic_sma']);
            
            echo 1;
        } else {
            echo 0;
        }
    }
    
    function  editGoods(){
        $goods_id = I('get.goods_id');
        $goods_model = D('Goods');
        if(IS_POST){
            if($_FILES['logo']['error'] == 0){
                //如果存在上传文件，则删除原图
                $goods_info = $goods_model->find($goods_id);
                unlink($goods_info['goods_logo']);
                unlink($goods_info['goods_small_logo']);
                
                //1.使用load函数载入文件
                load('@/imgfunc');
                //2. 调用文件上传函数
                $result = upload_imgs();
                //3. 判断上传结果
                if(is_string($result)){
                    echo $result;
                } else {
                    //拼接大图路径
                    $big_path = C('UPLOAD_IMG')['rootPath'].$result['logo']['savepath'].$result['logo']['savename'];
                    //制作缩略图,直接封装为函数
                    //注意点:因为$result是一个二维数组，要将logo下标的一维数组传入
                    $small_path = thumb_img($result['logo']);
                    // 将大图和小图的路径保存到数组中，注意下标需要和数据表字段一致
                    $pic = array(
                        'goods_logo' => $big_path,
                        'goods_small_logo'  => $small_path
                    );
                }
            }
            //接收表单提交的数据
            $goods_form_data = $goods_model->create('', 2);
            
            if(!empty($pic)){
                //填充logo和small_logo
                $goods_form_data = array_merge($goods_form_data, $pic);
            }
            
            //填充goods_id
            $goods_form_data['goods_id'] = $goods_id;
            //dump($goods_form_data);die;
            
            
            if($goods_model->save($goods_form_data)){
                $this->success('修改成功', U('goodslist'), 3);
            } else {
                $this->error('修改失败', U('editGoods', 'goods_id='.$goods_id), 3);
            }
            
        } else {
            
            $goods_info = D('Goods')->find($goods_id);
            $this->assign('goods_info', $goods_info);
            
            $this->display();
        }
        
    }
    
    function charts(){
        //准备视图需要的数据
        //1. 编写原生SQL
        $sql = "SELECT c.cate_name,COUNT(*) AS num FROM sp_goods g
                    LEFT JOIN sp_cate c ON g.goods_cateid=c.cate_id
                    GROUP BY g.goods_cateid";
        //2. 实例化空模型
        $model = D();
        //3. 调用query方法执行sql
        // query执行的结果一定是二维数组
        $result = $model->query($sql);
        $this->assign('result', $result);
        
        $this->display();
    }
}


















 
