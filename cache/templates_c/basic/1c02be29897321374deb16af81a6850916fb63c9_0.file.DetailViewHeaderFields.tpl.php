<?php
/* Smarty version 3.1.31, created on 2018-06-17 10:10:50
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/DetailViewHeaderFields.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b26097a684689_07747255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c02be29897321374deb16af81a6850916fb63c9' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/DetailViewHeaderFields.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26097a684689_07747255 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-xs-12 col-sm-12 col-md-4 detailViewHeaderFields"><?php if ($_smarty_tpl->tpl_vars['CUSTOM_FIELDS_HEADER']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CUSTOM_FIELDS_HEADER']->value, 'ROW');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ROW']->value) {
?><div class="col-xs-12 marginTB3 paddingLRZero"><div class="row col-lg-9 col-md-10 col-xs-12 pull-right paddingLRZero detailViewHeaderFieldsContent"><div class="btn btn-default <?php echo $_smarty_tpl->tpl_vars['ROW']->value['class'];?>
 btn-xs col-xs-12" <?php if ($_smarty_tpl->tpl_vars['ROW']->value['action']) {?>onclick="<?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['ROW']->value['action']);?>
"<?php }?>><div class="detailViewHeaderFieldsName"><?php echo $_smarty_tpl->tpl_vars['ROW']->value['title'];?>
</div><div class="detailViewHeaderFieldsValue"><span class="badge"><?php echo $_smarty_tpl->tpl_vars['ROW']->value['badge'];?>
</span></div></div></div></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
if ($_smarty_tpl->tpl_vars['FIELDS_HEADER']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FIELDS_HEADER']->value, 'VALUE', false, 'LABEL');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['LABEL']->value => $_smarty_tpl->tpl_vars['VALUE']->value) {
if (!empty($_smarty_tpl->tpl_vars['VALUE']->value['value'])) {?><div class="col-xs-12 marginTB3 paddingLRZero"><div class="row col-lg-9 col-md-10 col-xs-12 pull-right paddingLRZero detailViewHeaderFieldsContent"><div class="btn <?php echo $_smarty_tpl->tpl_vars['VALUE']->value['class'];?>
 btn-xs col-xs-12"><div class="detailViewHeaderFieldsName"><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['LABEL']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</div><div class="detailViewHeaderFieldsValue"><span class="badge"><?php echo $_smarty_tpl->tpl_vars['VALUE']->value['value'];?>
</span></div></div></div></div><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></div>
<?php }
}
