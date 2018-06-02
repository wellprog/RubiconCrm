<?php
/**
 * Tools for phone class
 * @package YetiForce.App
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
namespace App\Fields;

/**
 * Phone class
 */
class Phone
{

	/**
	 * Get phone details
	 * @param string $phoneNumber
	 * @return boolean
	 */
	public static function getDetails($phoneNumber)
	{
		$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
		try {
			$swissNumberProto = $phoneUtil->parse($phoneNumber);
			if ($phoneUtil->isValidNumber($swissNumberProto)) {
				return [
					'number' => $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::INTERNATIONAL),
					'geocoding' => \libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance()->getDescriptionForNumber($swissNumberProto, \App\Language::getLanguage()),
					'carrier' => \libphonenumber\PhoneNumberToCarrierMapper::getInstance()->getNameForValidNumber($swissNumberProto, \App\Language::getShortLanguageName()),
					'country' => $phoneUtil->getRegionCodeForNumber($swissNumberProto)
				];
			}
		} catch (\libphonenumber\NumberParseException $e) {
			\App\Log::info($e->getMessage(), __CLASS__);
		}
		return false;
	}

	/**
	 * Verify phone number
	 * @param string $phoneNumber
	 * @param string|null $phoneCountry
	 * @return boolean
	 * @throws \App\Exceptions\FieldException
	 */
	public static function verifyNumber($phoneNumber, $phoneCountry)
	{
		$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
		if ($phoneCountry && !in_array($phoneCountry, $phoneUtil->getSupportedRegions())) {
			throw new \App\Exceptions\FieldException('LBL_INVALID_COUNTRY_CODE');
		}
		try {
			$swissNumberProto = $phoneUtil->parse($phoneNumber, $phoneCountry);
			if ($phoneUtil->isValidNumber($swissNumberProto)) {
				$phoneNumber = $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
				return [
					'isValidNumber' => true,
					'number' => $phoneNumber,
					'geocoding' => \libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance()->getDescriptionForNumber($swissNumberProto, \App\Language::getLanguage()),
					'carrier' => \libphonenumber\PhoneNumberToCarrierMapper::getInstance()->getNameForValidNumber($swissNumberProto, \App\Language::getShortLanguageName()),
					'country' => $phoneUtil->getRegionCodeForNumber($swissNumberProto)
				];
			}
		} catch (\libphonenumber\NumberParseException $e) {
			\App\Log::info($e->getMessage(), __CLASS__);
		}
		throw new \App\Exceptions\FieldException('LBL_INVALID_PHONE_NUMBER');
	}
}
