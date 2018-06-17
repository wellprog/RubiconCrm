<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:06
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/Menu/CreateMenuStep1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26049e942a58_10779856',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da4b23191af0be131fd96330b0080a4084cee927' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/Menu/CreateMenuStep1.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26049e942a58_10779856 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="modal fade" tabindex="-1">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo \App\Language::translate('LBL_CREATING_MENU',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4>
			</div>
			<div class="modal-body">
				<?php $_smarty_tpl->_assignInScope('MENU_TYPES', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getMenuTypes());
?>
				<input type="hidden" id="mode" value="step1" />
				<div class="row">
					<div class="col-md-5 marginLeftZero"><?php echo \App\Language::translate('LBL_SELECT_TYPE_OF_MENU',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</div>
					<div class="col-md-7">
						<select name="type" class="select2 form-control type">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MENU_TYPES']->value, 'ITEM', false, 'KEY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['KEY']->value => $_smarty_tpl->tpl_vars['ITEM']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['KEY']->value;?>
"><?php echo \App\Language::translate(('LBL_').(strtoupper($_smarty_tpl->tpl_vars['ITEM']->value)),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

						</select>
					</div>
				</div>
				<br />
				<div class="well well-small" style="margin-bottom: 0;max-height: 280px;overflow-y: scroll;">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MENU_TYPES']->value, 'ITEM', false, 'KEY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['KEY']->value => $_smarty_tpl->tpl_vars['ITEM']->value) {
?>
						<h5><?php echo \App\Language::translate(('LBL_').(strtoupper($_smarty_tpl->tpl_vars['ITEM']->value)),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h5>
						<p><?php echo \App\Language::translate((('LBL_').(strtoupper($_smarty_tpl->tpl_vars['ITEM']->value))).('_DESC'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				</div>
			</div>
			<div class="modal-footer">
				<div class="pull-right cancelLinkContainer" style="margin-top:0px;">
					<button class="btn btn-success nextButton" type="submit"><strong><?php echo \App\Language::translate('LBL_NEXT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button>
					<button class="btn cancelLink btn-warning" type="reset" data-dismiss="modal"><?php echo \App\Language::translate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }
}
