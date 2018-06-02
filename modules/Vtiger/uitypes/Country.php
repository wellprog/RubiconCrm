<?php

/**
 * UIType country field class
 * @package YetiForce.Fields
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Vtiger_Country_UIType extends Vtiger_Base_UIType
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
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$value = \App\Language::translateSingleMod($value, 'Other.Country');
		if (is_int($length)) {
			$value = \vtlib\Functions::textLength($value, $length);
		}
		return \App\Purifier::encodeHtml($value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/Country.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getListSearchTemplateName()
	{
		return 'uitypes/CountrySearchView.tpl';
	}

	/**
	 * Function to get all the available picklist values for the current field
	 * @return array List of picklist values if the field
	 */
	public function getPicklistValues()
	{
		return \App\Fields\Country::getAll('uitype');
	}
}
