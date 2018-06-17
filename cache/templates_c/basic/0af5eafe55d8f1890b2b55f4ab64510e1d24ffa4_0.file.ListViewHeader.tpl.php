<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:39
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ListViewHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2604bf0cc2a2_34696972',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0af5eafe55d8f1890b2b55f4ab64510e1d24ffa4' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ListViewHeader.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2604bf0cc2a2_34696972 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="listViewPageDiv"><div class="listViewTopMenuDiv noprint"><div class="listViewActionsDiv row"><div class="btn-toolbar col-md-4 col-sm-6 col-xs-12"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('ButtonViewLinks.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('LINKS'=>$_smarty_tpl->tpl_vars['QUICK_LINKS']->value['SIDEBARLINK']), 0, true);
?>
<div class="btn-group listViewMassActions"><?php if (count($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS']->value) > 0 || count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW']) > 0) {?><button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>&nbsp;&nbsp;<strong><?php echo \App\Language::translate('LBL_ACTIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>&nbsp;&nbsp;<span class="caret"></span></button><ul class="dropdown-menu"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS']->value, 'LISTVIEW_MASSACTION', false, NULL, 'actionCount', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_actionCount']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_actionCount']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_actionCount']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_actionCount']->value['total'];
?><li id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getLabel());?>
"><a href="javascript:void(0);"<?php if (stripos($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getUrl(),'javascript:') === 0) {?>onclick='<?php echo substr($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getUrl(),strlen("javascript:"));?>
;'<?php } else { ?> onclick="Vtiger_List_Js.triggerMassAction('<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getUrl();?>
')"<?php }
if ($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->get('dataUrl')) {?>data-url="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->get('dataUrl');?>
"<?php }
if (count($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->get('linkdata')) > 0) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->get('linkdata'), 'DATA', false, 'NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value => $_smarty_tpl->tpl_vars['DATA']->value) {
?>data-<?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
"<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
if ($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->get('linkclass') != '') {?>class="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->get('linkclass');?>
"<?php }?>><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->get('linkicon') != '') {?><span class="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->get('linkicon');?>
"></span>&nbsp;&nbsp;<?php }
echo \App\Language::translate($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_actionCount']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_actionCount']->value['last'] : null) == true) {?><li class="divider"></li><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW']) > 0) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW'], 'LISTVIEW_ADVANCEDACTIONS');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value) {
?><li id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_advancedAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel());?>
"><a <?php if (stripos($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getUrl(),'javascript:') === 0) {?>href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getUrl(),strlen("javascript:"));?>
;'<?php } else { ?>href='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getUrl();?>
'<?php }
if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->get('linkclass') != '') {?>class="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->get('linkclass');?>
"<?php }
if (count($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->get('linkdata')) > 0) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->get('linkdata'), 'DATA', false, 'NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value => $_smarty_tpl->tpl_vars['DATA']->value) {
?>data-<?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
"<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->get('linkicon') != '') {?><span class="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->get('linkicon');?>
"></span>&nbsp;&nbsp;<?php }
echo \App\Language::translate($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></ul><?php }?></div><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWBASIC'], 'LINK');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['LINK']->value) {
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('ButtonLink.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('BUTTON_VIEW'=>'listView'), 0, true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div><div class="btn-toolbar col-md-3 col-sm-5 col-xs-12 pull-right-sm pull-left-xs"><div class="customFilterMainSpan btn-group"><?php if (count($_smarty_tpl->tpl_vars['CUSTOM_VIEWS']->value) > 0) {?><select id="customFilter" title="<?php echo \App\Language::translate('LBL_CUSTOM_FILTER');?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CUSTOM_VIEWS']->value, 'GROUP_CUSTOM_VIEWS', false, 'GROUP_LABEL');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['GROUP_LABEL']->value => $_smarty_tpl->tpl_vars['GROUP_CUSTOM_VIEWS']->value) {
?><optgroup label='<?php echo \App\Language::translate(('LBL_CV_GROUP_').(strtoupper($_smarty_tpl->tpl_vars['GROUP_LABEL']->value)));?>
' ><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['GROUP_CUSTOM_VIEWS']->value, 'CUSTOM_VIEW');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value) {
?><option data-orderby="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getSortOrderBy('orderBy');?>
" data-sortorder="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getSortOrderBy('sortOrder');?>
" data-editurl="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getEditUrl();?>
" data-deleteurl="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getDeleteUrl();?>
" data-approveurl="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getApproveUrl();?>
" data-denyurl="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getDenyUrl();?>
" data-duplicateurl="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getDuplicateUrl();?>
"  data-editable="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->isEditable();?>
" data-deletable="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->privilegeToDelete();?>
"  data-pending="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->isPending();?>
"  data-public="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->isPublic() && $_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser();?>
" id="filterOptionId_<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('cvid');?>
"  value="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('cvid');?>
"  data-id="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('cvid');?>
" <?php if ($_smarty_tpl->tpl_vars['VIEWID']->value != '' && $_smarty_tpl->tpl_vars['VIEWID']->value != '0' && $_smarty_tpl->tpl_vars['VIEWID']->value == $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getId()) {?> selected="selected" <?php } elseif (($_smarty_tpl->tpl_vars['VIEWID']->value == '' || $_smarty_tpl->tpl_vars['VIEWID']->value == '0') && $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->isDefault() == 'true') {?> selected="selected" <?php }?> class="filterOptionId_<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('cvid');?>
"><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('viewname'),$_smarty_tpl->tpl_vars['MODULE']->value);
if ($_smarty_tpl->tpl_vars['GROUP_LABEL']->value != 'Mine' && $_smarty_tpl->tpl_vars['GROUP_LABEL']->value != 'System') {?> [ <?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getOwnerName();?>
 ]  <?php }?></option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</optgroup><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (isset($_smarty_tpl->tpl_vars['FOLDERS']->value)) {?><optgroup id="foldersBlock" label='<?php echo \App\Language::translate('LBL_FOLDERS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
' ><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FOLDERS']->value, 'FOLDER');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['FOLDER']->value) {
?><option data-foldername="<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->getName();?>
" <?php if (App\Purifier::decodeHtml($_smarty_tpl->tpl_vars['FOLDER']->value->getName()) == $_smarty_tpl->tpl_vars['FOLDER_NAME']->value) {?> selected=""<?php }?> data-folderid="<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->get('folderid');?>
" data-deletable="<?php echo !($_smarty_tpl->tpl_vars['FOLDER']->value->hasDocuments());?>
" class="filterOptionId_folder<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->get('folderid');?>
 folderOption<?php if ($_smarty_tpl->tpl_vars['FOLDER']->value->getName() == 'Default') {?> defaultFolder <?php }?>" id="filterOptionId_folder<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->get('folderid');?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['DEFAULT_CUSTOM_FILTER_ID']->value;?>
"><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['FOLDER']->value->getName(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</optgroup><?php }?></select><?php if (\App\Privilege::isPermitted($_smarty_tpl->tpl_vars['MODULE']->value,'CreateCustomFilter')) {?><div class="filterActionsDiv hide"><hr><ul class="filterActions"><li data-value="create" id="createFilter" data-createurl="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getCreateUrl();?>
"><span class="glyphicon glyphicon-plus-sign"></span> <?php echo \App\Language::translate('LBL_CREATE_NEW_FILTER');?>
</li></ul></div><?php }?><span class="glyphicon glyphicon-filter filterImage" style="display:none;margin-right:2px"></span><?php } else { ?><input type="hidden" value="0" id="customFilter" /><?php }?></div></div><div class="col-xs-12 col-md-5 btn-toolbar paddingRightZero"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('ListViewActions.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div><span class="hide filterActionImages pull-right"><span title="<?php echo \App\Language::translate('LBL_DENY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-value="deny" class="glyphicon glyphicon-exclamation-sign alignMiddle denyFilter filterActionImage pull-right"></span><span title="<?php echo \App\Language::translate('LBL_APPROVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-value="approve" class="glyphicon glyphicon-ok alignMiddle approveFilter filterActionImage pull-right"></span><span title="<?php echo \App\Language::translate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-value="delete" class="glyphicon glyphicon-trash alignMiddle deleteFilter filterActionImage pull-right"></span><span title="<?php echo \App\Language::translate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-value="edit" class="glyphicon glyphicon-pencil alignMiddle editFilter filterActionImage pull-right"></span><span title="<?php echo \App\Language::translate('LBL_DUPLICATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-value="duplicate" class="glyphicon glyphicon-retweet alignMiddle duplicateFilter filterActionImage pull-right"></span></span></div><?php if (count($_smarty_tpl->tpl_vars['CUSTOM_VIEWS']->value) > 0) {?><div class="row"><div class="col-xs-12 btn-toolbar"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CUSTOM_VIEWS']->value, 'GROUP_CUSTOM_VIEWS', false, 'GROUP_LABEL');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['GROUP_LABEL']->value => $_smarty_tpl->tpl_vars['GROUP_CUSTOM_VIEWS']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['GROUP_CUSTOM_VIEWS']->value, 'CUSTOM_VIEW');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value) {
if ($_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->isFeatured()) {?><h5 class="btn-group resetButton cursorPointer"><span class="label label-default btn-success featuredLabel" data-cvid="<?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->getId();?>
" <?php if ($_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('color')) {?>style="background-color: <?php echo $_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('color');?>
;"<?php }?>><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('viewname'),$_smarty_tpl->tpl_vars['MODULE']->value);
if ($_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('description')) {?>&nbsp;<span class="popoverTooltip glyphicon glyphicon-info-sign" data-placement="auto right" data-content="<?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['CUSTOM_VIEW']->value->get('description'));?>
"></span><?php }?></span></h5><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div></div><?php }?></div><div class="listViewContentDiv" id="listViewContents">
<?php }
}
