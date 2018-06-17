<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:46
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/uitypes/Owner.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2604c67639c4_32270837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cfb2de2f32477191dceacc00233faaaec3ff30d' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/uitypes/Owner.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2604c67639c4_32270837 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_assignInScope('FIELD_INFO', \App\Purifier::encodeHtml(\App\Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo())));
$_smarty_tpl->_assignInScope('SPECIAL_VALIDATOR', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator());
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUIType() == '53') {
$_smarty_tpl->_assignInScope('ROLE_RECORD_MODEL', $_smarty_tpl->tpl_vars['USER_MODEL']->value->getRoleDetail());
$_smarty_tpl->_assignInScope('ALL_ACTIVEUSER_LIST', \App\Fields\Owner::getInstance($_smarty_tpl->tpl_vars['MODULE']->value)->getAccessibleUsers('',$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType()));
$_smarty_tpl->_assignInScope('ALL_ACTIVEGROUP_LIST', \App\Fields\Owner::getInstance($_smarty_tpl->tpl_vars['MODULE']->value)->getAccessibleGroups('',$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType()));
$_smarty_tpl->_assignInScope('ASSIGNED_USER_ID', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName());
$_smarty_tpl->_assignInScope('CURRENT_USER_ID', $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('id'));
$_smarty_tpl->_assignInScope('FIELD_VALUE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getEditViewDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'),$_smarty_tpl->tpl_vars['RECORD']->value));
if ($_smarty_tpl->tpl_vars['FIELD_VALUE']->value == '' && $_smarty_tpl->tpl_vars['VIEW']->value != 'MassEdit') {
$_smarty_tpl->_assignInScope('FIELD_VALUE', $_smarty_tpl->tpl_vars['CURRENT_USER_ID']->value);
}
$_smarty_tpl->_assignInScope('FOUND_SELECT_VALUE', 0);
?><select class="select2 form-control <?php echo $_smarty_tpl->tpl_vars['ASSIGNED_USER_ID']->value;?>
" title="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-validation-engine="validate[<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory() == true) {?> required,<?php }?>funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" data-name="<?php echo $_smarty_tpl->tpl_vars['ASSIGNED_USER_ID']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['ASSIGNED_USER_ID']->value;?>
" data-fieldinfo='<?php echo $_smarty_tpl->tpl_vars['FIELD_INFO']->value;?>
' <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)) {?>data-validator=<?php echo \App\Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);
}?> <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isEditableReadOnly()) {?>readonly="readonly"<?php }?> <?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser() == false && $_smarty_tpl->tpl_vars['ROLE_RECORD_MODEL']->value->get('changeowner') == 0) {?>readonly="readonly"<?php }
if (AppConfig::performance('SEARCH_OWNERS_BY_AJAX')) {?>data-ajax-search="1" data-ajax-url="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&action=Fields&mode=getOwners&fieldName=<?php echo $_smarty_tpl->tpl_vars['ASSIGNED_USER_ID']->value;?>
" data-minimum-input="<?php echo AppConfig::performance('OWNER_MINIMUM_INPUT_LENGTH');?>
"<?php }?>><?php if (!AppConfig::performance('SEARCH_OWNERS_BY_AJAX')) {
if ($_smarty_tpl->tpl_vars['VIEW']->value == 'MassEdit') {?><option value=""><?php echo \App\Language::translate('LBL_SELECT_OPTION','Vtiger');?>
</option><?php }?><optgroup label="<?php echo \App\Language::translate('LBL_USERS');?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
" data-picklistvalue="<?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_VALUE']->value == $_smarty_tpl->tpl_vars['OWNER_ID']->value) {?> selected <?php $_smarty_tpl->_assignInScope('FOUND_SELECT_VALUE', 1);
}?>data-userId="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER_ID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</optgroup><optgroup label="<?php echo \App\Language::translate('LBL_GROUPS');?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
" data-picklistvalue="<?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_VALUE']->value == $_smarty_tpl->tpl_vars['OWNER_ID']->value) {?> selected <?php $_smarty_tpl->_assignInScope('FOUND_SELECT_VALUE', 1);
}?>><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['OWNER_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</optgroup><?php if (!empty($_smarty_tpl->tpl_vars['FIELD_VALUE']->value) && $_smarty_tpl->tpl_vars['FOUND_SELECT_VALUE']->value == 0 && !($_smarty_tpl->tpl_vars['ROLE_RECORD_MODEL']->value->get('allowassignedrecordsto') == 5 && count($_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value) != 0 && $_smarty_tpl->tpl_vars['FIELD_VALUE']->value == '')) {
$_smarty_tpl->_assignInScope('OWNER_NAME', \App\Fields\Owner::getLabel($_smarty_tpl->tpl_vars['FIELD_VALUE']->value));
?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" data-picklistvalue="<?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
" selected data-userId="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER_ID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
</option><?php }
} else {
if (isset($_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value[$_smarty_tpl->tpl_vars['FIELD_VALUE']->value])) {
$_smarty_tpl->_assignInScope('OWNER_NAME', $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value[$_smarty_tpl->tpl_vars['FIELD_VALUE']->value]);
} elseif (isset($_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value[$_smarty_tpl->tpl_vars['FIELD_VALUE']->value])) {
$_smarty_tpl->_assignInScope('OWNER_NAME', $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value[$_smarty_tpl->tpl_vars['FIELD_VALUE']->value]);
} else {
$_smarty_tpl->_assignInScope('OWNER_NAME', \App\Fields\Owner::getLabel($_smarty_tpl->tpl_vars['FIELD_VALUE']->value));
}?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" selected data-picklistvalue="<?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['OWNER_NAME']->value);?>
" selected data-userId="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER_ID']->value;?>
"><?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['OWNER_NAME']->value);?>
</option><?php }?></select><?php }
}
}
