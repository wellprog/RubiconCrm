<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:17
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/SystemWarnings/YetiForce/Newsletter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb49e39e85_92062836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3cc5d95f1e8fa43b7d0d5b3d4cbd0f9cb05ae06' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/SystemWarnings/YetiForce/Newsletter.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb49e39e85_92062836 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3 class="marginTB3"><?php echo App\Language::translate('LBL_SAVE_TO_NEWSLETTER','Settings:SystemWarnings');?>
</h3><p><?php echo App\Language::translate('LBL_NEWSLETTER_DESC','Settings:SystemWarnings');?>
</p><form class="form-horizontal row validateForm" method="post" action="index.php"><div class="form-group"><label class="col-sm-3 control-label"><span class="redColor">*</span><?php echo App\Language::translate('First Name');?>
</label><div class="col-sm-9"><input type="text" name="first_name" class="form-control" placeholder="<?php echo App\Language::translate('First Name');?>
" data-validation-engine="validate[required]"></div></div><div class="form-group"><label class="col-sm-3 control-label"><?php echo App\Language::translate('Last Name');?>
</label><div class="col-sm-9"><input type="text" name="last_name" class="form-control" placeholder="<?php echo App\Language::translate('Last Name');?>
"></div></div><div class="form-group"><label class="col-sm-3 control-label"><span class="redColor">*</span><?php echo App\Language::translate('LBL_EMAIL_ADRESS');?>
</label><div class="col-sm-9"><input type="text" name="email" class="form-control" placeholder="<?php echo App\Language::translate('LBL_EMAIL_ADRESS');?>
" data-validation-engine="validate[required,custom[email]]"></div></div><div class="pull-right"><button type="button" class="btn btn-success ajaxBtn"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo App\Language::translate('LBL_SAVE','Settings:SystemWarnings');?>
</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger cancel"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo App\Language::translate('LBL_REMIND_LATER','Settings:SystemWarnings');?>
</button></div></form>
<?php }
}
