<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:10
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BrowsingHistory.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb42d0a3d6_12042855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce7a2e9b9f90c75b7e2b18db584fe7f947fc45a1' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BrowsingHistory.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb42d0a3d6_12042855 (Smarty_Internal_Template $_smarty_tpl) {
?>

<ul class="dropdown-menu pull-right historyList" role="menu"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BROWSING_HISTORY']->value, 'HISTORY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['HISTORY']->value) {
if (isset($_smarty_tpl->tpl_vars['HISTORY']->value['viewToday'])) {?><li class="item selectorHistory"><?php echo \App\Language::translate('LBL_TODAY');?>
</li><?php } elseif (isset($_smarty_tpl->tpl_vars['HISTORY']->value['viewYesterday'])) {?><li class="item selectorHistory"><?php echo \App\Language::translate('LBL_YESTERDAY');?>
</li><?php } elseif (isset($_smarty_tpl->tpl_vars['HISTORY']->value['viewOlder'])) {?><li class="item selectorHistory"><?php echo \App\Language::translate('LBL_YESTERDAY');?>
</li><?php }?><li class="item"><a href="<?php echo $_smarty_tpl->tpl_vars['HISTORY']->value['url'];?>
"><?php if ($_smarty_tpl->tpl_vars['HISTORY']->value['hour']) {?><span class="historyHour"><?php echo $_smarty_tpl->tpl_vars['HISTORY']->value['date'];?>
</span><?php } else {
echo $_smarty_tpl->tpl_vars['HISTORY']->value['date'];
}
echo " | ";
echo $_smarty_tpl->tpl_vars['HISTORY']->value['title'];?>
</a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
<li class="divider"></li><li><a class="clearHistory" href="#" onclick="app.clearBrowsingHistory();"><?php echo \App\Language::translate('LBL_CLEAR_HISTORY');?>
</a></li></ul>
<?php }
}
