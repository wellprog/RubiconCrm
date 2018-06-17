<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:46
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/EditViewActions.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2604c67a61c7_08780912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'addfdb310c3a30e8e78790420ce4b06be9119701' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/EditViewActions.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2604c67a61c7_08780912 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="formActionsPanel"><?php $_smarty_tpl->_assignInScope('SINGLE_MODULE_NAME', ('SINGLE_').($_smarty_tpl->tpl_vars['MODULE']->value));
?><button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;<strong><?php echo \App\Language::translate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<button class="btn btn-warning" type="reset" onclick="javascript:window.history.back();"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;<strong><?php echo \App\Language::translate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EDITVIEW_LINKS']->value['EDIT_VIEW_HEADER'], 'LINK');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['LINK']->value) {
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('ButtonLink.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('BUTTON_VIEW'=>'editViewHeader'), 0, true);
?>
&nbsp;&nbsp;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div></form></div></div>
<?php }
}
