<?php
/* Smarty version 3.1.31, created on 2018-06-15 21:04:33
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/OperationNotPermitted.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b23ffb12eb5f6_38790810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2845cb27a6d270e3feb9f50d855cfab49c624b3a' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/OperationNotPermitted.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b23ffb12eb5f6_38790810 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE html>
<html><head><title>Yetiforce: <?php echo \App\Language::translate('LBL_ERROR');?>
</title><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="SHORTCUT ICON" href="<?php echo \App\Layout::getImagePath('favicon.ico');?>
"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link rel="stylesheet" href="<?php echo \App\Layout::getPublicUrl('libraries/bootstrap/css/bootstrap.css');?>
" type="text/css" media="screen"><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo \App\Layout::getPublicUrl('libraries/jquery/jquery.js');?>
"><?php echo '</script'; ?>
></head><body><div style="margin-top: 10px;" class="alert alert-danger shadow"><div style="position: relative;" ><div><h2 class="alert-heading"><?php echo \App\Language::translate('LBL_ERROR');?>
</h2><p><?php echo \App\Purifier::encodeHtml($_smarty_tpl->tpl_vars['MESSAGE']->value);?>
</p><p class="Buttons"><a class="btn btn-warning" href="javascript:window.history.back();"><?php echo \App\Language::translate('LBL_GO_BACK');?>
</a><a class="btn btn-info" href="index.php"><?php echo \App\Language::translate('LBL_MAIN_PAGE');?>
</a></p></div></div></div></body></html>
<?php }
}
