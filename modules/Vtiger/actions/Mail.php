<?php

/**
 * Mail action class
 * @package YetiForce.App
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Vtiger_Mail_Action extends Vtiger_Action_Controller
{

	/**
	 * Function to check permission
	 * @param \App\Request $request
	 * @throws \App\Exceptions\NoPermitted
	 * @throws \App\Exceptions\NoPermittedToRecord
	 */
	public function checkPermission(\App\Request $request)
	{
		if (!$request->isEmpty('sourceRecord') && !\App\Privilege::isPermitted($request->getByType('sourceModule', 2), 'DetailView', $request->getInteger('sourceRecord'))) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
	}

	/**
	 * Construct
	 */
	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('checkSmtp');
		$this->exposeMethod('sendMails');
	}

	/**
	 * Process function
	 * @param \App\Request $request
	 */
	public function process(\App\Request $request)
	{
		$mode = $request->getMode();
		if (!empty($mode)) {
			echo $this->invokeExposedMethod($mode, $request);
		}
	}

	/**
	 * Check if smtps are active
	 * @param \App\Request $request
	 */
	public function checkSmtp(\App\Request $request)
	{
		$result = false;
		if (AppConfig::main('isActiveSendingMails')) {
			$result = !empty(App\Mail::getAll());
		}
		$response = new Vtiger_Response();
		$response->setResult($result);
		$response->emit();
	}

	/**
	 * Send mails
	 * @param \App\Request $request
	 */
	public function sendMails(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$field = $request->getByType('field');
		$template = $request->getInteger('template');
		$sourceModule = $request->getByType('sourceModule',2);
		$sourceRecord = $request->getInteger('sourceRecord');
		$result = false;
		if (!empty($template) && !empty($field)) {
			$dataReader = $this->getQuery($request)->createCommand()->query();
			while ($row = $dataReader->read()) {
				if ($sourceModule === 'Campaigns') {
					$result = \App\Mailer::sendFromTemplate([
							'template' => $template,
							'moduleName' => $sourceModule,
							'recordId' => $sourceRecord,
							'to' => $row[$field],
							'sourceModule' => $moduleName,
							'sourceRecord' => $row['id'],
					]);
				} else {
					$result = \App\Mailer::sendFromTemplate([
							'template' => $template,
							'moduleName' => $moduleName,
							'recordId' => $row['id'],
							'to' => $row[$field],
							'sourceModule' => $sourceModule,
							'sourceRecord' => $sourceRecord,
					]);
				}
				if (!$result) {
					break;
				}
			}
		}
		$response = new Vtiger_Response();
		$response->setResult($result);
		$response->emit();
	}

	/**
	 * Get query instance
	 * @param \App\Request $request
	 * @return \App\Db\Query
	 */
	public function getQuery(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$sourceModule = $request->getByType('sourceModule',2);
		if ($sourceModule) {
			$parentRecordModel = Vtiger_Record_Model::getInstanceById($request->getInteger('sourceRecord'), $sourceModule);
			$listView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $moduleName);
		} else {
			$listView = Vtiger_ListView_Model::getInstance($moduleName, $request->getByType('viewname', 2));
		}
		$searchResult = $request->get('searchResult');
		if (!empty($searchResult)) {
			$listView->set('searchResult', $searchResult);
		}
		$searchKey = $request->getByType('search_key');
		$searchValue = $request->get('search_value');
		$operator = $request->getByType('operator');
		if (!empty($searchKey) && !empty($searchValue)) {
			$listView->set('operator', $operator);
			$listView->set('search_key', $searchKey);
			$listView->set('search_value', $searchValue);
		}
		$searchParams = $request->get('search_params');
		if (!empty($searchParams) && is_array($searchParams)) {
			$transformedSearchParams = $listView->getQueryGenerator()->parseBaseSearchParamsToCondition($searchParams);
			$listView->set('search_params', $transformedSearchParams);
		}
		$queryGenerator = $listView->getQueryGenerator();
		$moduleModel = $queryGenerator->getModuleModel();
		$baseTableName = $moduleModel->get('basetable');
		$baseTableId = $moduleModel->get('basetableid');
		$queryGenerator->setFields(['id', $request->getByType('field')]);
		$queryGenerator->addCondition($request->getByType('field'), '', 'ny');
		$selected = $request->get('selected_ids');
		if ($selected && $selected !== 'all') {
			$queryGenerator->addNativeCondition(["$baseTableName.$baseTableId" => $selected]);
		}
		$excluded = $request->get('excluded_ids');
		if ($excluded) {
			$queryGenerator->addNativeCondition(['not in', "$baseTableName.$baseTableId" => $excluded]);
		}
		return $queryGenerator->createQuery();
	}
}
