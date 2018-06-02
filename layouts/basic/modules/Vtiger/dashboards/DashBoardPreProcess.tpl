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
	{include file=\App\Layout::getTemplatePath('Header.tpl', $MODULE)}
	<div class="bodyContents">
		<div class="mainContainer">
			<div class="contentsDiv col-md-12 marginLeftZero" id="centerPanel" style="min-height:550px;">
				{include file=\App\Layout::getTemplatePath('dashboards/DashBoardHeader.tpl', $MODULE_NAME) DASHBOARDHEADER_TITLE=\App\Language::translate($MODULE, $MODULE)}
				<div class="dashboardViewContainer">
					{if count($DASHBOARD_TYPES) > 1}
						<ul class="nav nav-tabs massEditTabs selectDashboard">
							{foreach from=$DASHBOARD_TYPES item=DASHBOARD}
								<li {if $CURRENT_DASHBOARD eq $DASHBOARD['dashboard_id']}class="active"{/if} data-id="{$DASHBOARD['dashboard_id']}">
									<a data-toggle="tab"><strong>{\App\Language::translate($DASHBOARD['name'])}</strong></a>
								</li>
							{/foreach}
						</ul>
					{/if}
					{include file=\App\Layout::getTemplatePath('dashboards/DashBoardButtons.tpl', $MODULE)}
				{/strip}
