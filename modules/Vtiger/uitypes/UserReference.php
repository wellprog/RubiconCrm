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

class Vtiger_UserReference_UIType extends Vtiger_Base_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, $isUserFormat = false)
	{
		if ($this->validate || empty($value)) {
			return;
		}
		if (!is_numeric($value) || \App\User::isExists($value)) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		$this->validate = true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEditViewDisplayValue($value, $recordModel = false)
	{
		if ($value) {
			return \App\Fields\Owner::getLabel($value);
		}
		return '';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$displayValue = \vtlib\Functions::textLength($this->getEditViewDisplayValue($value, $recordModel), is_int($length) ? $length : false);
		if (App\User::getCurrentUserModel()->isAdmin() && !$rawText) {
			$recordModel = Users_Record_Model::getCleanInstance('Users');
			$recordModel->setId($value);
			return '<a href="' . $recordModel->getDetailViewUrl() . '">' . $displayValue . '</a>';
		}
		return $displayValue;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/Reference.tpl';
	}
}
