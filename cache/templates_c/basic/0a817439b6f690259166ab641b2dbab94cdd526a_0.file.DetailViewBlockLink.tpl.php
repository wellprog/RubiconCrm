<?php
/* Smarty version 3.1.31, created on 2018-06-17 10:10:50
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/DetailViewBlockLink.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26097a705178_94220003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a817439b6f690259166ab641b2dbab94cdd526a' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/DetailViewBlockLink.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26097a705178_94220003 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="detailViewBlockLinks"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['VIEW_MODEL']->value->getBlocks($_smarty_tpl->tpl_vars['TYPE_VIEW']->value), 'BLOCK_MODEL');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_MODEL']->value) {
$_smarty_tpl->_assignInScope('RELATED_MODULE_NAME', $_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->getRelatedModuleName());
?><div class="panel panel-default row no-margin detailViewBlockLink" data-url="<?php echo $_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->getUrl();?>
" data-reference="<?php echo $_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->getRelatedModuleName();?>
" data-count="<?php echo intval(AppConfig::relation('SHOW_RECORDS_COUNT'));?>
"><div class="panel-heading row blockHeader no-margin"><div class="iconCollapse"><span class="cursorPointer blockToggle glyphicon glyphicon-menu-right" alt="<?php echo \App\Language::translate('LBL_EXPAND_BLOCK');?>
" data-mode="hide" data-id="<?php echo $_smarty_tpl->tpl_vars['TYPE_VIEW']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['RELATED_MODULE_NAME']->value;?>
"></span><span class="cursorPointer blockToggle glyphicon glyphicon-menu-down hide" alt="<?php echo \App\Language::translate('LBL_COLLAPSE_BLOCK');?>
" data-mode="show" data-id="<?php echo $_smarty_tpl->tpl_vars['TYPE_VIEW']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['RELATED_MODULE_NAME']->value;?>
"></span><h4><span class="moduleIcon userIcon-<?php echo $_smarty_tpl->tpl_vars['RELATED_MODULE_NAME']->value;?>
"></span><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['BLOCK_MODEL']->value->getLabel(),$_smarty_tpl->tpl_vars['RELATED_MODULE_NAME']->value);
if (AppConfig::relation('SHOW_RECORDS_COUNT')) {?>&nbsp;<span class="count badge pull-right">0</span><?php }?></h4><h4 class="pull-right"><span class="glyphicon glyphicon-link pull-right popoverTooltip" data-content="<?php echo \App\Language::translate('LBL_RELATED_RECORDS_LIST');?>
" data-placement="left" aria-hidden="true"></span></h4></div></div><div class="panel-body col-xs-12 blockContent hide"></div></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div>
<?php }
}
