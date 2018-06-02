{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	{include file=\App\Layout::getTemplatePath('ListViewAlphabet.tpl', $RELATED_MODULE_NAME) MODULE_MODEL=$RELATED_MODULE}
	{assign var=WIDTHTYPE value=$USER_MODEL->get('rowheight')}
	{assign var=IS_INVENTORY value=($RELATED_VIEW === 'List' && $INVENTORY_MODULE && !empty($INVENTORY_FIELDS))}
	<div class="listViewEntriesDiv">
		<table class="table tableBorderHeadBody listViewEntriesTable {if $VIEW_MODEL && !$VIEW_MODEL->isEmpty('entityState')}listView{$VIEW_MODEL->get('entityState')}{/if}">
			<thead>
				<tr class="listViewHeaders">
					{assign var=COUNT value=0}
					<th class="noWrap"></th>
						{foreach item=HEADER_FIELD from=$RELATED_HEADERS}
							{if !empty($COLUMNS) && $COUNT == $COLUMNS }
								{break}
							{/if}
							{assign var=COUNT value=$COUNT+1}
						<th {if $HEADER_FIELD@last} colspan="2"{/if} nowrap>
							{if $HEADER_FIELD->getColumnName() eq 'access_count' or $HEADER_FIELD->getColumnName() eq 'idlists' }
								<a href="javascript:void(0);" class="noSorting">{\App\Language::translate($HEADER_FIELD->getFieldLabel(), $RELATED_MODULE->get('name'))}</a>
							{else}
								<a href="javascript:void(0);" class="relatedListHeaderValues" {if $HEADER_FIELD->isListviewSortable()}data-nextsortorderval="{if $COLUMN_NAME eq $HEADER_FIELD->getColumnName()}{$NEXT_SORT_ORDER}{else}ASC{/if}"{/if} data-fieldname="{$HEADER_FIELD->getColumnName()}">{\App\Language::translate($HEADER_FIELD->getFieldLabel(), $RELATED_MODULE->get('name'))}
									&nbsp;&nbsp;{if $COLUMN_NAME eq $HEADER_FIELD->getColumnName()}<span class="{$SORT_IMAGE}"></span>{/if}
								</a>
							{/if}
						</th>
					{/foreach}
					{if $SHOW_CREATOR_DETAIL}
						<th>
							{\App\Language::translate('LBL_RELATION_CREATED_TIME', $RELATED_MODULE->get('name'))}
						</th>
						<th>
							{\App\Language::translate('LBL_RELATION_CREATED_USER', $RELATED_MODULE->get('name'))}
						</th>
					{/if}
					{if $SHOW_COMMENT}
						<th>
							{\App\Language::translate('LBL_RELATION_COMMENT', $RELATED_MODULE->get('name'))}
						</th>
					{/if}
					{if $IS_INVENTORY}<th></th>{/if}
				</tr>
			</thead>
			<tbody>
				{if $RELATED_MODULE->isQuickSearchEnabled()}
					<tr>
						<td class="listViewSearchTd">
							<a class="btn btn-default" data-trigger="listSearch" href="javascript:void(0);"><span class="glyphicon glyphicon-search"></span></a>
						</td>
						{foreach item=HEADER_FIELD from=$RELATED_HEADERS}
							<td>
								{assign var=FIELD_UI_TYPE_MODEL value=$HEADER_FIELD->getUITypeModel()}
								{if isset($SEARCH_DETAILS[$HEADER_FIELD->getName()])}
									{assign var=SEARCH_INFO value=$SEARCH_DETAILS[$HEADER_FIELD->getName()]}
								{else}
									{assign var=SEARCH_INFO value=[]}
								{/if}
								{include file=\App\Layout::getTemplatePath($FIELD_UI_TYPE_MODEL->getListSearchTemplateName(), $RELATED_MODULE_NAME)
				FIELD_MODEL=$HEADER_FIELD SEARCH_INFO=$SEARCH_INFO USER_MODEL=$USER_MODEL MODULE_MODEL=$RELATED_MODULE MODULE=$RELATED_MODULE_NAME}
							</td>
						{/foreach}
						<td>
							<button type="button" class="btn btn-default removeSearchConditions">
								<span class="glyphicon glyphicon-remove">
							</button>
						</td>
					</tr>
				{/if}
				{assign var="RELATED_HEADER_COUNT" value=count($RELATED_HEADERS)}
				{foreach item=RELATED_RECORD from=$RELATED_RECORDS}
					{assign var="RECORD_COLORS" value=$RELATED_RECORD->getListViewColor()}
					<tr class="listViewEntries" data-id='{$RELATED_RECORD->getId()}'
						{if $RELATED_RECORD->isViewable()}
							data-recordUrl='{$RELATED_RECORD->getDetailViewUrl()}'
						{/if}>
						{assign var=COUNT value=0}
						<td class="{$WIDTHTYPE} noWrap leftRecordActions" {if $RECORD_COLORS['leftBorder']}style="border-left-color: {$RECORD_COLORS['leftBorder']};"{/if}>
							{include file=\App\Layout::getTemplatePath('RelatedListLeftSide.tpl', $RELATED_MODULE_NAME)}
						</td>
						{foreach item=HEADER_FIELD from=$RELATED_HEADERS name=listHeaderForeach}
							{if !empty($COLUMNS) && $COUNT == $COLUMNS }
								{break}
							{/if}
							{assign var=COUNT value=$COUNT+1}
							{assign var=RELATED_HEADERNAME value=$HEADER_FIELD->getFieldName()}
							<td class="{$WIDTHTYPE}" data-field-type="{$HEADER_FIELD->getFieldDataType()}" nowrap  {if $smarty.foreach.listHeaderForeach.iteration eq $RELATED_HEADER_COUNT}colspan="2"{/if}>
								{if ($HEADER_FIELD->isNameField() eq true or $HEADER_FIELD->getUIType() eq '4') && $RELATED_RECORD->isViewable()}
									<a class="modCT_{$RELATED_MODULE_NAME}" title="" href="{$RELATED_RECORD->getDetailViewUrl()}">
										{$RELATED_RECORD->getDisplayValue($RELATED_HEADERNAME)|truncate:50}
									</a>
								{elseif $HEADER_FIELD->get('fromOutsideList') eq true}
									{$HEADER_FIELD->getDisplayValue($RELATED_RECORD->get($RELATED_HEADERNAME))}
								{else}
									{$RELATED_RECORD->getListViewDisplayValue($RELATED_HEADERNAME)}
								{/if}
								{if $HEADER_FIELD@last}
								</td>
							{/if}
							</td>
						{/foreach}
						{if $SHOW_CREATOR_DETAIL}
							<td class="medium" data-field-type="rel_created_time" nowrap>{App\Fields\DateTime::formatToDisplay($RELATED_RECORD->get('rel_created_time'))}</td>
							<td class="medium" data-field-type="rel_created_user" nowrap>{\App\Fields\Owner::getLabel($RELATED_RECORD->get('rel_created_user'))}</td>
						{/if}
						{if $SHOW_COMMENT}
							<td class="medium" data-field-type="rel_comment" nowrap>{$RELATED_RECORD->get('rel_comment')}</td>
						{/if}
						{if $IS_INVENTORY}
							{$COUNT = $COUNT+1}
							<td class="medium" nowrap>
								<button type="button" class="btn btn-sm btn-info popoverTooltip showInventoryRow" data-placement="left" data-content="{\App\Language::translate('LBL_SHOW_INVENTORY_ROW')}"><span class="glyphicon glyphicon-resize-vertical"></span></button>
							</td>
						{/if}
					</tr>
					{if $IS_INVENTORY}
						{assign var="INVENTORY_DATA" value=$RELATED_RECORD->getInventoryData()}
						<tr class="listViewInventoryEntries hide">
							{if $RELATED_MODULE->isQuickSearchEnabled()}
								{$COUNT = $COUNT+1}
							{/if}
							<td colspan="{$COUNT+1}" class="backgroundWhiteSmoke">
								<table class="table table-condensed no-margin">
									<thead>
										<tr>
											{foreach from=$INVENTORY_FIELDS item=FIELD key=NAME}
												<th class="medium" nowrap>
													{\App\Language::translate($FIELD->get('label'),$RELATED_MODULE_NAME)}
												</th>
											{/foreach}
										</tr>
									</thead>
									<tbody>
										{foreach from=$INVENTORY_DATA item=ROWDATA}
											<tr>
												{if $INVENTORY_ROW['name']}
													{assign var="ROW_MODULE" value=\App\Record::getType($INVENTORY_ROW['name'])}
												{/if}
												{foreach from=$INVENTORY_FIELDS item=FIELD key=NAME}
													{assign var="FIELD_TPL_NAME" value="inventoryfields/"|cat:$FIELD->getTemplateName('DetailView',$RELATED_MODULE_NAME)}
													<td>
														{include file=\App\Layout::getTemplatePath($FIELD_TPL_NAME, $RELATED_MODULE_NAME) ITEM_VALUE=$ROWDATA[$FIELD->get('columnname')]}
													</td>
												{/foreach}
											</tr>
										{/foreach}
									</tbody>
								</table>
							</td>
						</tr>
					{/if}
				{/foreach}
			</tbody>
			<tfoot class="listViewSummation">
				<tr>
					<td></td>
					{foreach item=HEADER_FIELD from=$RELATED_HEADERS}
						<td {if $HEADER_FIELD@last} colspan="2" {/if} class="noWrap {if !empty($HEADER_FIELD->isCalculateField())}border{/if}" >
							{if !empty($HEADER_FIELD->isCalculateField())}
								<button class="btn btn-xs btn-default popoverTooltip" type="button" data-operator="sum" data-field="{$HEADER_FIELD->getName()}" data-content="{\App\Language::translate('LBL_CALCULATE_SUM_FOR_THIS_FIELD')}">
									<span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span>
								</button>
								<span class="calculateValue"></span>
							{/if}
						</td>
					{/foreach}
				</tr>
			</tfoot>
		</table>
	</div>
{/strip}
