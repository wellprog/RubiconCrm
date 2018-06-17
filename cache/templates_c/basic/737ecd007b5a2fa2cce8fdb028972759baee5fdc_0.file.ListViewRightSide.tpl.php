<?php
/* Smarty version 3.1.31, created on 2018-06-17 10:11:33
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ListViewRightSide.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2609a58017f3_12910833',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '737ecd007b5a2fa2cce8fdb028972759baee5fdc' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ListViewRightSide.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2609a58017f3_12910833 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_assignInScope('LINKS', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getRecordListViewLinksRightSide());
if (count($_smarty_tpl->tpl_vars['LINKS']->value) > 0) {
$_smarty_tpl->_assignInScope('ONLY_ONE', count($_smarty_tpl->tpl_vars['LINKS']->value) == 1);
?><div class="actions"><div class=" <?php if ($_smarty_tpl->tpl_vars['ONLY_ONE']->value) {?>pull-right<?php } else { ?>hide actionImages<?php }?>"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LINKS']->value, 'LINK');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['LINK']->value) {
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('ButtonLink.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('BUTTON_VIEW'=>'listViewBasic'), 0, true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div><?php if (!$_smarty_tpl->tpl_vars['ONLY_ONE']->value) {?><button type="button" class="btn btn-sm btn-default toolsAction"><span class="glyphicon glyphicon-wrench"></span></button><?php }?></div><?php }
}
}
