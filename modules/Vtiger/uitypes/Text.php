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

class Vtiger_Text_UIType extends Vtiger_Base_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDBValue($value, $recordModel = false)
	{
		return \App\Purifier::decodeHtml($value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function setValueFromRequest(\App\Request $request, Vtiger_Record_Model $recordModel, $requestFieldName = false)
	{
		$fieldName = $this->getFieldModel()->getFieldName();
		if (!$requestFieldName) {
			$requestFieldName = $fieldName;
		}
		if ($this->getFieldModel()->getUIType() === 300) {
			$value = $request->getForHtml($requestFieldName, '');
		} else {
			$value = $request->get($requestFieldName, '');
		}
		$this->validate($value);
		$recordModel->set($fieldName, $this->getDBValue($value, $recordModel));
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, $isUserFormat = false)
	{
		if ($this->validate || empty($value)) {
			return;
		}
		if (!is_string($value)) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		//Check for HTML tags
		if ($this->getFieldModel()->getUIType() !== 300 && $value !== strip_tags($value)) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		$this->validate = true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$uiType = $this->getFieldModel()->get('uitype');
		if (is_int($length)) {
			$value = \vtlib\Functions::textLength($value, $length);
		}
		if ($uiType === 300) {
			return App\Purifier::purifyHtml($value);
		} else {
			return nl2br(\App\Purifier::encodeHtml($value));
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/Text.tpl';
	}
}
