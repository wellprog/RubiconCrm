<?php

/**
 * UIType total time field class
 * @package YetiForce.UIType
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Vtiger_TotalTime_UIType extends Vtiger_Double_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$return = vtlib\Functions::decimalTimeFormat($value);
		return $return['short'];
	}
}
