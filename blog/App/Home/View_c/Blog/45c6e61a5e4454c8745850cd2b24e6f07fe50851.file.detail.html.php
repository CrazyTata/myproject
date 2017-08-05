<?php /* Smarty version Smarty-3.1.16, created on 2016-09-18 08:52:17
         compiled from "E:\web\php51\blog\App\Home\View\Blog\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:3138257dde5411145a5-24198653%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45c6e61a5e4454c8745850cd2b24e6f07fe50851' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Home\\View\\Blog\\detail.html',
      1 => 1474159917,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3138257dde5411145a5-24198653',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57dde5411d53f4_35115515',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dde5411d53f4_35115515')) {function content_57dde5411d53f4_35115515($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>个人博客</title>
<meta name="keywords" content="个人博客" />
<meta name="description" content="" />
<link rel="stylesheet" href="<?php echo @constant('CSS_URL');?>
index.css"/>
<link rel="stylesheet" href="<?php echo @constant('CSS_URL');?>
style.css"/>
<script type="text/javascript" src="<?php echo @constant('JS_URL');?>
jquery1.42.min.js"></script>
<script type="text/javascript" src="<?php echo @constant('JS_URL');?>
jquery.SuperSlide.2.1.1.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo @constant('JS_URL');?>
html5.js"></script>
<![endif]-->
</head>
<body>
    <!--页头信息-->
    <!--header start-->
    <div id="header">
      <h1>个人博客</h1>
            <p class="blog_sub_title"><img src='<?php echo @constant('IMG_URL');?>
itcast_shiming_1.gif' /></p>    
    </div>
     <!--header end-->
    <!--nav-->
     <div id="nav">
        <table width="100%"><tr>
         <th><a href="/" style="color:red;">首页</a></th>
                  <th><a href="c-1.html">基础知识</a></th>
                  <th><a href="c-2.html">MVC框架技术</a></th>
                  <th><a href="c-3.html">生活感悟</a></th>
                  <th><a href="c-4.html">技术前沿</a></th>
                  <th><a href="c-6.html">新闻资讯</a></th>
                 </tr></table>
      </div>
       <!--nav end-->

    <!--content start-->
    <div id="content">
         <!--left-->
        <div class="left" id="news">
          <div class="weizi">
            <div class="wz_text">当前位置：
              <a href="./">首页</a>>
              <a href="?cid=1">基础知识</a>
              &gt;
              <span>文章内容</span>
            </div>
          </div>
          <div class="news_content">


            <div class="news_top">
              <h1>页面重构css技巧总结（转发）</h1>
              <p>
                <span class="left sj">时间：2016-08-08 23:07:00</span>
                <span class="left fl">分类：基础知识</span>
                <span class="left author">user1</span>
              </p>
              <div class="clear"></div>
            </div>
            <div class="news_text">
              <!--内容区start-->
              <pre class='content-pre'>1.如何让文字在容器内垂直居中？ 
(1)方法：为容器添加line-height属性，使得line-height的值等于容器的height。 
(2)代码 [html] view plain copy print?在CODE上查看代码片派生到我的代码片
(3)原理 首先应该明确line-height的含义。line-height属性的含义是设置行间的距离，简称叫行高。而文字的特点就是会以中线为基准进行显示。也就是说，我们可以做如下实现：设定一个容器div，不为其制定高度，内部的文字为其指定行高，在chrome中变换行高，我们会发现文字一直是在容器中垂直居中显示的。（这里的容器大小完全是被文本撑开的，准确的说是其line-height撑开的） 所以如果外部的div大小确定，将其内部的文字设置line-height为容器高度，从视觉效果上看就实现了文字的垂直居中。但还是应该注意并不是二者配合才生成的这种效果，而是文字本身的显示是围绕中线居中的。 

2.如何实现三列布局，两侧固定宽度中间自适应？ 
(1)方法：利用浮动，分别对左右两侧的div设置向左右两侧浮动，再为中间的div设置相应的margin 
(2)代码 [html] view plain copy print?在CODE上查看代码片派生到我的代码片无标题文档 
(3)原理 这里利用了默认宽度的方法。一个div，如果不为它设定宽度，那么它的宽度默认值就是100%。也就是说如果父元素宽度是当我们在此基础上为其设定margin-left和margin-right属性值，就会让这个div的宽度相应缩小。 注意，height的默认值是0。 

3.如何让一个div铺满整个屏幕 
(1)方法：将背景图宽度和高度设置为100%，并且设定position为fixed。 
(2)代码 [html] view plain copy print?在CODE上查看代码片派生到我的代码片无标题文档 
(3)原理 如果只设定width和height为100%，那么宽度可以达到100%，但是高度并不会发生变化。设置了position:fixed，其含义为生成绝对定位的元素，并且相对于浏览器窗口进行定位。因此，这样设定后，整个container元素都是依据窗口进行设定的，高度的100%也就是相对于当前窗口大小的100%了。
</pre>              <br /><br />
              <p align="center"><a href='javascript:history.back()'>返回</a></p>
              <!--内容区end-->
            </div>

            <form action='/feedback-7.html' method="post" >
              <textarea name="feedback" rows="5" style="width:100%"></textarea>
              <div>
                <input type="submit" value=" 发布评论 " />
              </div>
              <br />
              <p align="center"><a href='javascript:history.back()'>返回</a></p>
            </form>
            <div class="comments">
            
<div class='comment_one'><b>user1</b> 在 <i>2016-08-13 20:16:05</i> 说：<br /><pre class='content-pre'>艾丝凡打死</pre></div>

<div class='comment_one'><b>user1</b> 在 <i>2016-08-13 20:16:51</i> 说：<br /><pre class='content-pre'>这是第二个评论</pre></div>

<div class='comment_one'><b>匿名用户</b> 在 <i>2016-08-13 20:36:48</i> 说：<br /><pre class='content-pre'>第3个评论，
而且这是第2行，
测试换行（第3行）</pre></div>

<div class='comment_one'><b>匿名用户</b> 在 <i>2016-08-13 20:56:36</i> 说：<br /><pre class='content-pre'>代码 [html] view plain copy print?在CODE上查看代码片派生到我的代码片无标题文档代码 [html] view plain copy print?在CODE上查看代码片派生到我的代码片无标题文档</pre></div>

<div class='comment_one'><b>匿名用户</b> 在 <i>2016-08-13 21:06:38</i> 说：<br /><pre class='content-pre'>代码 [html] view plain copy print?在CODE上查看代码片派生到我的代码片无标题文档代码 [html] view plain copy print?在CODE上查看代码片派生到我的代码片无标题文档

代码 [html] view plain copy print?在CODE上查看代码片派生到我的代码片无标题文档代码 [html] view plain copy print?在CODE上查看代码片派生到我的代码片无标题文档</pre></div>

<div class='comment_one'><b>user1</b> 在 <i>2016-08-16 22:35:08</i> 说：<br /><pre class='content-pre'>asfasfasdf</pre></div>

<div class='comment_one'><b>user1</b> 在 <i>2016-08-16 22:35:48</i> 说：<br /><pre class='content-pre'>gwgw</pre></div>

<div class='comment_one'><b>user1</b> 在 <i>2016-08-16 22:35:54</i> 说：<br /><pre class='content-pre'>333</pre></div>

<div class='comment_one'><b>user1</b> 在 <i>2016-08-16 22:36:28</i> 说：<br /><pre class='content-pre'>444</pre></div>

<div class='comment_one'><b>user1</b> 在 <i>2016-08-16 22:37:12</i> 说：<br /><pre class='content-pre'>5555</pre></div>

<div class='comment_one'><b>user1</b> 在 <i>2016-08-16 22:37:27</i> 说：<br /><pre class='content-pre'>ggwgwg</pre></div>
            </div>
          </div>
        </div>
         <!--left end-->

          
         <!--right-->
         <div class="right" id="c_right">
          <div class="s_about">
            <h2>关于博主</h2>
             <img src="<?php echo @constant('IMG_URL');?>
my2.jpg" width="230" alt="博主"/>
             <p>博主：XX</p>
             <p>职业：web前端、视觉设计</p>
             <p>简介：</p>
             <p>
             青春是打开了，就合不上的书；
             人生是踏上了，就回不去的路；
             爱情是扔出了，就收不回的赌注。
             </p>
          </div>
          <!--栏目分类-->
           <div class="lanmubox">
              <div class="hd">
               <ul><li>精心推荐</li><li>最新文章</li><li class="hd_3">随机文章</li></ul>
              </div>
              <div class="bd">
                <ul>
                            <li><a href="#" title="网站项目实战开发（-）">网站项目实战开发（-）</a></li>
                            <li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
                            <li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
                            <li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
                            <li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li>
                        </ul>
                 <ul>
                            <li><a href="#" title="网站项目实战开发（-）">网站项目实战开发（-）</a></li>
                            <li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
                            <li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
                            <li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
                            <li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li>
                        </ul>
                 <ul>
                            <li><a href="#" title="网站项目实战开发（-）">网站项目实战开发（-）</a></li>
                            <li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
                            <li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
                            <li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
                            <li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li>
                        </ul>
                 
                
              </div>
           </div>
           <!--栏目分类 end-->

           <div class="link">
            <h2>友情链接</h2>
            <p><a href="http://www.itcast.cn">传智播客</a></p>
            <p><a href="http://www.itheima.com">黑马程序员</a></p>
           </div>
         </div>
         <!--right end-->
         <div class="clear"></div>
    </div>
    <!--content end-->

    <!--版权信息-->
    

    <!--footer start-->
    <div id="footer">
      <p class="copyright">
           &copy; 2016 Powered by 
          <a href="http://www.itcast.cn" target="_blank">传智播客</a>
      </p>
    </div>
    <!--footer end-->
    
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="{$smarty.const.JS_URL}nav.js"></script>
    
</body>
</html>
<?php }} ?>
