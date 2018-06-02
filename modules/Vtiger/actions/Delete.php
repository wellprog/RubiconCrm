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

class Vtiger_Delete_Action extends Vtiger_Action_Controller
{

	/**
	 * Record model instance
	 * @var Vtiger_Record_Model
	 */
	protected $record;

	/**
	 * {@inheritDoc}
	 */
	public function checkPermission(\App\Request $request)
	{
		if ($request->isEmpty('record', true)) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
		$this->record = Vtiger_Record_Model::getInstanceById($request->getInteger('record'), $request->getModule());
		if (!$this->record->privilegeToDelete()) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$listViewUrl = $this->record->getModule()->getListViewUrl();
		$this->record->delete();
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
