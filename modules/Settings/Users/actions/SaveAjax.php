<?php

/**
 * Basic Users Action Class
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Settings_Users_SaveAjax_Action extends Settings_Vtiger_Save_Action
{

	/**
	 * {@inheritDoc}
	 */
	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('updateConfig');
		$this->exposeMethod('saveSwitchUsers');
		$this->exposeMethod('saveLocks');
	}

	public function updateConfig(\App\Request $request)
	{
		$param = $request->getArray('param');
		$recordModel = Settings_Users_Module_Model::getInstance();
		$response = new Vtiger_Response();
		$response->setResult([
			'success' => $recordModel->setConfig($param),
			'message' => \App\Language::translate('LBL_SAVE_CONFIG', $request->getModule(false))
		]);
		$response->emit();
	}

	public function saveSwitchUsers(\App\Request $request)
	{
		$param = $request->getArray('param');
		$moduleModel = Settings_Users_Module_Model::getInstance();
		$moduleModel->saveSwitchUsers($param);
		$response = new Vtiger_Response();
		$response->setResult([
			'message' => \App\Language::translate('LBL_SAVE_CONFIG', $request->getModule(false))
		]);
		$response->emit();
	}

	/**
	 * Action to save locks
	 * @param \App\Request $request
	 */
	public function saveLocks(\App\Request $request)
	{
		$param = $request->getArray('param');
		$moduleModel = Settings_Users_Module_Model::getInstance();
		$moduleModel->saveLocks($param);
		$response = new Vtiger_Response();
		$response->setResult([
			'message' => \App\Language::translate('LBL_SAVE_CONFIG', $request->getModule(false))
		]);
		$response->emit();
	}
}
