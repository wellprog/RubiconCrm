<?php
/**
 * Countries action class
 * @package YetiForce.Include
 * @license licenses/License.html
 * @author Wojciech Bruggemann <w.bruggemann@yetiforce.com>
 */

/**
 * Ajax save actions handler class
 */
class Settings_Countries_SaveAjax_Action extends Settings_Vtiger_Basic_Action
{

	/**
	 * Class constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('updateAllStatuses');
		$this->exposeMethod('updateSequence');
		$this->exposeMethod('updateStatus');
		$this->exposeMethod('updatePhone');
		$this->exposeMethod('updateUitype');
	}

	/**
	 * Update all statuses
	 * @param \App\Request $request
	 */
	public function updateAllStatuses(\App\Request $request)
	{
		$qualifiedModuleName = $request->getModule(false);
		$status = (int) $request->getBoolean('status');

		$moduleModel = Settings_Countries_Module_Model::getInstance($qualifiedModuleName);

		$response = new Vtiger_Response();
		$result = $moduleModel->updateAllStatuses($status);
		$response->setResult($result > 0);
		$response->emit();
	}

	/**
	 * Update sequence
	 * @param \App\Request $request
	 */
	public function updateSequence(\App\Request $request)
	{
		$qualifiedModuleName = $request->getModule(false);
		$sequencesList = $request->getArray('sequencesList', 'Integer');

		$moduleModel = Settings_Countries_Module_Model::getInstance($qualifiedModuleName);

		$response = new Vtiger_Response();
		if ($sequencesList) {
			$moduleModel->updateSequence($sequencesList);
			$response->setResult([true]);
		} else {
			$response->setError();
		}

		$response->emit();
	}

	/**
	 * Update status
	 * @param \App\Request $request
	 */
	public function updateStatus(\App\Request $request)
	{
		$qualifiedModuleName = $request->getModule(false);
		$id = $request->getInteger('id');
		$status = (int) $request->getBoolean('status');

		$moduleModel = Settings_Countries_Module_Model::getInstance($qualifiedModuleName);

		$response = new Vtiger_Response();
		$result = $moduleModel->updateStatus($id, $status);
		$response->setResult($result > 0);
		$response->emit();
	}

	/**
	 * Update phone
	 * @param \App\Request $request
	 */
	public function updatePhone(\App\Request $request)
	{
		$qualifiedModuleName = $request->getModule(false);
		$id = $request->getInteger('id');
		$phone = (int) $request->getBoolean('phone');

		$moduleModel = Settings_Countries_Module_Model::getInstance($qualifiedModuleName);

		$response = new Vtiger_Response();
		$result = $moduleModel->updatePhone($id, $phone);
		$response->setResult($result > 0);
		$response->emit();
	}

	/**
	 * Update uitype
	 * @param \App\Request $request
	 */
	public function updateUitype(\App\Request $request)
	{
		$qualifiedModuleName = $request->getModule(false);
		$id = $request->getInteger('id');
		$uitype = (int) $request->getBoolean('uitype');

		$moduleModel = Settings_Countries_Module_Model::getInstance($qualifiedModuleName);

		$response = new Vtiger_Response();
		$result = $moduleModel->updateUitype($id, $uitype);
		$response->setResult($result > 0);
		$response->emit();
	}
}
