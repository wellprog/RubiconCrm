<?php

/**
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 * @author Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */
class Settings_WidgetsManagement_SaveAjax_Action extends Settings_Vtiger_IndexAjax_View
{

	public function checkPermission(\App\Request $request)
	{
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$mode = $request->getMode();
		if ($mode === 'delete' && !$currentUserModel->isAdminUser()) {
			throw new \App\Exceptions\AppException('LBL_PERMISSION_DENIED');
		}
		$sourceModule = $request->getByType('sourceModule', 2);
		$currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if (!$currentUserPriviligesModel->hasModuleActionPermission($sourceModule, 'Save')) {
			throw new \App\Exceptions\AppException('LBL_PERMISSION_DENIED');
		}
	}

	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('save');
		$this->exposeMethod('delete');
	}

	public function save(\App\Request $request)
	{
		$data = $request->get('form');
		$moduleName = $request->getByType('sourceModule', 2);
		$addToUser = $request->get('addToUser');
		if (!is_array($data) || !$data) {
			$result = ['success' => false, 'message' => \App\Language::translate('LBL_INVALID_DATA', $moduleName)];
		} else {
			if (!$data['action'])
				$data['action'] = 'saveDetails';
			$action = $data['action'];
			$widgetsManagementModel = new Settings_WidgetsManagement_Module_Model();
			$result = $widgetsManagementModel->$action($data, $moduleName, $addToUser);
		}
		$response = new Vtiger_Response();
		$response->setResult($result);
		$response->emit();
	}

	public function delete(\App\Request $request)
	{
		$data = $request->get('form');
		$moduleName = $request->getByType('sourceModule', 2);
		if (!is_array($data) || !$data) {
			$result = ['success' => false, 'message' => \App\Language::translate('LBL_INVALID_DATA', $moduleName)];
		} else {
			$action = $data['action'];
			if (!$action) {
				$action = 'removeWidget';
			}
			$widgetsManagementModel = new Settings_WidgetsManagement_Module_Model();
			$result = $widgetsManagementModel->$action($data);
		}
		$response = new Vtiger_Response();
		$response->setResult($result);
		$response->emit();
	}
}
