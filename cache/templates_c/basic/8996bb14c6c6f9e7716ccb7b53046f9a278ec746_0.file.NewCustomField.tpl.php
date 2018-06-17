<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:48:29
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/LayoutEditor/NewCustomField.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26043d0c7865_70811824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8996bb14c6c6f9e7716ccb7b53046f9a278ec746' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/LayoutEditor/NewCustomField.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26043d0c7865_70811824 (Smarty_Internal_Template $_smarty_tpl) {
?>

<li class="newCustomFieldCopy hide"><div class="marginLeftZero border1px" data-field-id="" data-sequence=""><div class="row padding1per"><span class="col-md-2">&nbsp;<?php if ($_smarty_tpl->tpl_vars['IS_SORTABLE']->value) {?><a><img src="<?php echo \App\Layout::getImagePath('drag.png');?>
" border="0" alt="<?php echo App\Language::translate('LBL_DRAG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /></a><?php }?></span><div class="col-md-10 marginLeftZero fieldContainer"><span class="fieldLabel"></span><input type="hidden" value="" id="relatedFieldValue" /><span class="pull-right actions"><button class="btn btn-primary btn-xs copyFieldLabel pull-right marginLeft5" data-target="relatedFieldValue"><span class="glyphicon glyphicon-copy" title="<?php echo App\Language::translate('LBL_COPY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span></button><?php if ($_smarty_tpl->tpl_vars['IS_SORTABLE']->value) {?><button class="btn btn-success btn-xs editFieldDetails marginLeft5"><span class="glyphicon glyphicon-pencil" title="<?php echo App\Language::translate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span></button><?php }?><button type="button" class="btn btn-danger btn-xs deleteCustomField marginLeft5" data-field-id=""><span class="glyphicon glyphicon-trash" title="<?php echo App\Language::translate('LBL_DELETE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span></button></span></div></div></div></li><?php }
}
