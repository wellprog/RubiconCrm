<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:04
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/Header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb3cea9599_00214596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34f7003aed275bc749bb4ac48f28026e9ba77fde' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/Header.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb3cea9599_00214596 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html><html lang="<?php echo $_smarty_tpl->tpl_vars['HTMLLANG']->value;?>
"><head><title><?php echo $_smarty_tpl->tpl_vars['PAGETITLE']->value;?>
</title><link REL="SHORTCUT ICON" HREF="<?php echo \App\Layout::getImagePath('favicon.ico');?>
"><meta name="viewport" content="width=device-width, initial-scale=1.0" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="robots" content="noindex,nofollow" /><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['STYLES']->value, 'cssModel', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['cssModel']->value) {
?><link rel="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getRel();?>
" href="<?php echo $_smarty_tpl->tpl_vars['cssModel']->value->getHref();?>
" /><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['HEADER_SCRIPTS']->value, 'jsModel', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['jsModel']->value) {
echo '<script'; ?>
 type="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getType();?>
" src="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getSrc();?>
"><?php echo '</script'; ?>
><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
<!--[if IE]><?php echo '<script'; ?>
 type="text/javascript" src="libraries/html5shim/html5.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="libraries/html5shim/respond.js"><?php echo '</script'; ?>
><![endif]--><?php $_smarty_tpl->_assignInScope('HEAD_LOCKS', $_smarty_tpl->tpl_vars['USER_MODEL']->value->getHeadLocks());
if ($_smarty_tpl->tpl_vars['HEAD_LOCKS']->value) {
echo '<script'; ?>
 type="text/javascript"><?php echo $_smarty_tpl->tpl_vars['HEAD_LOCKS']->value;
echo '</script'; ?>
><?php }
if (\App\Debuger::isDebugBar()) {
echo \App\Debuger::getDebugBar()->getJavascriptRenderer(\App\Debuger::getJavascriptPath())->renderHead();
}?></head><body data-language="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
" data-skinpath="<?php echo $_smarty_tpl->tpl_vars['SKIN_PATH']->value;?>
" data-layoutpath="<?php echo $_smarty_tpl->tpl_vars['LAYOUT_PATH']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->getBodyLocks();?>
><div id="js_strings" class="hide noprint"><?php echo \App\Json::encode($_smarty_tpl->tpl_vars['LANGUAGE_STRINGS']->value);?>
</div><div id="configuration"><input type="hidden" id="start_day" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('dayoftheweek');?>
" /><input type="hidden" id="row_type" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('rowheight');?>
" /><input type="hidden" id="current_user_id" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('id');?>
" /><input type="hidden" id="userDateFormat" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('date_format');?>
" /><input type="hidden" id="userTimeFormat" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('hour_format');?>
" /><input type="hidden" id="numberOfCurrencyDecimal" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('no_of_currency_decimals');?>
" /><input type="hidden" id="currencyGroupingSeparator" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('currency_grouping_separator');?>
" /><input type="hidden" id="currencyDecimalSeparator" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('currency_decimal_separator');?>
" /><input type="hidden" id="currencyGroupingPattern" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('currency_grouping_pattern');?>
" /><input type="hidden" id="truncateTrailingZeros" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('truncate_trailing_zeros');?>
" /><input type="hidden" id="backgroundClosingModal" value="<?php echo vglobal('backgroundClosingModal');?>
" /><input type="hidden" id="gsAutocomplete" value="<?php echo AppConfig::search('GLOBAL_SEARCH_AUTOCOMPLETE');?>
" /><input type="hidden" id="gsMinLength" value="<?php echo AppConfig::search('GLOBAL_SEARCH_AUTOCOMPLETE_MIN_LENGTH');?>
" /><input type="hidden" id="gsAmountResponse" value="<?php echo AppConfig::search('GLOBAL_SEARCH_AUTOCOMPLETE_LIMIT');?>
" /><input type="hidden" id="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" id="parent" value="<?php echo $_smarty_tpl->tpl_vars['PARENT_MODULE']->value;?>
" /><input type="hidden" id="view" value="<?php echo $_smarty_tpl->tpl_vars['VIEW']->value;?>
" /><input type="hidden" id="sounds" value="<?php echo \App\Purifier::encodeHtml(\App\Json::encode(AppConfig::sounds()));?>
" /><input type="hidden" id="intervalForNotificationNumberCheck" value="<?php echo AppConfig::performance('INTERVAL_FOR_NOTIFICATION_NUMBER_CHECK');?>
" /><input type="hidden" id="fieldsReferencesDependent" value="<?php echo AppConfig::security('FIELDS_REFERENCES_DEPENDENT');?>
" /><?php if (\App\Session::has('ShowUserPasswordChange')) {?><input type="hidden" id="showUserPasswordChange" value="<?php echo \App\Session::get('ShowUserPasswordChange');?>
" /><?php if (\App\Session::get('ShowUserPasswordChange') == 1) {
echo \App\Session::delete('ShowUserPasswordChange');
}
}?></div><div id="page"><?php if ($_smarty_tpl->tpl_vars['SHOW_BODY_HEADER']->value) {
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('Body.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
}
