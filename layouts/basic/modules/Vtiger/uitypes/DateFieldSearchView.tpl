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
    {assign var="FIELD_INFO" value=\App\Json::encode($FIELD_MODEL->getFieldInfo())}
    {assign var="dateFormat" value=$USER_MODEL->get('date_format')}
	{if isset($SEARCH_INFO['searchValue'])}
		{assign var=SEARCH_VALUES value=$SEARCH_INFO['searchValue']}
	{else}
		{assign var=SEARCH_VALUES value=''}
	{/if}
    <div class="picklistSearchField">
        <input name="{$FIELD_MODEL->getName()}" class="listSearchContributor dateRangeField form-control" title="{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $MODULE)}" type="text" value="{$SEARCH_VALUES}" data-date-format="{$dateFormat}" data-calendar-type="range" data-fieldinfo='{$FIELD_INFO|escape}'/>
    </div>
{/strip}
