<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:23
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/Vtiger/SystemWarnings.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb4f5c53d7_81615201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77c1e4fe5eb7e6175957fd675728ff5438f490de' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/Vtiger/SystemWarnings.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb4f5c53d7_81615201 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="warningsIndexPage"><div class="row"><div class="col-md-9 marginRight10"><div class="marginRight10" id="warningsContent"></div></div><div class="col-md-3 siteBarRight"><h4><?php echo \App\Language::translate('LBL_WARNINGS_FOLDERS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4><hr><div class="text-center marginBottom5"><input class="switchBtn" type="checkbox" title="<?php echo \App\Language::translate('LBL_WARNINGS_SWITCH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-size="normal" data-label-width="5" data-handle-width="90" data-on-text="<?php echo \App\Language::translate('LBL_ACTIVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-off-text="<?php echo \App\Language::translate('LBL_ALL');?>
"></div><hr><input type="hidden" id="treeValues" value="<?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['FOLDERS']->value);?>
"><div id="jstreeContainer"></div></div></div></div>
<?php }
}
