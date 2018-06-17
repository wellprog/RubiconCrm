<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:11
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/dashboards/DashBoardContents.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb43225b48_47837984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9ab17ba7b014761fcadca32b76349f6c9c430af' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/dashboards/DashBoardContents.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb43225b48_47837984 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="gridster"><ul><?php $_smarty_tpl->_assignInScope('COLUMNS', 2);
$_smarty_tpl->_assignInScope('ROW', 1);
$_smarty_tpl->_assignInScope('COLCOUNT', 1);
$_smarty_tpl->_assignInScope('SPECIAL_WIDTGETS', array('ChartFilter','MiniList','Notebook','Charts','Rss'));
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WIDGETS']->value, 'WIDGET', false, NULL, 'count', array (
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['WIDGET']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_count']->value['index']++;
if ($_smarty_tpl->tpl_vars['WIDGET']->value->get('active') == 0) {
continue 1;
}
$_smarty_tpl->_assignInScope('WIDGETDOMID', $_smarty_tpl->tpl_vars['WIDGET']->value->get('linkid'));
if (in_array($_smarty_tpl->tpl_vars['WIDGET']->value->getName(),$_smarty_tpl->tpl_vars['SPECIAL_WIDTGETS']->value)) {
$_smarty_tpl->_assignInScope('WIDGETDOMID', ($_smarty_tpl->tpl_vars['WIDGET']->value->get('linkid')).('-').($_smarty_tpl->tpl_vars['WIDGET']->value->get('widgetid')));
}?><li id="<?php echo $_smarty_tpl->tpl_vars['WIDGETDOMID']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_count']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_count']->value['index'] : null)%$_smarty_tpl->tpl_vars['COLUMNS']->value == 0 && (isset($_smarty_tpl->tpl_vars['__smarty_foreach_count']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_count']->value['index'] : null) != 0) {?> data-row="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getPositionRow($_smarty_tpl->tpl_vars['ROW']->value);?>
" <?php } else { ?> data-row="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getPositionRow($_smarty_tpl->tpl_vars['ROW']->value);?>
" <?php }
$_smarty_tpl->_assignInScope('ROW', $_smarty_tpl->tpl_vars['ROW']->value+1);
$_smarty_tpl->_assignInScope('COLCOUNT', ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_count']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_count']->value['index'] : null)%$_smarty_tpl->tpl_vars['COLUMNS']->value)+1);
?> data-col="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getPositionCol($_smarty_tpl->tpl_vars['COLCOUNT']->value);?>
" data-sizex="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getWidth();?>
" data-sizey="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getHeight();?>
"class="dashboardWidget dashboardWidget_<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_count']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_count']->value['index'] : null);?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getUrl();?>
" data-mode="open" data-name="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getName();?>
" data-cache="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('cache');?>
" ></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul><input type="hidden" id=row value="<?php echo $_smarty_tpl->tpl_vars['ROW']->value;?>
" /><input type="hidden" id=col value="<?php echo $_smarty_tpl->tpl_vars['COLCOUNT']->value;?>
" /></div>
<?php }
}
