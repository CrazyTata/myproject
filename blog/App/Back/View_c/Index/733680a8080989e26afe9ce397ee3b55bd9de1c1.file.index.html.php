<?php /* Smarty version Smarty-3.1.16, created on 2016-09-18 15:56:36
         compiled from "E:\web\php51\blog\App\Back\View\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2406457ddef47a6a9d5-25921049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '733680a8080989e26afe9ce397ee3b55bd9de1c1' => 
    array (
      0 => 'E:\\web\\php51\\blog\\App\\Back\\View\\Index\\index.html',
      1 => 1474164194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2406457ddef47a6a9d5-25921049',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57ddef47af9f28_83510253',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ddef47af9f28_83510253')) {function content_57ddef47af9f28_83510253($_smarty_tpl) {?><!--引入公共的头部-->
<?php echo $_smarty_tpl->getSubTemplate ("../Pub/_head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container clearfix">
    
<!--引入公共的左侧-->
<?php echo $_smarty_tpl->getSubTemplate ("../Pub/_left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
    <!--右侧主操作区-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list">
                <i class="icon-font">&#xe06b;</i>
                <span>欢迎使用博客后台管理系统。</span>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info">WINNT</span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info">Apache/2.2.21 (Win64) PHP/5.3.10</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info">apache2handler</span>
                    </li>
                    <li>
                        <label class="res-lab">模板版本</label><span class="res-info">v-0.1</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label>
                        <span class="res-info" id='nowtime'>2015年9月4日 11:01:07</span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名</label><span class="res-info"><span id="host">localhost</span></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>

</body>
</html><?php }} ?>
