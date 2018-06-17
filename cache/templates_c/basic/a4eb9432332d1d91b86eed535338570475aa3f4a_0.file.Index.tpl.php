<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:17
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/Vtiger/Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb49ddff86_81698658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4eb9432332d1d91b86eed535338570475aa3f4a' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/Vtiger/Index.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb49ddff86_81698658 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['WARNINGS']->value) {?><div id="systemWarningAletrs"><div class="modal fade static"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-warning-sign redColor" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo App\Language::translate('LBL_SYSTEM_WARNINGS','Settings:Vtiger');?>
</h4></div><div class="modal-body"><div class="warnings"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WARNINGS']->value, 'ITEM');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ITEM']->value) {
?><div class="warning hide" data-id="<?php echo get_class($_smarty_tpl->tpl_vars['ITEM']->value);?>
"><?php if ($_smarty_tpl->tpl_vars['ITEM']->value->getTpl()) {
$_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['ITEM']->value->getTpl(), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
} else { ?><h3 class="marginTB3"><?php echo App\Language::translate($_smarty_tpl->tpl_vars['ITEM']->value->getTitle(),'Settings:SystemWarnings');?>
</h3><p><?php echo $_smarty_tpl->tpl_vars['ITEM']->value->getDescription();?>
</p><div class="pull-right"><?php if ($_smarty_tpl->tpl_vars['ITEM']->value->getStatus() != 1 && $_smarty_tpl->tpl_vars['ITEM']->value->getPriority() < 8) {?><button type="button" class="btn btn-warning ajaxBtn" data-params="<?php echo $_smarty_tpl->tpl_vars['ITEM']->value->getStatus();?>
"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo App\Language::translate('BTN_SET_IGNORE','Settings:SystemWarnings');?>
</button>&nbsp;&nbsp;<?php }
if ($_smarty_tpl->tpl_vars['ITEM']->value->getLink()) {?><a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['ITEM']->value->getLink();?>
" target="_blank"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['ITEM']->value->linkTitle;?>
</a>&nbsp;&nbsp;<?php }?><button type="button" class="btn btn-danger cancel"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo App\Language::translate('LBL_REMIND_LATER','Settings:SystemWarnings');?>
</button></div><?php }?><div class="clearfix"></div></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div></div></div></div></div></div><?php }?><div class="settingsIndexPage"><div class="row center-block"><span class="col-xs-5 col-sm-4 col-md-3 col-lg-2 settingsSummary"><a href="javascript:Settings_Vtiger_Index_Js.showWarnings()"><h2 style="font-size: 44px" class="summaryCount"><?php echo $_smarty_tpl->tpl_vars['WARNINGS_COUNT']->value;?>
</h2><p class="summaryText" style="margin-top:20px;"><?php echo \App\Language::translatePluralized('PLU_SYSTEM_WARNINGS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value,$_smarty_tpl->tpl_vars['WARNINGS_COUNT']->value);?>
</p></a></span><span class="col-xs-5 col-sm-4 col-md-3 col-lg-2 settingsSummary"><a href="javascript:Settings_Vtiger_Index_Js.showSecurity()"><h2 style="font-size: 44px" class="summaryCount"><?php echo $_smarty_tpl->tpl_vars['SECURITY_COUNT']->value;?>
</h2><p class="summaryText" style="margin-top:20px;"><?php echo \App\Language::translatePluralized('PLU_SECURITY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value,$_smarty_tpl->tpl_vars['SECURITY_COUNT']->value);?>
</p></a></span><span class="col-xs-5 col-sm-4 col-md-3 col-lg-2 settingsSummary"><a href="index.php?module=Users&parent=Settings&view=List"><h2 style="font-size: 44px" class="summaryCount"><?php echo $_smarty_tpl->tpl_vars['USERS_COUNT']->value;?>
</h2><p class="summaryText" style="margin-top:20px;"><?php echo \App\Language::translatePluralized('PLU_USERS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value,$_smarty_tpl->tpl_vars['USERS_COUNT']->value);?>
</p></a></span><span class="col-xs-5 col-sm-4 col-md-3 col-lg-2 settingsSummary"><a href="index.php?module=Workflows&parent=Settings&view=List"><h2 style="font-size: 44px" class="summaryCount"><?php echo $_smarty_tpl->tpl_vars['ALL_WORKFLOWS']->value;?>
</h2><p class="summaryText" style="margin-top:20px;"><?php echo \App\Language::translatePluralized('PLU_WORKFLOWS_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value,$_smarty_tpl->tpl_vars['ALL_WORKFLOWS']->value);?>
</p></a></span><span class="col-xs-5 col-sm-4 col-md-3 col-lg-2 settingsSummary"><a href="index.php?module=ModuleManager&parent=Settings&view=List"><h2 style="font-size: 44px" class="summaryCount"><?php echo $_smarty_tpl->tpl_vars['ACTIVE_MODULES']->value;?>
</h2><p class="summaryText" style="margin-top:20px;"><?php echo \App\Language::translatePluralized('PLU_MODULES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value,$_smarty_tpl->tpl_vars['ACTIVE_MODULES']->value);?>
</p></a></span></div><br /><br /><h3><?php echo \App\Language::translate('LBL_SETTINGS_SHORTCUTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><hr><?php $_smarty_tpl->_assignInScope('SPAN_COUNT', 1);
?><div class="row"><div class="col-md-1">&nbsp;</div><div id="settingsShortCutsContainer" class="col-md-11"><div class="row"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUTS']->value, 'SETTINGS_SHORTCUT', false, NULL, 'shortcuts', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['SETTINGS_SHORTCUT']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_shortcuts']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_shortcuts']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_shortcuts']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_shortcuts']->value['total'];
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('SettingsShortCut.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
if ($_smarty_tpl->tpl_vars['SPAN_COUNT']->value == 3) {?></div><?php $_smarty_tpl->_assignInScope('SPAN_COUNT', 1);
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_shortcuts']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_shortcuts']->value['last'] : null)) {?><div class="row"><?php }
continue 1;
}
$_smarty_tpl->_assignInScope('SPAN_COUNT', $_smarty_tpl->tpl_vars['SPAN_COUNT']->value+1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div></div></div>
<?php }
}
