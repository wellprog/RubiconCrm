<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:08
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/Menu/fields/Newwindow.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2604a06f8e12_13946522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a2e061777dc97c74649dadb20fe4c4fa85105b3' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/Menu/fields/Newwindow.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2604a06f8e12_13946522 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="form-group">
	<label class="col-md-4 control-label"><?php echo \App\Language::translate('LBL_NEW_WINDOW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</label>
	<div class="col-md-7 checkboxForm">
		<input name="newwindow" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['RECORD']->value && $_smarty_tpl->tpl_vars['RECORD']->value->get('newwindow') == 1) {?> checked="checked" <?php }?>/>
	</div>
</div>
<?php }
}
