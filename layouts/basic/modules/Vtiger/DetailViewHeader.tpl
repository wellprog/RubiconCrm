{strip}
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
	{assign var="MODULE_NAME" value=$MODULE_MODEL->get('name')}
	<input id="recordId" type="hidden" value="{$RECORD->getId()}" />
	<div class="detailViewContainer">
		<div class="row detailViewTitle">
			{if $SHOW_BREAD_CRUMBS}
				<div class="">
					<div class="row">
						<div class="col-md-12 marginBottom5px widget_header row no-margin">
							<div class="">
								<div class="col-md-6 paddingLRZero">
									{include file=\App\Layout::getTemplatePath('BreadCrumbs.tpl', $MODULE)}
								</div>
								<div class="col-md-6 col-xs-12 paddingLRZero">
									<div class="col-xs-12 detailViewToolbar paddingLRZero" style="text-align: right;">
										<div class="pull-right-md pull-left-sm pull-right-lg">
											<div class="btn-toolbar detailViewActionsBtn">
												{if $DETAILVIEW_LINKS['DETAIL_VIEW_ADDITIONAL']}
													<span class="btn-group ">
														{foreach item=LINK from=$DETAILVIEW_LINKS['DETAIL_VIEW_ADDITIONAL']}	
															{include file=\App\Layout::getTemplatePath('ButtonLink.tpl', $MODULE) BUTTON_VIEW='detailViewAdditional'}
														{/foreach}
													</span>
												{/if}
												{if $DETAILVIEW_LINKS['DETAIL_VIEW_BASIC']}
													<span class="btn-group">
														{foreach item=LINK from=$DETAILVIEW_LINKS['DETAIL_VIEW_BASIC']}
															{include file=\App\Layout::getTemplatePath('ButtonLink.tpl', $MODULE) BUTTON_VIEW='detailViewBasic'}
														{/foreach}
													</span>
												{/if}
												{if $DETAILVIEW_LINKS['DETAIL_VIEW_EXTENDED']}
													<span class="btn-group">
														{foreach item=LINK from=$DETAILVIEW_LINKS['DETAIL_VIEW_EXTENDED']}
															{include file=\App\Layout::getTemplatePath('ButtonLink.tpl', $MODULE) BUTTON_VIEW='detailViewExtended'}
														{/foreach}
													</span>
												{/if}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			{/if}					
			{if !empty($DETAILVIEW_LINKS['DETAIL_VIEW_HEADER_WIDGET'])}
				{foreach item=WIDGET from=$DETAILVIEW_LINKS['DETAIL_VIEW_HEADER_WIDGET']}
					<div class="col-md-12 paddingLRZero">
						{Vtiger_Widget_Model::processWidget($WIDGET, $RECORD)}
					</div>
				{/foreach}
			{/if}
			{include file=\App\Layout::getTemplatePath('DetailViewHeaderTitle.tpl', $MODULE)}
		</div>
		<div class="detailViewInfo row">
			{include file=\App\Layout::getTemplatePath('RelatedListButtons.tpl', $MODULE)}
			<div class="col-md-12 {if !empty($DETAILVIEW_LINKS['DETAILVIEWTAB']) || !empty($DETAILVIEW_LINKS['DETAILVIEWRELATED']) } details {/if}">
				<form id="detailView" data-name-fields='{\App\Json::encode($MODULE_MODEL->getNameFields())}' method="POST">
					{if !empty($PICKLIST_DEPENDENCY_DATASOURCE)} 
						<input type="hidden" name="picklistDependency" value="{\App\Purifier::encodeHtml($PICKLIST_DEPENDENCY_DATASOURCE)}"> 
					{/if} 
					<div class="contents">
					{/strip}

