<?php
/* Smarty version 3.1.30, created on 2016-09-21 11:24:39
  from "E:\web\php51\blog\App\Home\View\Blog\detail.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e1fd77d203c5_64539701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd6c8750253f42db611190fda4b2369e75497650' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Home\\View\\Blog\\detail.html',
      1 => 1474428091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Pub/_head.html' => 1,
    'file:../Pub/_right.html' => 1,
    'file:../Pub/_foot.html' => 1,
  ),
),false)) {
function content_57e1fd77d203c5_64539701 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\web\\php51\\blog\\Frame\\smarty\\plugins\\modifier.date_format.php';
?>
<!--引入头部内容-->
<?php $_smarty_tpl->_subTemplateRender("file:../Pub/_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!--content start-->
    <div id="content">
         <!--left-->
        <div class="left" id="news">
          <div class="weizi">
            <div class="wz_text">当前位置：
              <a href="./">首页</a>>
              <a href="/index.php?p=home&c=blog&a=showlist&cate_id=<?php echo $_smarty_tpl->tpl_vars['bloginfo']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['bloginfo']->value['cate_name'];?>
</a>
              &gt;
              <span>文章内容</span>
            </div>
          </div>
          <div class="news_content">


            <div class="news_top">
              <h1><?php echo $_smarty_tpl->tpl_vars['bloginfo']->value['blog_title'];?>
</h1>
              <p>
                <span class="left sj">时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['bloginfo']->value['add_time'],"%Y-%m-%d %H:%M:%S");?>
</span>
                <span class="left fl">分类：<?php echo $_smarty_tpl->tpl_vars['bloginfo']->value['cate_name'];?>
</span>
                <span class="left author">user1</span>
              </p>
              <div class="clear"></div>
            </div>
            <div class="news_text">
              <!--内容区start-->
              <pre class='content-pre'>
              <?php echo $_smarty_tpl->tpl_vars['bloginfo']->value['blog_content'];?>

              </pre>              
              <br /><br />
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

          
 <!--引入右部内容-->
<?php $_smarty_tpl->_subTemplateRender("file:../Pub/_right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


         <div class="clear"></div>
    </div>
    <!--content end-->

    <!--版权信息-->
    

<!--引入右部内容-->
<?php $_smarty_tpl->_subTemplateRender("file:../Pub/_foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
