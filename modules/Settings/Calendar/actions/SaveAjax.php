<?php

/**
 * Settings calendar SaveAjax action class
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
class Settings_Calendar_SaveAjax_Action extends Settings_Vtiger_IndexAjax_View
{

	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('updateCalendarConfig');
		$this->exposeMethod('updateNotWorkingDays');
	}

	public function updateCalendarConfig(\App\Request $request)
	{
		$params = $request->get('params');
		Settings_Calendar_Module_Model::updateCalendarConfig($params);
		$response = new Vtiger_Response();
		$response->setResult([
			'success' => true,
			'message' => \App\Language::translate('LBL_SAVE_CHANGES', $request->getModule(false))
		]);
		$response->emit();
	}

	public function updateNotWorkingDays(\App\Request $request)
	{
		$params = $request->get('param');
		Settings_Calendar_Module_Model::updateNotWorkingDays($params);
		$response = new Vtiger_Response();
		$response->setResult([
			'success' => true,
			'message' => \App\Language::translate('LBL_SAVE_ACTIVE_TYPE', $request->getModule(false))
		]);
		$response->emit();
	}
}
