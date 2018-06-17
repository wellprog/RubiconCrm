<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:11
  from "/var/www/RubiconCrm/layouts/basic/modules/Calendar/Reminders.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb43c3db90_30603756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9727a4bba171a239560dfbc110bfa5c761eaaa1b' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Calendar/Reminders.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb43c3db90_30603756 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="remindersContent"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORDS']->value, 'RECORD');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['RECORD']->value) {
$_smarty_tpl->_assignInScope('START_DATE', $_smarty_tpl->tpl_vars['RECORD']->value->get('date_start'));
$_smarty_tpl->_assignInScope('START_TIME', $_smarty_tpl->tpl_vars['RECORD']->value->get('time_start'));
$_smarty_tpl->_assignInScope('END_DATE', $_smarty_tpl->tpl_vars['RECORD']->value->get('due_date'));
$_smarty_tpl->_assignInScope('END_TIME', $_smarty_tpl->tpl_vars['RECORD']->value->get('time_end'));
$_smarty_tpl->_assignInScope('RECORD_ID', $_smarty_tpl->tpl_vars['RECORD']->value->getId());
?><div class="panel picklistCBr_Calendar_activitytype_<?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['RECORD']->value->get('activitytype'));?>
" data-record="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
"><div class="panel-heading picklistCBg_Calendar_activitytype_<?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['RECORD']->value->get('activitytype'));?>
"><button class="btn btn-success btn-xs pull-right showModal" data-url="index.php?module=Calendar&view=ActivityStateModal&trigger=Reminders&record=<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button><img class="activityTypeIcon" src="<?php echo \App\Layout::getImagePath($_smarty_tpl->tpl_vars['RECORD']->value->getActivityTypeIcon());?>
" />&nbsp;<a target="_blank" href="index.php?module=Calendar&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('subject');?>
</a></div><div class="panel-body"><div><?php echo \App\Language::translate('Start Date & Time',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
: <strong><?php echo \App\Fields\DateTime::formatToDay(((string)$_smarty_tpl->tpl_vars['START_DATE']->value)." ".((string)$_smarty_tpl->tpl_vars['START_TIME']->value),$_smarty_tpl->tpl_vars['RECORD']->value->get('allday'));?>
</strong></div><div><?php echo \App\Language::translate('Due Date',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
: <strong><?php echo \App\Fields\DateTime::formatToDay(((string)$_smarty_tpl->tpl_vars['END_DATE']->value)." ".((string)$_smarty_tpl->tpl_vars['END_TIME']->value),$_smarty_tpl->tpl_vars['RECORD']->value->get('allday'));?>
</strong></div><?php if ($_smarty_tpl->tpl_vars['RECORD']->value->get('activitystatus') != '') {?><div><?php echo \App\Language::translate('Status',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
: <strong><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('activitystatus');?>
</strong></div><?php }
if ($_smarty_tpl->tpl_vars['RECORD']->value->get('link') != '') {?><div><?php echo \App\Language::translate('FL_RELATION',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
: <strong><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('link');?>
</strong><?php if ($_smarty_tpl->tpl_vars['PERMISSION_TO_SENDE_MAIL']->value) {
if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('internal_mailer') == 1) {
$_smarty_tpl->_assignInScope('COMPOSE_URL', OSSMail_Module_Model::getComposeUrl(\App\Record::getType($_smarty_tpl->tpl_vars['RECORD']->value->get('link')),$_smarty_tpl->tpl_vars['RECORD']->value->get('link'),'Detail','new'));
?><a target="_blank" class="pull-right btn btn-default btn-xs actionIcon" href="<?php echo $_smarty_tpl->tpl_vars['COMPOSE_URL']->value;?>
" title="<?php echo \App\Language::translate('LBL_SEND_EMAIL');?>
"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a><?php } else {
$_smarty_tpl->_assignInScope('URLDATA', OSSMail_Module_Model::getExternalUrl(\App\Record::getType($_smarty_tpl->tpl_vars['RECORD']->value->get('link')),$_smarty_tpl->tpl_vars['RECORD']->value->get('link'),'Detail','new'));
if ($_smarty_tpl->tpl_vars['URLDATA']->value && $_smarty_tpl->tpl_vars['URLDATA']->value != 'mailto:?') {?><a class="pull-right btn btn-default btn-xs actionIcon" href="<?php echo $_smarty_tpl->tpl_vars['URLDATA']->value;?>
" title="<?php echo \App\Language::translate('LBL_CREATEMAIL','OSSMailView');?>
"><span class="glyphicon glyphicon-envelope" title="<?php echo \App\Language::translate('LBL_CREATEMAIL','OSSMailView');?>
"></span></a><?php }
}
}?></div><?php }
if ($_smarty_tpl->tpl_vars['RECORD']->value->get('process') != '') {?><div><?php echo \App\Language::translate('FL_PROCESS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
: <strong><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('process');?>
</strong></div><?php }
if ($_smarty_tpl->tpl_vars['RECORD']->value->get('linkextend') != '') {?><div><?php echo \App\Language::translate('FL_RELATION_EXTEND',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
: <strong><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('linkextend');?>
</strong><?php if ($_smarty_tpl->tpl_vars['PERMISSION_TO_SENDE_MAIL']->value) {
if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('internal_mailer') == 1) {
$_smarty_tpl->_assignInScope('COMPOSE_URL', OSSMail_Module_Model::getComposeUrl(\App\Record::getType($_smarty_tpl->tpl_vars['RECORD']->value->get('linkextend')),$_smarty_tpl->tpl_vars['RECORD']->value->get('linkextend'),'Detail','new'));
?><a target="_blank" class="pull-right btn btn-default btn-xs actionIcon" href="<?php echo $_smarty_tpl->tpl_vars['COMPOSE_URL']->value;?>
" title="<?php echo \App\Language::translate('LBL_SEND_EMAIL');?>
"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a><?php } else {
$_smarty_tpl->_assignInScope('URLDATA', OSSMail_Module_Model::getExternalUrl(\App\Record::getType($_smarty_tpl->tpl_vars['RECORD']->value->get('linkextend')),$_smarty_tpl->tpl_vars['RECORD']->value->get('linkextend'),'Detail','new'));
if ($_smarty_tpl->tpl_vars['URLDATA']->value && $_smarty_tpl->tpl_vars['URLDATA']->value != 'mailto:?') {?><a class="pull-right btn btn-default btn-xs actionIcon" href="<?php echo $_smarty_tpl->tpl_vars['URLDATA']->value;?>
" title="<?php echo \App\Language::translate('LBL_CREATEMAIL','OSSMailView');?>
"><span class="glyphicon glyphicon-envelope" title="<?php echo \App\Language::translate('LBL_CREATEMAIL','OSSMailView');?>
"></span></a><?php }
}
}?></div><?php }
if ($_smarty_tpl->tpl_vars['RECORD']->value->get('subprocess') != '') {?><div><?php echo \App\Language::translate('FL_SUB_PROCESS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
: <strong><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('subprocess');?>
</strong></div><?php }
if ($_smarty_tpl->tpl_vars['RECORD']->value->get('location') != '') {?><div><?php echo \App\Language::translate('Location',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('location');?>
</strong><?php if (App\Privilege::isPermitted('OpenStreetMap')) {?><a class="pull-right btn btn-default btn-xs actionIcon" data-location="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('location');?>
" onclick="Vtiger_Index_Js.showLocation(this)"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></a><?php }?></div><?php }?><hr /><div class="actionRow text-center"><a class="btn btn-default btn-sm btn-success showModal" data-url="index.php?module=Calendar&view=ActivityStateModal&trigger=Reminders&record=<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a><a class="btn btn-default btn-sm btn-primary reminderPostpone" data-time="15m">15<?php echo \App\Language::translate('LBL_M',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a><a class="btn btn-default btn-sm btn-primary reminderPostpone" data-time="30m">30<?php echo \App\Language::translate('LBL_M',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a><a class="btn btn-default btn-sm btn-primary reminderPostpone" data-time="1h">1<?php echo \App\Language::translate('LBL_H',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a><a class="btn btn-default btn-sm btn-primary reminderPostpone" data-time="2h">2<?php echo \App\Language::translate('LBL_H',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a><a class="btn btn-default btn-sm btn-primary reminderPostpone" data-time="6h">6<?php echo \App\Language::translate('LBL_H',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a><a class="btn btn-default btn-sm btn-primary reminderPostpone" data-time="1d">1<?php echo \App\Language::translate('LBL_D',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></div></div></div><?php
}
} else {
?>
<div class="alert alert-info"><?php echo \App\Language::translate('LBL_NO_CURRENT_ACTIVITIES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div>
<?php }
}
