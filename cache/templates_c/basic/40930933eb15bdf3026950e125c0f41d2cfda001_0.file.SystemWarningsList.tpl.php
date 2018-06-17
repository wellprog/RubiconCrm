<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:23
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/Vtiger/SystemWarningsList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb4f76f4b5_98080146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40930933eb15bdf3026950e125c0f41d2cfda001' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/Vtiger/SystemWarningsList.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb4f76f4b5_98080146 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-bordered table-condensed"><thead><tr><th><?php echo App\Language::translate('LBL_WARNINGS_TITLE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th><?php echo App\Language::translate('LBL_WARNINGS_STATUS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th><?php echo App\Language::translate('LBL_WARNINGS_PRIORITY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th><?php echo App\Language::translate('LBL_WARNINGS_FOLDER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th></th></tr></thead><tbody class="notificationEntries"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WARNINGS_LIST']->value, 'ITEM');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ITEM']->value) {
?><tr data-id="<?php echo get_class($_smarty_tpl->tpl_vars['ITEM']->value);?>
" data-status="<?php echo $_smarty_tpl->tpl_vars['ITEM']->value->getStatus();?>
"><td><?php echo App\Language::translate($_smarty_tpl->tpl_vars['ITEM']->value->getTitle(),'Settings:SystemWarnings');?>
</td><td class="text-center <?php if ($_smarty_tpl->tpl_vars['ITEM']->value->getStatus() == 0) {?>danger<?php } elseif ($_smarty_tpl->tpl_vars['ITEM']->value->getStatus() == 1) {?>success<?php }?>"><?php if ($_smarty_tpl->tpl_vars['ITEM']->value->getStatus() == 0) {?><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><?php } elseif ($_smarty_tpl->tpl_vars['ITEM']->value->getStatus() == 1) {?><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><?php } elseif ($_smarty_tpl->tpl_vars['ITEM']->value->getStatus() == 2) {?><span class="glyphicon glyphicon-minus" aria-hidden="true"></span><?php }?>&nbsp;</td><td data-order="<?php echo $_smarty_tpl->tpl_vars['ITEM']->value->getPriority();?>
" class="text-center"><?php echo $_smarty_tpl->tpl_vars['ITEM']->value->getPriority();?>
</td><td class="text-center"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ITEM']->value->getFolder(), 'FOLDER', false, NULL, 'FOLDERS', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['FOLDER']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_FOLDERS']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_FOLDERS']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_FOLDERS']->value['iteration'] == $_smarty_tpl->tpl_vars['__smarty_foreach_FOLDERS']->value['total'];
echo App\Language::translate($_smarty_tpl->tpl_vars['FOLDER']->value,'Settings:SystemWarnings');
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_FOLDERS']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_FOLDERS']->value['last'] : null)) {?>/<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</td><td class="text-center"><?php if ($_smarty_tpl->tpl_vars['ITEM']->value->getStatus() != 1 && $_smarty_tpl->tpl_vars['ITEM']->value->getPriority() < 8) {?><button class="btn btn-warning btn-xs setIgnore popoverTooltip" data-placement="top" data-content="<?php if ($_smarty_tpl->tpl_vars['ITEM']->value->getStatus() == 2) {
echo App\Language::translate('BTN_REMOVE_IGNORE','Settings:SystemWarnings');
} else {
echo App\Language::translate('BTN_SET_IGNORE','Settings:SystemWarnings');
}?>"><?php if ($_smarty_tpl->tpl_vars['ITEM']->value->getStatus() == 2) {?><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span><?php } else { ?><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span><?php }?></button>&nbsp;&nbsp;<?php }
if ($_smarty_tpl->tpl_vars['ITEM']->value->getLink()) {?><a class="btn btn-success btn-xs <?php if (isset($_smarty_tpl->tpl_vars['ITEM']->value->linkTitle)) {?>popoverTooltip<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ITEM']->value->getLink();?>
" <?php if (isset($_smarty_tpl->tpl_vars['ITEM']->value->linkTitle)) {?>data-placement="top" data-content="<?php echo $_smarty_tpl->tpl_vars['ITEM']->value->linkTitle;?>
"<?php }?> target="_blank"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a>&nbsp;&nbsp;<?php }
if ($_smarty_tpl->tpl_vars['ITEM']->value->getDescription()) {?><button class="btn btn-primary btn-xs showDescription"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button><span class="hide showDescriptionContent"><div class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel"><?php echo App\Language::translate($_smarty_tpl->tpl_vars['ITEM']->value->getTitle(),'Settings:SystemWarnings');?>
</h4></div><div class="modal-body"><?php echo $_smarty_tpl->tpl_vars['ITEM']->value->getDescription();?>
</div></div></div></div></span><?php }?></td></tr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</tbody></table>
<?php }
}
