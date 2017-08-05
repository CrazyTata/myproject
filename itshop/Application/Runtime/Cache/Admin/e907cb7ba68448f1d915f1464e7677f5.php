<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">表单</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div class="formtitle"><span>商品相册</span></div>
        	管理<span style="color:red;font-size:16px"><?php echo ($goods_name); ?></span>的相册
        <li style="border: 1px solid grey;margin-bottom: 20px;">
        	<?php if(is_array($pic_list)): foreach($pic_list as $key=>$vo): ?><span>
	            <img src="<?php echo (ltrim($vo["pic_mid"],'.')); ?>" width="200">
	            <a href="javascript:;" class="delpic" data="<?php echo ($vo["pic_id"]); ?>">[-]</a>
	            </span><?php endforeach; endif; ?>
        </li>
        <form action="" method="post" enctype="multipart/form-data">
            <ul class="forminfo">
                <li>
                    <label>商品图片[<a href="javascript:;" class="add">+</a>]</label>
                    <input name="goods_pic[]" type="file" />
                </li>
                <li>
                    <label>&nbsp;</label>
                    <input name="" id="btnSubmit" type="button" class="btn" value="确认保存" />
                </li>
            </ul>
        </form>
    </div>
</body>
<script type="text/javascript">
$(function(){
    $('#btnSubmit').on('click',function(){
        $('form').submit();
    });
    
    //1. 获取[+]标签对象，绑定点击事件
    $('.add').click(function(){
    	//2. 将文件域做成一个字符串
    	var str = "<li><label>商品图片[<a href='javascript:;' class='minus'>-</a>]</label><input name='goods_pic[]' type='file' /></li>";
    	//3. 将创建好的标签字符串插入到 [+] 的父标签之后
    	$(this).parent().parent().after(str);
    })
    
    //获取[-]的a标签对象，注意:因为是页面载入后动态添加的，所以需要使用live或者on绑定事件
    $('.minus').live('click', function(){
    	//通过两次parent()获取li标签对象，使用remove删除
    	$(this).parent().parent().remove();
    })
    
    //1. 获取删除图片的 [-],绑定点击事件
    $('.delpic').click(function(){
    	if(confirm('您确定要删除该图片吗？')){
    		//1. 获取当前pic_id
        	var pic_id = $(this).attr('data');
        	//2. 转存当前的$(this)对象，方面在$.get中使用
        	_this = $(this);
        	//3. 调用ajax方法，请求后台的PHP程序
        	$.get("<?php echo U('delPic');?>", {'pic_id':pic_id, '_':Math.random()}, function(msg){
        		if(msg == 1){
        			//获取当前a标签的父标签span
        			_this.parent().remove();
        		} else {
        			alert('删除图片失败');
        		}
        	});
    	}
    	
    })
})
</script>
</html>