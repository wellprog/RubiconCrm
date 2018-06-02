{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	<div class="">
		<div class="widget_header row">
			<div class="col-xs-12">
				{include file=\App\Layout::getTemplatePath('BreadCrumbs.tpl', $MODULE)}
				&nbsp;{\App\Purifier::encodeHtml(\App\Language::translate('LBL_COUNTRY_DESCRIPTION', $QUALIFIED_MODULE))}
			</div>
		</div>
		<div class="contents">
			{assign var=WIDTHTYPE value=$USER_MODEL->get('rowheight')}
			<table class="table tableRWD table-bordered table-condensed listViewEntriesTable">
				<thead>
					<tr class="listViewHeaders">
						<th width="1%" class="{$WIDTHTYPE}"></th>
						<th class="{$WIDTHTYPE}">{\App\Purifier::encodeHtml(\App\Language::translate('LBL_COUNTRY_NAME',$QUALIFIED_MODULE))}</th>
						<th class="{$WIDTHTYPE}">{\App\Purifier::encodeHtml(\App\Language::translate('LBL_COUNTRY_SHORTNAME',$QUALIFIED_MODULE))}</th>
						<th class="{$WIDTHTYPE} col-md-2 text-center">
							<span class="marginRight10">
								{\App\Purifier::encodeHtml(\App\Language::translate('LBL_ACTIONS',$QUALIFIED_MODULE))}
							</span>
							<span>
								<button class="all-statuses btn btn-default btn-xs popoverTooltip" data-content="{\App\Purifier::encodeHtml(\App\Language::translate('LBL_COUNTRY_TOGGLE_ALL_STATUSES', $QUALIFIED_MODULE))}">
									<span class="glyphicon glyphicon-check"></span>
								</button>
							</span>
						</th>
					</tr>
				</thead>
				<tbody>
					{foreach item=ROW  from=Settings_Countries_Record_Model::getAll()}
						<tr class="listViewEntries" data-id="{$ROW['id']}">
							<td width="1%" nowrap class="{$WIDTHTYPE}">
								<span class="glyphicon glyphicon-option-vertical" title="{\App\Purifier::encodeHtml(\App\Language::translate('LBL_DRAG',$QUALIFIED_MODULE))}"></span>
							</td>
							<td nowrap class="{$WIDTHTYPE}">
								{\App\Purifier::encodeHtml(\App\Language::translateSingleMod($ROW['name'],'Other.Country'))}
							</td>
							<td nowrap class="{$WIDTHTYPE}">
								{\App\Purifier::encodeHtml($ROW['code'])}
							</td>
							<td nowrap class="{$WIDTHTYPE} actionImages">
								<span class="pull-right actions">
									<button class="to-bottom btn btn-default btn-xs popoverTooltip" data-placement="left" data-content="{\App\Purifier::encodeHtml(\App\Language::translate('LBL_ROW_TO_BOTTOM', $QUALIFIED_MODULE))}">
										<span class="glyphicon glyphicon-arrow-down"></span>
									</button>
								</span>
								<span class="pull-right actions">
									<button class="to-top btn btn-default btn-xs marginLeft20 popoverTooltip" data-placement="left" data-content="{\App\Purifier::encodeHtml(\App\Language::translate('LBL_ROW_TO_TOP', $QUALIFIED_MODULE))}">
										<span class="glyphicon glyphicon-arrow-up"></span>
									</button>
								</span>

								<span class="pull-right actions">
									<button class="uitype btn {if !$ROW['uitype']}btn-success{else}btn-danger{/if} btn-xs popoverTooltip" data-uitype="{$ROW['uitype']}" data-content="{\App\Purifier::encodeHtml(\App\Language::translate('LBL_VISIBLE_IN_COUNTRY', $QUALIFIED_MODULE))}">
										<span class="glyphicon glyphicon-picture"></span>
									</button>
								</span>
								<span class="pull-right actions">
									<button class="phone btn {if !$ROW['phone']}btn-success{else}btn-danger{/if} btn-xs popoverTooltip" data-phone="{$ROW['phone']}" data-content="{\App\Purifier::encodeHtml(\App\Language::translate('LBL_VISIBLE_IN_PHONE', $QUALIFIED_MODULE))}">
										<span class="glyphicon glyphicon-phone"></span>
									</button>
								</span>
								<span class="pull-right actions">
									<button class="status btn {if !$ROW['status']}btn-success{else}btn-danger{/if} btn-xs popoverTooltip" data-status="{$ROW['status']}" data-content="{\App\Purifier::encodeHtml(\App\Language::translate('LBL_COUNTRY_TOGGLE_STATUS', $QUALIFIED_MODULE))}">
										<span class="glyphicon glyphicon-check"></span>
									</button>
								</span>
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
		</div>	
	</div>		
{/strip}
