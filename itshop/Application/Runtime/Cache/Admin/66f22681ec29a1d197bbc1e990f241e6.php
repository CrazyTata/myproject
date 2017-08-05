<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
    
    <link href="/Public/Common/Ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/Public/Common/Ueditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Common/Ueditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Common/Ueditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/Public/Common/Ueditor/lang/zh-cn/zh-cn.js"></script>
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
        <div class="formtitle"><span>基本信息</span></div>
        <form action="" method="post" enctype="multipart/form-data">
            <ul class="forminfo">
                <li>
                    <label>商品名称</label>
                    <input name="name" value="<?php echo ($goods_info["goods_name"]); ?>" type="text" class="dfinput" /><i>名称不能超过30个字符</i></li>
                <li>
                    <label>商品价格</label>
                    <input name="price" value="<?php echo ($goods_info["goods_price"]); ?>" type="text" class="dfinput" /><i></i></li>
                <li>
                    <label>会员价格</label>
                    <input name="vip" value="<?php echo ($goods_info["goods_vip_price"]); ?>" type="text" class="dfinput" /><i></i></li>
                <li>
                    <label>商品数量</label>
                    <input name="num" value="<?php echo ($goods_info["goods_num"]); ?>" type="text" class="dfinput" />
                </li>
                <li>
                    <label>商品重量</label>
                    <input name="weight" value="<?php echo ($goods_info["goods_weight"]); ?>" type="text" class="dfinput" />
                </li>
                <li>
                    <label>商品Logo</label>
                    <input name="logo" type="file" />
                    <img src="<?php echo (ltrim($goods_info["goods_small_logo"],'.')); ?>" />
                </li>
                <li>
                	<label>是否上架</label>
                	<cite>
                		<?php if($goods_info["goods_isdel"] == '上架' ): ?><input name="isdel" type="radio" value="上架" checked="checked" />上架&nbsp;&nbsp;&nbsp;&nbsp;
                		<input name="isdel" type="radio" value="下架" />下架
                		<?php else: ?>
                		<input name="isdel" type="radio" value="上架"  />上架&nbsp;&nbsp;&nbsp;&nbsp;
                		<input name="isdel" type="radio" value="下架" checked="checked" />下架<?php endif; ?>
                	</cite>
                </li>
                
                <li>
                    <label>商品描述
                    <textarea id="desc" name="intro" class="textinput">
                    <?php echo ($goods_info["goods_introduce"]); ?>
                    </textarea>
                	</label>
                </li>
                <li>
                    <label>&nbsp;</label>
                    <input name="" id="btnSubmit" type="button" class="btn" value="确认保存" />
                </li>
            </ul>
        </form>
    </div>
    <script type="text/javascript">
    //获取确认保存的按钮对象，注册点击事件
    $('#btnSubmit').click(function(){
    	//获取form表单对象，调用submit方法进行提交。
    	$('form').submit();
    })
    //实例化富文本编辑器
    var um = UM.getEditor('desc');
    </script>
</body>

</html>