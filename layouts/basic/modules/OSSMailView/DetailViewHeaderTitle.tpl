{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	<div class="col-md-12 paddingLRZero row">
		<div class="col-xs-10 margin0px">
			<div class="moduleIcon">
				<span class="detailViewIcon userIcon-{$MODULE}"></span>
			</div>
			<div class="paddingLeft5px pull-left">
				<h4 style="color: #1560bd;" class="recordLabel textOverflowEllipsis pushDown marginbottomZero" title="{$RECORD->getName()}">
					<span class="modCT_{$MODULE_NAME}">{$RECORD->getName()}</span>
					{assign var=RECORD_STATE value=\App\Record::getState($RECORD->getId())}
					{if $RECORD_STATE !== 'Active'}
						&nbsp;&nbsp;
						{assign var=COLOR value=AppConfig::search('LIST_ENTITY_STATE_COLOR')}
						<span class="label label-default" {if $COLOR[$RECORD_STATE]}style="background-color: {$COLOR[$RECORD_STATE]};"{/if}>
							{if \App\Record::getState($RECORD->getId()) === 'Trash'}
								{\App\Language::translate('LBL_ENTITY_STATE_TRASH')}
							{else}
								{\App\Language::translate('LBL_ENTITY_STATE_ARCHIVED')}
							{/if}
						</span>
					{/if}
				</h4>
				<span class="muted">
					<small><em>{\App\Language::translate('Sent','OSSMailView')}</em></small>
					<span><small><em>&nbsp;{$RECORD->getDisplayValue('createdtime')}</em></small></span>
				</span>
				<div>
					<strong>{\App\Language::translate('LBL_OWNER')} : {$RECORD->getDisplayValue('assigned_user_id')}</strong>
				</div>
			</div>
		</div>
		{include file=\App\Layout::getTemplatePath('DetailViewHeaderFields.tpl', $MODULE_NAME)}
	</div>
{/strip}
