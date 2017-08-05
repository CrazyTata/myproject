<?php
/* Smarty version 3.1.30, created on 2016-09-21 10:54:30
  from "E:\web\php51\blog\App\Home\View\Blog\showlist.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e1f66676e194_71123356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fce0e2470dd6406b17eb6604ea208e1c94c15afa' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Home\\View\\Blog\\showlist.html',
      1 => 1474426424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Pub/_head.html' => 1,
    'file:../Pub/_bloglist.html' => 1,
    'file:../Pub/_right.html' => 1,
    'file:../Pub/_foot.html' => 1,
  ),
),false)) {
function content_57e1f66676e194_71123356 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--引入头部内容-->
<?php $_smarty_tpl->_subTemplateRender("file:../Pub/_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!--content start-->
    <div id="content">
         <!--left-->
         <div class="left" id="c_left">
           <div class="s_tuijian">
           <h2>最新<span>文章</span></h2>
           </div>
          <div class="content_text">
                    
<!--引入博文列表内容页-->
<?php $_smarty_tpl->_subTemplateRender("file:../Pub/_bloglist.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                             
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
?>

<?php }
}
