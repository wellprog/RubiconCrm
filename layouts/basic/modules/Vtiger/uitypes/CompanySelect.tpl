{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	{assign var="FIELD_INFO" value=\App\Purifier::encodeHtml(\App\Json::encode($FIELD_MODEL->getFieldInfo()))}
	{assign var=PICKLIST_VALUES value=$FIELD_MODEL->getPicklistValues()}
	{assign var=FIELD_VALUE value=$FIELD_MODEL->get('fieldvalue')}
	<input type="hidden" name="{$FIELD_MODEL->getFieldName()}" value="" />
	<select name="{$FIELD_MODEL->getName()}" class="chzn-select form-control col-md-12" title="{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $MODULE)}" id="{$MODULE}_{$VIEW}_fieldName_{$FIELD_MODEL->getName()}" data-fieldinfo='{$FIELD_INFO}' {if $FIELD_MODEL->isMandatory() eq true} {/if} {if $FIELD_MODEL->isEditableReadOnly()}readonly="readonly"{/if}>
		<option value="">{\App\Language::translate('LBL_SELECT_OPTION','Vtiger')}</option>
		{foreach item=PICKLIST_VALUE key=KEY from=$PICKLIST_VALUES}
			<option value="{\App\Purifier::encodeHtml($KEY)}" {if $KEY eq $FIELD_VALUE} selected {/if}>
				{if $PICKLIST_VALUE['default']}
					{\App\Purifier::encodeHtml(\App\Language::translate('PLL_DEFAULT', $MODULE))}
				{else}
					{\App\Purifier::encodeHtml($PICKLIST_VALUE['name'])}
				{/if}
			</option>
		{/foreach}
	</select>
{/strip}


