<?php

/**
 * Settings MarketingProcesses SaveAjax action class
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
class Settings_MarketingProcesses_SaveAjax_Action extends Settings_Vtiger_IndexAjax_View
{

	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('updateConfig');
	}

	public function updateConfig(\App\Request $request)
	{
		$param = $request->get('param');
		$moduleModel = Settings_MarketingProcesses_Module_Model::getCleanInstance();
		$response = new Vtiger_Response();
		$response->setResult([
			'success' => $moduleModel->setConfig($param),
			'message' => \App\Language::translate('LBL_SAVE_CONFIG', $request->getModule(false))
		]);
		$response->emit();
	}
}
