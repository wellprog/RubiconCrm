<?php

/**
 * UIType InventoryLimit Field Class
 * @package YetiForce.Fields
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author YetiForce.com
 */
class Vtiger_InventoryLimit_UIType extends Vtiger_Picklist_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDBValue($value, $recordModel = false)
	{
		if (is_array($value)) {
			$value = implode(',', $value);
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
		if (!is_numeric($value)) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		if (is_array($value)) {
			foreach ($value as $value) {
				if (!is_numeric($value)) {
					throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
				}
			}
		}
		$this->validate = true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$limits = $this->getPicklistValues();
		return \App\Purifier::encodeHtml(isset($limits[$value]) ? $limits[$value] : '');
	}

	/**
	 * Function to get credit limits
	 * @param int $value
	 * @return array
	 */
	public static function getValues($value)
	{
		$limits = self::getLimits();
		return isset($limits[$value]) ? $limits[$value] : [];
	}

	/**
	 * Function to get all credit limits
	 * @return array
	 */
	public static function getLimits()
	{
		if (\App\Cache::has('Inventory', 'CreditLimits')) {
			return \App\Cache::get('Inventory', 'CreditLimits');
		}
		$limits = (new App\Db\Query())->from('a_#__inventory_limits')->where(['status' => 0])
				->createCommand(App\Db::getInstance('admin'))->queryAllByGroup(1);
		\App\Cache::save('Inventory', 'CreditLimits', $limits, \App\Cache::LONG);
		return $limits;
	}

	/**
	 * Function to get all the available picklist values for the current field
	 * @return array List of picklist values if the field
	 */
	public function getPicklistValues()
	{
		$limits = self::getLimits();
		foreach ($limits as $key => $limit) {
			$limits[$key] = $limit['value'] . ' - ' . $limit['name'];
		}
		return $limits;
	}
}
