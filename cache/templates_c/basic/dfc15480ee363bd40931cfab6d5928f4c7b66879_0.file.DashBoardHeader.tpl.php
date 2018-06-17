<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:11
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/dashboards/DashBoardHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb43099084_23110029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfc15480ee363bd40931cfab6d5928f4c7b66879' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/dashboards/DashBoardHeader.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb43099084_23110029 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="widget_header row"><div class="col-xs-9 col-sm-4 col-md-6"><div class="btn-group listViewMassActions modOn_<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
 pull-left paddingRight10"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('ButtonViewLinks.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('LINKS'=>$_smarty_tpl->tpl_vars['QUICK_LINKS']->value['SIDEBARLINK'],'BTN_GROUP'=>false), 0, true);
?>
</div><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('BreadCrumbs.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div></div>
<?php }
}
