<?php

/**
 * Save Application
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Tomasz Kur <t.kur@yetiforce.com>
 */
class Settings_WebserviceApps_SaveAjax_Action extends Settings_Vtiger_Index_Action
{

	/**
	 * Main process
	 * @param \App\Request $request
	 */
	public function process(\App\Request $request)
	{
		if ($request->isEmpty('id')) {
			$recordModel = Settings_WebserviceApps_Record_Model::getCleanInstance();
			$recordModel->set('type', $request->get('type'));
		} else {
			$recordModel = Settings_WebserviceApps_Record_Model::getInstanceById($request->getInteger('id'));
		}
		$recordModel->set('status', $request->getBoolean('status'));
		$recordModel->set('name', $request->get('name'));
		$recordModel->set('acceptable_url', $request->get('url'));
		$recordModel->set('pass', $request->get('pass'));
		$recordModel->set('accounts_id', $request->get('accounts'));
		$recordModel->save();
		$responce = new Vtiger_Response();
		$responce->setResult(true);
		$responce->emit();
	}
}
