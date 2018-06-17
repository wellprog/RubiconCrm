<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:48:29
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/LayoutEditor/InactiveFieldModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26043d13a1a8_41899989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2b42f282cc748cba140034290d9bb9d05cd0bec' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/LayoutEditor/InactiveFieldModal.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26043d13a1a8_41899989 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="modal inactiveFieldsModal fade" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 class="modal-title"><?php echo App\Language::translate('LBL_INACTIVE_FIELDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div><form class="form-horizontal inactiveFieldsForm" method="POST"><div class="modal-body"><div class="row inActiveList"></div></div><div class="modal-footer"><div class=" pull-right cancelLinkContainer"><a class="cancelLink btn btn-warning" type="reset" data-dismiss="modal"><?php echo App\Language::translate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></div><button class="btn btn-success" type="submit" name="reactivateButton"><strong><?php echo App\Language::translate('LBL_REACTIVATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div></form></div></div></div><?php }
}
