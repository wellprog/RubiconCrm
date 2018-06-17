<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:45:45
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/ModuleManager/ListContents.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2603996dc513_27642933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8492f196d38e3dd7bc032da79ae88df6ff193be' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/ModuleManager/ListContents.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2603996dc513_27642933 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="" id="moduleManagerContents"><div class="widget_header row"><div class="col-md-7"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('BreadCrumbs.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
if (isset($_smarty_tpl->tpl_vars['SELECTED_PAGE']->value)) {
echo \App\Language::translate($_smarty_tpl->tpl_vars['SELECTED_PAGE']->value->get('description'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></div><div class="col-md-5"><span class="btn-toolbar pull-right margin0px"><span class="btn-group"><button class="btn btn-success createModule" type="button"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>&nbsp;&nbsp;<strong><?php echo \App\Language::translate('LBL_CREATE_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></span><?php if (vglobal('systemMode') != 'demo') {?><span class="btn-group"><button class="btn btn-primary" type="button" onclick='window.location.href = "<?php echo $_smarty_tpl->tpl_vars['IMPORT_USER_MODULE_URL']->value;?>
"'><span class="glyphicon glyphicon-import" aria-hidden="true"></span>&nbsp;&nbsp;<strong><?php echo \App\Language::translate('LBL_IMPORT_ZIP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></span><?php }?></span></div></div><div class="contents"><table class="table tableRWD table-bordered table-condensed themeTableColor confTable footable-loaded footable"><thead><tr class="blockHeader"><th><span><?php echo \App\Language::translate('LBL_LIBRARY_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></th><th><span><?php echo \App\Language::translate('LBL_LIBRARY_DIR',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></th><th><span><?php echo \App\Language::translate('LBL_LIBRARY_URL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></th><th><span><?php echo \App\Language::translate('LBL_LIBRARY_STATUS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></th><th><span><?php echo \App\Language::translate('LBL_LIBRARY_ACTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Settings_ModuleManager_Library_Model::getAll(), 'LIBRARY', false, 'NAME');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['NAME']->value => $_smarty_tpl->tpl_vars['LIBRARY']->value) {
?><tr><td><strong><?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
</strong></td><td><?php echo $_smarty_tpl->tpl_vars['LIBRARY']->value['dir'];?>
</td><td><a href="<?php echo $_smarty_tpl->tpl_vars['LIBRARY']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['LIBRARY']->value['url'];?>
</a></td><td><?php if ($_smarty_tpl->tpl_vars['LIBRARY']->value['status'] == 1) {?><span class="label label-success bigLabel"><?php echo \App\Language::translate('LBL_LIBRARY_DOWNLOADED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></span><?php } elseif ($_smarty_tpl->tpl_vars['LIBRARY']->value['status'] == 2) {?><span class="label label-warning bigLabel"><?php echo \App\Language::translate('LBL_LIBRARY_NEEDS_UPDATING',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;&nbsp;<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></span><?php } else { ?><span class="label label-danger bigLabel"><?php echo \App\Language::translate('LBL_LIBRARY_NO_DOWNLOAD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;&nbsp;<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span></span><?php }?></td><td class="text-center"><span class="btn-group"><?php if ($_smarty_tpl->tpl_vars['LIBRARY']->value['status'] === 0) {?><a class="btn btn-primary btn-sm" href="index.php?module=ModuleManager&parent=Settings&action=Library&mode=download&name=<?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>&nbsp;&nbsp;<strong><?php echo \App\Language::translate('BTN_LIBRARY_DOWNLOAD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a><?php } else { ?><a class="btn btn-primary btn-sm" href="index.php?module=ModuleManager&parent=Settings&action=Library&mode=update&name=<?php echo $_smarty_tpl->tpl_vars['NAME']->value;?>
"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;&nbsp;<strong><?php echo \App\Language::translate('BTN_LIBRARY_UPDATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a><?php }?></span></td></tr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</tbody></table><br /><?php $_smarty_tpl->_assignInScope('COUNTER', 0);
?><table class="table table-bordered"><tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_MODULES']->value, 'MODULE_MODEL', false, 'MODULE_ID');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_ID']->value => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value) {
$_smarty_tpl->_assignInScope('MODULE_NAME', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'));
$_smarty_tpl->_assignInScope('MODULE_ACTIVE', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isActive());
if ($_smarty_tpl->tpl_vars['COUNTER']->value == 2) {?></tr><tr><?php $_smarty_tpl->_assignInScope('COUNTER', 0);
}?><td class="opacity col-md-6"><div class="moduleManagerBlock"><div class="col-md-1 col-xs-2"><input type="checkbox" value="" name="moduleStatus" data-module="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" data-module-translation="<?php echo \App\Language::translate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
" <?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isActive()) {?>checked<?php }?> /></div><div class="col-md-1 col-xs-2 moduleImage <?php if (!$_smarty_tpl->tpl_vars['MODULE_ACTIVE']->value) {?>dull <?php }?>"><span class="fa-2x userIcon-<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"></span></div><div class="col-xs-8 col-md-4 moduleName <?php if (!$_smarty_tpl->tpl_vars['MODULE_ACTIVE']->value) {?>dull <?php }?>"><h4 class="no-margin"><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</h4></div><div class="col-md-6 col-xs-12"><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('customized')) {?><button class="deleteModule btn btn-danger btn-xs pull-right marginLeft10" name="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><?php echo \App\Language::translate('LBL_DELETE');?>
</button><?php }
if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isExportable()) {?><a class="btn btn-primary btn-xs pull-right marginLeft10" href="index.php?module=ModuleManager&parent=Settings&action=ModuleExport&mode=exportModule&forModule=<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><i class="glyphicon glyphicon-download"></i></a><?php }
$_smarty_tpl->_assignInScope('SETTINGS_LINKS', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getSettingLinks());
if (!in_array($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['RESTRICTED_MODULES_LIST']->value) && (count($_smarty_tpl->tpl_vars['SETTINGS_LINKS']->value) > 0)) {?><div class="btn-group pull-right actions <?php if (!$_smarty_tpl->tpl_vars['MODULE_ACTIVE']->value) {?>hide<?php }?>"><button class="btn dropdown-toggle btn-default" data-toggle="dropdown"><strong><?php echo \App\Language::translate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong>&nbsp;<i class="caret"></i></button><ul class="dropdown-menu pull-right"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SETTINGS_LINKS']->value, 'SETTINGS_LINK');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['SETTINGS_LINK']->value) {
?><li><a <?php if (stripos($_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linkurl'],'javascript:') === 0) {?> onclick='<?php echo substr($_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linkurl'],strlen("javascript:"));?>
;'<?php } else { ?> onclick='window.location.href = "<?php echo $_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linkurl'];?>
"'<?php }?>><?php echo \App\Language::translate($_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linklabel'],$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul></div><?php }?></div><?php $_smarty_tpl->_assignInScope('COUNTER', $_smarty_tpl->tpl_vars['COUNTER']->value+1);
?></td><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</tr></table></div></div>
<?php }
}
