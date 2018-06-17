<?php
/* Smarty version 3.1.31, created on 2018-06-17 09:10:17
  from "/var/www/RubiconCrm/layouts/basic/modules/Settings/SystemWarnings/YetiForce/Stats.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b25fb49e1dcf3_13391499',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5da081cdd2330c097bfa834eb3538fbdc8c584a' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Settings/SystemWarnings/YetiForce/Stats.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25fb49e1dcf3_13391499 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form class="form-horizontal row validateForm" method="post" action="index.php"><h3 class="marginTB3"><?php echo App\Language::translate('LBL_STATS','Settings:SystemWarnings');?>
</h3><p><?php echo App\Language::translate('LBL_STATS_DESC','Settings:SystemWarnings');?>
</p><?php $_smarty_tpl->_assignInScope('COMPANY', \App\Company::getInstanceById());
?><div class="input-group"><span class="input-group-addon"><input type="checkbox" checked disabled></span><input type="text" name="company_name" class="form-control" data-validation-engine="validate[required]" placeholder="<?php echo App\Language::translate('LBL_NAME','Settings:Companies');?>
" value="<?php echo $_smarty_tpl->tpl_vars['COMPANY']->value->get('name');?>
"></div><br /><div class="input-group"><span class="input-group-addon"><input type="checkbox" checked disabled></span><select class="select2 form-control" name="company_industry" data-validation-engine="validate[required]"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Settings_Companies_Module_Model::getIndustryList(), 'ITEM');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ITEM']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['ITEM']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['COMPANY']->value->get('industry') == $_smarty_tpl->tpl_vars['ITEM']->value) {?>selected<?php }?>><?php echo App\Language::translate($_smarty_tpl->tpl_vars['ITEM']->value);?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</select></div><br /><div class="input-group"><span class="input-group-addon"><input type="checkbox" checked disabled></span><input type="text" name="company_city" class="form-control" data-validation-engine="validate[required]" placeholder="<?php echo App\Language::translate('LBL_CITY','Settings:Companies');?>
" value="<?php echo $_smarty_tpl->tpl_vars['COMPANY']->value->get('city');?>
"></div><br /><div class="input-group"><span class="input-group-addon"><input type="checkbox" checked disabled></span><input type="text" name="company_country" class="form-control" data-validation-engine="validate[required]" placeholder="<?php echo App\Language::translate('LBL_COUNTRY','Settings:Companies');?>
" value="<?php echo $_smarty_tpl->tpl_vars['COMPANY']->value->get('country');?>
"></div><br /><div class="input-group"><span class="input-group-addon"><input type="checkbox" checked></span><input type="text" name="company_website" class="form-control" placeholder="<?php echo App\Language::translate('LBL_WEBSITE','Settings:Companies');?>
" value="<?php echo $_smarty_tpl->tpl_vars['COMPANY']->value->get('website');?>
"></div><br /><div class="input-group"><span class="input-group-addon"><input type="checkbox" checked></span><input type="text" name="company_email" class="form-control" placeholder="<?php echo App\Language::translate('LBL_EMAIL','Settings:Companies');?>
" value="<?php echo $_smarty_tpl->tpl_vars['COMPANY']->value->get('email');?>
"></div><br /><div class="pull-right"><button type="button" class="btn btn-success ajaxBtn"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo App\Language::translate('LBL_SEND','Settings:SystemWarnings');?>
</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger cancel"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo App\Language::translate('LBL_REMIND_LATER','Settings:SystemWarnings');?>
</button></div><div class="clearfix"></div></form>
<?php }
}
