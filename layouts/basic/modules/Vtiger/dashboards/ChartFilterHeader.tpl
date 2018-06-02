{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	<div class="dashboardWidgetHeader">
		<div class="row">
			<div class="col-md-7">
				<div class="dashboardTitle" title="{\App\Language::translate($WIDGET->getTitle(), $MODULE_NAME)}"><strong>&nbsp;&nbsp;{\App\Language::translate($WIDGET->getTitle(), $MODULE_NAME)}</strong></div>
			</div>
			<div class="col-md-5">
				<div class="box pull-right">
					<button class="btn btn-xs btn-default downloadWidget hidden" data-widgetid="{$CHART_MODEL->get('widgetid')}">
						<span class="glyphicon glyphicon-download" title="{\App\Language::translate('LBL_WIDGET_DOWNLOAD','Home')}"></span>
					</button>&nbsp;
					<button class="btn btn-xs btn-default printWidget hidden" data-widgetid="{$CHART_MODEL->get('widgetid')}">
						<span class="glyphicon glyphicon-print" title="{\App\Language::translate('LBL_WIDGET_PRINT','Home')}"></span>
					</button>&nbsp;
					<button class="btn btn-xs btn-default recordCount" data-url="{\App\Purifier::encodeHtml($CHART_MODEL->getTotalCountURL())}">
						<span class="glyphicon glyphicon-equalizer" title="{\App\Language::translate('LBL_WIDGET_FILTER_TOTAL_COUNT_INFO')}"></span>
						<a class="pull-left hide" href="{\App\Purifier::encodeHtml($CHART_MODEL->getListViewURL())}">
							<span class="count badge pull-left"></span>
						</a>
					</button>
					{include file=\App\Layout::getTemplatePath('dashboards/DashboardHeaderIcons.tpl', $MODULE_NAME)}
				</div>
			</div>
		</div>
		{assign var="WIDGET_DATA" value=$WIDGET->getArray('data')}
		{if $WIDGET_DATA['timeRange'] || $WIDGET_DATA['showOwnerFilter']}
			<hr class="widgetHr" />
		{/if}
		<div class="row">
			{if $WIDGET_DATA['timeRange']}
				<div class="col-md-6">
					<div class="input-group input-group-sm">
						<span class=" input-group-addon"><span class="glyphicon glyphicon-calendar iconMiddle "></span></span>
						<input type="text" name="time" title="{\App\Language::translate('LBL_CHOOSE_DATE')}" placeholder="{\App\Language::translate('LBL_CHOOSE_DATE')}" class="dateRangeField widgetFilter width90 form-control" />
					</div>	
				</div>
			{/if}
			{if $WIDGET_DATA['showOwnerFilter']}
				<div class="col-md-6 ownersFilter">
					<div class="input-group input-group-sm">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user iconMiddle" title="{\App\Language::translate('Assigned To')}"></span></span>
						<select class="widgetFilter select2 width90 owner form-control input-sm" name="owner" title="{\App\Language::translate('LBL_OWNER')}">
							<option value="0">{\App\Language::translate('LBL_ALL_OWNERS','Home')}</option>
						</select>
					</div>
				</div>
			{/if}
		</div>
	</div>
	<div class="dashboardWidgetContent">
		{include file=\App\Layout::getTemplatePath('dashboards/ChartFilterContents.tpl', $MODULE_NAME) WIDGET=$WIDGET}
	</div>
{/strip}
