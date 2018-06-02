{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is:  vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
* Contributor(s): YetiForce Sp. z o.o.
********************************************************************************/
-->*}
{strip}
	{assign var="MODULE_NAME" value=$MODULE_MODEL->get('name')}
	<input id="recordId" type="hidden" value="{$RECORD->getId()}" />
	<div class="detailViewContainer">
		<div class="detailViewTitle marginTop5" id="prefPageHeader">
			<div class="row">
				<div class="col-md-12">
					<div class="marginLeftZero col-md-8">
						<div class="logo col-xs-1 col-md-1">
							{foreach key=ITER item=IMAGE_INFO from=$RECORD->getImageDetails()}
								{if !empty($IMAGE_INFO.path) && !empty($IMAGE_INFO.orgname)}
									<img src="data:image/jpg;base64,{base64_encode(file_get_contents($IMAGE_INFO.path))}" alt="{$IMAGE_INFO.orgname}" title="{$IMAGE_INFO.orgname}" data-image-id="{$IMAGE_INFO.id}">
								{/if}
							{/foreach}
						</div>
						<div class="col-xs-9 col-md-9">
							<div id="myPrefHeading" class="col-md-12">
								<h3>{\App\Language::translate('LBL_MY_PREFERENCES', $MODULE_NAME)} </h3>
							</div>
							<div class="col-md-12">
								{\App\Language::translate('LBL_USERDETAIL_INFO', $MODULE_NAME)}&nbsp;&nbsp;"<strong>{$RECORD->getName()}</strong>"
							</div>
						</div>
						</span>
					</div>
					<div class="col-md-4">
						<div class="row pull-right detailViewButtoncontainer">
							<div class="btn-toolbar pull-right">
								{foreach item=LINK from=$DETAILVIEW_LINKS['DETAILVIEWPREFERENCE']}
									{include file=\App\Layout::getTemplatePath('ButtonLink.tpl', $MODULE) BUTTON_VIEW='detailViewBasic'}
								{/foreach}
								{if $DETAILVIEW_LINKS['DETAIL_VIEW_BASIC']|@count gt 0}
									<span class="btn-group">
										<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
											<strong>{\App\Language::translate('LBL_MORE', $MODULE_NAME)}</strong>&nbsp;&nbsp;<i class="caret"></i>
										</button>
										<ul class="dropdown-menu pull-right">
											{foreach item=DETAIL_VIEW_LINK from=$DETAILVIEW_LINKS['DETAIL_VIEW_BASIC']}
												<li id="{$MODULE_NAME}_detailView_moreAction_{Vtiger_Util_Helper::replaceSpaceWithUnderScores($DETAIL_VIEW_LINK->getLabel())}">
													<a href={$DETAIL_VIEW_LINK->getUrl()} >{\App\Language::translate($DETAIL_VIEW_LINK->getLabel(), $MODULE_NAME)}</a>
												</li>
											{/foreach}
										</ul>
									</span>
								{/if}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="detailViewInfo userPreferences row">
				<div class="details col-md-12">
					<form id="detailView" data-name-fields='{\App\Json::encode($MODULE_MODEL->getNameFields())}' method="POST">
						<div class="contents">
						{/strip}
