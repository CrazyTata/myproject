<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    
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
                    <input name="name" placeholder="请输入商品名称" type="text" class="dfinput" /><i>名称不能超过30个字符</i></li>
                <li>
                    <label>商品价格</label>
                    <input name="price" placeholder="请输入商品价格" type="text" class="dfinput" /><i></i></li>
                <li>
                    <label>会员价格</label>
                    <input name="vip" placeholder="请输入商品价格" type="text" class="dfinput" /><i></i></li>
                <li>
                    <label>商品数量</label>
                    <input name="num" placeholder="请输入商品数量" type="text" class="dfinput" />
                </li>
                <li>
                    <label>商品重量</label>
                    <input name="weight" placeholder="请输入商品重量" type="text" class="dfinput" />
                </li>
                <li>
                    <label>商品Logo</label>
                    <input name="logo" type="file" />
                </li>
                <li>
                    <label>一级分类</label>
                    <select id="level1" class="dfinput" onchange="getCate(this.value, 2)">
                        <option value="0">--请选择--</option>
                        <?php if(is_array($cate_list)): foreach($cate_list as $key=>$vo): ?><option value="<?php echo ($vo["cate_id"]); ?>">
                        	<?php echo (str_repeat('&emsp;&emsp;',$vo["level"])); echo ($vo["cate_name"]); ?>
                        	</option><?php endforeach; endif; ?>
                    </select>
                    <i></i>
                </li>
                <li>
                    <label>二级分类</label>
                    <select id="level2" class="dfinput"  onchange="getCate(this.value, 3)">
                        <option value="0">--请选择--</option>
                    </select>
                    <i></i>
                </li>
                <li>
                    <label>三级分类</label>
                    <select id="level3" class="dfinput">
                        <option value="0">--请选择--</option>
                    </select>
                    <i></i>
                </li>
                
                <li>
                	<label>是否上架</label>
                	<cite>
                		<input name="isdel" type="radio" value="上架" checked="checked" />上架&nbsp;&nbsp;&nbsp;&nbsp;
                		<input name="isdel" type="radio" value="下架" />下架</cite>
                </li>
                
                <li>
                    <label>商品描述
                    <textarea id="desc" name="intro" placeholder="请输入商品描述" class="textinput"></textarea>
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
    
    function getCate(cate_id, le){
    	$.ajax({
    		'url': "<?php echo U('Cate/getCate');?>",
    		'data': {'cate_id':cate_id},
    		//设置请求方式，如果是get方式，则使用cache参数设置不缓存
    		'type': "get",
    		'cache': false,
    		//建议调试时，先设置为text，在alert时能够看到数据的详细情况
    		'dataType': 'text',
    		'success':function(msg){
    			//先清空下拉菜单中已有的选项
    			$('#level'+le).empty();
    			//手动将json字符串转为json对象
    			msg = JSON.parse(msg);
    			//alert(msg)
    			//msg是一个数组形式的json对象，遍历可以使用for、each
    			var option = "<option value='0'>--请选择--</option>";
    			$.each(msg, function(index, el){
    				//在each中拼接option
    				option += "<option value='"+el.cate_id+"'>"+el.cate_name+"</option>";
    			})
    			
    			//获取二级分类的select对象
    			$('#level'+le).append(option);
    		}
    	});
    }
    
    $('#level3').change(function(){
    	//获取当前选中的分类的cate_id
    	var cate_id = $(this).val();
    	//转存当前的三级分类对象
    	_this = $(this);
    	//调用ajax方法
    	$.ajax({
    		'url':"<?php echo U('Attribute/getAttr');?>",
    		'data':{'cate_id':cate_id},
    		'type':'post',
    		'dataType':'json',
    		'success':function(msg){
    			//清空已经存在的属性标签
    			$('.newTag').remove();
    			$.each(msg, function(index, el){
    				str = '';
    				if(el.attr_type == '手填'){
    					//判断，如果el.attr_type为手填，创建一个文本框对象，追加到网页中
    					str += "<li class='newTag'><label>"+el.attr_name+"</label><input name='ga_attrvals["+el.attr_id+"][]' placeholder='请输入"+el.attr_name+"' type='text' class='dfinput' /></li>"
    				} else {
    					//拼接option标签
    					var option = '';
    					//将 el.attr_value拆分为数组
    					arr = el.attr_value.split(',');
    					//遍历该数组，拼接option
    					for(i = 0; i < arr.length; i++){
    						option += "<option>"+arr[i]+"</option>";
    					}
    					str += "<li class='newTag'><label><a href='javascript:;' class='addselect'>[+]</a>"+el.attr_name+"</label><select name='ga_attrvals["+el.attr_id+"][]' class='dfinput'><option value='0'>--请选择--</option>"+option+"</select><i></i></li>";
    				}
    				//将创建好的标签追加到网页中
    				_this.parent().after(str);
    			})
    		}
    	})
    })
    
    $(document).on('click', '.addselect', function(){
    	//$(this)代表addselect这个a标签
    	li_obj = $(this).parent().parent().clone();
    	//克隆之后，里面还是 [+], 要改为 [-]
    	//① 找到li_obj里面的a标签，删除
    	//② 创建一个新的a标签，内容是[-],class的值设置为 minusselect
    	//③ 将新的a标签加入到li_obj当中
    	li_obj.find('a').remove();
    	str = "<a href='javascript:;' class='minusselect'>[-]</a>";
    	li_obj.find('label').prepend(str);
    	//将创建好的标签追加网页中
    	$(this).parent().parent().after(li_obj);
    })
    
    $(document).on('click', '.minusselect', function(){
    	$(this).parent().parent().remove();
    })
    </script>
</body>

</html>