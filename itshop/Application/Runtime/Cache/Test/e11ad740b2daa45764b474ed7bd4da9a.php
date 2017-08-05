<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="/Public/Common/Ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/Public/Common/Ueditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/Ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/Ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/Common/Ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<div class="header">页面头部</div>
<textarea id="content"></textarea>

<script type="text/javascript">
var um = UM.getEditor('content',{
	initialFrameWidth:500, //初始化编辑器宽度,默认500
    initialFrameHeight:500,  //初始化编辑器高度,默认500
    toolbar:[
             'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
             'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
             '| justifyleft justifycenter justifyright justifyjustify |',
             'link unlink | emotion image video  | map',
             '| horizontal print preview fullscreen', 'drafts', 'formula'
         ],
    //默认是否显示该文本编辑器
    isShow:false,
});
</script>

<div class="footer">页面脚部</div>
</body>
</html>