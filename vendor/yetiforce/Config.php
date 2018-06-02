<?php
/**
 * Config main class
 * @package YetiForce.App
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
namespace App;

/**
 * Config main class
 */
class Config
{

	/**
	 * Requesrt start time
	 * @var int
	 */
	public static $startTime;

	/**
	 * Request mode
	 * @var string
	 */
	public static $requestMode;

	/**
	 * CRM root directory
	 * @var string
	 */
	public static $rootDirectory;

	/**
	 * Request process type
	 * @var string
	 */
	public static $processType;

	/**
	 * Request process name
	 * @var string
	 */
	public static $processName;

}
