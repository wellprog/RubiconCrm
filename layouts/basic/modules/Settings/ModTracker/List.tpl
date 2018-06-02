{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	<div id="modTrackerContainer">
		<div class="widget_header row">
			<div class="col-xs-12">
				{include file=\App\Layout::getTemplatePath('BreadCrumbs.tpl', $MODULE)}
				{\App\Language::translate('LBL_MODTRACKER_SETTINGS_DESCRIPTION', $QUALIFIED_MODULE)}	
			</div>
		</div>
		<div class="contents">
			<div class="contents tabbable">
				<table class="table table-bordered table-condensed listViewEntriesTable">
					<thead>
						<tr class="blockHeader">
							<th><strong>{\App\Language::translate('LBL_MODULE',$QUALIFIED_MODULE)}</strong></th>
							<th><strong>{\App\Language::translate('LBL_ACTIVE',$QUALIFIED_MODULE)}</strong></th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$MODULE_MODEL->getModTrackerModules() item=item key=key}
							<tr data-id="{$item.id}">
								<td>{\App\Language::translate($item.module,$item.module)}</td>
								<td>
									<input class="activeModTracker" type="checkbox" name="active" value="1" {if $item.active}checked=""{/if}>
								</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>
{/strip}
