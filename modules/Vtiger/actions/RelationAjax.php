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

class Vtiger_RelationAjax_Action extends Vtiger_Action_Controller
{

	/**
	 * {@inheritDoc}
	 */
	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('addRelation');
		$this->exposeMethod('deleteRelation');
		$this->exposeMethod('massDeleteRelation');
		$this->exposeMethod('exportToExcel');
		$this->exposeMethod('updateRelation');
		$this->exposeMethod('getRelatedListPageCount');
		$this->exposeMethod('updateFavoriteForRecord');
		$this->exposeMethod('calculate');
	}

	/**
	 * {@inheritDoc}
	 */
	public function checkPermission(\App\Request $request)
	{
		$userPrivilegesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if (!$request->isEmpty('record', true) && !\App\Privilege::isPermitted($request->getModule(), 'DetailView', $request->getInteger('record'))) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 403);
		}
		if (!$request->isEmpty('src_record', true) && !\App\Privilege::isPermitted($request->getModule(), 'DetailView', $request->getInteger('src_record'))) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 403);
		}
		if (!$request->isEmpty('related_module', true) && !$userPrivilegesModel->hasModulePermission($request->getByType('related_module', 2))) {
			throw new \App\Exceptions\NoPermitted('LBL_PERMISSION_DENIED', 403);
		}
		if (!$request->isEmpty('relatedModule', true) && $request->getByType('relatedModule', 2) !== 'ProductsAndServices' && !$userPrivilegesModel->hasModulePermission($request->getByType('relatedModule', 2))) {
			throw new \App\Exceptions\NoPermitted('LBL_PERMISSION_DENIED', 403);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function validateRequest(\App\Request $request)
	{
		$request->validateWriteAccess();
	}

	/**
	 * {@inheritDoc}
	 */
	public function preProcess(\App\Request $request)
	{
		return true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function postProcess(\App\Request $request)
	{
		return true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$mode = $request->getMode();
		if (!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
	}

	/**
	 * Get query for records list from request
	 * @param \App\Request $request
	 * @return \App\QueryGenerator|boolean
	 */
	public static function getQuery(\App\Request $request)
	{
		$selectedIds = $request->getArray('selected_ids', 2);
		if ($selectedIds && $selectedIds[0] !== 'all') {
			$queryGenerator = new App\QueryGenerator($request->getByType('relatedModule', 2));
			$queryGenerator->setFields(['id']);
			$queryGenerator->addCondition('id', $selectedIds, 'e');
			return $queryGenerator;
		}
		$parentRecordModel = Vtiger_Record_Model::getInstanceById($request->getInteger('record'), $request->getModule());
		$relationListView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $request->getByType('relatedModule', 2), $request->get('tab_label'));
		if ($request->has('entityState')) {
			$relationListView->set('entityState', $request->getByType('entityState'));
		}
		if (!$request->isEmpty('operator', true)) {
			$relationListView->set('operator', $request->getByType('operator'));
		}
		if (!$request->isEmpty('search_key', true)) {
			$relationListView->set('search_key', $request->getByType('search_key'));
			$relationListView->set('search_value', $request->get('search_value'));
		}
		$searchParmams = $request->get('search_params');
		if (empty($searchParmams) || !is_array($searchParmams)) {
			$searchParmams = [];
		}
		$relationListView->set('search_params', $relationListView->getQueryGenerator()->parseBaseSearchParamsToCondition($searchParmams));
		$queryGenerator = $relationListView->getRelationQuery(true);
		$queryGenerator->setFields(['id']);
		$excludedIds = $request->getArray('excluded_ids', 'Integer');
		if ($excludedIds && is_array($excludedIds)) {
			$queryGenerator->addCondition('id', $excludedIds, 'n');
		}
		return $queryGenerator;
	}

	/**
	 * Get records list from request
	 * @param \App\Request $request
	 * @return array
	 */
	public static function getRecordsListFromRequest(\App\Request $request)
	{
		$selectedIds = $request->getArray('selected_ids', 2);
		if ($selectedIds && $selectedIds[0] !== 'all') {
			return $selectedIds;
		}
		$queryGenerator = static::getQuery($request);
		return $queryGenerator ? $queryGenerator->createQuery()->column() : [];
	}

	/**
	 * Function to add relation for specified source record id and related record id list
	 * @param \App\Request $request
	 * @throws \App\Exceptions\NoPermittedToRecord
	 */
	public function addRelation(\App\Request $request)
	{
		$sourceModule = $request->getModule();
		$sourceRecordId = $request->getInteger('src_record');
		$relatedModule = $request->getByType('related_module', 2);
		if (is_numeric($relatedModule)) {
			$relatedModule = \App\Module::getModuleName($relatedModule);
		}
		$relatedRecordIdList = $request->get('related_record_list');

		$sourceModuleModel = Vtiger_Module_Model::getInstance($sourceModule);
		$relatedModuleModel = Vtiger_Module_Model::getInstance($relatedModule);
		$relationModel = Vtiger_Relation_Model::getInstance($sourceModuleModel, $relatedModuleModel);
		if (!is_array($relatedRecordIdList)) {
			$relatedRecordIdList = [$relatedRecordIdList];
		}
		foreach ($relatedRecordIdList as $relatedRecordId) {
			if (\App\Privilege::isPermitted($relatedModule, 'DetailView', $relatedRecordId)) {
				$relationModel->addRelation($sourceRecordId, (int) $relatedRecordId);
			}
		}
		$response = new Vtiger_Response();
		$response->setResult(true);
		$response->emit();
	}

	/**
	 * Function to delete the relation for specified source record id and related record id list
	 * @param \App\Request $request
	 * @throws \App\Exceptions\NoPermittedToRecord
	 */
	public function deleteRelation(\App\Request $request)
	{
		$sourceModule = $request->getModule();
		$sourceRecordId = $request->getInteger('src_record');
		$relatedModule = $request->getByType('related_module', 2);
		$relatedRecordIdList = $request->get('related_record_list');

		//Setting related module as current module to delete the relation
		vglobal('currentModule', $relatedModule);

		$sourceModuleModel = Vtiger_Module_Model::getInstance($sourceModule);
		$relatedModuleModel = Vtiger_Module_Model::getInstance($relatedModule);
		$relationModel = Vtiger_Relation_Model::getInstance($sourceModuleModel, $relatedModuleModel);
		$result = false;
		foreach ($relatedRecordIdList as $relatedRecordId) {
			if (\App\Privilege::isPermitted($relatedModule, 'DetailView', $relatedRecordId)) {
				$result = $relationModel->deleteRelation($sourceRecordId, (int) $relatedRecordId);
			}
		}
		$response = new Vtiger_Response();
		$response->setResult($result);
		$response->emit();
	}

	/**
	 * This function removes the relationship associated with the module
	 * @param \App\Request $request
	 */
	public function massDeleteRelation(\App\Request $request)
	{
		$sourceModule = $request->getModule();
		$relatedModuleName = $request->getByType('relatedModule', 2);
		$sourceRecordId = $request->getInteger('src_record');
		$pagingModel = new Vtiger_Paging_Model();

		$parentRecordModel = Vtiger_Record_Model::getInstanceById($sourceRecordId, $sourceModule);
		$relationListView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $relatedModuleName);
		$excludedIds = $request->getArray('excluded_ids', 'Integer');
		if ('all' === $request->getRaw('selected_ids')) {
			if (!$request->isEmpty('operator', true)) {
				$relationListView->set('operator', $request->getByType('operator', 1));
			}
			if (!$request->isEmpty('search_key', true)) {
				$relationListView->set('search_key', $request->getByType('search_key', 1));
				$relationListView->set('search_value', $request->get('search_value'));
			}
			$searchParmams = $request->get('search_params');
			if (empty($searchParmams) || !is_array($searchParmams)) {
				$searchParmams = [];
			}
			$transformedSearchParams = $relationListView->get('query_generator')->parseBaseSearchParamsToCondition($searchParmams);
			$relationListView->set('search_params', $transformedSearchParams);
			$rows = array_keys($relationListView->getEntries($pagingModel));
		} else {
			$rows = $request->getRaw('selected_ids') === '[]' ? [] : $request->getArray('selected_ids');
		}
		$relationModel = $relationListView->getRelationModel();
		foreach ($rows as $relatedRecordId) {
			if (!in_array($relatedRecordId, $excludedIds) && \App\Privilege::isPermitted($relatedModuleName, 'DetailView', $relatedRecordId)) {
				$relationModel->deleteRelation((int) $sourceRecordId, (int) $relatedRecordId);
			}
		}

		$response = new Vtiger_Response();
		$response->setResult(['reloadList' => true]);
		$response->emit();
	}

	/**
	 * Export relations to excel
	 * @param \App\Request $request
	 */
	public function exportToExcel(\App\Request $request)
	{
		Vtiger_Loader::includeOnce('libraries.PHPExcel.PHPExcel');
		$sourceModule = $request->getModule();
		$relatedModuleName = $request->getByType('relatedModule', 2);
		$sourceRecordId = $request->getInteger('src_record');
		$pagingModel = new Vtiger_Paging_Model();
		$parentRecordModel = Vtiger_Record_Model::getInstanceById($sourceRecordId, $sourceModule);
		$relationListView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $relatedModuleName);
		$excludedIds = $request->getArray('excluded_ids', 'Integer');
		if ('all' === $request->getRaw('selected_ids')) {
			if ($request->has('entityState')) {
				$relationListView->set('entityState', $request->getByType('entityState'));
			}
			if (!$request->isEmpty('operator', true)) {
				$relationListView->set('operator', $request->getByType('operator', 1));
			}
			if (!$request->isEmpty('search_key', true)) {
				$relationListView->set('search_key', $request->getByType('search_key', 1));
				$relationListView->set('search_value', $request->get('search_value'));
			}
			$searchParmams = $request->get('search_params');
			if (empty($searchParmams) || !is_array($searchParmams)) {
				$searchParmams = [];
			}
			$transformedSearchParams = $relationListView->get('query_generator')->parseBaseSearchParamsToCondition($searchParmams);
			$relationListView->set('search_params', $transformedSearchParams);
			$rows = array_keys($relationListView->getEntries($pagingModel));
		} else {
			$rows = $request->getRaw('selected_ids') === '[]' ? [] : $request->getArray('selected_ids');
		}
		$workbook = new PHPExcel();
		$worksheet = $workbook->setActiveSheetIndex(0);
		$header_styles = [
			'fill' => ['type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => ['rgb' => 'E1E0F7']],
			'font' => ['bold' => true]
		];
		$row = 1;
		$col = 0;
		$headers = $relationListView->getHeaders();
		foreach ($headers as $fieldsModel) {
			$worksheet->setCellValueExplicitByColumnAndRow($col, $row, App\Purifier::decodeHtml(App\Language::translate($fieldsModel->getFieldLabel(), $relatedModuleName)), PHPExcel_Cell_DataType::TYPE_STRING);
			$col++;
		}
		$row++;
		foreach ($rows as $id) {
			if (!in_array($id, $excludedIds) && \App\Privilege::isPermitted($relatedModuleName, 'DetailView', $id)) {
				$col = 0;
				$record = Vtiger_Record_Model::getInstanceById($id, $relatedModuleName);
				if (!$record->isViewable()) {
					continue;
				}
				foreach ($headers as $fieldsModel) {
					//depending on the uitype we might want the raw value, the display value or something else.
					//we might also want the display value sans-links so we can use strip_tags for that
					//phone numbers need to be explicit strings
					$value = $record->getDisplayValue($fieldsModel->getFieldName(), $id, true);
					switch ($fieldsModel->getUIType()) {
						case 25:
						case 7:
							if ($fieldsModel->getFieldName() === 'sum_time') {
								$worksheet->setCellvalueExplicitByColumnAndRow($col, $row, $value, PHPExcel_Cell_DataType::TYPE_STRING);
							} else {
								$worksheet->setCellvalueExplicitByColumnAndRow($col, $row, $value, PHPExcel_Cell_DataType::TYPE_NUMERIC);
							}
							break;
						case 71:
						case 72:
							$worksheet->setCellvalueExplicitByColumnAndRow($col, $row, $record->get($fieldsModel->getFieldName()), PHPExcel_Cell_DataType::TYPE_NUMERIC);
							break;
						case 6://datetimes
						case 23:
						case 70:
							$worksheet->setCellvalueExplicitByColumnAndRow($col, $row, PHPExcel_Shared_Date::PHPToExcel(strtotime($record->get($fieldsModel->getFieldName()))), PHPExcel_Cell_DataType::TYPE_NUMERIC);
							$worksheet->getStyleByColumnAndRow($col, $row)->getNumberFormat()->setFormatCode('DD/MM/YYYY HH:MM:SS'); //format the date to the users preference
							break;
						default:
							$worksheet->setCellValueExplicitByColumnAndRow($col, $row, App\Purifier::decodeHtml($value), PHPExcel_Cell_DataType::TYPE_STRING);
					}
					$col++;
				}
				$row++;
			}
		}
		//having written out all the data lets have a go at getting the columns to auto-size
		$col = 0;
		$row = 1;
		foreach ($headers as &$fieldsModel) {
			$cell = $worksheet->getCellByColumnAndRow($col, $row);
			$worksheet->getStyleByColumnAndRow($col, $row)->applyFromArray($header_styles);
			$worksheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
			$col++;
		}
		$tmpDir = vglobal('tmp_dir');
		$tempFileName = tempnam(ROOT_DIRECTORY . DIRECTORY_SEPARATOR . $tmpDir, 'xls');
		$workbookWriter = PHPExcel_IOFactory::createWriter($workbook, 'Excel5');
		$workbookWriter->save($tempFileName);
		if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
			header('Pragma: public');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		}
		header('Content-Type: application/x-msexcel');
		header('Content-Length: ' . filesize($tempFileName));
		$filename = \App\Language::translate($relatedModuleName, $relatedModuleName) . '.xls';
		header("Content-Disposition: attachment; filename=\"$filename\"");
		$fp = fopen($tempFileName, 'rb');
		fpassthru($fp);
		fclose($fp);
		unlink($tempFileName);
	}

	/**
	 * Function to update the relation for specified source record id and related record id list
	 * @param \App\Request $request
	 * @throws \App\Exceptions\NoPermittedToRecord
	 * @throws \App\Exceptions\NoPermitted
	 */
	public function updateRelation(\App\Request $request)
	{
		$sourceModule = $request->getModule();
		$sourceRecordId = $request->getInteger('src_record');
		$relatedModule = $request->getByType('related_module', 2);
		$recordsToRemove = $request->get('recordsToRemove');
		$recordsToAdd = $request->get('recordsToAdd');
		$categoryToAdd = $request->get('categoryToAdd');
		$categoryToRemove = $request->get('categoryToRemove');
		vglobal('currentModule', $sourceModule);

		$sourceModuleModel = Vtiger_Module_Model::getInstance($sourceModule);
		$relatedModuleModel = Vtiger_Module_Model::getInstance($relatedModule);
		$relationModel = Vtiger_Relation_Model::getInstance($sourceModuleModel, $relatedModuleModel);

		if (!empty($recordsToAdd)) {
			foreach ($recordsToAdd as $relatedRecordId) {
				if (\App\Privilege::isPermitted($relatedModule, 'DetailView', $relatedRecordId)) {
					$relationModel->addRelation($sourceRecordId, $relatedRecordId);
				}
			}
		}
		if (!empty($recordsToRemove)) {
			if ($relationModel->privilegeToDelete()) {
				foreach ($recordsToRemove as $relatedRecordId) {
					$relationModel->deleteRelation((int) $sourceRecordId, (int) $relatedRecordId);
				}
			} else {
				throw new \App\Exceptions\NoPermitted('LBL_PERMISSION_DENIED', 406);
			}
		}
		if (!empty($categoryToAdd)) {
			foreach ($categoryToAdd as $category) {
				$relationModel->addRelTree($sourceRecordId, $category);
			}
		}
		if (!empty($categoryToRemove)) {
			if ($relationModel->privilegeToDelete()) {
				foreach ($categoryToRemove as $category) {
					$relationModel->deleteRelTree($sourceRecordId, $category);
				}
			} else {
				throw new \App\Exceptions\NoPermitted('LBL_PERMISSION_DENIED', 406);
			}
		}
		$response = new Vtiger_Response();
		$response->setResult(true);
		$response->emit();
	}

	/**
	 * Function to get the page count for reltedlist
	 * @param \App\Request $request
	 */
	public function getRelatedListPageCount(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$relatedModuleName = $request->getByType('relatedModule', 2);
		$parentId = $request->getInteger('record');
		if (!\App\Privilege::isPermitted($moduleName, 'DetailView', $parentId)) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
		$label = $request->get('tab_label');
		$totalCount = 0;
		$pageCount = 0;
		if ($relatedModuleName === 'ModComments') {
			$totalCount = ModComments_Record_Model::getCommentsCount($parentId);
		} elseif ($relatedModuleName === 'ModTracker') {
			$count = (int) ($unreviewed = current(ModTracker_Record_Model::getUnreviewed($parentId, false, true))) ? array_sum($unreviewed) : '';
			$totalCount = $count ? $count : '';
		} else {
			$relModules = !empty($relatedModuleName) ? [$relatedModuleName] : [];
			if ($relatedModuleName === 'ProductsAndServices') {
				$label = '';
				$relModules = ['Products', 'OutsourcedProducts', 'Assets', 'Services', 'OSSOutsourcedServices', 'OSSSoldServices'];
			}
			$categoryCount = ['Products', 'OutsourcedProducts', 'Services', 'OSSOutsourcedServices'];
			$pagingModel = new Vtiger_Paging_Model();
			$parentRecordModel = Vtiger_Record_Model::getInstanceById($parentId, $moduleName);
			$currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
			foreach ($relModules as $relModule) {
				if (!$currentUserPriviligesModel->hasModulePermission($relModule)) {
					continue;
				}
				$relationListView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $relModule, $label);
				if (!$relationListView) {
					continue;
				}
				if ($relatedModuleName === 'ProductsAndServices' && in_array($relModule, $categoryCount)) {
					$totalCount += (int) $relationListView->getRelatedTreeEntriesCount();
				}
				if ($relatedModuleName === 'Calendar' && \AppConfig::module($relatedModuleName, 'SHOW_ONLY_CURRENT_RECORDS_COUNT')) {
					$totalCount += (int) $relationListView->getRelationQuery()->andWhere(['vtiger_activity.status' => Calendar_Module_Model::getComponentActivityStateLabel('current')])->count();
				} else {
					$totalCount += (int) $relationListView->getRelatedEntriesCount();
				}
				$pageLimit = $pagingModel->getPageLimit();
				$pageCount = ceil((int) $totalCount / (int) $pageLimit);
			}
		}
		if ($pageCount == 0) {
			$pageCount = 1;
		}
		$result = [];
		$result['numberOfRecords'] = $totalCount;
		$result['page'] = $pageCount;
		$response = new Vtiger_Response();
		$response->setResult($result);
		$response->emit();
	}

	public function updateFavoriteForRecord(\App\Request $request)
	{
		$sourceModuleModel = Vtiger_Module_Model::getInstance($request->getModule());
		$relatedModuleModel = Vtiger_Module_Model::getInstance($request->getByType('relatedModule', 2));
		$relationModel = Vtiger_Relation_Model::getInstance($sourceModuleModel, $relatedModuleModel);

		if (!empty($relationModel)) {
			$result = $relationModel->updateFavoriteForRecord($request->getByType('actionMode'), ['crmid' => $request->getInteger('record'), 'relcrmid' => $request->getInteger('relcrmid')]);
		}

		$response = new Vtiger_Response();
		$response->setResult((bool) $result);
		$response->emit();
	}

	/**
	 * Function for calculating values for a list of related records
	 * @param \App\Request $request
	 * @throws \App\Exceptions\Security
	 * @throws \App\Exceptions\NotAllowedMethod
	 */
	public function calculate(\App\Request $request)
	{
		$queryGenerator = static::getQuery($request);
		$fieldQueryModel = $queryGenerator->getQueryField($request->getByType('fieldName', 2));
		$fieldModel = $fieldQueryModel->getField();
		if (!$fieldModel->isViewable()) {
			throw new \App\Exceptions\Security('ERR_NO_ACCESS_TO_THE_FIELD', 403);
		}
		if (!$fieldModel->isCalculateField()) {
			throw new \App\Exceptions\Security('ERR_NOT_SUPPORTED_FIELD', 406);
		}
		$columnName = $fieldQueryModel->getColumnName();
		switch ($request->getByType('calculateType')) {
			case 'sum':
				$value = $queryGenerator->createQuery()->sum($columnName);
				break;
			default:
				throw new \App\Exceptions\NotAllowedMethod('LBL_PERMISSION_DENIED', 406);
		}
		$response = new Vtiger_Response();
		$response->setResult($fieldModel->getDisplayValue($value));
		$response->emit();
	}
}
