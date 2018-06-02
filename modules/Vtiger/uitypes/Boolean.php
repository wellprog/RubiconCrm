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

class Vtiger_Boolean_UIType extends Vtiger_Base_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDBValue($value, $recordModel = false)
	{
		if ($value === 'on' || (int) $value === 1) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, $isUserFormat = false)
	{
		if ($this->validate || empty($value)) {
			return;
		}
		if (!in_array($value, [0, 1, '1', '0', 'on'])) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		$this->validate = true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		if ($value === 1 || $value === '1' || strtolower($value) === 'on' || strtolower($value) === 'yes' || true === $value) {
			return Vtiger_Language_Handler::getTranslatedString('LBL_YES', $this->getFieldModel()->getModuleName());
		} else if ($value === 0 || $value === '0' || strtolower($value) === 'off' || strtolower($value) === 'no' || false === $value) {
			return Vtiger_Language_Handler::getTranslatedString('LBL_NO', $this->getFieldModel()->getModuleName());
		}
		return \App\Purifier::encodeHtml($value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/Boolean.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getListSearchTemplateName()
	{
		return 'uitypes/BooleanFieldSearchView.tpl';
	}
}
