{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
  *
 ********************************************************************************/
-->*}
{strip}
{assign var="FIELD_INFO" value=\App\Purifier::encodeHtml(\App\Json::encode($FIELD_MODEL->getFieldInfo()))}
{assign var="SPECIAL_VALIDATOR" value=$FIELD_MODEL->getValidator()}
{assign var="FIELD_NAME" value=$FIELD_MODEL->getName()}
<div class="checkbox">
	<label>
		<input type="hidden" name="{$FIELD_MODEL->getFieldName()}" value="0" />
		<input name="{$FIELD_MODEL->getFieldName()}" {if $FIELD_MODEL->isEditableReadOnly()}readonly="readonly"{/if} title="{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $MODULE)}" id="{$MODULE}_editView_fieldName_{$FIELD_NAME}" type="checkbox" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
		{if $FIELD_MODEL->getEditViewDisplayValue($FIELD_MODEL->get('fieldvalue'),$RECORD)} checked{/if} value="1" data-fieldinfo='{$FIELD_INFO}' {if !empty($SPECIAL_VALIDATOR)}data-validator={\App\Json::encode($SPECIAL_VALIDATOR)}{/if} />
	</label>
</div>
{/strip}
