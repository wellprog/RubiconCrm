<?php
/* Smarty version 3.1.31, created on 2018-06-17 10:11:33
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ListViewLeftSide.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2609a57eb3c6_97326809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b3166738bce270d8a32473912e2d07bf7a1a24a' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ListViewLeftSide.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2609a57eb3c6_97326809 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
" class="listViewEntriesCheckBox" title="<?php echo \App\Language::translate('LBL_SELECT_SINGLE_ROW');?>
" /></div><?php $_smarty_tpl->_assignInScope('LINKS', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getRecordListViewLinksLeftSide());
if (count($_smarty_tpl->tpl_vars['LINKS']->value) > 0) {
$_smarty_tpl->_assignInScope('ONLY_ONE', count($_smarty_tpl->tpl_vars['LINKS']->value) == 1);
?><div class="actions"><div class="<?php if (!$_smarty_tpl->tpl_vars['ONLY_ONE']->value) {?>actionImages hide<?php }?>"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LINKS']->value, 'LINK');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['LINK']->value) {
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('ButtonLink.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('BUTTON_VIEW'=>'listViewBasic'), 0, true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div><?php if (!$_smarty_tpl->tpl_vars['ONLY_ONE']->value) {?><button type="button" class="btn btn-sm btn-default toolsAction"><span class="glyphicon glyphicon-wrench"></span></button><?php }?></div><?php }?><div><?php if (in_array($_smarty_tpl->tpl_vars['MODULE']->value,AppConfig::module('ModTracker','SHOW_TIMELINE_IN_LISTVIEW')) && $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isPermitted('TimeLineList')) {?><a type="button" data-url="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getTimeLineUrl();?>
" class="timeLineIconList hide"><span class="glyphicon" aria-hidden="true"></span></a><?php }
if (AppConfig::module('ModTracker','UNREVIEWED_COUNT') && $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isPermitted('ReviewingUpdates') && $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isTrackingEnabled() && $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->isViewable()) {?><a href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getUpdatesUrl();?>
" class="unreviewed"><span class="badge bgDanger all" title="<?php echo \App\Language::translate('LBL_NUMBER_UNREAD_CHANGES','ModTracker');?>
"></span><span class="badge bgBlue mail noLeftRadius noRightRadius" title="<?php echo \App\Language::translate('LBL_NUMBER_UNREAD_MAILS','ModTracker');?>
"></span></a><?php }?></div>
<?php }
}
