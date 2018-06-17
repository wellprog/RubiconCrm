<?php
/* Smarty version 3.1.31, created on 2018-06-17 10:11:40
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/AdvanceFilterCondition.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2609acc8f3b5_14116854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dced70124310847f721de27681e58f3544a5045f' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/AdvanceFilterCondition.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2609acc8f3b5_14116854 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (!$_smarty_tpl->tpl_vars['USER_MODEL']->value) {
$_smarty_tpl->_assignInScope('USER_MODEL', Users_Record_Model::getCurrentUserModel());
}?><div class="conditionRow"><div class="col-md-4 conditionField"><select class="<?php if (empty($_smarty_tpl->tpl_vars['NOCHOSEN']->value)) {?>chzn-select<?php }?> row form-control margin0px" name="columnname" title="<?php echo \App\Language::translate('LBL_CHOOSE_FIELD');?>
"><option value="none"><?php echo \App\Language::translate('LBL_SELECT_FIELD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value, 'BLOCK_FIELDS', false, 'BLOCK_LABEL');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value) {
?><optgroup label='<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
'><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value, 'FIELD_MODEL', false, 'FIELD_NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->_assignInScope('FIELD_INFO', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo());
$_smarty_tpl->_assignInScope('MODULE_MODEL', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getModule());
$_smarty_tpl->_assignInScope('SPECIAL_VALIDATOR', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator());
if (!empty($_smarty_tpl->tpl_vars['COLUMNNAME_API']->value)) {
$_smarty_tpl->_assignInScope('columnNameApi', $_smarty_tpl->tpl_vars['COLUMNNAME_API']->value);
} else {
$_smarty_tpl->_assignInScope('columnNameApi', 'getCustomViewColumnName');
}?><option value="<?php $_prefixVariable2=$_smarty_tpl->tpl_vars['columnNameApi']->value;
echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->$_prefixVariable2();?>
" data-fieldtype="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldType();?>
" data-field-name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"<?php $_prefixVariable3=$_smarty_tpl->tpl_vars['columnNameApi']->value;
if (isset($_smarty_tpl->tpl_vars['CONDITION_INFO']->value['columnname']) && App\Purifier::decodeHtml($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->$_prefixVariable3()) == App\Purifier::decodeHtml($_smarty_tpl->tpl_vars['CONDITION_INFO']->value['columnname'])) {
$_smarty_tpl->_assignInScope('FIELD_TYPE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldType());
$_smarty_tpl->_assignInScope('SELECTED_FIELD_MODEL', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value);
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType() == 'reference') {
$_smarty_tpl->_assignInScope('FIELD_TYPE', 'V');
}
$_tmp_array = isset($_smarty_tpl->tpl_vars['FIELD_INFO']) ? $_smarty_tpl->tpl_vars['FIELD_INFO']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['value'] = App\Purifier::decodeHtml($_smarty_tpl->tpl_vars['CONDITION_INFO']->value['value']);
$_smarty_tpl->_assignInScope('FIELD_INFO', $_tmp_array);
?>selected="selected"<?php }
if (($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name') == 'Calendar') && ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'activitytype')) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['FIELD_INFO']) ? $_smarty_tpl->tpl_vars['FIELD_INFO']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['picklistvalues']['Task'] = \App\Language::translate('Task','Calendar');
$_smarty_tpl->_assignInScope('FIELD_INFO', $_tmp_array);
}
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType() == 'reference') {
$_smarty_tpl->_assignInScope('referenceList', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getReferenceList());
if (is_array($_smarty_tpl->tpl_vars['referenceList']->value) && in_array('Users',$_smarty_tpl->tpl_vars['referenceList']->value)) {
$_smarty_tpl->_assignInScope('USERSLIST', array());
$_smarty_tpl->_assignInScope('ACCESSIBLE_USERS', \App\Fields\Owner::getInstance()->getAccessibleUsers());
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ACCESSIBLE_USERS']->value, 'USER_NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['USER_NAME']->value) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['USERSLIST']) ? $_smarty_tpl->tpl_vars['USERSLIST']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['USER_NAME']->value] = $_smarty_tpl->tpl_vars['USER_NAME']->value;
$_smarty_tpl->_assignInScope('USERSLIST', $_tmp_array);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_tmp_array = isset($_smarty_tpl->tpl_vars['FIELD_INFO']) ? $_smarty_tpl->tpl_vars['FIELD_INFO']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['picklistvalues'] = $_smarty_tpl->tpl_vars['USERSLIST']->value;
$_smarty_tpl->_assignInScope('FIELD_INFO', $_tmp_array);
$_tmp_array = isset($_smarty_tpl->tpl_vars['FIELD_INFO']) ? $_smarty_tpl->tpl_vars['FIELD_INFO']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['type'] = 'picklist';
$_smarty_tpl->_assignInScope('FIELD_INFO', $_tmp_array);
}
}?>data-fieldinfo='<?php echo \App\Purifier::encodeHtml(\App\Json::encode($_smarty_tpl->tpl_vars['FIELD_INFO']->value));?>
'<?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)) {?>data-validator='<?php echo \App\Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
'<?php }?>><?php if ($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value != $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name')) {?>(<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'));?>
)  <?php echo \App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'));
} else {
echo \App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);
}?></option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</optgroup><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EVENT_RECORD_STRUCTURE']->value, 'BLOCK_FIELDS', false, 'BLOCK_LABEL');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value) {
?><optgroup label='<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,'Events');?>
'><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value, 'FIELD_MODEL', false, 'FIELD_NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->_assignInScope('FIELD_INFO', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo());
$_smarty_tpl->_assignInScope('MODULE_MODEL', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getModule());
if (!empty($_smarty_tpl->tpl_vars['COLUMNNAME_API']->value)) {
$_smarty_tpl->_assignInScope('columnNameApi', $_smarty_tpl->tpl_vars['COLUMNNAME_API']->value);
} else {
$_smarty_tpl->_assignInScope('columnNameApi', 'getCustomViewColumnName');
}?><option value="<?php $_prefixVariable4=$_smarty_tpl->tpl_vars['columnNameApi']->value;
echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->$_prefixVariable4();?>
" data-fieldtype="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldType();?>
" data-field-name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"<?php $_prefixVariable5=$_smarty_tpl->tpl_vars['columnNameApi']->value;
if (isset($_smarty_tpl->tpl_vars['CONDITION_INFO']->value['columnname']) && App\Purifier::decodeHtml($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->$_prefixVariable5()) == $_smarty_tpl->tpl_vars['CONDITION_INFO']->value['columnname']) {
$_smarty_tpl->_assignInScope('FIELD_TYPE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldType());
$_smarty_tpl->_assignInScope('SELECTED_FIELD_MODEL', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value);
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType() == 'reference') {
$_smarty_tpl->_assignInScope('FIELD_TYPE', 'V');
}
$_tmp_array = isset($_smarty_tpl->tpl_vars['FIELD_INFO']) ? $_smarty_tpl->tpl_vars['FIELD_INFO']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['value'] = App\Purifier::decodeHtml($_smarty_tpl->tpl_vars['CONDITION_INFO']->value['value']);
$_smarty_tpl->_assignInScope('FIELD_INFO', $_tmp_array);
?>selected="selected"<?php }
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType() == 'reference') {
$_smarty_tpl->_assignInScope('referenceList', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getReferenceList());
if (is_array($_smarty_tpl->tpl_vars['referenceList']->value) && in_array('Users',$_smarty_tpl->tpl_vars['referenceList']->value)) {
$_smarty_tpl->_assignInScope('USERSLIST', array());
$_smarty_tpl->_assignInScope('ACCESSIBLE_USERS', \App\Fields\Owner::getInstance()->getAccessibleUsers());
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ACCESSIBLE_USERS']->value, 'USER_NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['USER_NAME']->value) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['USERSLIST']) ? $_smarty_tpl->tpl_vars['USERSLIST']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['USER_NAME']->value] = $_smarty_tpl->tpl_vars['USER_NAME']->value;
$_smarty_tpl->_assignInScope('USERSLIST', $_tmp_array);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_tmp_array = isset($_smarty_tpl->tpl_vars['FIELD_INFO']) ? $_smarty_tpl->tpl_vars['FIELD_INFO']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['picklistvalues'] = $_smarty_tpl->tpl_vars['USERSLIST']->value;
$_smarty_tpl->_assignInScope('FIELD_INFO', $_tmp_array);
$_tmp_array = isset($_smarty_tpl->tpl_vars['FIELD_INFO']) ? $_smarty_tpl->tpl_vars['FIELD_INFO']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['type'] = 'picklist';
$_smarty_tpl->_assignInScope('FIELD_INFO', $_tmp_array);
}
}?>data-fieldinfo='<?php echo \App\Purifier::encodeHtml(\App\Json::encode($_smarty_tpl->tpl_vars['FIELD_INFO']->value));?>
' ><?php if ($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value != $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name')) {?>(<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'));?>
)  <?php echo \App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'));
} else {
echo \App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);
}?></option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</optgroup><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select></div><div class="col-md-3"><input type="hidden" name="comparatorValue" value="<?php echo $_smarty_tpl->tpl_vars['CONDITION_INFO']->value['comparator'];?>
"><?php if ($_smarty_tpl->tpl_vars['SELECTED_FIELD_MODEL']->value) {
if (!$_smarty_tpl->tpl_vars['FIELD_TYPE']->value) {
$_smarty_tpl->_assignInScope('FIELD_TYPE', $_smarty_tpl->tpl_vars['SELECTED_FIELD_MODEL']->value->getFieldDataType());
}
$_smarty_tpl->_assignInScope('ADVANCE_FILTER_OPTIONS', $_smarty_tpl->tpl_vars['ADVANCED_FILTER_OPTIONS_BY_TYPE']->value[$_smarty_tpl->tpl_vars['FIELD_TYPE']->value]);
if (in_array($_smarty_tpl->tpl_vars['SELECTED_FIELD_MODEL']->value->getFieldType(),array('D','DT'))) {
$_smarty_tpl->_assignInScope('DATE_FILTER_CONDITIONS', array_keys($_smarty_tpl->tpl_vars['DATE_FILTERS']->value));
$_smarty_tpl->_assignInScope('ADVANCE_FILTER_OPTIONS', array_merge($_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTIONS']->value,$_smarty_tpl->tpl_vars['DATE_FILTER_CONDITIONS']->value));
}
}?><select class="<?php if (empty($_smarty_tpl->tpl_vars['NOCHOSEN']->value)) {?>chzn-select<?php }?> row form-control margin0px" name="comparator" title="<?php echo \App\Language::translate('LBL_COMAPARATOR_TYPE');?>
"><option value="none"><?php echo \App\Language::translate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTIONS']->value, 'ADVANCE_FILTER_OPTION');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTION']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTION']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTION']->value == $_smarty_tpl->tpl_vars['CONDITION_INFO']->value['comparator']) {?>selected<?php }?>><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['ADVANCED_FILTER_OPTIONS']->value[$_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTION']->value]);?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select></div><div class="col-md-4 fieldUiHolder"><input name="<?php if ($_smarty_tpl->tpl_vars['SELECTED_FIELD_MODEL']->value) {
echo $_smarty_tpl->tpl_vars['SELECTED_FIELD_MODEL']->value->get('name');
}?>" title="<?php echo \App\Language::translate('LBL_COMPARISON_VALUE');?>
" data-value="value" class="form-control" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['CONDITION_INFO']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
" /></div><span class="hide"><?php if (empty($_smarty_tpl->tpl_vars['CONDITION']->value)) {
$_smarty_tpl->_assignInScope('CONDITION', "and");
}?><input type="hidden" name="column_condition" value="<?php echo $_smarty_tpl->tpl_vars['CONDITION']->value;?>
" /></span><div class="col-md-1 btn"><span class="deleteCondition glyphicon glyphicon-trash alignMiddle" title="<?php echo \App\Language::translate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></span></div></div>
<?php }
}
