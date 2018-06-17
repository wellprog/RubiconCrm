<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:11
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/Footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb43262092_99984638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a34c089a022dc2726b8d001fb582f664364946aa' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/Footer.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb43262092_99984638 (Smarty_Internal_Template $_smarty_tpl) {
?>

</div></div></div></div></div></div></div></div><?php if ($_smarty_tpl->tpl_vars['SHOW_FOOTER']->value) {?><div class="clearfix"></div><input id="activityReminder" class="hide noprint" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ACTIVITY_REMINDER']->value;?>
" /><?php if (AppConfig::module('Users','IS_VISIBLE_USER_INFO_FOOTER')) {?><div class="infoUser"><?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->getName();?>
&nbsp;(<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('email1');?>
&nbsp;<?php ob_start();
echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('phone_crm_extension');
$_prefixVariable1=ob_get_clean();
if (!empty($_prefixVariable1)) {?>,&nbsp; <?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('phone_crm_extension');
}?>)</div><?php }?><footer class="footerContainer navbar-default navbar-fixed-bottom noprint"><div class="vtFooter"><div class="pull-left"><a class="iconsInFooter" href="https://www.linkedin.com/groups/8177576" rel="noreferrer"><span class="AdditionalIcon-Linkedin" title="Linkendin"></span></a><a class="iconsInFooter" href="https://twitter.com/YetiForceEN" rel="noreferrer"><span class="AdditionalIcon-Twitter" title="Twitter"></span></a><a class="iconsInFooter" href="https://www.facebook.com/YetiForce-CRM-158646854306054/" rel="noreferrer"><span class="AdditionalIcon-Facebook" title="Facebook"></span></a><a class="iconsInFooter" href="https://github.com/YetiForceCompany/YetiForceCRM" rel="noreferrer"><span class="AdditionalIcon-Github" title="Github"></span></a></div><div class="pull-right"><button type="button" class="btn-link" data-toggle="modal" data-target="#yetiforceDetails"><img class="logoFooter" src="<?php echo App\Layout::getPublicUrl('layouts/resources/Logo/white_logo_yetiforce.png');?>
" alt="YetiForceCRM" /></button></div><?php $_smarty_tpl->_assignInScope('SCRIPT_TIME', round(microtime(true)-\App\Config::$startTime,3));
if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->is_admin == 'on') {
$_smarty_tpl->_assignInScope('FOOTVR', (((((('[ver. ').($_smarty_tpl->tpl_vars['YETIFORCE_VERSION']->value)).('] [')).(\App\Language::translate('WEBLOADTIME'))).(': ')).($_smarty_tpl->tpl_vars['SCRIPT_TIME']->value)).('s.]'));
$_smarty_tpl->_assignInScope('FOOTVRM', (('[').($_smarty_tpl->tpl_vars['SCRIPT_TIME']->value)).('s.]'));
$_smarty_tpl->_assignInScope('FOOTOSP', '<u><a href="index.php?module=Home&view=Credits&parent=Settings">open source project</a></u>');
?><p class="hidden-xs"><?php echo sprintf(\App\Language::translate('LBL_FOOTER_CONTENT'),$_smarty_tpl->tpl_vars['FOOTVR']->value,$_smarty_tpl->tpl_vars['FOOTOSP']->value);?>
</p><p class="visible-xs-block"><?php echo sprintf(\App\Language::translate('LBL_FOOTER_CONTENT'),$_smarty_tpl->tpl_vars['FOOTVRM']->value,$_smarty_tpl->tpl_vars['FOOTOSP']->value);?>
</p><?php } else { ?><p><?php echo sprintf(\App\Language::translate('LBL_FOOTER_CONTENT'),(((('[').(\App\Language::translate('WEBLOADTIME'))).(': ')).($_smarty_tpl->tpl_vars['SCRIPT_TIME']->value)).('s.]'),'open source project');?>
</p><?php }?></div></footer><div class="modal fade" id="yetiforceDetails" tabindex="-1" role="dialog" aria-labelledby="yetiforceDetails"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">YetiForceCRM <?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->is_admin == 'on') {?>v<?php echo $_smarty_tpl->tpl_vars['YETIFORCE_VERSION']->value;
}?> - The best open system in the world</h4></div><div class="modal-body"><p class="text-center"><img src="<?php echo App\Layout::getPublicUrl('layouts/resources/Logo/blue_yetiforce_logo.png');?>
" title="YetiForceCRM" alt="YetiForceCRM" style="height: 120px;" /></p><p>Copyright © YetiForce.com All rights reserved.</p><p>The Program is provided AS IS, without warranty. Licensed under <a href="https://github.com/YetiForceCompany/YetiForceCRM/blob/developer/licenses/LicenseEN.txt" target="_blank"><strong>YetiForce Public License 3.0</strong></a>.</p><p>YetiForce is based on two systems - <strong>VtigerCRM</strong> and <strong>SugarCRM</strong>.<br /><br /></p><p><span class="label label-default">License:</span> <a href="https://github.com/YetiForceCompany/YetiForceCRM/blob/developer/licenses/LicenseEN.txt" target="_blank"><strong>YetiForce Public License 3.0</strong></a></p><p><span class="label label-primary">WWW:</span> <a href="https://yetiforce.com" target="_blank" rel="noreferrer"><strong>https://yetiforce.com</strong></a></p><p><span class="label label-success">Code:</span> <a href="https://github.com/YetiForceCompany/YetiForceCRM" target="_blank" rel="noreferrer"><strong>https://github.com/YetiForceCompany/YetiForceCRM</strong></a></p><p><span class="label label-info">Documentation:</span> <a href="https://yetiforce.com/en/knowledge-base/documentation" target="_blank" rel="noreferrer"><strong>https://yetiforce.com/en/documentation.html</strong></a></p><p><span class="label label-warning">Issues:</span> <a href="https://github.com/YetiForceCompany/YetiForceCRM/issues" target="_blank" rel="noreferrer"><strong>https://github.com/YetiForceCompany/YetiForceCRM/issues</strong></a></p><p class="text-center"><a class="yetiforceDetailsLink" rel="noreferrer" href="https://www.linkedin.com/groups/8177576"><span class="fa fa-linkedin-square" title="LinkendIn"></span></a><a class="yetiforceDetailsLink" rel="noreferrer" href="https://twitter.com/YetiForceEN"><span class="fa fa-twitter-square" title="Twitter"></span></a><a class="yetiforceDetailsLink" rel="noreferrer" href="https://www.facebook.com/YetiForce-CRM-158646854306054/"><span class="fa fa-facebook-square" title="Facebook"></span></a><a class="yetiforceDetailsLink" rel="noreferrer" href="https://github.com/YetiForceCompany/YetiForceCRM"><span class="fa fa-github-square" title="Github"></span></a></p></div><div class="modal-footer"><button class="btn btn-warning" type="reset" data-dismiss="modal"><strong><?php echo \App\Language::translate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div></div></div></div><?php }
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
if (\App\Debuger::isDebugBar()) {
echo \App\Debuger::getDebugBar()->getJavascriptRenderer()->render();
}?></body></html>
<?php }
}
