<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:50:39
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/Pagination.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2604bf112132_44693613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '133c51be5dd77e2124493ff4303f909b3c535d78' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/Pagination.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2604bf112132_44693613 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (empty($_smarty_tpl->tpl_vars['VIEWNAME']->value)) {
$_smarty_tpl->_assignInScope('VIEWNAME', 'list');
}?><nav><ul class="pagination" data-total-count="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_COUNT']->value;?>
"><li class="<?php if ($_smarty_tpl->tpl_vars['PAGE_NUMBER']->value == 1) {?> disabled <?php }?> pageNumber firstPage" data-id="1" ><span aria-hidden="true"><?php echo \App\Language::translate('LBL_FIRST');?>
</span></li><li class="<?php if (!$_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists() || $_smarty_tpl->tpl_vars['PAGE_NUMBER']->value == 1) {?> disabled <?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['VIEWNAME']->value;?>
ViewPreviousPageButton"><span aria-hidden="true">&laquo;</span></li><?php if ($_smarty_tpl->tpl_vars['PAGE_COUNT']->value != 0) {
$_smarty_tpl->_assignInScope('PAGIN_TO', $_smarty_tpl->tpl_vars['START_PAGIN_FROM']->value+4);
$_smarty_tpl->tpl_vars['PAGE_INDEX'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['PAGE_INDEX']->step = 1;$_smarty_tpl->tpl_vars['PAGE_INDEX']->total = (int) ceil(($_smarty_tpl->tpl_vars['PAGE_INDEX']->step > 0 ? $_smarty_tpl->tpl_vars['PAGIN_TO']->value+1 - ($_smarty_tpl->tpl_vars['START_PAGIN_FROM']->value) : $_smarty_tpl->tpl_vars['START_PAGIN_FROM']->value-($_smarty_tpl->tpl_vars['PAGIN_TO']->value)+1)/abs($_smarty_tpl->tpl_vars['PAGE_INDEX']->step));
if ($_smarty_tpl->tpl_vars['PAGE_INDEX']->total > 0) {
for ($_smarty_tpl->tpl_vars['PAGE_INDEX']->value = $_smarty_tpl->tpl_vars['START_PAGIN_FROM']->value, $_smarty_tpl->tpl_vars['PAGE_INDEX']->iteration = 1;$_smarty_tpl->tpl_vars['PAGE_INDEX']->iteration <= $_smarty_tpl->tpl_vars['PAGE_INDEX']->total;$_smarty_tpl->tpl_vars['PAGE_INDEX']->value += $_smarty_tpl->tpl_vars['PAGE_INDEX']->step, $_smarty_tpl->tpl_vars['PAGE_INDEX']->iteration++) {
$_smarty_tpl->tpl_vars['PAGE_INDEX']->first = $_smarty_tpl->tpl_vars['PAGE_INDEX']->iteration == 1;$_smarty_tpl->tpl_vars['PAGE_INDEX']->last = $_smarty_tpl->tpl_vars['PAGE_INDEX']->iteration == $_smarty_tpl->tpl_vars['PAGE_INDEX']->total;
if ($_smarty_tpl->tpl_vars['PAGE_INDEX']->value == $_smarty_tpl->tpl_vars['PAGE_COUNT']->value || $_smarty_tpl->tpl_vars['PAGE_INDEX']->value == $_smarty_tpl->tpl_vars['PAGIN_TO']->value) {
if ($_smarty_tpl->tpl_vars['PAGE_COUNT']->value > 5) {?><li <?php if ($_smarty_tpl->tpl_vars['PAGE_COUNT']->value == 1) {?> disabled <?php }?> ><a id="dLabel" data-target="#" data-toggle="dropdown" role="button" aria-expanded="true">...</a><ul class="dropdown-menu listViewBasicAction" aria-labelledby="dLabel" id="<?php echo $_smarty_tpl->tpl_vars['VIEWNAME']->value;?>
ViewPageJumpDropDown"><li><div><div class="col-md-3 recentComments textAlignCenter pushUpandDown2per"><span><?php echo \App\Language::translate('LBL_PAGE');?>
</span></div><div class="col-md-3 recentComments"><input type="text" id="pageToJump" class="listViewPagingInput textAlignCenter form-control" title="<?php echo \App\Language::translate('LBL_LISTVIEW_PAGE_JUMP');?>
" value="<?php echo $_smarty_tpl->tpl_vars['PAGE_NUMBER']->value;?>
" /></div><div class="col-md-2 recentComments textAlignCenter pushUpandDown2per"><?php echo \App\Language::translate('LBL_OF');?>
</div><div class="col-md-2 recentComments pushUpandDown2per textAlignCenter" id="totalPageCount"><?php echo $_smarty_tpl->tpl_vars['PAGE_COUNT']->value;?>
</div></div></li></ul></li><?php }
break 1;
}?><li class="pageNumber<?php if ($_smarty_tpl->tpl_vars['PAGE_NUMBER']->value == $_smarty_tpl->tpl_vars['PAGE_INDEX']->value) {?> active disabled<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['PAGE_INDEX']->value;?>
"><a><?php echo $_smarty_tpl->tpl_vars['PAGE_INDEX']->value;?>
</a></li><?php }
}
}
if ($_smarty_tpl->tpl_vars['PAGE_INDEX']->value <= $_smarty_tpl->tpl_vars['PAGE_COUNT']->value) {?><li class="pageNumber<?php if ($_smarty_tpl->tpl_vars['PAGE_NUMBER']->value == $_smarty_tpl->tpl_vars['PAGE_COUNT']->value) {?> active disabled<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['PAGE_COUNT']->value;?>
"><a><?php echo $_smarty_tpl->tpl_vars['PAGE_COUNT']->value;?>
</a></li><?php }?><li class="<?php if ((!$_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists())) {?>disabled<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['VIEWNAME']->value;?>
ViewNextPageButton"><span aria-hidden="true">&raquo;</span></li><?php if (!$_smarty_tpl->tpl_vars['LISTVIEW_COUNT']->value && $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists()) {?><li class="popoverTooltip" id="totalCountBtn" data-content="<?php echo \App\Language::translate('LBL_WIDGET_FILTER_TOTAL_COUNT_INFO');?>
" ><a><span class="glyphicon glyphicon-equalizer"></span></a></li><?php }
if ($_smarty_tpl->tpl_vars['LISTVIEW_COUNT']->value) {?><li class="<?php if ($_smarty_tpl->tpl_vars['PAGE_NUMBER']->value == $_smarty_tpl->tpl_vars['PAGE_COUNT']->value || (!$_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists())) {?> disabled <?php }?> pageNumber lastPage" data-id="<?php echo $_smarty_tpl->tpl_vars['PAGE_COUNT']->value;?>
" ><span aria-hidden="true"><?php echo \App\Language::translate('LBL_LAST');?>
</span></li><?php }?></ul><ul class="pageInfo"><li><span><span class="pageNumbersText"><?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
 <?php echo \App\Language::translate('LBL_TO_LC');?>
 <?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();
if ($_smarty_tpl->tpl_vars['LISTVIEW_COUNT']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_COUNT']->value;?>
)<?php }?></span></span></li></ul></nav>
<?php }
}
