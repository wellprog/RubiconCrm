{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
   * Contributor(s): YetiForce.com
 ********************************************************************************/
-->*}
{strip}
{assign var=WIDTHTYPE value=$USER_MODEL->get('rowheight')}
<table class="summary-table" style="width:100%;">
	<tbody>
	{foreach item=FIELD_MODEL key=FIELD_NAME from=$SUMMARY_RECORD_STRUCTURE['SUMMARY_FIELDS']}
		{if $FIELD_MODEL->getName() neq 'modifiedtime' && $FIELD_MODEL->getName() neq 'createdtime'}
			<tr class="summaryViewEntries">
				<td class="fieldLabel {$WIDTHTYPE}" style="width:35%"><label class="muted">{\App\Language::translate($FIELD_MODEL->getFieldLabel(),$MODULE_NAME)}</label></td>
				<td class="fieldValue {$WIDTHTYPE}" style="width:65%">
                    <div class="row">
                        <div class="value textOverflowEllipsis col-xs-10 paddingRightZero" {if $FIELD_MODEL->getUIType() eq '19' or $FIELD_MODEL->getUIType() eq '20' or $FIELD_MODEL->getUIType() eq '21'}style="word-wrap: break-word;white-space:pre-wrap;"{/if}>
							{include file=\App\Layout::getTemplatePath($FIELD_MODEL->getUITypeModel()->getDetailViewTemplateName()) FIELD_MODEL=$FIELD_MODEL USER_MODEL=$USER_MODEL MODULE=$MODULE_NAME RECORD=$RECORD}
						</div>
                        {if $FIELD_MODEL->isEditable() eq 'true' && ($FIELD_MODEL->getFieldDataType()!=Vtiger_Field_Model::REFERENCE_TYPE) && $IS_AJAX_ENABLED && $FIELD_MODEL->isAjaxEditable() eq 'true' && $FIELD_MODEL->getUIType() neq 69}
                            <div class="hide edit col-xs-12">
                                {include file=\App\Layout::getTemplatePath($FIELD_MODEL->getUITypeModel()->getTemplateName(), $MODULE_NAME) FIELD_MODEL=$FIELD_MODEL USER_MODEL=$USER_MODEL MODULE=$MODULE_NAME}
								{if $FIELD_MODEL->getFieldDataType() eq 'boolean' || $FIELD_MODEL->getFieldDataType() eq 'picklist'}
									<input type="hidden" class="fieldname" data-type="{$FIELD_MODEL->getFieldDataType()}" value='{$FIELD_MODEL->getName()}' data-prev-value='{\App\Purifier::encodeHtml($FIELD_MODEL->get('fieldvalue'))}' />		
								{else}
									{assign var=FIELD_VALUE value=$FIELD_MODEL->getEditViewDisplayValue($FIELD_MODEL->get('fieldvalue'), $RECORD)}
									{if $FIELD_VALUE|is_array}
										{assign var=FIELD_VALUE value=\App\Json::encode($FIELD_VALUE)}
									{/if}
									<input type="hidden" class="fieldname" value='{$FIELD_MODEL->getName()}' data-type="{$FIELD_MODEL->getFieldDataType()}" data-prev-value='{\App\Purifier::encodeHtml($FIELD_VALUE)}' />
								{/if}
                            </div>
                            <div class="summaryViewEdit col-xs-2 cursorPointer">
								<div class="pull-right">
									<span class="glyphicon glyphicon-pencil" title="{\App\Language::translate('LBL_EDIT',$MODULE_NAME)}"></span>
								</div>
                            </div>
                        {/if}
                    </div>
				</td>
			</tr>
		{/if}
	{/foreach}
	</tbody>
</table>
<hr>
<div class="row">
	<div class="col-md-4 toggleViewByMode">
		{assign var="CURRENT_VIEW" value="full"}
		{assign var="CURRENT_MODE_LABEL" value="{\App\Language::translate('LBL_COMPLETE_DETAILS',{$MODULE_NAME})}"}
		<button type="button" class="btn btn-default changeDetailViewMode cursorPointer"><strong>{\App\Language::translate('LBL_SHOW_FULL_DETAILS',$MODULE_NAME)}</strong></button>
		{assign var="FULL_MODE_URL" value={$RECORD->getDetailViewUrl()|cat:'&mode=showDetailViewByMode&requestMode=full'} }
		<input type="hidden" name="viewMode" value="{$CURRENT_VIEW}" data-nextviewname="full" data-currentviewlabel="{$CURRENT_MODE_LABEL}" data-full-url="{$FULL_MODE_URL}"  />
	</div>
	<div class="col-md-8">
		<div class="pull-right">
			<div>
				<p>
					<small>
						{\App\Language::translate('LBL_CREATED_ON',$MODULE_NAME)} {\App\Fields\DateTime::formatToDay($RECORD->get('createdtime'))}
					</small>
					<br />
					<small>
						{\App\Language::translate('LBL_MODIFIED_ON',$MODULE_NAME)} {\App\Fields\DateTime::formatToDay($RECORD->get('modifiedtime'))}
					</small>
				</p>
			</div>
		</div>
	</div>
</div>
{/strip}
