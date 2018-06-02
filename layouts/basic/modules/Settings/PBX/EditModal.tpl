{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	{if $CONNECTOR_CONFIG}
		<div class="editModalContent">
			{foreach from=$RECORD_MODEL->getConnectorFieldsModel() item=FIELD_MODEL key=FIELD_NAME}
				<div class="form-group">
					<label class="control-label col-md-3">
						{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $QUALIFIED_MODULE)}
						{if $FIELD_MODEL->isMandatory()}<span class="redColor"> *</span>{/if}:
					</label>
					<div class="col-md-8 fieldValue">
						{include file=\App\Layout::getTemplatePath($FIELD_MODEL->getUITypeModel()->getTemplateName(), $QUALIFIED_MODULE) FIELD_MODEL=$FIELD_MODEL MODULE=$QUALIFIED_MODULE}
					</div>
				</div>
			{/foreach}
		</div>
	{else}
		<form class="form-horizontal validateForm" id="editForm">
			<input type="hidden" name="record" value="{$RECORD_MODEL->getId()}">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" title="{\App\Language::translate('LBL_CLOSE')}">&times;</button>
				{if $RECORD_ID}
					<h3 class="modal-title">{\App\Language::translate('LBL_EDIT_RECORD', $QUALIFIED_MODULE)}</h3>
				{else}
					<h3 class="modal-title">{\App\Language::translate('LBL_CREATE_RECORD', $QUALIFIED_MODULE)}</h3>
				{/if}
			</div>
			<div class="modal-body">
				<div class="formGroups">
					{foreach from=$RECORD_MODEL->getEditFieldsModel() item=FIELD_MODEL key=FIELD_NAME}
						<div class="form-group">
							<label class="control-label col-md-3">
								{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $QUALIFIED_MODULE)}
								{if $FIELD_MODEL->isMandatory()}<span class="redColor"> *</span>{/if}:
							</label>
							<div class="col-md-8 fieldValue">
								{include file=\App\Layout::getTemplatePath($FIELD_MODEL->getUITypeModel()->getTemplateName(), $QUALIFIED_MODULE) FIELD_MODEL=$FIELD_MODEL MODULE=$QUALIFIED_MODULE}
							</div>
						</div>
					{/foreach}
					{if $RECORD_ID}
						{foreach from=$RECORD_MODEL->getConnectorFieldsModel() item=FIELD_MODEL key=FIELD_NAME}
							<div class="form-group">
								<label class="control-label col-md-3">
									{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $QUALIFIED_MODULE)}
									{if $FIELD_MODEL->isMandatory()}<span class="redColor"> *</span>{/if}:
								</label>
								<div class="col-md-8 fieldValue">
									{include file=\App\Layout::getTemplatePath($FIELD_MODEL->getUITypeModel()->getTemplateName(), $QUALIFIED_MODULE) FIELD_MODEL=$FIELD_MODEL MODULE=$QUALIFIED_MODULE}
								</div>
							</div>
						{/foreach}
					{/if}
					<div class="editModalContent"></div>
				</div>
			</div>
			{include file=\App\Layout::getTemplatePath('ModalFooter.tpl', $QUALIFIED_MODULE)}
		</form>
	{/if}
{/strip}
