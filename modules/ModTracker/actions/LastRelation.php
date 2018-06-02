<?php

/**
 * LastRelation Class
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */
class ModTracker_LastRelation_Action extends Vtiger_Action_Controller
{

	/**
	 * Function to check permission
	 * @param \App\Request $request
	 * @throws \App\Exceptions\NoPermittedToRecord
	 */
	public function checkPermission(\App\Request $request)
	{
		$sourceModule = $request->getByType('sourceModule', 2);
		$records = $request->get('recordsId');
		if ($sourceModule) {
			if (!in_array($sourceModule, AppConfig::module('ModTracker', 'SHOW_TIMELINE_IN_LISTVIEW')) || !\App\Privilege::isPermitted($sourceModule, 'TimeLineList')) {
				throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
			}
			foreach ($records as $recordId) {
				if (!App\Privilege::isPermitted($sourceModule, 'DetailView', $recordId)) {
					throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
				}
			}
		} else {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
	}

	/**
	 * Process
	 * @param \App\Request $request
	 */
	public function process(\App\Request $request)
	{
		$records = $request->get('recordsId');
		$result = ModTracker_Record_Model::getLastRelation($records, $request->getByType('sourceModule', 2));
		$response = new Vtiger_Response();
		$response->setResult($result);
		$response->emit();
	}

	/**
	 * Validate request
	 * @param \App\Request $request
	 * @return type
	 */
	public function validateRequest(\App\Request $request)
	{
		return $request->validateWriteAccess();
	}
}
