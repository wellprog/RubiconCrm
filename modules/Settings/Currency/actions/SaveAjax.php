<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * ********************************************************************************** */

class Settings_Currency_SaveAjax_Action extends Settings_Vtiger_Basic_Action
{

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		if ($request->isEmpty('record')) {
			//get instance from currency name, Aleady deleted and adding again same currency case
			$recordModel = Settings_Currency_Record_Model::getInstance($request->get('currency_name'));
			if (empty($recordModel)) {
				$recordModel = new Settings_Currency_Record_Model();
			}
		} else {
			$recordModel = Settings_Currency_Record_Model::getInstance($request->getInteger('record'));
		}
		$recordModel->set('currency_name', $request->get('currency_name'));
		$recordModel->set('currency_status', $request->getByType('currency_status'));
		$recordModel->set('currency_symbol', $request->get('currency_symbol'));
		$recordModel->set('currency_code', $request->getByType('currency_code'));
		$recordModel->set('conversion_rate', $request->getByType('conversion_rate', 'NumberInUserFormat'));
		//To make sure we are saving record as non deleted. This is useful if we are adding deleted currency
		$recordModel->set('deleted', 0);
		$response = new Vtiger_Response();
		try {
			if ($request->getByType('currency_status') === 'Inactive' && !$request->isEmpty('record')) {
				$transforCurrencyToId = $request->getInteger('transform_to_id');
				if (empty($transforCurrencyToId)) {
					throw new Exception('Transfer currency id cannot be empty');
				}
			}
			$id = $recordModel->save();
			$recordModel = Settings_Currency_Record_Model::getInstance($id);
			$response->setResult(array_merge($recordModel->getData(), ['record' => $recordModel->getId()]));
		} catch (Exception $e) {
			$response->setError($e->getCode(), $e->getMessage());
		}
		$response->emit();
	}

	/**
	 * {@inheritDoc}
	 */
	public function validateRequest(\App\Request $request)
	{
		$request->validateWriteAccess();
	}
}
