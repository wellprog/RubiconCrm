<?php

/**
 * OSSMailScanner cron action class
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
class OSSMailScanner_Cron_Action extends Vtiger_Action_Controller
{

	/**
	 * Function to check permission
	 * @param \App\Request $request
	 * @throws \App\Exceptions\NoPermittedForAdmin
	 */
	public function checkPermission(\App\Request $request)
	{
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		if (!$currentUserModel->isAdminUser()) {
			throw new \App\Exceptions\NoPermittedForAdmin('LBL_PERMISSION_DENIED');
		}
	}

	public function process(\App\Request $request)
	{
		$recordModel = Vtiger_Record_Model::getCleanInstance('OSSMailScanner');
		$response = new Vtiger_Response();
		$response->setResult($recordModel->executeCron(Users_Record_Model::getCurrentUserModel()->user_name));
		$response->emit();
	}
}
