<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * Contributor(s): YetiForce.com
 * *********************************************************************************** */

Class Products_Edit_View extends Vtiger_Edit_View
{

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$baseCurrenctDetails = $this->record->getBaseCurrencyDetails();
		$viewer = $this->getViewer($request);
		$viewer->assign('BASE_CURRENCY_NAME', 'curname' . $baseCurrenctDetails['currencyid']);
		$viewer->assign('BASE_CURRENCY_ID', $baseCurrenctDetails['currencyid']);
		$viewer->assign('BASE_CURRENCY_SYMBOL', $baseCurrenctDetails['symbol']);
		$viewer->assign('IMAGE_DETAILS', $this->record->getImageDetails());

		parent::process($request);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDuplicate()
	{
		$this->record->set('id', '');
		$this->record->set('qtyinstock', null);
		//While Duplicating record, If the related record is deleted then we are removing related record info in record model
		$mandatoryFieldModels = $this->record->getModule()->getMandatoryFieldModels();
		foreach ($mandatoryFieldModels as $fieldModel) {
			if ($fieldModel->isReferenceField()) {
				$fieldName = $fieldModel->get('name');
				if (!\App\Record::isExists($this->record->get($fieldName))) {
					$this->record->set($fieldName, '');
				}
			}
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getFooterScripts(\App\Request $request)
	{
		$headerScriptInstances = parent::getFooterScripts($request);

		$jsFileNames = [
			'libraries.jquery.multiplefileupload.jquery_MultiFile'
		];

		$jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
		$headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
		return $headerScriptInstances;
	}
}
