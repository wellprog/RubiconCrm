<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:05
  from "/var/www/RubiconCrm/layouts/basic/modules/Users/Login.Default.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb3d2ebf34_70456969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1537cc5c9a179ba3bf0c1d65cebe8493711034ab' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Users/Login.Default.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb3d2ebf34_70456969 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_assignInScope('MODULE', 'Users');
?><div class="container"><div id="login-area" class="login-area"><div class="login-space"></div><div class="logo"><img title="<?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get('name');?>
" height="<?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get('logo_login_height');?>
px" class="logo" src="<?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->getLogo('logo_login')->get('imageUrl');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value->get('name');?>
"></div><div class="" id="loginDiv"><?php if (!$_smarty_tpl->tpl_vars['IS_BLOCKED_IP']->value) {?><div class='fieldContainer marginLeft0 marginRight0 row col-md-12'><form class="login-form" action="index.php?module=Users&action=Login" method="POST" <?php if (!AppConfig::security('LOGIN_PAGE_REMEMBER_CREDENTIALS')) {?>autocomplete="off"<?php }?>><div class='marginLeft0  marginRight0 row col-xs-10'><div class="form-group first-group has-feedback"><label for="username" class="sr-only"><?php echo \App\Language::translate('LBL_USER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><input name="username" type="text" id="username" class="form-control input-lg" <?php if (vglobal('systemMode') == 'demo') {?>value="demo"<?php }?> placeholder="<?php echo \App\Language::translate('LBL_USER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" required="" <?php if (!AppConfig::security('LOGIN_PAGE_REMEMBER_CREDENTIALS')) {?>autocomplete="off"<?php }?> autofocus=""><span class="adminIcon-user form-control-feedback" aria-hidden="true"></span></div><div class="form-group <?php if ($_smarty_tpl->tpl_vars['LANGUAGE_SELECTION']->value || $_smarty_tpl->tpl_vars['LAYOUT_SELECTION']->value) {?>first-group <?php }?> has-feedback"><label for="password" class="sr-only"><?php echo \App\Language::translate('Password',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><input name="password" type="password" class="form-control input-lg" title="<?php echo \App\Language::translate('Password',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" id="password" name="password" <?php if (vglobal('systemMode') == 'demo') {?>value="demo"<?php }?> <?php if (!AppConfig::security('LOGIN_PAGE_REMEMBER_CREDENTIALS')) {?>autocomplete="off"<?php }?> placeholder="<?php echo \App\Language::translate('Password',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><span class="userIcon-OSSPasswords form-control-feedback" aria-hidden="true"></span></div><?php $_smarty_tpl->_assignInScope('COUNTERFIELDS', 2);
if ($_smarty_tpl->tpl_vars['LANGUAGE_SELECTION']->value) {
$_smarty_tpl->_assignInScope('COUNTERFIELDS', $_smarty_tpl->tpl_vars['COUNTERFIELDS']->value+1);
$_smarty_tpl->_assignInScope('DEFAULT_LANGUAGE', AppConfig::main('default_language'));
?><div class="form-group <?php if ($_smarty_tpl->tpl_vars['LAYOUT_SELECTION']->value) {?>first-group <?php }?>"><select class="input-lg form-control" title="<?php echo \App\Language::translate('LBL_CHOOSE_LANGUAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" name="loginLanguage"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, \App\Language::getAll(), 'VALUE', false, 'KEY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['KEY']->value => $_smarty_tpl->tpl_vars['VALUE']->value) {
?><option <?php if ($_smarty_tpl->tpl_vars['KEY']->value == $_smarty_tpl->tpl_vars['DEFAULT_LANGUAGE']->value) {?> selected <?php }?>  value="<?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['KEY']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['VALUE']->value;?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select></div><?php }
if ($_smarty_tpl->tpl_vars['LAYOUT_SELECTION']->value) {
$_smarty_tpl->_assignInScope('COUNTERFIELDS', $_smarty_tpl->tpl_vars['COUNTERFIELDS']->value+1);
?><div class="form-group"><select class="input-lg form-control" title="<?php echo \App\Language::translate('LBL_SELECT_LAYOUT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" name="layout"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, \App\Layout::getAllLayouts(), 'VALUE', false, 'KEY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['KEY']->value => $_smarty_tpl->tpl_vars['VALUE']->value) {
?><option value="<?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['KEY']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['VALUE']->value;?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select></div><?php }?></div><div class='col-xs-2 marginRight0' ><button class="btn btn-lg btn-primary btn-block heightDiv_<?php echo $_smarty_tpl->tpl_vars['COUNTERFIELDS']->value;?>
" type="submit" title="<?php echo \App\Language::translate('LBL_SIGN_IN',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
"><strong>></strong></button></div></form></div><?php if (AppConfig::security('RESET_LOGIN_PASSWORD') && App\Mail::getDefaultSmtp()) {?><div class="form-group"><div class=""><a href="#" id="forgotpass" ><?php echo \App\Language::translate('ForgotPassword',$_smarty_tpl->tpl_vars['MODULE']->value);?>
?</a></div></div><?php }
}?><div class="form-group col-xs-12 noPadding"><?php if ($_smarty_tpl->tpl_vars['MESSAGE']->value) {?><div class="alert <?php if ($_smarty_tpl->tpl_vars['MESSAGE_TYPE']->value === 'success') {?>alert-success<?php } elseif ($_smarty_tpl->tpl_vars['MESSAGE_TYPE']->value === 'error') {?>alert-danger<?php } else { ?>alert-warning<?php }?>"><p><?php echo $_smarty_tpl->tpl_vars['MESSAGE']->value;?>
</p></div><?php }
if ($_smarty_tpl->tpl_vars['IS_BLOCKED_IP']->value) {?><div class="alert alert-danger"><div class="row"><div class="col-md-2"><span style="font-size: 60px;" class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></div><div class="col-md-10"><p><?php echo \App\Language::translate('LBL_IP_IS_BLOCKED',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</p></div></div></div><?php }?></div></div><?php if (AppConfig::security('RESET_LOGIN_PASSWORD') && App\Mail::getDefaultSmtp()) {?><div class="hide" id="forgotPasswordDiv"><div class='fieldContainer marginLeft0 marginRight0 row col-md-12'><form class="forgot-form" action="index.php?module=Users&action=ForgotPassword" method="POST"><div class='marginLeft0  marginRight0 row col-xs-10'><div class="form-group first-group has-feedback"><label for="usernameFp" class="sr-only"><?php echo \App\Language::translate('LBL_USER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><input type="text" class="form-control input-lg" title="<?php echo \App\Language::translate('LBL_USER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" id="usernameFp" name="user_name" placeholder="<?php echo \App\Language::translate('LBL_USER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><span class="adminIcon-user form-control-feedback" aria-hidden="true"></span></div><div class="form-group has-feedback"><label for="emailId" class="sr-only"><?php echo \App\Language::translate('LBL_EMAIL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><input type="text" class="form-control input-lg" autocomplete="off" title="<?php echo \App\Language::translate('LBL_EMAIL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" id="emailId" name="emailId" placeholder="Email"><span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span></div></div><div class='col-xs-2 marginRight0' ><button type="submit" style='height:102px' id="retrievePassword" class="btn btn-lg btn-primary btn-block sbutton" title="Retrieve Password"><strong>></strong></button></div></form></div><div class="login-text form-group"><a href="#" id="backButton" ><?php echo \App\Language::translate('LBL_TO_CRM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div></div><?php }?></div></div><?php echo '<script'; ?>
>
		jQuery(document).ready(function () {
			jQuery("button.close").click(function () {
				jQuery(".visible-phone").css('visibility', 'hidden');
			});
			jQuery("a#forgotpass").click(function () {
				jQuery("#loginDiv").hide();
				jQuery("#forgotPasswordDiv").removeClass('hide');
				jQuery("#forgotPasswordDiv").show();
			});
			jQuery("a#backButton").click(function () {
				jQuery("#loginDiv").removeClass('hide');
				jQuery("#loginDiv").show();
				jQuery("#forgotPasswordDiv").hide();
			});
			jQuery("form.forgot-form").submit(function (event) {
				if ($("#usernameFp").val() === "" || $("#emailId").val() === "") {
					event.preventDefault();
				}
			});
		});
	<?php echo '</script'; ?>
>
<?php }
}
