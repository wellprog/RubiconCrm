<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:11
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BodyHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb4307b9b3_90673155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f179c014e56337fa144d65f4a63cb22df3bf23c' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BodyHeader.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb4307b9b3_90673155 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('count', 0);
?><div class="container-fluid bodyHeader noSpaces commonActionsContainer<?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value) {?> menuOpen<?php }?>"><div class="row noSpaces"><div class="rightHeader paddingRight10"><div class="pull-right rightHeaderBtn"><?php $_smarty_tpl->_assignInScope('QUICKCREATE_MODULES', Vtiger_Module_Model::getQuickCreateModules(true));
if (!empty($_smarty_tpl->tpl_vars['QUICKCREATE_MODULES']->value)) {?><a class="btn btn-default btn-sm popoverTooltip dropdownMenu hidden-xs hidden-sm" data-content="<?php echo \App\Language::translate('LBL_QUICK_CREATE');?>
" href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a><ul class="dropdown-menu dropdown-menu-right commonActionsButtonDropDown"><li class="quickCreateModules"><div class="panel-default"><div class="panel-heading"><h4 class="panel-title"><strong><?php echo \App\Language::translate('LBL_QUICK_CREATE');?>
</strong></h4></div><div class="panel-body paddingLRZero"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['QUICKCREATE_MODULES']->value, 'MODULEMODEL', false, 'NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value => $_smarty_tpl->tpl_vars['MODULEMODEL']->value) {
$_smarty_tpl->_assignInScope('quickCreateModule', $_smarty_tpl->tpl_vars['MODULEMODEL']->value->isQuickCreateSupported());
$_smarty_tpl->_assignInScope('singularLabel', $_smarty_tpl->tpl_vars['MODULEMODEL']->value->getSingularLabelKey());
if ($_smarty_tpl->tpl_vars['singularLabel']->value == 'SINGLE_Calendar') {
$_smarty_tpl->_assignInScope('singularLabel', 'LBL_EVENT_OR_TASK');
}
if ($_smarty_tpl->tpl_vars['quickCreateModule']->value == '1') {
if ($_smarty_tpl->tpl_vars['count']->value%3 == 0) {?><div class=""><?php }?><div class="col-xs-4<?php if ($_smarty_tpl->tpl_vars['count']->value%3 != 2) {?> paddingRightZero<?php }?>"><a id="menubar_quickCreate_<?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
" class="quickCreateModule list-group-item" data-name="<?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['MODULEMODEL']->value->getQuickCreateUrl();?>
" href="javascript:void(0)" title="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['NAME']->value);?>
"><span class="modCT_<?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
 userIcon-<?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
"></span><span><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['singularLabel']->value,$_smarty_tpl->tpl_vars['NAME']->value);?>
</span></a></div><?php if ($_smarty_tpl->tpl_vars['count']->value%3 == 2) {?></div><?php }
$_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['count']->value%3 >= 1) {?></div><?php }?></div></li></ul><?php }
if (\App\Privilege::isPermitted('Notification','DetailView')) {?><a class="btn btn-default btn-sm isBadge notificationsNotice popoverTooltip <?php if (AppConfig::module('Notification','AUTO_REFRESH_REMINDERS')) {?>autoRefreshing<?php }?> hidden-xs hidden-sm" data-content="<?php echo \App\Language::translate('LBL_NOTIFICATIONS');?>
"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span><span class="badge hide">0</span></a><?php }
if (isset($_smarty_tpl->tpl_vars['CHAT_ENTRIES']->value)) {?><a class="btn btn-default btn-sm headerLinkChat popoverTooltip hidden-xs hidden-sm" data-content="<?php echo \App\Language::translate('LBL_CHAT');?>
" href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a><div class="chatModal modal fade" tabindex="-1" role="dialog" aria-labelledby="chatLabel" data-timer="<?php echo AppConfig::module('Chat','REFRESH_TIME');?>
000"><div class="modal-dialog modalRightSiteBar" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="btn btn-warning pull-right marginLeft10" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo \App\Language::translate('LBL_CHAT');?>
</h4></div><div class="modal-body"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('Items.tpl','Chat'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div><div class="modal-footer pinToDown"><input type="text" class="form-control message" /><br /><button type="button" class="btn btn-primary addMsg"><?php echo \App\Language::translate('LBL_SEND_MESSAGE');?>
</button></div></div></div></div><?php }
if ($_smarty_tpl->tpl_vars['REMINDER_ACTIVE']->value) {?><a class="btn btn-default btn-sm isBadge remindersNotice popoverTooltip <?php if (AppConfig::module('Calendar','AUTO_REFRESH_REMINDERS')) {?>autoRefreshing<?php }?> hidden-xs hidden-sm" data-content="<?php echo \App\Language::translate('LBL_REMINDER');?>
" href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><span class="badge bgDanger hide">0</span></a><?php }
if (AppConfig::performance('BROWSING_HISTORY_WORKING')) {?><a class="btn btn-default btn-sm showHistoryBtn popoverTooltip dropdownMenu hidden-xs hidden-sm" data-content="<?php echo \App\Language::translate('LBL_PAGES_HISTORY');?>
" href="#"><i class="fa fa-history" aria-hidden="true"></i></a><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('BrowsingHistory.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
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
}?><a class="btn btn-sm popoverTooltip <?php if (strrpos($_smarty_tpl->tpl_vars['obj']->value->getClassName(),"btn-") === false) {?>btn-default <?php echo $_smarty_tpl->tpl_vars['obj']->value->getClassName();
} else {
echo $_smarty_tpl->tpl_vars['obj']->value->getClassName();
}?> <?php if (!empty($_smarty_tpl->tpl_vars['CHILD_LINKS']->value)) {?>dropdownMenu<?php }?> hidden-xs hidden-sm" data-content="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['TITLE']->value);?>
" href="<?php echo $_smarty_tpl->tpl_vars['HREF']->value;?>
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
" aria-hidden="true"></span><?php }
if ($_smarty_tpl->tpl_vars['ICON_PATH']->value) {?><img src="<?php echo $_smarty_tpl->tpl_vars['ICON_PATH']->value;?>
" alt="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
" title="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['TITLE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
" /><?php }?></a><?php if (!empty($_smarty_tpl->tpl_vars['CHILD_LINKS']->value)) {?><ul class="dropdown-menu"><?php
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
</div><?php if (AppConfig::performance('GLOBAL_SEARCH')) {?><div class="pull-left selectSearch"><div class="input-group globalSearchInput"><span class="input-group-btn"><select class="chzn-select basicSearchModulesList form-control col-md-5" title="<?php echo \App\Language::translate('LBL_SEARCH_MODULE');?>
"><option value=""><?php echo \App\Language::translate('LBL_ALL_RECORDS');?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SEARCHABLE_MODULES']->value, 'fieldObject', false, 'SEARCHABLE_MODULE');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['SEARCHABLE_MODULE']->value => $_smarty_tpl->tpl_vars['fieldObject']->value) {
if (isset($_smarty_tpl->tpl_vars['SEARCHED_MODULE']->value) && $_smarty_tpl->tpl_vars['SEARCHED_MODULE']->value == $_smarty_tpl->tpl_vars['SEARCHABLE_MODULE']->value && $_smarty_tpl->tpl_vars['SEARCHED_MODULE']->value !== 'All') {?><option value="<?php echo $_smarty_tpl->tpl_vars['SEARCHABLE_MODULE']->value;?>
" selected><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['SEARCHABLE_MODULE']->value,$_smarty_tpl->tpl_vars['SEARCHABLE_MODULE']->value);?>
</option><?php } else { ?><option value="<?php echo $_smarty_tpl->tpl_vars['SEARCHABLE_MODULE']->value;?>
"><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['SEARCHABLE_MODULE']->value,$_smarty_tpl->tpl_vars['SEARCHABLE_MODULE']->value);?>
</option><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select></span><input type="text" class="form-control globalSearchValue" title="<?php echo \App\Language::translate('LBL_GLOBAL_SEARCH');?>
" placeholder="<?php echo \App\Language::translate('LBL_GLOBAL_SEARCH');?>
" results="10" data-operator="contains" /><span class="input-group-btn"><button class="btn btn-default searchIcon" type="button"><span class="glyphicon glyphicon-search"></span></button><?php if (AppConfig::search('GLOBAL_SEARCH_OPERATOR')) {?><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-screenshot"></span></button><ul class="dropdown-menu globalSearchOperator"><li class="active"><a href="#" data-operator="contains"><?php echo \App\Language::translate('contains');?>
</a></li><li><a href="#" data-operator="starts"><?php echo \App\Language::translate('starts with');?>
</a></li><li><a href="#" data-operator="ends"><?php echo \App\Language::translate('ends with');?>
</a></li></ul></div><?php }?><button class="btn btn-default globalSearch" title="<?php echo \App\Language::translate('LBL_ADVANCE_SEARCH');?>
" type="button"><span class="glyphicon glyphicon-th-large"></span></button></span></div></div><?php }?><div class="pull-right rightHeaderBtnMenu"><div class="quickAction"><a class="btn btn-default btn-sm" href="#"><span aria-hidden="true" class="glyphicon glyphicon-menu-hamburger"></span></a></div></div><div class="pull-right actionMenuBtn"><div class="quickAction"><a class="btn btn-default btn-sm" href="#"><span aria-hidden="true" class="glyphicon glyphicon-certificate"></span></a></div></div><?php if (AppConfig::performance('GLOBAL_SEARCH')) {?><div class="pull-left searchMenuBtn"><div class="quickAction"><a class="btn btn-default btn-sm" href="#"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></a></div></div><?php }
if (!Settings_ModuleManager_Library_Model::checkLibrary('roundcube')) {?><div class="pull-right"><?php $_smarty_tpl->_assignInScope('CONFIG', Settings_Mail_Config_Model::getConfig('mailIcon'));
if ($_smarty_tpl->tpl_vars['CONFIG']->value['showMailIcon'] == 'true' && App\Privilege::isPermitted('OSSMail')) {
$_smarty_tpl->_assignInScope('AUTOLOGINUSERS', OSSMail_Autologin_Model::getAutologinUsers());
if (count($_smarty_tpl->tpl_vars['AUTOLOGINUSERS']->value) > 0) {
$_smarty_tpl->_assignInScope('MAIN_MAIL', OSSMail_Module_Model::getDefaultMailAccount($_smarty_tpl->tpl_vars['AUTOLOGINUSERS']->value));
?><div class="headerLinksMails" id="OSSMailBoxInfo" <?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['showNumberUnreadEmails'] == 'true') {?>data-numberunreademails="true" data-interval="<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['timeCheckingMail'];?>
"<?php }?>><div class="btn-group"><?php if (count($_smarty_tpl->tpl_vars['AUTOLOGINUSERS']->value) == 1) {?><a type="button" class="btn btn-sm btn-default" title="<?php echo $_smarty_tpl->tpl_vars['MAIN_MAIL']->value['username'];?>
" href="index.php?module=OSSMail&view=Index"><div class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['ITEM']->value['username'];?>
<span class="mail_user_name"><?php echo $_smarty_tpl->tpl_vars['MAIN_MAIL']->value['username'];?>
</span><span data-id="<?php echo $_smarty_tpl->tpl_vars['MAIN_MAIL']->value['rcuser_id'];?>
" class="noMails"></span></div><div class="visible-xs-block"><span class="glyphicon glyphicon-inbox"></span></div></a><?php } elseif ($_smarty_tpl->tpl_vars['CONFIG']->value['showMailAccounts'] == 'true') {?><select class="form-control" title="<?php echo \App\Language::translate('LBL_SEARCH_MODULE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AUTOLOGINUSERS']->value, 'ITEM', false, 'KEY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['KEY']->value => $_smarty_tpl->tpl_vars['ITEM']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['KEY']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['ITEM']->value['active']) {?>selected<?php }?> data-id="<?php echo $_smarty_tpl->tpl_vars['KEY']->value;?>
" data-nomail="" class="noMails"><?php echo $_smarty_tpl->tpl_vars['ITEM']->value['username'];?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select><?php }?></div></div><?php }
}?></div><?php }?></div></div></div>
<?php }
}
