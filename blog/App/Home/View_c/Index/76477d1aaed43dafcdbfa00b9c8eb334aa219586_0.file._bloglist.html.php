<?php
/* Smarty version 3.1.30, created on 2016-09-21 11:25:34
  from "E:\web\php51\blog\App\Home\View\Pub\_bloglist.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e1fdaecd3de0_78491138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76477d1aaed43dafcdbfa00b9c8eb334aa219586' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Home\\View\\Pub\\_bloglist.html',
      1 => 1474427210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e1fdaecd3de0_78491138 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\web\\php51\\blog\\Frame\\smarty\\plugins\\modifier.date_format.php';
?>
<!--文章-->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bloginfo']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
<div class="wz">
  <h3><a href="/b-8.html"><?php echo $_smarty_tpl->tpl_vars['v']->value['blog_title'];?>
</a></h3>
   <dl>
     <dd>
      <div class="dd_text_1"><?php echo mb_substr($_smarty_tpl->tpl_vars['v']->value['blog_content'],0,153,'utf-8');?>
...</div>
       <p class="dd_text_2">
        <span class="left author">user1</span>
        <span class="left sj">时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['add_time'],"%Y-%m-%d %H:%M:%S");?>
</span>
        <span class="left fl">分类：<a href="?cid=1"><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</a></span>
        <span class="left yd">
          <a href="/index.php?p=home&c=blog&a=detail&blog_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['blog_id'];?>
" target="_blank">阅读全文</a></span>
       </p>
      <div class="clear"></div>
     </dd>
     <div class="clear"></div>
   </dl>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<!--文章 end--><?php }
}
