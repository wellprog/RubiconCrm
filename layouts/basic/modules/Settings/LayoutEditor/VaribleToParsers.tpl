{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 class="modal-title">{App\Language::translate('LBL_CUSTOM_VARIABLES', $QUALIFIED_MODULE)}</h3>
	</div>
	<div class="modal-body row">
		<div class="col-md-12">
			<select class="col-md-2 select2" name="varibles" data-validation-engine="validate[required]" data-fieldinfo='{\App\Purifier::encodeHtml(\App\Json::encode($FIELD_INFO))}'>
				{foreach item=PICKLIST_VALUE key=PICKLIST_NAME from=$VARIBLES}
					<option value="">{App\Language::translate('LBL_SELECT', $QUALIFIED_MODULE)}</option>
					<option value="{\App\Purifier::encodeHtml($PICKLIST_VALUE)}" {if $DEFAULT_VALUE eq $PICKLIST_VALUE} selected=""{/if}>{App\Language::translate($PICKLIST_NAME, $QUALIFIED_MODULE)}</option>
				{/foreach}
			</select>
			{include file=\App\Layout::getTemplatePath('ModalFooter.tpl', $QUALIFIED_MODULE)}
		</div>
	</div>
{/strip}
