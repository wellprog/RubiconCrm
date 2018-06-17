<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:48:29
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/LayoutEditor/Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26043d08f585_91422513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4513482284c1c0d2bde4a0e3bd6a55837386a35a' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/LayoutEditor/Index.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26043d08f585_91422513 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="layoutEditorContainer"><input id="selectedModuleName" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value;?>
" /><div class="widget_header row"><div class="col-md-6"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('BreadCrumbs.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
if (isset($_smarty_tpl->tpl_vars['SELECTED_PAGE']->value)) {
echo App\Language::translate($_smarty_tpl->tpl_vars['SELECTED_PAGE']->value->get('description'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></div><div class="pull-right col-md-6 form-inline"><div class="form-group pull-right col-md-6"><select class="select2 form-control" name="layoutEditorModules"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SUPPORTED_MODULES']->value, 'MODULE_NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_NAME']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == $_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value) {?> selected <?php }?>><?php echo App\Language::translate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select></div><div class="form-group pull-right"><input id="inventorySwitch" title="<?php echo App\Language::translate('LBL_CHANGE_BLOCK_ADVANCED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" class="switchBtn" type="checkbox" data-label-width="5" data-handle-width="100" data-on-text="<?php echo App\Language::translate('LBL_BASIC_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" data-off-text="<?php echo App\Language::translate('LBL_ADVANCED_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" <?php if (!$_smarty_tpl->tpl_vars['IS_INVENTORY']->value) {?>checked<?php }?> ></div></div></div><hr><div class="contents tabbable"><ul class="nav nav-tabs layoutTabs massEditTabs"><li class="active"><a data-toggle="tab" href="#detailViewLayout"><strong><?php echo App\Language::translate('LBL_DETAILVIEW_LAYOUT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><?php if ($_smarty_tpl->tpl_vars['IS_INVENTORY']->value) {?><li class="inventoryNav"><a data-toggle="tab" href="#inventoryViewLayout"><strong><?php echo App\Language::translate('LBL_MANAGING_AN_ADVANCED_BLOCK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><?php }?></ul><div class="tab-content layoutContent padding20 themeTableColor overflowVisible"><div class="tab-pane active" id="detailViewLayout"><?php $_smarty_tpl->_assignInScope('FIELD_TYPE_INFO', $_smarty_tpl->tpl_vars['SELECTED_MODULE_MODEL']->value->getAddFieldTypeInfo());
$_smarty_tpl->_assignInScope('IS_SORTABLE', $_smarty_tpl->tpl_vars['SELECTED_MODULE_MODEL']->value->isSortableAllowed());
$_smarty_tpl->_assignInScope('IS_BLOCK_SORTABLE', $_smarty_tpl->tpl_vars['SELECTED_MODULE_MODEL']->value->isBlockSortableAllowed());
$_smarty_tpl->_assignInScope('ALL_BLOCK_LABELS', array());
if ($_smarty_tpl->tpl_vars['IS_SORTABLE']->value) {?><div class="btn-toolbar" id="layoutEditorButtons"><button class="btn btn-success addButton addCustomBlock" type="button"><span class="glyphicon glyphicon-plus"></span>&nbsp;<strong><?php echo App\Language::translate('LBL_ADD_CUSTOM_BLOCK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button><span class="pull-right"><button class="btn btn-success saveFieldSequence hide" type="button"><strong><?php echo App\Language::translate('LBL_SAVE_FIELD_SEQUENCE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></span></div><?php }?><div class="moduleBlocks"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCKS']->value, 'BLOCK_MODEL', false, 'BLOCK_LABEL_KEY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value => $_smarty_tpl->tpl_vars['BLOCK_MODEL']->value) {
$_smarty_tpl->_assignInScope('FIELDS_LIST', $_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->getLayoutBlockActiveFields());
$_smarty_tpl->_assignInScope('BLOCK_ID', $_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->get('id'));
$_tmp_array = isset($_smarty_tpl->tpl_vars['ALL_BLOCK_LABELS']) ? $_smarty_tpl->tpl_vars['ALL_BLOCK_LABELS']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['BLOCK_ID']->value] = $_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value;
$_smarty_tpl->_assignInScope('ALL_BLOCK_LABELS', $_tmp_array);
?><div id="block_<?php echo $_smarty_tpl->tpl_vars['BLOCK_ID']->value;?>
" class="editFieldsTable block_<?php echo $_smarty_tpl->tpl_vars['BLOCK_ID']->value;?>
 marginBottom10px border1px <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK_SORTABLE']->value) {?> blockSortable<?php }?>" data-block-id="<?php echo $_smarty_tpl->tpl_vars['BLOCK_ID']->value;?>
" data-sequence="<?php echo $_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->get('sequence');?>
" style="border-radius: 4px;background: white;"><div class="row layoutBlockHeader no-margin"><div class="blockLabel col-md-6 col-sm-6 padding10 marginLeftZero"><?php if ($_smarty_tpl->tpl_vars['IS_BLOCK_SORTABLE']->value) {?><img class="alignMiddle" src="<?php echo \App\Layout::getImagePath('drag.png');?>
" alt="" />&nbsp;&nbsp;<?php }?><strong><?php echo App\Language::translate($_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value,$_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value);?>
</strong></div><div class="col-md-6 col-sm-6 marginLeftZero"><div class="pull-right btn-toolbar blockActions" style="margin: 4px;"><?php if ($_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->isAddCustomFieldEnabled()) {?><div class="btn-group"><button class="btn btn-success addCustomField" type="button"><strong><?php echo App\Language::translate('LBL_ADD_CUSTOM_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div><?php }
if ($_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->isActionsAllowed()) {?><div class="btn-group"><button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><strong><?php echo App\Language::translate('LBL_ACTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong>&nbsp;&nbsp;<span class="caret"></span></button><ul class="dropdown-menu pull-right"><li class="blockVisibility" data-visible="<?php if (!$_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->isHidden()) {?>1<?php } else { ?>0<?php }?>" data-block-id="<?php echo $_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->get('id');?>
"><a href="javascript:void(0)"><span class="glyphicon glyphicon-ok <?php if ($_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->isHidden()) {?> hide <?php }?>"></span>&nbsp;<?php echo App\Language::translate('LBL_ALWAYS_SHOW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></li><li class="inActiveFields"><a href="javascript:void(0)"><?php echo App\Language::translate('LBL_INACTIVE_FIELDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></li><?php if ($_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->isCustomized()) {?><li class="deleteCustomBlock"><a href="javascript:void(0)"><?php echo App\Language::translate('LBL_DELETE_CUSTOM_BLOCK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></li><?php }?></ul></div><?php }?></div></div></div><div class="blockFieldsList blockFieldsSortable row no-margin" style="padding:5px;min-height: 27px"><ul name="<?php if ($_smarty_tpl->tpl_vars['SELECTED_MODULE_MODEL']->value->isFieldsSortableAllowed($_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value)) {?>sortable1<?php }?>" class="sortTableUl connectedSortable col-md-6"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FIELDS_LIST']->value, 'FIELD_MODEL', false, NULL, 'fieldlist', array (
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_fieldlist']->value['index']++;
if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_fieldlist']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_fieldlist']->value['index'] : null)%2 == 0) {?><li><div class="opacity editFields marginLeftZero border1px" data-block-id="<?php echo $_smarty_tpl->tpl_vars['BLOCK_ID']->value;?>
" data-field-id="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('id');?>
" data-sequence="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('sequence');?>
"><div class="row padding1per"><?php $_smarty_tpl->_assignInScope('IS_MANDATORY', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory());
?><div class="col-xs-2 col-sm-2">&nbsp;<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isEditable()) {?><a><img src="<?php echo \App\Layout::getImagePath('drag.png');?>
" border="0" alt="<?php echo App\Language::translate('LBL_DRAG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /></a><?php }?></div><div class="col-xs-10 col-sm-10 marginLeftZero fieldContainer" style="word-wrap: break-word;"><span class="fieldLabel"><?php echo App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value);?>
&nbsp;[<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName();?>
]<?php if ($_smarty_tpl->tpl_vars['IS_MANDATORY']->value) {?><span class="redColor">*</span><?php }?></span><span class="pull-right actions"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName();?>
" id="relatedFieldValue<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('id');?>
" /><button class="btn btn-primary btn-xs copyFieldLabel pull-right marginLeft5" data-target="relatedFieldValue<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('id');?>
"><span class="glyphicon glyphicon-copy" title="<?php echo App\Language::translate('LBL_COPY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span></button><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isEditable()) {?><button class="btn btn-success btn-xs editFieldDetails marginLeft5"><span class="glyphicon glyphicon-pencil" title="<?php echo App\Language::translate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span></button><?php }
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isCustomField() == 'true') {?><button class="btn btn-danger btn-xs deleteCustomField marginLeft5" data-field-id="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('id');?>
"><span class="glyphicon glyphicon-trash" title="<?php echo App\Language::translate('LBL_DELETE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span></button><?php }?></span></div></div></div></li><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul><ul <?php if ($_smarty_tpl->tpl_vars['SELECTED_MODULE_MODEL']->value->isFieldsSortableAllowed($_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value)) {?>name="sortable2"<?php }?> class="connectedSortable sortTableUl col-md-6"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FIELDS_LIST']->value, 'FIELD_MODEL', false, NULL, 'fieldlist1', array (
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_fieldlist1']->value['index']++;
if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_fieldlist1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_fieldlist1']->value['index'] : null)%2 != 0) {?><li><div class="opacity editFields marginLeftZero border1px" data-block-id="<?php echo $_smarty_tpl->tpl_vars['BLOCK_ID']->value;?>
" data-field-id="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('id');?>
" data-sequence="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('sequence');?>
"><div class="row padding1per"><?php $_smarty_tpl->_assignInScope('IS_MANDATORY', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory());
?><div class="col-xs-2 col-sm-2">&nbsp;<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isEditable()) {?><a><img src="<?php echo \App\Layout::getImagePath('drag.png');?>
" border="0" alt="<?php echo App\Language::translate('LBL_DRAG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /></a><?php }?></div><div class="col-xs-10 col-sm-10 marginLeftZero fieldContainer" style="word-wrap: break-word;"><span class="fieldLabel"><?php echo App\Language::translate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldLabel(),$_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value);?>
&nbsp;[<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName();?>
]<?php if ($_smarty_tpl->tpl_vars['IS_MANDATORY']->value) {?><span class="redColor">*</span><?php }?></span><span class="pull-right actions"><button class="btn btn-primary btn-xs copyFieldLabel pull-right marginLeft5" data-target="relatedFieldValue<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('id');?>
"><span class="glyphicon glyphicon-copy" title="<?php echo App\Language::translate('LBL_COPY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span></button><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName();?>
" id="relatedFieldValue<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('id');?>
" /><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isEditable()) {?><button class="btn btn-success btn-xs editFieldDetails marginLeft5"><span class="glyphicon glyphicon-pencil" title="<?php echo App\Language::translate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span></button><?php }
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isCustomField() == 'true') {?><button class="btn btn-danger btn-xs deleteCustomField marginLeft5" data-field-id="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('id');?>
"><span class="glyphicon glyphicon-trash" title="<?php echo App\Language::translate('LBL_DELETE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"></span></button><?php }?></span></div></div></div></li><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul></div></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div><input type="hidden" class="inActiveFieldsArray" value='<?php echo \App\Json::encode($_smarty_tpl->tpl_vars['IN_ACTIVE_FIELDS']->value);?>
' /><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('NewCustomBlock.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('NewCustomField.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('AddBlockModal.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('CreateFieldModal.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('InactiveFieldModal.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div><?php if ($_smarty_tpl->tpl_vars['IS_INVENTORY']->value) {?><div class="tab-pane" id="inventoryViewLayout"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('Inventory.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div><?php }?></div></div></div>
<?php }
}
