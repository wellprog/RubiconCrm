<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * Contributor(s): YetiForce.com
 * *********************************************************************************** */

class Calendar_Delete_Action extends Vtiger_Delete_Action
{

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$listViewUrl = $this->record->getModule()->getListViewUrl();
		$this->record->delete();
		$typeRemove = Events_RecuringEvents_Model::UPDATE_THIS_EVENT;
		if (!$request->isEmpty('typeRemove')) {
			$typeRemove = $request->getInteger('typeRemove');
		}
		$recurringEvents = Events_RecuringEvents_Model::getInstance();
		$recurringEvents->typeSaving = $typeRemove;
		$recurringEvents->recordModel = $this->record;
		$recurringEvents->templateRecordId = $request->getInteger('record');
		$recurringEvents->delete();
		if ($request->getByType('sourceView') === 'List') {
			$response = new Vtiger_Response();
			$response->setResult(['notify' => ['type' => 'success', 'text' => \App\Language::translate('LBL_RECORD_HAS_BEEN_DELETED')]]);
			$response->emit();
		} elseif ($request->getBoolean('ajaxDelete')) {
			$response = new Vtiger_Response();
			$response->setResult($listViewUrl);
			$response->emit();
		} else {
			header("Location: $listViewUrl");
		}
	}
}
