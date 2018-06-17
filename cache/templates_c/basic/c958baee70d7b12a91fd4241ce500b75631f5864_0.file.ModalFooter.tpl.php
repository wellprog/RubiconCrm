<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:46:21
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ModalFooter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2603bdbc9189_08332060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c958baee70d7b12a91fd4241ce500b75631f5864' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ModalFooter.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2603bdbc9189_08332060 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="modal-footer"><button class="btn btn-success" type="submit" name="saveButton"><span class="glyphicon glyphicon-ok"></span>&nbsp;<strong><?php echo \App\Language::translate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><button class="btn btn-warning" type="reset" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;<strong><?php echo \App\Language::translate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div>
<?php }
}
