{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	<div class="widget_header row ">
		<div class="col-xs-12">
			{include file=\App\Layout::getTemplatePath('BreadCrumbs.tpl', $MODULE)}
			{\App\Language::translate('LBL_'|cat:$MODULE|upper|cat:'_DESCRIPTION', $QUALIFIED_MODULE)}
		</div>
	</div>
{/strip}
