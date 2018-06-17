<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:17
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/Vtiger/SettingsIndexHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb4986da15_63372528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d46312742b7728c5bc02f292de43f3437eb17f5' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/Vtiger/SettingsIndexHeader.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb4986da15_63372528 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="widget_header row "><div class="col-xs-12"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('BreadCrumbs.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div></div><div class="row no-margin"><ul class="nav nav-tabs massEditTabs"><li class="active" data-mode="index" data-params="<?php echo \App\Purifier::encodeHtml(\App\Json::encode(array('count'=>$_smarty_tpl->tpl_vars['WARNINGS_COUNT']->value)));?>
"><a data-toggle="tab"><strong><?php echo \App\Language::translate('LBL_START',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><li data-mode="github"><a data-toggle="tab"><strong><?php echo \App\Language::translate('LBL_GITHUB',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><li data-mode="systemWarnings"><a data-toggle="tab"><strong><?php echo \App\Language::translate('LBL_SYSTEM_WARNINGS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><li data-mode="security"><a data-toggle="tab"><strong><?php echo \App\Language::translate('LBL_SECURITY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li></ul></div><div class="indexContainer"></div>
<?php }
}
