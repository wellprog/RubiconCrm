<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:08
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/Menu/fields/Hotkey.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2604a0701396_59385260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dab953e06cdc47c96397443cbb849143e5c2a36' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/Menu/fields/Hotkey.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2604a0701396_59385260 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="form-group">
	<label class="col-md-4 control-label"><?php echo \App\Language::translate('LBL_HOTKEY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</label>
	<div class="col-md-7">
		<div class="input-group">
			<input name="hotkey" class="form-control" type="text" value="<?php if ($_smarty_tpl->tpl_vars['RECORD']->value) {
echo $_smarty_tpl->tpl_vars['RECORD']->value->get('hotkey');
}?>" />
			<a class="input-group-addon testBtn"><?php echo \App\Language::translate('LBL_TEST_IT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
			<a class="input-group-addon popoverTooltip" target="_blank" href="https://github.com/ccampbell/mousetrap" rel="noreferrer" data-toggle="popover" 
				data-content="<?php echo \App\Language::translate('LBL_MORE_INFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
">
				<i class="glyphicon glyphicon-info-sign"></i>
			</a>
		</div>
	</div>
</div>
<?php }
}
