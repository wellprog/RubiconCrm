<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:39
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/uitypes/OwnerFieldSearchView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2604bf26ec99_10709071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef6d568428288a8a1fc64098627bf69a51045033' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/uitypes/OwnerFieldSearchView.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2604bf26ec99_10709071 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_assignInScope('FIELD_INFO', \App\Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo()));
$_smarty_tpl->_assignInScope('ASSIGNED_USER_ID', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName());
if (isset($_smarty_tpl->tpl_vars['SEARCH_INFO']->value['searchValue'])) {
$_smarty_tpl->_assignInScope('SEARCH_VALUE', explode('##',$_smarty_tpl->tpl_vars['SEARCH_INFO']->value['searchValue']));
} else {
$_smarty_tpl->_assignInScope('SEARCH_VALUE', array());
}
$_smarty_tpl->_assignInScope('SEARCH_VALUES', array_map("trim",$_smarty_tpl->tpl_vars['SEARCH_VALUE']->value));
if (!AppConfig::performance('SEARCH_OWNERS_BY_AJAX')) {
if ($_smarty_tpl->tpl_vars['VIEWID']->value && AppConfig::performance('SEARCH_SHOW_OWNER_ONLY_IN_LIST')) {
$_smarty_tpl->_assignInScope('USERS_GROUP_LIST', \App\Fields\Owner::getInstance($_smarty_tpl->tpl_vars['MODULE']->value)->getUsersAndGroupForModuleList($_smarty_tpl->tpl_vars['VIEWID']->value));
$_smarty_tpl->_assignInScope('ALL_ACTIVEUSER_LIST', $_smarty_tpl->tpl_vars['USERS_GROUP_LIST']->value['users']);
$_smarty_tpl->_assignInScope('ALL_ACTIVEGROUP_LIST', $_smarty_tpl->tpl_vars['USERS_GROUP_LIST']->value['group']);
} else {
$_smarty_tpl->_assignInScope('ALL_ACTIVEUSER_LIST', \App\Fields\Owner::getInstance()->getAccessibleUsers());
if ($_smarty_tpl->tpl_vars['ASSIGNED_USER_ID']->value != 'modifiedby') {
$_smarty_tpl->_assignInScope('ALL_ACTIVEGROUP_LIST', \App\Fields\Owner::getInstance()->getAccessibleGroups());
} else {
$_smarty_tpl->_assignInScope('ALL_ACTIVEGROUP_LIST', array());
}
}
}?><div class="picklistSearchField"><select class="select2noactive listSearchContributor form-control <?php echo $_smarty_tpl->tpl_vars['ASSIGNED_USER_ID']->value;?>
" title="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
"  name="<?php echo $_smarty_tpl->tpl_vars['ASSIGNED_USER_ID']->value;?>
" multiple <?php if (AppConfig::performance('SEARCH_OWNERS_BY_AJAX')) {?>data-ajax-search="1" data-ajax-url="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&action=Fields&mode=getOwners&fieldName=<?php echo $_smarty_tpl->tpl_vars['ASSIGNED_USER_ID']->value;?>
" data-minimum-input="<?php echo AppConfig::performance('OWNER_MINIMUM_INPUT_LENGTH');?>
" <?php }?>data-fieldinfo='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['FIELD_INFO']->value, ENT_QUOTES, 'UTF-8', true);?>
'><?php if (AppConfig::performance('SEARCH_OWNERS_BY_AJAX')) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SEARCH_VALUES']->value, 'OWNER_ID');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
" selected><?php echo \App\Fields\Owner::getLabel($_smarty_tpl->tpl_vars['OWNER_ID']->value);?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else {
if (count($_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value) > 0) {?><optgroup label="<?php echo \App\Language::translate('LBL_USERS');?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEUSER_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
" data-picklistvalue="<?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
" <?php if (in_array(trim(App\Purifier::decodeHtml($_smarty_tpl->tpl_vars['OWNER_NAME']->value)),$_smarty_tpl->tpl_vars['SEARCH_VALUES']->value) || in_array($_smarty_tpl->tpl_vars['OWNER_ID']->value,$_smarty_tpl->tpl_vars['SEARCH_VALUES']->value)) {?> selected <?php }?> data-userId="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</optgroup><?php }
if (count($_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value) > 0) {?><optgroup label="<?php echo \App\Language::translate('LBL_GROUPS');?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIVEGROUP_LIST']->value, 'OWNER_NAME', false, 'OWNER_ID');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['OWNER_ID']->value => $_smarty_tpl->tpl_vars['OWNER_NAME']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
" data-picklistvalue="<?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
" <?php if (in_array(trim(App\Purifier::decodeHtml($_smarty_tpl->tpl_vars['OWNER_NAME']->value)),$_smarty_tpl->tpl_vars['SEARCH_VALUES']->value) || in_array($_smarty_tpl->tpl_vars['OWNER_ID']->value,$_smarty_tpl->tpl_vars['SEARCH_VALUES']->value)) {?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['OWNER_NAME']->value;?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</optgroup><?php }
}?></select></div>
<?php }
}
