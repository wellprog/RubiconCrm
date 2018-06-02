{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	{assign var="FIELD_INFO" value=\App\Json::encode($FIELD_MODEL->getFieldInfo())}
	{assign var=PICKLIST_VALUES value=$FIELD_MODEL->getPicklistValues()}
	{assign var=SEARCH_VALUES value=explode('##',$SEARCH_INFO['searchValue'])}
	<select name="{$FIELD_MODEL->getName()}" class="select2noactive listSearchContributor form-control" title="{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $MODULE)}" multiple data-fieldinfo='{$FIELD_INFO|escape}'>
		<option value="">{\App\Language::translate('LBL_SELECT_OPTION','Vtiger')}</option>
		{foreach item=PICKLIST_VALUE key=KEY from=$PICKLIST_VALUES}
			<option value="{\App\Purifier::encodeHtml($KEY)}" {if in_array($KEY,$SEARCH_VALUES) && ($KEY neq "") } selected{/if}>{\App\Purifier::encodeHtml(\App\Language::translateSingleMod($KEY,'Other.Country'))}</option>
		{/foreach}
	</select>
{/strip}
