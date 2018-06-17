<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:39
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ListViewActions.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2604bf0ea2f8_17404008',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa8bf20994fb2d4b553ecd4c198de843bcebcb60' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/ListViewActions.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2604bf0ea2f8_17404008 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['PARENT_MODULE']->value !== 'Settings' && $_smarty_tpl->tpl_vars['VIEW_MODEL']->value) {?><div class="pull-right paddingLeft5px"><?php $_smarty_tpl->_assignInScope('COLOR', AppConfig::search('LIST_ENTITY_STATE_COLOR'));
?><input type="hidden" id="entityState" value="<?php if ($_smarty_tpl->tpl_vars['VIEW_MODEL']->value->has('entityState')) {
echo $_smarty_tpl->tpl_vars['VIEW_MODEL']->value->get('entityState');
} else { ?>Active<?php }?>"><div class="dropdown dropdownEntityState"><button class="btn btn-default dropdown-toggle" type="button" id="dropdownEntityState" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php if ($_smarty_tpl->tpl_vars['VIEW_MODEL']->value->get('entityState') == 'Archived') {?><span class="fa fa-archive"></span><?php } elseif ($_smarty_tpl->tpl_vars['VIEW_MODEL']->value->get('entityState') == 'Trash') {?><span class="glyphicon glyphicon-trash"></span><?php } elseif ($_smarty_tpl->tpl_vars['VIEW_MODEL']->value->get('entityState') == 'All') {?><span class="glyphicon glyphicon-menu-hamburger"></span><?php } else { ?><span class="fa fa-undo"></span><?php }?></button><ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownEntityState"><li <?php if ($_smarty_tpl->tpl_vars['COLOR']->value['Active']) {?>style="border-color: <?php echo $_smarty_tpl->tpl_vars['COLOR']->value['Active'];?>
;"<?php }?>><a href="#" data-value="Active"><span class="fa fa-undo"></span>&nbsp;&nbsp;<?php echo \App\Language::translate('LBL_ENTITY_STATE_ACTIVE');?>
</a></li><li <?php if ($_smarty_tpl->tpl_vars['COLOR']->value['Archived']) {?>style="border-color: <?php echo $_smarty_tpl->tpl_vars['COLOR']->value['Archived'];?>
;"<?php }?>><a href="#" data-value="Archived"><span class="fa fa-archive"></span>&nbsp;&nbsp;<?php echo \App\Language::translate('LBL_ENTITY_STATE_ARCHIVED');?>
</a></li><li <?php if ($_smarty_tpl->tpl_vars['COLOR']->value['Trash']) {?>style="border-color: <?php echo $_smarty_tpl->tpl_vars['COLOR']->value['Trash'];?>
;"<?php }?>><a href="#" data-value="Trash"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;<?php echo \App\Language::translate('LBL_ENTITY_STATE_TRASH');?>
</a></li><li><a href="#" data-value="All"><span class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;<?php echo \App\Language::translate('LBL_ALL');?>
</a></li></ul></div></div><?php }?><div class="listViewActions pull-right paginationDiv paddingLeft5px"><?php if ((method_exists($_smarty_tpl->tpl_vars['MODULE_MODEL']->value,'isPagingSupported') && ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isPagingSupported() == true)) || !method_exists($_smarty_tpl->tpl_vars['MODULE_MODEL']->value,'isPagingSupported')) {
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('Pagination.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?></div><div class="clearfix"></div><input type="hidden" id="recordsCount" value="" /><input type="hidden" id="selectedIds" name="selectedIds" /><input type="hidden" id="excludedIds" name="excludedIds" />
<?php }
}
