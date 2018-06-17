<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:11
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BreadCrumbs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb430d7698_72798006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '345c7652a285f63480313abd41b1c6e7df9b98fa' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BreadCrumbs.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb430d7698_72798006 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (AppConfig::main('breadcrumbs') == 'true') {?><div class="breadCrumbs" ><?php if (isset($_smarty_tpl->tpl_vars['BREADCRUMB_TITLE']->value)) {
$_smarty_tpl->_assignInScope('BREADCRUMBS', Vtiger_Menu_Model::getBreadcrumbs($_smarty_tpl->tpl_vars['BREADCRUMB_TITLE']->value));
} else {
$_smarty_tpl->_assignInScope('BREADCRUMBS', Vtiger_Menu_Model::getBreadcrumbs());
}
$_smarty_tpl->_assignInScope('HOMEICON', 'userIcon-Home');
if ($_smarty_tpl->tpl_vars['BREADCRUMBS']->value) {?><div class="breadcrumbsContainer"><h2 class="breadcrumbsLinks textOverflowEllipsis"><a href="<?php echo AppConfig::main('site_URL');?>
"><span class="<?php echo $_smarty_tpl->tpl_vars['HOMEICON']->value;?>
"></span></a>&nbsp;|&nbsp;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BREADCRUMBS']->value, 'item', false, 'key', 'breadcrumbs', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
if ($_smarty_tpl->tpl_vars['key']->value != 0 && $_smarty_tpl->tpl_vars['ITEM_PREV']->value) {?><span class="separator">&nbsp;<?php echo vglobal('breadcrumbs_separator');?>
&nbsp;</span><?php }
if (isset($_smarty_tpl->tpl_vars['item']->value['url'])) {?><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span></a><?php } else { ?><span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span><?php }
$_smarty_tpl->_assignInScope('ITEM_PREV', $_smarty_tpl->tpl_vars['item']->value['name']);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</h2></div><?php }?></div><?php }
}
}
