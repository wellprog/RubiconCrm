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

class Vtiger_Url_UIType extends Vtiger_Base_UIType
{

	/**
	 * Allowed url protocols
	 * @var array string[]
	 */
	const ALLOWED_PROTOCOLS = ['http', 'https', 'ftp', 'ftps', 'telnet'];

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, $isUserFormat = false)
	{
		if ($this->validate || empty($value)) {
			return;
		}
		if (empty(parse_url($value)['scheme'])) {
			$value = 'http://' . $value;
		}
		if (!preg_match('/^([^\:]+)\:/i', $value, $m)) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		if (!(filter_var($value, FILTER_VALIDATE_URL) && in_array(strtolower($m[1]), static::ALLOWED_PROTOCOLS) )) {
			throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
		}
		$this->validate = true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$rawValue = $value;
		$value = \App\Purifier::encodeHtml($value);
		preg_match("^[\w]+:\/\/^", $value, $matches);
		if (empty($matches[0])) {
			$value = 'http://' . $value;
		}
		if ($rawText) {
			return $value;
		}
		$rawValue = \vtlib\Functions::textLength($rawValue, is_int($length) ? $length : false);
		return '<a class="urlField cursorPointer" title="' . $value . '" href="' . $value . '" target="_blank" rel="noreferrer">' . \App\Purifier::encodeHtml($rawValue) . '</a>';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/Url.tpl';
	}
}
