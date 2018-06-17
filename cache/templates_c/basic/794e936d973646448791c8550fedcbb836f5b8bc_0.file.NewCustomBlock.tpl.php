<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:48:29
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/LayoutEditor/NewCustomBlock.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26043d0bd9f2_76526257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '794e936d973646448791c8550fedcbb836f5b8bc' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/LayoutEditor/NewCustomBlock.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26043d0bd9f2_76526257 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="newCustomBlockCopy hide marginBottom10px border1px <?php if ($_smarty_tpl->tpl_vars['IS_BLOCK_SORTABLE']->value) {?>blockSortable <?php }?>" data-block-id="" data-sequence="" style="border-radius: 4px; background: white;"><div class="row layoutBlockHeader no-margin"><div class="col-md-6 blockLabel padding10"><img class="alignMiddle" src="<?php echo \App\Layout::getImagePath('drag.png');?>
" alt="" />&nbsp;&nbsp;</div><div class="col-md-6 marginLeftZero"><div class="pull-right btn-toolbar blockActions" style="margin: 4px;"><div class="btn-group"><button class="btn btn-success addCustomField hide" type="button"><strong><?php echo App\Language::translate('LBL_ADD_CUSTOM_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div><div class="btn-group"><button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><strong><?php echo App\Language::translate('LBL_ACTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong>&nbsp;&nbsp;<span class="caret"></span></button><ul class="dropdown-menu pull-right"><li class="blockVisibility" data-visible="1" data-block-id=""><a href="javascript:void(0)"><span class="glyphicon glyphicon-ok"></span>&nbsp;<?php echo App\Language::translate('LBL_ALWAYS_SHOW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></li><li class="inActiveFields"><a href="javascript:void(0)"><?php echo App\Language::translate('LBL_INACTIVE_FIELDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></li><li class="deleteCustomBlock"><a href="javascript:void(0)"><?php echo App\Language::translate('LBL_DELETE_CUSTOM_BLOCK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></li></ul></div></div></div></div><div class="blockFieldsList row blockFieldsSortable no-margin" style="padding:5px;min-height: 27px"><ul class="connectedSortable col-md-6 ui-sortable" style="list-style-type: none; float: left;min-height:1px;padding:2px;" name="sortable1"></ul><ul class="connectedSortable col-md-6 ui-sortable" style="list-style-type: none; margin: 0;float: left;min-height:1px;padding:2px;" name="sortable2"></ul></div></div><?php }
}
