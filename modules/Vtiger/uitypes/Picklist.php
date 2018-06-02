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

class Vtiger_Picklist_UIType extends Vtiger_Base_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		if ($value === '') {
			return '';
		}
		$moduleName = $this->getFieldModel()->getModuleName();
		$dispalyValue = Vtiger_Language_Handler::getTranslatedString($value, $moduleName);
		if (is_int($length)) {
			$dispalyValue = \vtlib\Functions::textLength($dispalyValue, $length);
		}
		if ($rawText) {
			return $dispalyValue;
		}
		$fieldName = App\Colors::sanitizeValue($this->getFieldModel()->getFieldName());
		$value = App\Colors::sanitizeValue($value);
		return "<span class=\"picklistValue picklistLb_{$moduleName}_{$fieldName}_{$value}\">$dispalyValue</span>";
	}

	/**
	 * {@inheritDoc}
	 */
	public function getListSearchTemplateName()
	{
		return 'uitypes/PickListFieldSearchView.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/Picklist.tpl';
	}
}
