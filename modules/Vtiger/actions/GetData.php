<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class Vtiger_GetData_Action extends Vtiger_IndexAjax_View
{

	/**
	 * Check permission
	 * @param \App\Request $request
	 * @return boolean
	 * @throws \Exception\NoPermittedToRecord
	 */
	public function checkPermission(\App\Request $request)
	{
		if ($request->isEmpty('record', true)) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
		if (!\App\Privilege::isPermitted($request->getModule(), 'DetailView', $request->getInteger('record'))) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
	}

	/**
	 * Process
	 * @param \App\Request $request
	 */
	public function process(\App\Request $request)
	{
		$record = $request->getInteger('record');
		$sourceModule = $request->getByType('source_module', 2);
		$recordModel = Vtiger_Record_Model::getInstanceById($record, $sourceModule);
		if (!$recordModel->isViewable()) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
		$labels = $data = $display = [];
		foreach ($recordModel->getModule()->getFields() as $fieldName => $fieldModel) {
			if ($fieldModel->isViewable()) {
				$data[$fieldName] = $recordModel->get($fieldName);
				$labels[$fieldName] = \App\Language::translate($fieldModel->getFieldLabel(), $recordModel->getModuleName());
				$display[$fieldName] = $fieldModel->getDisplayValue($recordModel->get($fieldName), $record, $recordModel, true);
			}
		}
		$response = new Vtiger_Response();
		$response->setResult([
			'success' => true,
			'data' => array_map('App\Purifier::decodeHtml', $data),
			'displayData' => array_map('App\Purifier::decodeHtml', $display),
			'labels' => $labels
		]);
		$response->emit();
	}
}
