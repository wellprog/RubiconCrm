<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:11
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/dashboards/DashBoardButtons.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb4311c640_94073901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ca14b4e2b5274d298eab68621a0a3b178f735da' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/dashboards/DashBoardButtons.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb4311c640_94073901 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="dashboardHeading col-xs-3 col-sm-8 col-md-6"><input type="hidden" name="selectedModuleName" value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><div class="marginLeftZero"><div class="pull-right"><div class="btn-toolbar"><div class="btn-group"><?php $_smarty_tpl->_assignInScope('SPECIAL_WIDGETS', Settings_WidgetsManagement_Module_Model::getSpecialWidgets('Home'));
if (count($_smarty_tpl->tpl_vars['WIDGETS']->value) > 0) {?><button class="btn btn-default addButton dropdown-toggle" style="padding:7px 8px;" data-toggle="dropdown"><p class="hidden-xs no-margin"><strong><?php echo \App\Language::translate('LBL_ADD_WIDGET');?>
</strong><span class="caret"></span></p><span class="glyphicon glyphicon-th visible-xs-block"></span></button><ul class="dropdown-menu widgetsList pull-left addWidgetDropDown"><?php if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModuleActionPermission($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId(),'CreateDashboardFilter')) {?><li class="visible-xs-block"><a href="#" class="addFilter pull-left" data-linkid="<?php echo $_smarty_tpl->tpl_vars['SPECIAL_WIDGETS']->value['Mini List']->get('linkid');?>
" data-block-id="0" data-width="4" data-height="4" style="height:30px;width:100%;margin:0;padding:5px;"><?php echo \App\Language::translate('LBL_ADD_FILTER');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModuleActionPermission($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId(),'CreateDashboardChartFilter')) {?><li class="visible-xs-block"><a class="addChartFilter pull-left" data-linkid="<?php echo $_smarty_tpl->tpl_vars['SPECIAL_WIDGETS']->value['ChartFilter']->get('linkid');?>
" data-block-id="0" data-width="4" data-height="4" style="height:30px;width:100%;margin:0;padding:5px;"><?php echo \App\Language::translate('LBL_ADD_CHART_FILTER');?>
</a></li><?php }
$_smarty_tpl->_assignInScope('WIDGET', '');
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WIDGETS']->value, 'WIDGET');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['WIDGET']->value) {
?><li><?php if ($_smarty_tpl->tpl_vars['WIDGET']->value->get('deleteFromList')) {?><button data-widget-id="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('widgetid');?>
" class="removeWidgetFromList btn btn-xs btn-danger pull-left" style="height:25px;margin:2px;"><span class='glyphicon glyphicon-trash'></span></button><?php }?><a class="pull-left" onclick="Vtiger_DashBoard_Js.addWidget(this, '<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getUrl();?>
')" href="javascript:void(0);"data-linkid="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('linkid');?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getName();?>
" data-width="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getWidth();?>
" data-height="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getHeight();?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('widgetid');?>
" style="height:30px;width:100%;margin: 0;padding:5px;"><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['WIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul><?php } elseif ($_smarty_tpl->tpl_vars['MODULE_PERMISSION']->value) {?><button class="btn btn-default addButton dropdown-toggle" data-toggle="dropdown"><strong class="hidden-xs"><?php echo \App\Language::translate('LBL_ADD_WIDGET');?>
</strong><span class="hidden-xs caret"></span><span class="glyphicon glyphicon-th visible-xs-block"></span></button><ul class="dropdown-menu widgetsList pull-left addWidgetDropDown"><?php if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModuleActionPermission($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId(),'CreateDashboardFilter')) {?><li class="visible-xs-block"><a href="#" class="addFilter pull-left" data-linkid="<?php echo $_smarty_tpl->tpl_vars['SPECIAL_WIDGETS']->value['Mini List']->get('linkid');?>
" data-block-id="0" data-width="4" data-height="4" style="height:30px;width:100%;margin:0;padding:5px;"><?php echo \App\Language::translate('LBL_ADD_FILTER');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModuleActionPermission($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId(),'CreateDashboardChartFilter')) {?><li class="visible-xs-block"><a class="addChartFilter pull-left" data-linkid="<?php echo $_smarty_tpl->tpl_vars['SPECIAL_WIDGETS']->value['ChartFilter']->get('linkid');?>
" data-block-id="0" data-width="4" data-height="4" style="height:30px;width:100%;margin:0;padding:5px;"><?php echo \App\Language::translate('LBL_ADD_CHART_FILTER');?>
</a></li><?php }
$_smarty_tpl->_assignInScope('WIDGET', '');
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WIDGETS']->value, 'WIDGET');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['WIDGET']->value) {
?><li><?php if ($_smarty_tpl->tpl_vars['WIDGET']->value->get('deleteFromList')) {?><button data-widget-id="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('widgetid');?>
" class="removeWidgetFromList btn btn-xs btn-danger pull-left" style="height:25px;margin:2px;"><span class='glyphicon glyphicon-trash'></span></button><?php }?><a class="pull-left" onclick="Vtiger_DashBoard_Js.addWidget(this, '<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getUrl();?>
')" href="javascript:void(0);"data-linkid="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('linkid');?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getName();?>
" data-width="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getWidth();?>
" data-height="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getHeight();?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('widgetid');?>
" style="height:30px;width:90%;margin:0;padding:5px;"><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['WIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
<li class="hidden-xs"><a href="#"><?php echo \App\Language::translate('LBL_NONE');?>
</a></li></ul><?php }?></div><?php if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModuleActionPermission($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId(),'CreateDashboardFilter')) {?><div class="btn-group hidden-xs"><a class="btn btn-default addFilter" data-linkid="<?php echo $_smarty_tpl->tpl_vars['SPECIAL_WIDGETS']->value['Mini List']->get('linkid');?>
" data-block-id="0" data-width="4" data-height="4"><strong><?php echo \App\Language::translate('LBL_ADD_FILTER');?>
</strong></a></div><?php }
if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModuleActionPermission($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId(),'CreateDashboardChartFilter')) {?><div class="btn-group hidden-xs"><a class="btn btn-default addChartFilter" data-linkid="<?php echo $_smarty_tpl->tpl_vars['SPECIAL_WIDGETS']->value['ChartFilter']->get('linkid');?>
" data-block-id="0" data-width="4" data-height="4"><strong><?php echo \App\Language::translate('LBL_ADD_CHART_FILTER');?>
</strong></a></div><?php }?></div></div></div></div>
<?php }
}
