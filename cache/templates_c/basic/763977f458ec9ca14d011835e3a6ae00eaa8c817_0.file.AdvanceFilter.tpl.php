<?php
/* Smarty version 3.1.31, created on 2018-06-17 10:11:40
  from "/var/www/RubiconCrm/layouts/basic/modules/Vtiger/AdvanceFilter.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2609acc0fe29_42853452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '763977f458ec9ca14d011835e3a6ae00eaa8c817' => 
    array (
      0 => '/var/www/RubiconCrm/layouts/basic/modules/Vtiger/AdvanceFilter.tpl',
      1 => 1529085719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2609acc0fe29_42853452 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_assignInScope('ALL_CONDITION_CRITERIA', $_smarty_tpl->tpl_vars['ADVANCE_CRITERIA']->value[1]);
$_smarty_tpl->_assignInScope('ANY_CONDITION_CRITERIA', $_smarty_tpl->tpl_vars['ADVANCE_CRITERIA']->value[2]);
if (empty($_smarty_tpl->tpl_vars['ALL_CONDITION_CRITERIA']->value)) {
$_smarty_tpl->_assignInScope('ALL_CONDITION_CRITERIA', array());
}
if (empty($_smarty_tpl->tpl_vars['ANY_CONDITION_CRITERIA']->value)) {
$_smarty_tpl->_assignInScope('ANY_CONDITION_CRITERIA', array());
}?><div class="filterContainer"><input type="hidden" name="date_filters" data-value='<?php echo \App\Purifier::encodeHtml(\App\Json::encode($_smarty_tpl->tpl_vars['DATE_FILTERS']->value));?>
' /><input type="hidden" name="advanceFilterOpsByFieldType" data-value='<?php echo \App\Json::encode($_smarty_tpl->tpl_vars['ADVANCED_FILTER_OPTIONS_BY_TYPE']->value);?>
' /><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ADVANCED_FILTER_OPTIONS']->value, 'ADVANCE_FILTER_OPTION', false, 'ADVANCE_FILTER_OPTION_KEY');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTION_KEY']->value => $_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTION']->value) {
ob_start();
echo \App\Language::translate($_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTION']->value,$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1=ob_get_clean();
$_tmp_array = isset($_smarty_tpl->tpl_vars['ADVANCED_FILTER_OPTIONS']) ? $_smarty_tpl->tpl_vars['ADVANCED_FILTER_OPTIONS']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['ADVANCE_FILTER_OPTION_KEY']->value] = htmlspecialchars($_prefixVariable1, ENT_QUOTES, 'UTF-8', true);
$_smarty_tpl->_assignInScope('ADVANCED_FILTER_OPTIONS', $_tmp_array);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
<input type="hidden" name="advanceFilterOptions" data-value='<?php echo \App\Json::encode($_smarty_tpl->tpl_vars['ADVANCED_FILTER_OPTIONS']->value);?>
' /><div class="allConditionContainer conditionGroup contentsBackground well"><div class="header"><span><strong><?php echo \App\Language::translate('LBL_ALL_CONDITIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span>&nbsp;<span>(<?php echo \App\Language::translate('LBL_ALL_CONDITIONS_DESC',$_smarty_tpl->tpl_vars['MODULE']->value);?>
)</span></div><div class="contents"><div class="conditionList"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_CONDITION_CRITERIA']->value['columns'], 'CONDITION_INFO');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['CONDITION_INFO']->value) {
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('AdvanceFilterCondition.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'CONDITION_INFO'=>$_smarty_tpl->tpl_vars['CONDITION_INFO']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE']->value), 0, true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div><div class="hide basic"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('AdvanceFilterCondition.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'CONDITION_INFO'=>array(),'MODULE'=>$_smarty_tpl->tpl_vars['MODULE']->value,'NOCHOSEN'=>true), 0, true);
?>
</div><div class="addCondition"><button type="button" class="btn btn-default pushDown"><strong><?php echo \App\Language::translate('LBL_ADD_CONDITION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div><div class="groupCondition"><?php $_smarty_tpl->_assignInScope('GROUP_CONDITION', $_smarty_tpl->tpl_vars['ALL_CONDITION_CRITERIA']->value['condition']);
if (empty($_smarty_tpl->tpl_vars['GROUP_CONDITION']->value)) {
$_smarty_tpl->_assignInScope('GROUP_CONDITION', "and");
}?><input type="hidden" name="condition" value="<?php echo $_smarty_tpl->tpl_vars['GROUP_CONDITION']->value;?>
" /></div></div></div><div class="anyConditionContainer conditionGroup contentsBackground well"><div class="header"><span><strong><?php echo \App\Language::translate('LBL_ANY_CONDITIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span>&nbsp;<span>(<?php echo \App\Language::translate('LBL_ANY_CONDITIONS_DESC',$_smarty_tpl->tpl_vars['MODULE']->value);?>
)</span></div><div class="contents"><div class="conditionList"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ANY_CONDITION_CRITERIA']->value['columns'], 'CONDITION_INFO');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['CONDITION_INFO']->value) {
$_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('AdvanceFilterCondition.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'CONDITION_INFO'=>$_smarty_tpl->tpl_vars['CONDITION_INFO']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE']->value,'CONDITION'=>"or"), 0, true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</div><div class="hide basic"><?php $_smarty_tpl->_subTemplateRender(\App\Layout::getTemplatePath('AdvanceFilterCondition.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE']->value,'CONDITION_INFO'=>array(),'CONDITION'=>"or",'NOCHOSEN'=>true), 0, true);
?>
</div><div class="addCondition"><button type="button" class="btn btn-default pushDown"><strong><?php echo \App\Language::translate('LBL_ADD_CONDITION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div></div></div></div>
<?php }
}
