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

class Vtiger_Multipicklist_UIType extends Vtiger_Base_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDBValue($value, $recordModel = false)
	{
		if (is_array($value)) {
			$value = implode(' |##| ', $value);
		}
		return \App\Purifier::decodeHtml($value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, $isUserFormat = false)
	{
		if ($this->validate || empty($value)) {
			return;
		}
		if (is_string($value)) {
			$value = explode(' |##| ', $value);
		}
		if (!is_array($value)) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		foreach ($value as $item) {
			if (!is_string($item)) {
				throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
			} elseif ($item != strip_tags($item)) {
				throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
			}
		}
		$this->validate = true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		if (empty($value)) {
			return null;
		}
		$values = explode(' |##| ', $value);
		$trValue = [];
		$moduleName = $this->getFieldModel()->getModuleName();
		$countValue = count($values);
		for ($i = 0; $i < $countValue; $i++) {
			$trValue[] = Vtiger_Language_Handler::getTranslatedString($values[$i], $moduleName);
		}
		$value = str_ireplace(' |##| ', ', ', implode(' |##| ', $trValue));
		if (is_int($length)) {
			$value = \vtlib\Functions::textLength($value, $length);
		}
		return \App\Purifier::encodeHtml($value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEditViewDisplayValue($value, $recordModel = false)
	{
		return explode(' |##| ', \App\Purifier::encodeHtml($value));
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/MultiPicklist.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getListSearchTemplateName()
	{
		return 'uitypes/MultiSelectFieldSearchView.tpl';
	}
}
