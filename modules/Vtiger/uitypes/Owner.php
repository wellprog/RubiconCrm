<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class Vtiger_Owner_UIType extends Vtiger_Base_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDBValue($value, $recordModel = false)
	{
		return empty($value) ? \App\User::getCurrentUserId() : (int) $value;
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, $isUserFormat = false)
	{
		if ($this->validate || empty($value)) {
			return;
		}
		if (!is_numeric($value)) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		$this->validate = true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		if (empty($value)) {
			return '';
		}
		$ownerName = \App\Fields\Owner::getLabel($value);
		if (is_int($length)) {
			$ownerName = \vtlib\Functions::textLength($ownerName, $length);
		}
		if ($rawText) {
			return $ownerName;
		}
		switch (\App\Fields\Owner::getType($value)) {
			case 'Users':
				$userModel = Users_Privileges_Model::getInstanceById($value);
				$userModel->setModule('Users');
				if ($userModel->get('status') === 'Inactive') {
					$ownerName = '<span class="redColor"><s>' . $ownerName . '</s></span>';
				}
				if (App\User::getCurrentUserModel()->isAdmin()) {
					$detailViewUrl = $userModel->getDetailViewUrl();
				}
				break;
			case 'Groups':
				if (App\User::getCurrentUserModel()->isAdmin()) {
					$recordModel = new Settings_Groups_Record_Model();
					$recordModel->set('groupid', $value);
					$detailViewUrl = $recordModel->getDetailViewUrl();
				}
				break;
			default:
				$ownerName = '<span class="redColor">---</span>';
				break;
		}
		if (isset($detailViewUrl)) {
			return "<a href='" . $detailViewUrl . "'>$ownerName</a>";
		}
		return $ownerName;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getRelatedListDisplayValue($value)
	{
		return $value;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getListSearchTemplateName()
	{
		return 'uitypes/OwnerFieldSearchView.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/Owner.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function isAjaxEditable()
	{
		$userPrivModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		$roleModel = Settings_Roles_Record_Model::getInstanceById($userPrivModel->get('roleid'));
		if ($roleModel->get('changeowner')) {
			return true;
		}
		return false;
	}
}
