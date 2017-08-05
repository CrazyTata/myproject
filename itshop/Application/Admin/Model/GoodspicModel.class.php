<?php
namespace Admin\Model;
use Think\Model;

class GoodspicModel extends Model{
    
    function addPic($goods_id){
        //1. 实例化文件上传类
        $config = C('UPLOAD_IMG');
        $uploader = new \Think\Upload($config);
        //2. 调用upload方法来执行上传
        $upload_result = $uploader->upload();
        if(!$upload_result){
            return $uploader->getError();
        } else {
            //声明一个数组，用来保存所有的要写入数据表的信息
            $insert_info = array();
            //3. 循环上传文件的结果数组来制作缩略图
            foreach($upload_result as $value){
                //① 实例化图片处理类
                $img = new \Think\Image();
                //② 调用open方法打开要处理的文件
                $pic_ori = $config['rootPath'].$value['savepath'].$value['savename'];
                $img->open($pic_ori);
                
                //重点注意：必须先做大图在做中图最后做小图
                
                //③ 制作大图
                $pic_big = $config['rootPath'].$value['savepath'].'big_'.$value['savename'];
                $img->thumb(800, 800);
                $img->save($pic_big);
                //④ 制作中图
                $pic_mid = $config['rootPath'].$value['savepath'].'mid_'.$value['savename'];
                $img->thumb(350, 350);
                $img->save($pic_mid);
                //⑤ 制作小图
                $pic_sam = $config['rootPath'].$value['savepath'].'sma_'.$value['savename'];
                $img->thumb(50, 50);
                $img->save($pic_sam);
                //将要写入数据表的数据保存到最终的二维数组中
                $insert_info[] = array(
                    'pic_goodsid' => $goods_id,
                    'pic_ori'   => $pic_ori,
                    'pic_big'   => $pic_big,
                    'pic_mid'   => $pic_mid,
                    'pic_sma'   => $pic_sam,
                );
            }
            
            //在整个foreach结束之后，$insert_info二维数组已经生成后，调用addAll方法写入数据表
            if($this->addAll($insert_info)){
                return true;
            } else {
                return false;
            }
        }
    }
    
}





