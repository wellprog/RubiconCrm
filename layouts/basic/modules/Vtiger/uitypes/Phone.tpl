{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is:  vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
* Contributor(s): YetiForce Sp. z o.o.
********************************************************************************/
-->*}
{strip}
	{assign var="FIELD_INFO" value=\App\Purifier::encodeHtml(\App\Json::encode($FIELD_MODEL->getFieldInfo()))}
	{assign var="SPECIAL_VALIDATOR" value=$FIELD_MODEL->getValidator()}
	{assign var="NUMBER" value=$FIELD_MODEL->get('fieldvalue')}
	{if AppConfig::main('phoneFieldAdvancedVerification',false)}
		{assign var="PHONE_DETAIL" value=App\Fields\Phone::getDetails($NUMBER)}
		{assign var="FIELD_NAME_EXTRA" value=$FIELD_MODEL->getFieldName()|cat:'_extra'}
		{assign var="FIELD_MODEL_EXTRA" value=$FIELD_MODEL->getModule()->getFieldByName($FIELD_NAME_EXTRA)}
		{assign var="ACTIVE_EXTRA_FIELD" value=$FIELD_MODEL_EXTRA && $FIELD_MODEL_EXTRA->isWritable()}
		<div class="row">
			<div class="{if $ACTIVE_EXTRA_FIELD}col-md-8{else}col-md-12{/if}">
				<div class="input-group phoneGroup">
					<div class="input-group-addon noSpaces">
						<select name="{$FIELD_MODEL->getFieldName()}_country" id="{$MODULE}_editView_fieldName_{$FIELD_MODEL->getName()}_dropDown" class="chzn-select phoneCountryList" required="required">
							{foreach key=KEY item=ROW from=App\Fields\Country::getAll('phone')}
								{assign var="TRANSLATE" value=\App\Language::translateSingleMod($ROW['name'],'Other.Country')}
								<option value="{$KEY}" {if $PHONE_DETAIL && $PHONE_DETAIL['country'] == $KEY} selected {/if} title="{$TRANSLATE}">{$TRANSLATE}</option>
							{/foreach}
						</select>
					</div>
					{if $PHONE_DETAIL['geocoding'] || $PHONE_DETAIL['carrier']}
						{assign var="TITLE" value=$PHONE_DETAIL['geocoding']|cat:' '|cat:$PHONE_DETAIL['carrier']}
					{else}
						{assign var="TITLE" value=\App\Language::translate($FIELD_MODEL->getFieldLabel(), $MODULE)}
					{/if}
					{if $PHONE_DETAIL}
						{assign var="NUMBER" value=$PHONE_DETAIL['number']}
					{/if}
					<input name="{$FIELD_MODEL->getFieldName()}" class="form-control" value="{$NUMBER}" id="{$MODULE}_editView_fieldName_{$FIELD_MODEL->getName()}" title="{$TITLE}" placeholder="{$TITLE}" type="text"  data-validation-engine="validate[{if $FIELD_MODEL->isMandatory() eq true} required,{/if}funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" data-advanced-verification="1"  data-fieldinfo='{$FIELD_INFO}' {if !empty($SPECIAL_VALIDATOR)}data-validator={\App\Json::encode($SPECIAL_VALIDATOR)}{/if} {if $FIELD_MODEL->isEditableReadOnly()}readonly="readonly"{/if} {if $FIELD_MODEL->get('fieldparams') != ''}data-inputmask="'mask': '{$FIELD_MODEL->get('fieldparams')}'"{/if} />
				</div>
			</div>
			{if $ACTIVE_EXTRA_FIELD}
				<div class="col-md-4">
					{assign var="FIELD_INFO" value=\App\Purifier::encodeHtml(\App\Json::encode($FIELD_MODEL_EXTRA->getFieldInfo()))}
					{assign var="SPECIAL_VALIDATOR" value=$FIELD_MODEL_EXTRA->getValidator()}
					<input name="{$FIELD_NAME_EXTRA}" class="form-control" title="{\App\Language::translate($FIELD_MODEL_EXTRA->getFieldLabel(), $MODULE)}" placeholder="{\App\Language::translate($FIELD_MODEL_EXTRA->getFieldLabel(), $MODULE)}" value="{if $RECORD}{$FIELD_MODEL_EXTRA->getEditViewDisplayValue($RECORD->get($FIELD_NAME_EXTRA), $RECORD)}{/if}" id="{$MODULE}_editView_fieldName_{$FIELD_NAME_EXTRA}" type="text"  data-validation-engine="validate[{if $FIELD_MODEL_EXTRA->isMandatory() eq true} required,{/if}funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" data-fieldinfo='{$FIELD_INFO}' {if !empty($SPECIAL_VALIDATOR)}data-validator={\App\Json::encode($SPECIAL_VALIDATOR)}{/if} {if $FIELD_MODEL_EXTRA->isEditableReadOnly()}readonly="readonly"{/if} {if $FIELD_MODEL_EXTRA->get('fieldparams') != ''}data-inputmask="'mask': '{$FIELD_MODEL_EXTRA->get('fieldparams')}'"{/if}/>
				</div>
			{/if}
		</div>
	{else}
		<input name="{$FIELD_MODEL->getFieldName()}" value="{\App\Purifier::encodeHtml($NUMBER)}" id="{$MODULE}_editView_fieldName_{$FIELD_MODEL->getName()}" title="{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $MODULE)}" placeholder="{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $MODULE)}" type="text" class="form-control" data-validation-engine="validate[{if $FIELD_MODEL->isMandatory() eq true} required,{/if}funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" data-advanced-verification="0" data-fieldinfo='{$FIELD_INFO}' {if !empty($SPECIAL_VALIDATOR)}data-validator={\App\Json::encode($SPECIAL_VALIDATOR)}{/if} {if $FIELD_MODEL->isEditableReadOnly()}readonly="readonly"{/if} {if $FIELD_MODEL->get('fieldparams') != ''}data-inputmask="'mask': '{$FIELD_MODEL->get('fieldparams')}'"{/if} />
	{/if}
{/strip}
