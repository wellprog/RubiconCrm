<?php

/**
 * Settings search SaveAjax action class
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
class Settings_Search_SaveAjax_Action extends Settings_Vtiger_IndexAjax_View
{

	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('save');
		$this->exposeMethod('updateLabels');
		$this->exposeMethod('saveSequenceNumber');
	}

	public function save(\App\Request $request)
	{
		$params = $request->get('params');
		$success = Settings_Search_Module_Model::save($params);
		$message = 'LBL_SAVE_CHANGES_LABLE';
		if ($params['name'] === 'turn_off') {
			$message = 'LBL_SAVE_CHANGES_SEARCHING';
		}
		$response = new Vtiger_Response();
		$response->setResult([
			'success' => $success,
			'message' => \App\Language::translate($message, $request->getModule(false))
		]);
		$response->emit();
	}

	public function updateLabels(\App\Request $request)
	{
		$params = $request->get('params');
		Settings_Search_Module_Model::updateLabels($params);
		$response = new Vtiger_Response();
		$response->setResult([
			'success' => true,
			'message' => \App\Language::translate('Update has been completed', $request->getModule(false))
		]);
		$response->emit();
	}

	public function saveSequenceNumber(\App\Request $request)
	{
		$updatedFieldsList = $request->get('updatedFields');
		//This will update the modules sequence 
		Settings_Search_Module_Model::updateSequenceNumber($updatedFieldsList);
		$response = new Vtiger_Response();
		$response->setResult(['success' => true]);
		$response->emit();
	}
}
