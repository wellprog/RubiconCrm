<?php
namespace App\QueryField;

/**
 * Picklist Query Field Class
 * @package YetiForce.App
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class PicklistField extends BaseField
{

	/**
	 * Get value
	 * @return mixed
	 */
	public function getValue()
	{
		if (strpos($this->value, ',') !== false) {
			return explode(',', $this->value);
		}
		return explode('##', $this->value);
	}

	/**
	 * Not equal operator
	 * @return array
	 */
	public function operatorN()
	{
		return ['NOT IN', $this->getColumnName(), $this->getValue()];
	}
}
