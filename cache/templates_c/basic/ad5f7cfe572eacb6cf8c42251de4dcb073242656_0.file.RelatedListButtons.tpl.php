<?php
/* Smarty version 3.1.31, created on 2018-06-17 10:10:50
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/RelatedListButtons.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26097a6cb533_61158110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad5f7cfe572eacb6cf8c42251de4dcb073242656' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/RelatedListButtons.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26097a6cb533_61158110 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="col-md-12"><div class="related paddingLRZero marginLeftZero"><div class=""><ul class="nav nav-pills"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWTAB'], 'RELATED_LINK', false, 'ITERATION');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ITERATION']->value => $_smarty_tpl->tpl_vars['RELATED_LINK']->value) {
?><li class="baseLink mainNav<?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel() == $_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value) {?> active<?php }?>" data-iteration="<?php echo $_smarty_tpl->tpl_vars['ITERATION']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getUrl();?>
&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-label-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-link-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('linkKey');?>
"  data-reference='<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('related');?>
' <?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('countRelated')) {?>data-count="<?php echo intval($_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('countRelated'));?>
"<?php }?>><a href="javascript:void(0);" class="textOverflowEllipsis" style="width:auto" title="<?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;
$_prefixVariable1=ob_get_clean();
echo \App\Language::translate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_prefixVariable1);?>
"><strong class="pull-left"><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;
$_prefixVariable2=ob_get_clean();
echo \App\Language::translate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_prefixVariable2);?>
</strong><?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('countRelated')) {?><span class="count badge pull-right <?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('badgeClass');?>
">0</span><?php }?></a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
<li class="spaceRelatedList hide"><li><li role="presentation" class="dropdown pull-right hide"><a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="true"><strong><?php echo \App\Language::translate('LBL_MORE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong> <span class="caret"></span></a><ul class="dropdown-menu pull-right"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWTAB'], 'RELATED_LINK', false, 'ITERATION');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ITERATION']->value => $_smarty_tpl->tpl_vars['RELATED_LINK']->value) {
?><li class="mainNav<?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel() == $_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value) {?> active<?php }?>" data-iteration="<?php echo $_smarty_tpl->tpl_vars['ITERATION']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getUrl();?>
&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-label-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-link-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('linkKey');?>
"  data-reference='<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('related');?>
' <?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('countRelated')) {?>data-count="<?php echo intval($_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('countRelated'));?>
"<?php }?>><a href="javascript:void(0);" class="textOverflowEllipsis" style="width:auto" title="<?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;
$_prefixVariable3=ob_get_clean();
echo \App\Language::translate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_prefixVariable3);?>
"><strong class="pull-left"><?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;
$_prefixVariable4=ob_get_clean();
echo \App\Language::translate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_prefixVariable4);?>
</strong><?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('countRelated')) {?><span class="count badge pull-right <?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('badgeClass');?>
">-</span><?php }?></a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWRELATED'], 'RELATED_LINK', false, 'ITERATION');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ITERATION']->value => $_smarty_tpl->tpl_vars['RELATED_LINK']->value) {
?><li class="hide relatedNav<?php if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel() == $_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value) {?> active<?php }?>" data-iteration="<?php echo $_smarty_tpl->tpl_vars['ITERATION']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getUrl();?>
&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-label-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-reference='<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->get('relatedModuleName');?>
' data-count="<?php echo AppConfig::relation('SHOW_RECORDS_COUNT');?>
"><?php $_smarty_tpl->_assignInScope('DETAILVIEWRELATEDLINKLBL', \App\Language::translate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['RELATED_LINK']->value->getRelatedModuleName()));
?><a href="javascript:void(0);" class="textOverflowEllipsis pull-left" style="width:100%" title="<?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
"><?php if (AppConfig::relation('SHOW_RELATED_ICON')) {?><span class="iconModule userIcon-<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getRelatedModuleName();?>
 pull-left">&nbsp;&nbsp;</span><?php }?><strong class="pull-left"><?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
</strong><?php if (AppConfig::relation('SHOW_RECORDS_COUNT')) {?><span class="count badge pull-right">0</span><?php }?></a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul></li><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWRELATED'], 'RELATED_LINK', false, 'ITERATION');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ITERATION']->value => $_smarty_tpl->tpl_vars['RELATED_LINK']->value) {
$_smarty_tpl->_assignInScope('DETAILVIEWRELATEDLINKLBL', \App\Language::translate($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['RELATED_LINK']->value->getRelatedModuleName()));
?><li <?php if (!AppConfig::relation('SHOW_RELATED_MODULE_NAME')) {?>data-content="<?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
" data-placement="top"<?php }?> class="baseLink hide pull-left relatedNav <?php if (!AppConfig::relation('SHOW_RELATED_MODULE_NAME')) {?>popoverTooltip<?php }
if ($_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel() == $_smarty_tpl->tpl_vars['SELECTED_TAB_LABEL']->value) {?> active<?php }?>" data-iteration="<?php echo $_smarty_tpl->tpl_vars['ITERATION']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getUrl();?>
&tab_label=<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-label-key="<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getLabel();?>
" data-reference='<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getRelatedModuleName();?>
' data-count="<?php echo AppConfig::relation('SHOW_RECORDS_COUNT');?>
"><a href="javascript:void(0);" class="textOverflowEllipsis" title="<?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
"><?php if (AppConfig::relation('SHOW_RELATED_ICON')) {?><span class="iconModule userIcon-<?php echo $_smarty_tpl->tpl_vars['RELATED_LINK']->value->getRelatedModuleName();?>
 pull-left">&nbsp;</span><?php }
if (AppConfig::relation('SHOW_RELATED_MODULE_NAME')) {?><strong class="pull-left"><?php echo $_smarty_tpl->tpl_vars['DETAILVIEWRELATEDLINKLBL']->value;?>
</strong><?php }
if (AppConfig::relation('SHOW_RECORDS_COUNT')) {?><span class="count badge pull-right">0</span><?php }?></a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul></div></div></div>
<?php }
}
