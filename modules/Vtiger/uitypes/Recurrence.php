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

class Vtiger_Recurrence_UIType extends Vtiger_Base_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, $isUserFormat = false)
	{
		if ($this->validate || empty($value)) {
			return;
		}
		$result = [];
		$values = explode(';', $value);
		foreach ($values as $val) {
			$val = explode('=', $val, 2);
			$result[$val[0]] = $val[1];
		}
		$allowedFreqValues = ['DAILY', 'WEEKLY', 'MONTHLY', 'YEARLY'];
		if (isset($result['FREQ']) && !in_array($result['FREQ'], $allowedFreqValues)) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		if (isset($result['INTERVAL'])) {
			if (!is_numeric($result['INTERVAL']) || $result['INTERVAL'] < 1 || $result['INTERVAL'] > 31) {
				throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
			}
		}
		$allowedDayes = ['SU', 'MO', 'TU', 'WE', 'TH', 'FR', 'SA'];
		if (isset($result['BYDAY']) && !in_array($result['BYDAY'], $allowedDayes)) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		if (isset($result['BYMONTHDAY'])) {
			if (!is_numeric($result['BYMONTHDAY']) || $result['BYMONTHDAY'] < 1 || $result['BYMONTHDAY'] > 31) {
				throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
			}
		}
		if (isset($result['COUNT']) && !is_numeric($result['COUNT'])) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		if (isset($result['UNTIL'])) {
			$dateTime = str_replace('T', ' ', $result['UNTIL']);
			$timeFormat = 'Ymd His';
			$d = DateTime::createFromFormat($timeFormat, $dateTime);
			if (!($d && $d->format($timeFormat) === $dateTime)) {
				throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
			}
		}
		$this->validate = true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/Recurrence.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDetailViewTemplateName()
	{
		return 'uitypes/RecurrenceDetailView.tpl';
	}

	/**
	 * Function to get the edit value in display view
	 * @param mixed $value
	 * @param Vtiger_Record_Model $recordModel
	 * @return mixed
	 */
	public function getEditViewDisplayValue($value, $recordModel = false)
	{
		return $this->getDisplayValue($value, false, $recordModel);
	}

	/**
	 * Parse recuring rule to array
	 * @param string $value
	 * @return array
	 */
	public static function getRecurringInfo($value)
	{
		$result = [];
		if ($value) {
			$values = explode(';', $value);
			foreach ($values as $val) {
				$val = explode('=', $val, 2);
				$result[$val[0]] = $val[1];
			}
			if (isset($result['UNTIL'])) {
				$displayDate = substr($result['UNTIL'], 0, 4) . '-' . substr($result['UNTIL'], 4, 2) . '-' . substr($result['UNTIL'], 6, 2);
				$result['UNTIL'] = App\Fields\Date::formatToDisplay($displayDate);
			}
			switch ($result['FREQ']) {
				case 'DAILY':
					$labelFreq = 'LBL_DAYS_TYPE';
					break;
				case 'WEEKLY':
					$labelFreq = 'LBL_WEEKS_TYPE';
					break;
				case 'MONTHLY':
					$labelFreq = 'LBL_MONTHS_TYPE';
					break;
				case 'YEARLY':
					$labelFreq = 'LBL_YEAR_TYPE';
					break;
			}
			$result['freqLabel'] = $labelFreq;
		}
		return $result;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$info = self::getRecurringInfo($value);
		$text = '';
		if (!$info) {
			$moduleName = 'Events';
			$text = App\Language::translate('LBL_REPEATEVENT', $moduleName) . ' ' . $info['INTERVAL'] . ' '
				. App\Language::translate($info['freqLabel'], $moduleName) . ' '
				. App\Language::translate('LBL_UNTIL', $moduleName) . ' ';
			if (isset($info['COUNT'], $info['UNTIL'])) {
				$text .= App\Language::translate('LBL_NEVER', $moduleName);
			} else if (isset($info['COUNT'])) {
				$text .= App\Language::translate('LBL_COUNT', $moduleName) . ': ' . $info['COUNT'];
			} else {
				$text .= App\Language::translate('LBL_UNTIL', $moduleName) . ': ' . $info['UNTIL'];
			}
		}
		return $text;
	}

	public function isAjaxEditable()
	{
		return false;
	}
}
