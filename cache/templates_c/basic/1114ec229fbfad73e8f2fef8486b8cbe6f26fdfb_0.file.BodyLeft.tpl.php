<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:10
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BodyLeft.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb42e9d9c5_56940201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1114ec229fbfad73e8f2fef8486b8cbe6f26fdfb' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/BodyLeft.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb42e9d9c5_56940201 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container-fluid userDetailsContainer"><div class="row padding0"><div class="col-md-2 noSpaces"><a class="companyLogoContainer" href="index.php"><img class="img-responsive logo" src="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('imageUrl');?>
" title="<?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get('name');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['COMPANY_LOGO']->value->get('alt');?>
" /></a></div><div class="col-md-10 userDetails"><div class="col-xs-12 noSpaces userName"><?php $_smarty_tpl->_assignInScope('USER_NAME_ARRAY', explode(' ',$_smarty_tpl->tpl_vars['USER_MODEL']->value->getDisplayName()));
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['USER_NAME_ARRAY']->value, 'NAME', false, NULL, 'userNameIterator', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_userNameIterator']->value['iteration']++;
if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_userNameIterator']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_userNameIterator']->value['iteration'] : null) <= 2) {?><p class="noSpaces name textOverflowEllipsis"><?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
&nbsp;</p><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
<p class="companyName noSpaces textOverflowEllipsis"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get('name');?>
&nbsp;</p></div></div></div></div><div class="menuContainer <?php if ($_smarty_tpl->tpl_vars['DEVICE']->value == 'Desktop') {?>slimScrollMenu<?php }?>"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('Menu.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('DEVICE'=>$_smarty_tpl->tpl_vars['DEVICE']->value), 0, true);
?>
</div>

<?php }
}
