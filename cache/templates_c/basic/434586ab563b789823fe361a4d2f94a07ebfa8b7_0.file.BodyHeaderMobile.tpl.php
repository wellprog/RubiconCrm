<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:10
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BodyHeaderMobile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb42cf05b4_22308278',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '434586ab563b789823fe361a4d2f94a07ebfa8b7' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BodyHeaderMobile.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb42cf05b4_22308278 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="actionMenu" aria-hidden="true"><?php if (AppConfig::performance('BROWSING_HISTORY_WORKING')) {?><div class="row"><div class="dropdown quickAction historyBtn"><div class="pull-left"><?php echo \App\Language::translate('LBL_PAGES_HISTORY');?>
</div><div class="pull-right"><a data-placement="left" data-toggle="dropdown" class="btn btn-default btn-sm showHistoryBtn" title="<?php echo \App\Language::translate('LBL_PAGES_HISTORY');?>
" aria-expanded="false" href="#"><span class="fa fa-history" aria-hidden="true"></span></a><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('BrowsingHistory.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div></div></div><?php }
if ($_smarty_tpl->tpl_vars['REMINDER_ACTIVE']->value) {?><div class="row"><div class="remindersNotice popoverTooltip quickAction<?php if (AppConfig::module('Calendar','AUTO_REFRESH_REMINDERS')) {?> autoRefreshing<?php }?>"><div class="pull-left"><?php echo \App\Language::translate('LBL_REMINDER');?>
</div><div class="pull-right"><a class="btn btn-default <?php if (AppConfig::module('Calendar','AUTO_REFRESH_REMINDERS')) {?>autoRefreshing<?php }?>" title="<?php echo \App\Language::translate('LBL_REMINDER');?>
" data-content="<?php echo \App\Language::translate('LBL_REMINDER');?>
"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><span class="badge bgDanger hide">0</span></a></div></div></div><?php }
if (isset($_smarty_tpl->tpl_vars['CHAT_ENTRIES']->value)) {?><div class="row"><div class="headerLinkChat quickAction"><div class="pull-left"><?php echo \App\Language::translate('LBL_CHAT');?>
</div><div class="pull-right"><a class="btn btn-default ChatIcon " title="<?php echo \App\Language::translate('LBL_CHAT');?>
" href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a></div></div></div><?php }
if (\App\Privilege::isPermitted('Notification','DetailView')) {?><div class="row"><div class="isBadge notificationsNotice popoverTooltip quickAction<?php if (AppConfig::module('Home','AUTO_REFRESH_REMINDERS')) {?> autoRefreshing<?php }?>"><div class="pull-left"><?php echo \App\Language::translate('LBL_NOTIFICATIONS');?>
</div><div class="pull-right"><a class="btn btn-default <?php if (AppConfig::module('Notification','AUTO_REFRESH_REMINDERS')) {?>autoRefreshing<?php }?>" title="<?php echo \App\Language::translate('LBL_NOTIFICATIONS');?>
" ><span class="glyphicon glyphicon-bell" aria-hidden="true"></span><span class="badge hide">0</span></a></div></div></div><?php }?><div class='row'><div class="dropdown quickAction"><div class='pull-left'><?php echo \App\Language::translate('LBL_QUICK_CREATE');?>
</div><div class='pull-right'><a id="mobile_menubar_quickCreate" class="dropdown-toggle btn btn-default" data-toggle="dropdown" title="<?php echo \App\Language::translate('LBL_QUICK_CREATE');?>
" href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a><ul class="dropdown-menu dropdown-menu-right commonActionsButtonDropDown"><li class="quickCreateModules"><div class="panel-default"><div class="panel-heading"><h4 class="panel-title"><strong><?php echo \App\Language::translate('LBL_QUICK_CREATE');?>
</strong></h4></div><div class="panel-body paddingLRZero"><?php $_smarty_tpl->_assignInScope('count', 0);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Vtiger_Module_Model::getQuickCreateModules(true), 'MODULEMODEL', false, 'NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value => $_smarty_tpl->tpl_vars['MODULEMODEL']->value) {
$_smarty_tpl->_assignInScope('quickCreateModule', $_smarty_tpl->tpl_vars['MODULEMODEL']->value->isQuickCreateSupported());
$_smarty_tpl->_assignInScope('singularLabel', $_smarty_tpl->tpl_vars['MODULEMODEL']->value->getSingularLabelKey());
if ($_smarty_tpl->tpl_vars['singularLabel']->value == 'SINGLE_Calendar') {
$_smarty_tpl->_assignInScope('singularLabel', 'LBL_EVENT_OR_TASK');
}
if ($_smarty_tpl->tpl_vars['quickCreateModule']->value == '1') {
if ($_smarty_tpl->tpl_vars['count']->value%3 == 0) {?><div class="rows"><?php }?><div class="col-xs-4<?php if ($_smarty_tpl->tpl_vars['count']->value%3 != 2) {?> paddingRightZero<?php }?>"><a class="quickCreateModule list-group-item" data-name="<?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['MODULEMODEL']->value->getQuickCreateUrl();?>
" href="javascript:void(0)" title="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['NAME']->value);?>
"><span><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['NAME']->value);?>
</span></a></div><?php if ($_smarty_tpl->tpl_vars['count']->value%3 == 2) {?></div><?php }
$_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['count']->value%3 >= 1) {?></div><?php }?></div></div></li></ul></div></div></div><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MENU_HEADER_LINKS']->value, 'obj', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['obj']->value) {
if ($_smarty_tpl->tpl_vars['obj']->value->linktype == 'HEADERLINK') {
$_smarty_tpl->_assignInScope('HREF', '#');
$_smarty_tpl->_assignInScope('ICON_PATH', $_smarty_tpl->tpl_vars['obj']->value->getIconPath());
$_smarty_tpl->_assignInScope('LINK', $_smarty_tpl->tpl_vars['obj']->value->convertToNativeLink());
$_smarty_tpl->_assignInScope('GLYPHICON', $_smarty_tpl->tpl_vars['obj']->value->getGlyphiconIcon());
$_smarty_tpl->_assignInScope('TITLE', $_smarty_tpl->tpl_vars['obj']->value->getLabel());
$_smarty_tpl->_assignInScope('CHILD_LINKS', $_smarty_tpl->tpl_vars['obj']->value->getChildLinks());
if (!empty($_smarty_tpl->tpl_vars['LINK']->value)) {
$_smarty_tpl->_assignInScope('HREF', $_smarty_tpl->tpl_vars['LINK']->value);
}?><div class="row"><div class="quickAction"><div class="pull-left"><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div><div class="pull-right"><a class="btn btn-sm popoverTooltip <?php if (strpos($_smarty_tpl->tpl_vars['obj']->value->getClassName(),"btn-") === false) {?>btn-default <?php echo $_smarty_tpl->tpl_vars['obj']->value->getClassName();
} else {
echo $_smarty_tpl->tpl_vars['obj']->value->getClassName();
}?> <?php if (!empty($_smarty_tpl->tpl_vars['CHILD_LINKS']->value)) {?>dropdownMenu<?php }?> " href="<?php echo $_smarty_tpl->tpl_vars['HREF']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['obj']->value->linkdata) && $_smarty_tpl->tpl_vars['obj']->value->linkdata && is_array($_smarty_tpl->tpl_vars['obj']->value->linkdata)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['obj']->value->linkdata, 'DATA_VALUE', false, 'DATA_NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['DATA_NAME']->value => $_smarty_tpl->tpl_vars['DATA_VALUE']->value) {
?>data-<?php echo $_smarty_tpl->tpl_vars['DATA_NAME']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['DATA_VALUE']->value;?>
"<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>><?php if ($_smarty_tpl->tpl_vars['GLYPHICON']->value) {?><span class="<?php echo $_smarty_tpl->tpl_vars['GLYPHICON']->value;?>
" aria-hidden="true" style="width:18px;height:20px;font-size:18px"></span><?php }
if ($_smarty_tpl->tpl_vars['ICON_PATH']->value) {?><img src="<?php echo $_smarty_tpl->tpl_vars['ICON_PATH']->value;?>
" alt="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
" title="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
" /><?php }?></a></div></div></div><?php if (!empty($_smarty_tpl->tpl_vars['CHILD_LINKS']->value)) {?><ul class="dropdown-menu"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CHILD_LINKS']->value, 'obj', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['obj']->value) {
if ($_smarty_tpl->tpl_vars['obj']->value->getLabel() == NULL) {?><li class="divider"></li><?php } else {
$_smarty_tpl->_assignInScope('id', $_smarty_tpl->tpl_vars['obj']->value->getId());
$_smarty_tpl->_assignInScope('href', $_smarty_tpl->tpl_vars['obj']->value->getUrl());
$_smarty_tpl->_assignInScope('label', $_smarty_tpl->tpl_vars['obj']->value->getLabel());
$_smarty_tpl->_assignInScope('onclick', '');
if (stripos($_smarty_tpl->tpl_vars['obj']->value->getUrl(),'javascript:') === 0) {
$_smarty_tpl->_assignInScope('onclick', ("onclick=").($_smarty_tpl->tpl_vars['href']->value));
$_smarty_tpl->_assignInScope('href', "javascript:;");
}?><li><a target="<?php echo $_smarty_tpl->tpl_vars['obj']->value->target;?>
" id="menubar_item_right_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['label']->value);?>
" <?php if ($_smarty_tpl->tpl_vars['label']->value == 'Switch to old look') {?>switchLook<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['onclick']->value;
if ($_smarty_tpl->tpl_vars['obj']->value->linkdata && is_array($_smarty_tpl->tpl_vars['obj']->value->linkdata)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['obj']->value->linkdata, 'DATA_VALUE', false, 'DATA_NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['DATA_NAME']->value => $_smarty_tpl->tpl_vars['DATA_VALUE']->value) {
?>data-<?php echo $_smarty_tpl->tpl_vars['DATA_NAME']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['DATA_VALUE']->value;?>
"<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['label']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul><?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div><?php if (AppConfig::performance('GLOBAL_SEARCH')) {?><div class="searchMenu globalSearchInput"><div class="input-group"><select class="chzn-select basicSearchModulesList form-control col-md-5" title="<?php echo \App\Language::translate('LBL_SEARCH_MODULE');?>
"><option value="" class="globalSearch_module_All"><?php echo \App\Language::translate('LBL_ALL_RECORDS');?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SEARCHABLE_MODULES']->value, 'fieldObject', false, 'MODULE_NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_NAME']->value => $_smarty_tpl->tpl_vars['fieldObject']->value) {
if (isset($_smarty_tpl->tpl_vars['SEARCHED_MODULE']->value) && $_smarty_tpl->tpl_vars['SEARCHED_MODULE']->value == $_smarty_tpl->tpl_vars['MODULE_NAME']->value && $_smarty_tpl->tpl_vars['SEARCHED_MODULE']->value !== 'All') {?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" selected><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php } else { ?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" ><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select><div class="input-group-btn"><div class="pull-right"><button class="btn btn-default globalSearch " title="<?php echo \App\Language::translate('LBL_ADVANCE_SEARCH');?>
" type="button"><span class="glyphicon glyphicon-th-large"></span></button></div></div></div><div class="input-group"><input type="text" class="form-control globalSearchValue" title="<?php echo \App\Language::translate('LBL_GLOBAL_SEARCH');?>
" placeholder="<?php echo \App\Language::translate('LBL_GLOBAL_SEARCH');?>
" results="10" /><div class="input-group-btn"><div class="pull-right"><button class="btn btn-default searchIcon" type="button"><span class="glyphicon glyphicon-search"></span></button></div></div></div></div><?php }
}
}
