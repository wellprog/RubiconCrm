<?php

/**
 * UIType Company Field Class
 * @package YetiForce.UIType
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Adrian Koń <a.kon@yetiforce.com>
 */
class Vtiger_CompanySelect_UIType extends Vtiger_Base_UIType
{

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
		$namesOfCompany = '';
		if (!empty($value)) {
			$namesOfCompany = $this->getPicklistValues()[$value[0]]['name'];
		}
		if (is_int($length)) {
			$namesOfCompany = \vtlib\Functions::textLength($namesOfCompany, $length);
		}
		return \App\Purifier::encodeHtml($namesOfCompany);
	}

	/**
	 * Function to get all the available picklist values for the company
	 * @return array List of picklist values if the field
	 */
	public function getPicklistValues()
	{
		return Settings_Companies_Module_Model::getAllCompanies();
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/CompanySelect.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getListSearchTemplateName()
	{
		return 'uitypes/CompanySelectFieldSearchView.tpl';
	}
}
