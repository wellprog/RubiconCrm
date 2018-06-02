{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	{assign var="FIELD_INFO" value=\App\Purifier::encodeHtml(\App\Json::encode($FIELD_MODEL->getFieldInfo()))}
	{assign var=PICKLIST_VALUES value=$FIELD_MODEL->getPicklistValues()}
	<select name="{$FIELD_MODEL->getName()}" class="select2 form-control col-md-12 listSearchContributor" title="{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $MODULE)}" data-fieldinfo='{$FIELD_INFO}' {if $FIELD_MODEL->isMandatory() eq true} {/if} {if $FIELD_MODEL->isEditableReadOnly()}readonly="readonly"{/if}>
		<option value="">{\App\Language::translate('LBL_SELECT_OPTION','Vtiger')}</option>
		{foreach item=PICKLIST_VALUE key=KEY from=$PICKLIST_VALUES}
			<option value="{\App\Purifier::encodeHtml($KEY)}">{\App\Purifier::encodeHtml($PICKLIST_VALUE['name'])}</option>
		{/foreach}
	</select>
{/strip}


