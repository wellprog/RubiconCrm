<?php
/* Smarty version 3.1.31, created on 2018-06-17 10:10:50
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/DetailViewPreProcess.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26097a5a8d62_52323260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21e47fd9b72331d40355cbfdd71466d4194b89d1' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/DetailViewPreProcess.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26097a5a8d62_52323260 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('Header.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
<div class="bodyContents"><div class="mainContainer"><div class="contentsDiv"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('DetailViewHeader.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
