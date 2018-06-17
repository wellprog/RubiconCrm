<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:43
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/ConfReport/Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb63d83c19_60254437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11f68db5492d106f51445b5b6b741bbe63e5e8d9' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/ConfReport/Index.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb63d83c19_60254437 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="">
	<div class="widget_header row">
		<div class="col-xs-10">
			<?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('BreadCrumbs.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

			<?php echo App\Language::translate('LBL_CONFREPORT_DESCRIPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>

		</div>
		<div class="col-xs-2">
			
		</div>
	</div>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#Configuration"><?php echo App\Language::translate('LBL_YETIFORCE_ENGINE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li>
        <li><a data-toggle="tab" href="#Permissions"><?php echo App\Language::translate('LBL_FILES_PERMISSIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li>
			<?php if (\App\Module::isModuleActive('OSSMail')) {?>
			<li><a href="#check_config" data-toggle="tab"><?php echo App\Language::translate('LBL_CHECK_CONFIG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li>
			<?php }?>
    </ul>
    <div class="tab-content">
        <div id="Configuration" class="tab-pane fade in active">
			<table class="table tableRWD table-bordered table-condensed themeTableColor confTable">
				<thead>
					<tr class="blockHeader">
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_LIBRARY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_INSTALLED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_MANDATORY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Settings_ConfReport_Module_Model::getConfigurationLibrary(), 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
						<tr <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 'LBL_NO') {?>class="danger"<?php }?>>
							<td>
								<label><?php echo App\Language::translate($_smarty_tpl->tpl_vars['key']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label>
								<?php if (isset($_smarty_tpl->tpl_vars['item']->value['help']) && $_smarty_tpl->tpl_vars['item']->value['status']) {?><a href="#" class="popoverTooltip pull-right" data-trigger="focus" data-placement="rigth" data-content="<?php echo App\Language::translate($_smarty_tpl->tpl_vars['item']->value['help'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="glyphicon glyphicon-info-sign"></i></a><?php }?>
							</td>
							<td><label><?php echo App\Language::translate($_smarty_tpl->tpl_vars['item']->value['status'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
							<td><label>
									<?php if ($_smarty_tpl->tpl_vars['item']->value['mandatory']) {?>
										<?php echo App\Language::translate('LBL_MANDATORY',$_smarty_tpl->tpl_vars['MODULE']->value);?>

									<?php } else { ?>
										<?php echo App\Language::translate('LBL_OPTIONAL',$_smarty_tpl->tpl_vars['MODULE']->value);?>

									<?php }?>
								</label></td>
						</tr>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				</tbody>
			</table>
			<br />
			<table class="table tableRWD table-bordered table-condensed themeTableColor confTable">
				<thead>
					<tr class="blockHeader">
						<th colspan="3" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_SYSTEM_STABILITY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
					</tr>
					<tr class="blockHeader">
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_PARAMETER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_RECOMMENDED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_VALUE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Settings_ConfReport_Module_Model::getStabilityConf(), 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
						<tr <?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?>class="danger"<?php }?>>
							<td>
								<label><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</label>
								<?php if (isset($_smarty_tpl->tpl_vars['item']->value['help']) && $_smarty_tpl->tpl_vars['item']->value['status']) {?><a href="#" class="popoverTooltip pull-right" data-trigger="focus" data-placement="rigth" data-content="<?php echo App\Language::translate($_smarty_tpl->tpl_vars['item']->value['help'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="glyphicon glyphicon-info-sign"></i></a><?php }?>
							</td>
							<td><label><?php echo App\Language::translate($_smarty_tpl->tpl_vars['item']->value['prefer'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
							<td><label><?php echo App\Language::translate($_smarty_tpl->tpl_vars['item']->value['current'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
						</tr>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				</tbody>
			</table>
			<br />
			<table class="table tableRWD table-bordered table-condensed themeTableColor confTable">
				<thead>
					<tr class="blockHeader">
						<th colspan="3" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_SYSTEM_SECURITY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
					</tr>
					<tr class="blockHeader">
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_PARAMETER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_RECOMMENDED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_VALUE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Settings_ConfReport_Module_Model::getSecurityConf(), 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
						<tr <?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?>class="danger"<?php }?>>
							<td>
								<label><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</label>
								<?php if (isset($_smarty_tpl->tpl_vars['item']->value['help']) && $_smarty_tpl->tpl_vars['item']->value['status']) {?><a href="#" class="popoverTooltip pull-right" data-trigger="focus" data-placement="rigth" data-content="<?php echo App\Language::translate($_smarty_tpl->tpl_vars['item']->value['help'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><i class="glyphicon glyphicon-info-sign"></i></a><?php }?>
							</td>
							<td><label><?php echo App\Language::translate($_smarty_tpl->tpl_vars['item']->value['prefer'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
							<td><label><?php echo App\Language::translate($_smarty_tpl->tpl_vars['item']->value['current'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
						</tr>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				</tbody>
			</table>
			<br />
			<table class="table tableRWD table-bordered table-condensed themeTableColor confTable">
				<thead>
					<tr class="blockHeader">
						<th colspan="2" class="mediumWidthType">
							<?php echo App\Language::translate('LBL_ENVIRONMENTAL_INFORMATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>

						</th>
					</tr>
					<tr class="blockHeader">
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_PARAMETER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_VALUE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Settings_ConfReport_Module_Model::getSystemInfo(), 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
						<tr>
							<td><label><?php echo App\Language::translate($_smarty_tpl->tpl_vars['key']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
							<td><label><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</label></td>
						</tr>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				</tbody>
			</table>
			<br />
        </div>
        <div id="Permissions" class="tab-pane fade">
			<table class="table tableRWD table-bordered table-condensed themeTableColor confTable">
				<thead>
					<tr class="blockHeader">
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_FILE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_PATH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
						<th colspan="1" class="mediumWidthType">
							<span><?php echo App\Language::translate('LBL_PERMISSION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Settings_ConfReport_Module_Model::getPermissionsFiles(), 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
						<tr <?php if ($_smarty_tpl->tpl_vars['item']->value['permission'] == 'FailedPermission') {?>class="danger"<?php }?>>
							<td width="23%"><label class="marginRight5px"><?php echo App\Language::translate($_smarty_tpl->tpl_vars['key']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
							<td width="23%"><label class="marginRight5px"><?php echo App\Language::translate($_smarty_tpl->tpl_vars['item']->value['path'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></td>
							<td width="23%"><label class="marginRight5px">
									<?php if ($_smarty_tpl->tpl_vars['item']->value['permission'] == 'FailedPermission') {?>
										<?php echo App\Language::translate('LBL_FAILED_PERMISSION',$_smarty_tpl->tpl_vars['MODULE']->value);?>

									<?php } else { ?>
										<?php echo App\Language::translate('LBL_TRUE_PERMISSION',$_smarty_tpl->tpl_vars['MODULE']->value);?>

									<?php }?>
								</label></td>
						</tr>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				</tbody>
			</table>

        </div>
		
		<?php if (\App\Module::isModuleActive('OSSMail') && Users_Privileges_Model::getCurrentUserPrivilegesModel()->hasModulePermission('OSSMail')) {?>
			<div class='editViewContainer tab-pane' id="check_config">
				<iframe id="roundcube_interface" style="width: 100%; min-height: 590px;" src="index.php?module=OSSMail&view=CheckConfig" frameborder="0"> </iframe>
			</div>
		<?php }?>
    </div>
</div>
<?php }
}
