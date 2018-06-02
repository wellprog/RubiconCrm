<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * ********************************************************************************** */

class Vtiger_IndexAjax_View extends Vtiger_Index_View
{

	public function __construct()
	{
		parent::__construct();
	}

	public function preProcess(\App\Request $request, $display = true)
	{
		return true;
	}

	public function postProcess(\App\Request $request)
	{
		return true;
	}

	public function process(\App\Request $request)
	{
		$mode = $request->getMode();
		if (!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
	}
	/*
	 * Function to show the recently modified or active records for the given module
	 */

	public function showActiveRecords(\App\Request $request)
	{
		$viewer = $this->getViewer($request);
		$moduleName = $request->getModule();

		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$recentRecords = $moduleModel->getRecentRecords();

		$viewer->assign('MODULE', $moduleName);
		$viewer->assign('RECORDS', $recentRecords);

		echo $viewer->view('RecordNamesList.tpl', $moduleName, true);
	}

	public function getRecordsListFromRequest(\App\Request $request)
	{
		$cvId = $request->getByType('cvid', 2);
		$selectedIds = $request->get('selected_ids');
		$excludedIds = $request->get('excluded_ids');

		if (!empty($selectedIds) && $selectedIds != 'all') {
			if (!empty($selectedIds) && count($selectedIds) > 0) {
				return $selectedIds;
			}
		}
		if (!empty($cvId) && $cvId == 'undefined') {
			$sourceModule = $request->getByType('sourceModule', 2);
			$cvId = CustomView_Record_Model::getAllFilterByModule($sourceModule)->getId();
		}

		$customViewModel = CustomView_Record_Model::getInstanceById($cvId);
		if ($customViewModel) {
			if (!$request->isEmpty('operator', true)) {
				$customViewModel->set('operator', $request->getByType('operator', 1));
				$customViewModel->set('search_key', $request->getByType('search_key', 1));
				$customViewModel->set('search_value', $request->get('search_value'));
			}
			if ($request->has('search_params')) {
				$customViewModel->set('search_params', $request->get('search_params'));
			}
			return $customViewModel->getRecordIds($excludedIds);
		}
	}
}
