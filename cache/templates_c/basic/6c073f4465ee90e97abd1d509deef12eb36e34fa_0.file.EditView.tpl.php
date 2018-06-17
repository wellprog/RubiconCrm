<?php
/* Smarty version 3.1.31, created on 2018-06-17 10:11:40
  from "/var/www/RubiconCrm/layouts/basic/modules/CustomView/EditView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2609acbcaf06_38716652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c073f4465ee90e97abd1d509deef12eb36e34fa' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/CustomView/EditView.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2609acbcaf06_38716652 (Smarty_Internal_Template $_smarty_tpl) {
?>

<form class="form-horizontal" id="CustomView" name="CustomView" method="post" action="index.php"><?php if ($_smarty_tpl->tpl_vars['RECORD_ID']->value) {?><input type="hidden" name="record" id="record" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" /><?php }?><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="action" value="Save" /><input type="hidden" name="source_module" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
" /><input type="hidden" id="stdfilterlist" name="stdfilterlist" value="" /><input type="hidden" id="advfilterlist" name="advfilterlist" value="" /><input type="hidden" id="status" name="status" value="<?php echo $_smarty_tpl->tpl_vars['CV_PRIVATE_VALUE']->value;?>
" /><input type="hidden" id="sourceModule" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
" /><input type="hidden" name="date_filters" data-value='<?php echo \App\Purifier::encodeHtml(\App\Json::encode($_smarty_tpl->tpl_vars['DATE_FILTERS']->value));?>
' /><div class='widget_header row customViewHeader'><div class="col-sm-5 col-xs-12"><?php if (!$_smarty_tpl->tpl_vars['RECORD_ID']->value) {
$_smarty_tpl->_assignInScope('BREADCRUMB_TITLE', 'LBL_VIEW_CREATE');
} else {
$_smarty_tpl->_assignInScope('BREADCRUMB_TITLE', $_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->get('viewname'));
}
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('BreadCrumbs.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div><div class="col-sm-7 col-xs-12 btn-toolbar" role="toolbar"><div class="btn-group filterActions pull-right"><button class="btn btn-warning" type="reset" onClick="window.location.reload()"><?php echo \App\Language::translate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></div><div class="btn-group filterActions pull-right"><button class="btn btn-success" id="customViewSubmit" type="submit"><strong><?php echo \App\Language::translate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div><div class="btn-group pull-right pull-left-xs iconPreferences marginRight10" data-toggle="buttons"><label class="btn btn-default<?php if ($_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->isDefault()) {?> active  btn-primary<?php }?>" title="<?php echo \App\Language::translate('LBL_SET_AS_DEFAULT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" ><input id="setdefault" name="setdefault" type="checkbox"  <?php if ($_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->isDefault()) {?>checked="checked"<?php }?> value="1" /><span class="glyphicon glyphicon-heart-empty" data-check="glyphicon-heart" data-unchecked="glyphicon-heart-empty"></span></label><label class="btn btn-default<?php if ($_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->isSetPublic()) {?> active  btn-primary<?php }?>" title="<?php echo \App\Language::translate('LBL_SET_AS_PUBLIC',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><input id="status" name="status" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->isSetPublic()) {?> value="<?php echo $_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->get('status');?>
" checked="checked" <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['CV_PENDING_VALUE']->value;?>
" <?php }?> /><span class="glyphicon glyphicon-eye-close" data-check="glyphicon-eye-open" data-unchecked="glyphicon-eye-close"></span></label><label class="btn btn-default<?php if ($_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->isFeatured(true)) {?> active btn-primary<?php }?>" title="<?php echo \App\Language::translate('LBL_FEATURED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><input id="featured" name="featured" type="checkbox"  <?php if ($_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->isFeatured(true)) {?> checked="checked"<?php }?> value="1" /><span class="glyphicon glyphicon-star-empty" data-check="glyphicon-star" data-unchecked="glyphicon-star-empty"></span></label><label class="btn btn-default<?php if ($_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->get('setmetrics')) {?> active btn-primary<?php }?>" title="<?php echo \App\Language::translate('LBL_LIST_IN_METRICS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><input id="setmetrics" name="setmetrics" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->get('setmetrics') == '1') {?>checked="checked"<?php }?> value="1" /><span class="glyphicon glyphicon-blackboard" data-check="glyphicon-heart" data-unchecked="glyphicon-heart-empty"></span></label></div></div></div><?php $_smarty_tpl->_assignInScope('SELECTED_FIELDS', $_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->getSelectedFields());
?><div class=""><div class="panel panel-default row marginLeftZero marginRightZero blockContainer"><div class="row blockHeader panel-heading marginLeftZero marginRightZero"><div class="iconCollapse"><span class="cursorPointer iconToggle glyphicon glyphicon glyphicon-menu-down" data-hide="glyphicon-menu-right" data-show="glyphicon-menu-down"></span><h4 class=""><?php echo \App\Language::translate('LBL_BASIC_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></div></div><div class="panel-body"><div class="form-group"><div class="row col-md-5"><label class="pull-left control-label paddingLeftMd"><span class="redColor">*</span> <?php echo \App\Language::translate('LBL_VIEW_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</label><div class="col-md-7"><input type="text" id="viewname" class="form-control" data-validation-engine="validate[required]" name="viewname" value="<?php echo $_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->get('viewname');?>
" /></div></div></div><div class="form-group"><label class="paddingLeftMd control-label"><span class="redColor">*</span> <?php echo \App\Language::translate('LBL_CHOOSE_COLUMNS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 (<?php echo \App\Language::translate('LBL_MAX_NUMBER_FILTER_COLUMNS');?>
):</label><div class="columnsSelectDiv col-md-12"><?php $_smarty_tpl->_assignInScope('MANDATORY_FIELDS', array());
?><div class=""><select data-placeholder="<?php echo \App\Language::translate('LBL_ADD_MORE_COLUMNS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" multiple class="columnsSelect form-control" id="viewColumnsSelect"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value, 'BLOCK_FIELDS', false, 'BLOCK_LABEL');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value) {
?><optgroup label='<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
'><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value, 'FIELD_MODEL', false, 'FIELD_NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory()) {
echo array_push($_smarty_tpl->tpl_vars['MANDATORY_FIELDS']->value,$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getCustomViewColumnName());
}?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getCustomViewColumnName();?>
" data-field-name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"<?php if (in_array($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getCustomViewColumnName(),$_smarty_tpl->tpl_vars['SELECTED_FIELDS']->value)) {?>selected<?php }?>><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory() == true) {?> <span>*</span> <?php }?></option><?php
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
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory()) {
echo array_push($_smarty_tpl->tpl_vars['MANDATORY_FIELDS']->value,$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getCustomViewColumnName());
}?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getCustomViewColumnName();?>
" data-field-name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"<?php if (in_array($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getCustomViewColumnName(),$_smarty_tpl->tpl_vars['SELECTED_FIELDS']->value)) {?>selected<?php }?>><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory() == true) {?> <span>*</span> <?php }?></option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</optgroup><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select></div><input type="hidden" name="columnslist" value='<?php echo \App\Json::encode($_smarty_tpl->tpl_vars['SELECTED_FIELDS']->value);?>
' /><input id="mandatoryFieldsList" type="hidden" value='<?php echo \App\Json::encode($_smarty_tpl->tpl_vars['MANDATORY_FIELDS']->value);?>
' /></div></div><div class="form-group marginbottomZero"><div class="row col-md-5"><label class="pull-left control-label paddingLeftMd"><?php echo \App\Language::translate('LBL_COLOR_VIEW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</label><div class="col-md-7"><div class="input-group"><input type="text" class="form-control colorPicker" name="color" value="<?php echo $_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->get('color');?>
" /><span class="input-group-addon" style="background-color: <?php echo $_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->get('color');?>
;">&nbsp;&nbsp;</span></div></div></div></div></div></div><div class="panel panel-default row marginLeftZero marginRightZero blockContainer"><div class="row blockHeader panel-heading marginLeftZero marginRightZero"><div class="iconCollapse"><span class="cursorPointer iconToggle glyphicon glyphicon glyphicon-menu-right" data-hide="glyphicon-menu-right" data-show="glyphicon-menu-down"></span><h4 class=""><?php echo \App\Language::translate('LBL_DESCRIPTION_INFORMATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4></div></div><div class="panel-body padding5 hide"><textarea name="description" id="description" class="ckEditorSource"><?php echo $_smarty_tpl->tpl_vars['CUSTOMVIEW_MODEL']->value->get('description');?>
</textarea></div></div><div class="panel panel-default row marginLeftZero marginRightZero blockContainer"><div class="row blockHeader panel-heading marginLeftZero marginRightZero"><div class="iconCollapse"><span class="cursorPointer iconToggle glyphicon glyphicon glyphicon-menu-down" data-hide="glyphicon-menu-right" data-show="glyphicon-menu-down"></span><h4 class=""><?php echo \App\Language::translate('LBL_CHOOSE_FILTER_CONDITIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</h4></div></div><div class="panel-body"><div class="filterConditionsDiv"><div class="row"><span class="col-md-12"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('AdvanceFilter.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</span></div></div></div></div></div><div class="filterActions"><button class="cancelLink pull-right btn btn-warning" type="reset" onClick="window.location.reload()"><?php echo \App\Language::translate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button><button class="btn btn-success pull-right" id="customViewSubmit" type="submit"><strong><?php echo \App\Language::translate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div></form>
<?php }
}
