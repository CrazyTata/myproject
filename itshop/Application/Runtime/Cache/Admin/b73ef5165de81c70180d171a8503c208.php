<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".click").click(function() {
            $(".tip").fadeIn(200);
        });

        $(".tiptop a").click(function() {
            $(".tip").fadeOut(200);
        });

        $(".sure").click(function() {
            $(".tip").fadeOut(100);
        });

        $(".cancel").click(function() {
            $(".tip").fadeOut(100);
        });

        //给下架按钮注册点击事件
        $('.del').click(function(){
        	//获取当前下架按钮对应商品的goods_id
        	var goods_id = $(this).attr('data');
        	//将$(this)转存，方便在$.post方法中使用
        	var _this = $(this);
        	//调用$.post发送ajax请求，将goods_id作为参数传递到后台
        	$.post("<?php echo U('delGoods');?>", {'goods_id':goods_id}, function(msg){
        		if(msg == 1){
        			alert('下架成功');
        			_this.parent().parent().find('.isdel').html('下架');
        			_this.html('上架');
        		} else {
        			alert('下架失败');
        		}
        	})
        })
    });
    </script>
</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">数据表</a></li>
            <li><a href="#">基本内容</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        <div class="tools">
            <ul class="toolbar">
                <li><span><img src="/Public/Admin/images/t01.png" /></span>添加</li>
                <li><span><img src="/Public/Admin/images/t02.png" /></span>修改</li>
                <li><span><img src="/Public/Admin/images/t03.png" /></span>删除</li>
                <li><span><img src="/Public/Admin/images/t04.png" /></span>统计</li>
            </ul>
        </div>
        <table class="tablelist">
            <thead>
                <tr>
                    <th>
                        <input name="" type="checkbox" value="" id="checkAll" />
                    </th>
                    <th>编号</th>
                    <th>商品名称</th>
                    <th>商品价格</th>
                    <th>会员价格</th>
                    <th>发布时间</th>
                    <th>是否上架</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	<?php if(is_array($goods_list)): foreach($goods_list as $key=>$vo): ?><tr>
                    <td>
                        <input name="" type="checkbox" value="" />
                    </td>
                    <td><?php echo ($vo["goods_id"]); ?></td>
                    <td><?php echo ($vo["goods_name"]); ?></td>
                    <td><?php echo ($vo["goods_price"]); ?></td>
                    <td><?php echo ($vo["goods_vip_price"]); ?></td>
                    <td><?php echo (date('Y-m-d',$vo["goods_addtime"])); ?></td>
                    <td class='isdel'><?php echo ($vo["goods_isdel"]); ?></td>
                    <td>
                    	<a href="<?php echo U('photos', 'goods_id='.$vo['goods_id']);?>" class="tablelink">相册管理</a>
                    	<a href="<?php echo U('editGoods', 'goods_id='.$vo['goods_id']);?>" class="tablelink">编辑</a> 
                    	<a href="javascript:;" data="<?php echo ($vo["goods_id"]); ?>" class="tablelink del">下架</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <div class="pagin">
            <div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
            <ul class="paginList">
                <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
                <li class="paginItem"><a href="javascript:;">1</a></li>
                <li class="paginItem current"><a href="javascript:;">2</a></li>
                <li class="paginItem"><a href="javascript:;">3</a></li>
                <li class="paginItem"><a href="javascript:;">4</a></li>
                <li class="paginItem"><a href="javascript:;">5</a></li>
                <li class="paginItem more"><a href="javascript:;">...</a></li>
                <li class="paginItem"><a href="javascript:;">10</a></li>
                <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
            </ul>
        </div>
        <div class="tip">
            <div class="tiptop"><span>提示信息</span>
                <a></a>
            </div>
            <div class="tipinfo">
                <span><img src="/Public/Admin/images/ticon.png" /></span>
                <div class="tipright">
                    <p>是否确认对信息的修改 ？</p>
                    <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
                </div>
            </div>
            <div class="tipbtn">
                <input name="" type="button" class="sure" value="确定" />&nbsp;
                <input name="" type="button" class="cancel" value="取消" />
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>

</html>