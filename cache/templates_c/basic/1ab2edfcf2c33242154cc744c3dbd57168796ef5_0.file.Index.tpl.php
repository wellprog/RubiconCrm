<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:03
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/Menu/Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26049bbb2d54_16657625',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ab2edfcf2c33242154cc744c3dbd57168796ef5' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/Menu/Index.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26049bbb2d54_16657625 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="menuConfigContainer">
	<div class="widget_header row">
		<div class="col-md-7">
			<?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('BreadCrumbs.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

			<?php echo \App\Language::translate('LBL_MENU_BUILDER_DESCRIPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

		</div>
		<div class="col-md-5 row">
			<div class="col-xs-6 paddingLRZero">
				<button class="btn btn-default addMenu pull-right"><strong><?php echo \App\Language::translate('LBL_ADD_MENU',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button>
			</div>
			<div class="col-xs-6 pull-right ">
				<select class="select2 form-control" name="roleMenu">
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['ROLEID']->value == 0) {?> selected="" <?php }?>><?php echo \App\Language::translate('LBL_DEFAULT_MENU',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Settings_Roles_Record_Model::getAll(), 'ROLE', false, 'KEY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['KEY']->value => $_smarty_tpl->tpl_vars['ROLE']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['KEY']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['ROLEID']->value === $_smarty_tpl->tpl_vars['KEY']->value) {?> selected="" <?php }?>><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['ROLE']->value->getName());?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				</select>
			</div>
		</div>
	</div>
	<hr>
	<?php if (!$_smarty_tpl->tpl_vars['DATA']->value) {?>
		<button class="btn btn-success copyMenu"><strong><?php echo \App\Language::translate('LBL_COPY_MENU',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button>
	<?php }?>
	<div class="treeMenuContainer">
		<input type="hidden" id="treeLastID" value="<?php echo $_smarty_tpl->tpl_vars['LASTID']->value;?>
" />
		<input type="hidden" name="tree" id="treeValues" value='<?php echo \App\Purifier::encodeHtml(\App\Json::encode($_smarty_tpl->tpl_vars['DATA']->value));?>
' />
		<div id="treeContent"></div>
	</div>
	<div class="modal fade copyMenuModal">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><?php echo \App\Language::translate('LBL_COPY_MENU',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4>
					</div>
					<div class="modal-body">
						<select id="roleList" class="form-control" name="roles" data-validation-engine="validate[required]">
							<option value="0"><?php echo \App\Language::translate('LBL_DEFAULT_MENU',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ROLES_CONTAIN_MENU']->value, 'ROLE', false, 'KEY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['KEY']->value => $_smarty_tpl->tpl_vars['ROLE']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['ROLE']->value['roleId'];?>
"  ><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['ROLE']->value['roleName']);?>
</option>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

						</select>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success saveButton"><?php echo \App\Language::translate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
						<button type="button" class="btn btn-warning dismiss" data-dismiss="modal"><?php echo \App\Language::translate('LBL_CLOSE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>
<div class="modal deleteAlert fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo \App\Language::translate('LBL_REMOVE_TITLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3>
			</div>
			<div class="modal-body">
				<p><?php echo \App\Language::translate('LBL_REMOVE_DESC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p>
			</div>
			<div class="modal-footer">
				<div class="pull-right">
					<button class="btn btn-warning cancelLink" type="reset" data-dismiss="modal"><?php echo \App\Language::translate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
				</div>
				<div class="pull-right">
					<button class="btn btn-danger" data-dismiss="modal"><?php echo \App\Language::translate('LBL_REMOVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }
}
