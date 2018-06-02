<?php
/**
 * Request basic class
 * @package YetiForce.App
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
namespace App;

/**
 * Request basic class
 */
class Request
{

	/**
	 * Raw request data
	 * @var array 
	 */
	protected $rawValues = [];

	/**
	 * Headers request
	 * @var array 
	 */
	protected $headers;

	/**
	 * Self instance
	 * @var Request 
	 */
	protected static $request;

	/**
	 * Purified request values for get
	 * @var array
	 */
	protected $purifiedValuesByGet = [];

	/**
	 * Purified request values for type
	 * @var array
	 */
	protected $purifiedValuesByType = [];

	/**
	 * Purified request values for integer
	 * @var array
	 */
	protected $purifiedValuesByInteger = [];

	/**
	 * Purified request values for array
	 * @var array
	 */
	protected $purifiedValuesByArray = [];

	/**
	 * Purified request values for exploded
	 * @var array
	 */
	protected $purifiedValuesByExploded = [];

	/**
	 * Purified request values for date range
	 * @var array
	 */
	protected $purifiedValuesByDateRange = [];

	/**
	 * Purified request values for date html
	 * @var array
	 */
	protected $purifiedValuesByHtml = [];

	/**
	 * Constructor
	 * @param array $rawValues
	 * @param bool $overwrite
	 */
	public function __construct($rawValues, $overwrite = true)
	{
		$this->rawValues = $rawValues;
		if ($overwrite) {
			static::$request = $this;
		}
	}

	/**
	 * Function to get the value for a given key
	 * @param string $key
	 * @param mixed $value Default value
	 * @return mixed
	 */
	public function get($key, $value = '')
	{
		if (isset($this->purifiedValuesByGet[$key])) {
			return $this->purifiedValuesByGet[$key];
		}
		if (isset($this->rawValues[$key])) {
			$value = $this->rawValues[$key];
		} else {
			return $value;
		}
		if (is_string($value) && (strpos($value, '[') === 0 || strpos($value, '{') === 0)) {
			$decodeValue = Json::decode($value);
			if (isset($decodeValue)) {
				$value = $decodeValue;
			}
		}
		if ($value) {
			$value = Purifier::purify($value);
		}
		return $this->purifiedValuesByGet[$key] = $value;
	}

	/**
	 * Purify by data type
	 * 
	 * Type list:
	 * Standard - only words
	 * 1 - only words
	 * Alnum - word and int
	 * 2 - word and int
	 * @param string $key Key name
	 * @param int|string $type Data type that is only acceptable, default only words 'Standard'
	 * @return boolean|mixed
	 */
	public function getByType($key, $type = 1)
	{
		if (isset($this->purifiedValuesByType[$key])) {
			return $this->purifiedValuesByType[$key];
		}
		if (isset($this->rawValues[$key])) {
			return $this->purifiedValuesByType[$key] = Purifier::purifyByType($this->rawValues[$key], $type);
		}
		return false;
	}

	/**
	 * Function to get the boolean value for a given key
	 * @param string $key
	 * @param mixed $defaultValue Default value
	 * @return boolean
	 */
	public function getBoolean($key, $defaultValue = '')
	{
		$value = $this->get($key, $defaultValue);
		if (is_bool($value)) {
			return $value;
		}
		return strcasecmp('true', (string) $value) === 0 || (string) $value === '1';
	}

	/**
	 * Function to get the integer value for a given key
	 * @param string $key
	 * @param integer $value
	 * @return integer
	 */
	public function getInteger($key, $value = 0)
	{
		if (isset($this->purifiedValuesByInteger[$key])) {
			return $this->purifiedValuesByInteger[$key];
		}
		if (!isset($this->rawValues[$key])) {
			return $value;
		}
		if (($value = filter_var($this->rawValues[$key], FILTER_VALIDATE_INT)) !== false) {
			return $this->purifiedValuesByInteger[$key] = $value;
		}
		throw new \App\Exceptions\BadRequest("ERR_NOT_ALLOWED_VALUE||$key||{$this->rawValues[$key]}", 406);
	}

	/**
	 * Function to get the array values for a given key
	 * @param string $key
	 * @param mixed $type
	 * @param array $value
	 * @return array
	 */
	public function getArray($key, $type = false, $value = [])
	{
		if (isset($this->purifiedValuesByArray[$key])) {
			return $this->purifiedValuesByArray[$key];
		}
		if (isset($this->rawValues[$key])) {
			$value = $this->rawValues[$key];
			if (is_string($value) && (strpos($value, '[') === 0 || strpos($value, '{') === 0)) {
				$decodeValue = Json::decode($value);
				if (isset($decodeValue)) {
					$value = $decodeValue;
				} else {
					\App\Log::warning('Invalid data format, problem encountered while decoding JSON. Data should be in JSON format. Data: ' . $value);
				}
			}
			if ($value) {
				$value = $type ? Purifier::purifyByType($value, $type) : Purifier::purify($value);
			}
			settype($value, 'array');
			return $this->purifiedValuesByArray[$key] = $value;
		}
		return $value;
	}

	/**
	 * Function to get the exploded values for a given key
	 * @param string $key
	 * @param string $delimiter
	 * @param bool|string $type
	 * @return array
	 */
	public function getExploded($key, $delimiter = ',', $type = false)
	{
		if (isset($this->purifiedValuesByExploded[$key])) {
			return $this->purifiedValuesByExploded[$key];
		}
		if (isset($this->rawValues[$key])) {
			if ($this->rawValues[$key] === '') {
				return [];
			}
			$value = explode($delimiter, $this->rawValues[$key]);
			if ($value) {
				$value = $type ? Purifier::purifyByType($value, $type) : Purifier::purify($value);
			}
			return $this->purifiedValuesByExploded[$key] = $value;
		}
		return $value;
	}

	/**
	 * Function to get the date range values for a given key
	 * @param string $key
	 * @return array
	 */
	public function getDateRange($key)
	{
		if (isset($this->purifiedValuesByDateRange[$key])) {
			return $this->purifiedValuesByDateRange[$key];
		}
		if (isset($this->rawValues[$key])) {
			if (!isset($this->rawValues[$key]) || $this->rawValues[$key] === '') {
				return [];
			}
			$value = Purifier::purify(explode(', ', $this->rawValues[$key]));
			return $this->purifiedValuesByDateRange[$key] = ['start' => $value[0], 'end' => $value[1]];
		}
		return $value;
	}

	/**
	 * Function to get html the value for a given key
	 * @param string $key
	 * @param mixed $value
	 * @return mixed
	 */
	public function getForHtml($key, $value = '')
	{
		if (isset($this->purifiedValuesByHtml[$key])) {
			return $this->purifiedValuesByHtml[$key];
		}
		if (isset($this->rawValues[$key])) {
			$value = $this->rawValues[$key];
		}
		if ($value) {
			$value = \App\Purifier::purifyHtml($value);
		}
		return $this->purifiedValuesByHtml[$key] = $value;
	}

	/**
	 * Function to get the value if its safe to use for SQL Query (column).
	 * @param string $key
	 * @param boolean $skipEmtpy
	 * @return string
	 */
	public function getForSql($key, $skipEmtpy = true)
	{
		return Purifier::purifySql($this->get($key), $skipEmtpy);
	}

	/**
	 * Function to get the request mode 
	 * @return string
	 */
	public function getMode()
	{
		return $this->getByType('mode', 2);
	}

	/**
	 * Get all data
	 * @return array
	 */
	public function getAll()
	{
		foreach ($this->rawValues as $key => $value) {
			$this->get($key);
		}
		return $this->purifiedValuesByGet;
	}

	/**
	 * Get all raw data
	 * @return array
	 */
	public function getAllRaw()
	{
		return $this->rawValues;
	}

	/**
	 * Get raw value
	 * @param string $key
	 * @param mixed $defaultValue
	 * @return mixed
	 */
	public function getRaw($key, $defaultValue = '')
	{
		if (isset($this->rawValues[$key])) {
			return $this->rawValues[$key];
		}
		return $defaultValue;
	}

	/**
	 * Get all headers
	 * @return string[]
	 */
	public function getHeaders()
	{
		if (isset($this->headers)) {
			return $this->headers;
		}
		$headers = [];
		if (!function_exists('apache_request_headers')) {
			foreach ($_SERVER as $key => $value) {
				if (substr($key, 0, 5) === 'HTTP_') {
					$key = str_replace(' ', '-', strtoupper(str_replace('_', ' ', substr($key, 5))));
				}
				$headers[$key] = Purifier::purify($value);
			}
		} else {
			$headers = array_change_key_case(apache_request_headers(), CASE_UPPER);
			foreach ($headers as &$value) {
				$value = Purifier::purify($value);
			}
		}
		return $this->headers = $headers;
	}

	/**
	 * Get header for a given key
	 * @param string $key
	 * @return string
	 */
	public function getHeader($key)
	{
		if (!isset($this->headers)) {
			$this->getHeaders();
		}
		return isset($this->headers[$key]) ? $this->headers[$key] : null;
	}

	/**
	 * Get request method
	 * @return string
	 * @throws \App\Exceptions\AppException
	 */
	public function getRequestMethod()
	{
		$method = $this->getServer('REQUEST_METHOD');
		if ($method === 'POST' && isset($_SERVER['HTTP_X_HTTP_METHOD'])) {
			if ($_SERVER['HTTP_X_HTTP_METHOD'] === 'DELETE') {
				$method = 'DELETE';
			} else if ($_SERVER['HTTP_X_HTTP_METHOD'] === 'PUT') {
				$method = 'PUT';
			} else {
				throw new \App\Exceptions\AppException('Unexpected Header');
			}
		}
		return $method;
	}

	/**
	 * Get server and execution environment information
	 * @param string $key
	 * @return boolean
	 */
	public function getServer($key, $default = false)
	{
		if (!isset($_SERVER[$key])) {
			return $default;
		}
		return Purifier::purifyByType($_SERVER[$key], 'Text');
	}

	/**
	 * Get module name
	 * @param boolean $raw
	 * @return string
	 */
	public function getModule($raw = true)
	{
		$moduleName = $this->getByType('module', 2);
		if (!$raw) {
			if (!$this->isEmpty('parent', true) && ($parentModule = $this->getByType('parent', 2)) === 'Settings') {
				$moduleName = "$parentModule:$moduleName";
			}
		}
		return $moduleName;
	}

	/**
	 * Check for existence of key
	 * @param string $key
	 * @return boolean
	 */
	public function has($key)
	{
		return isset($this->rawValues[$key]);
	}

	/**
	 * Function to check if the key is empty.
	 * @param string $key
	 * @param boolean $emptyFunction
	 * @return boolean
	 */
	public function isEmpty($key, $emptyFunction = false)
	{
		if ($emptyFunction) {
			return empty($this->rawValues[$key]);
		} else {
			return !isset($this->rawValues[$key]) || $this->rawValues[$key] === '';
		}
	}

	/**
	 * Function to set the value for a given key
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function set($key, $value)
	{
		$this->rawValues[$key] = $this->purifiedValuesByGet[$key] = $this->purifiedValuesByInteger[$key] = $this->purifiedValuesByType[$key] = $this->purifiedValuesByHtml[$key] = $value;
		return $this;
	}

	/**
	 * Function to remove the value for a given key 
	 * @param string $key
	 */
	public function delete($key)
	{
		if (isset($this->purifiedValuesByGet[$key])) {
			unset($this->purifiedValuesByGet[$key]);
		}
		if (isset($this->purifiedValuesByInteger[$key])) {
			unset($this->purifiedValuesByInteger[$key]);
		}
		if (isset($this->purifiedValuesByType[$key])) {
			unset($this->purifiedValuesByType[$key]);
		}
		if (isset($this->purifiedValuesByHtml[$key])) {
			unset($this->purifiedValuesByHtml[$key]);
		}
		if (isset($this->purifiedValuesByArray[$key])) {
			unset($this->purifiedValuesByArray[$key]);
		}
		if (isset($this->purifiedValuesByDateRange[$key])) {
			unset($this->purifiedValuesByDateRange[$key]);
		}
		if (isset($this->purifiedValuesByExploded[$key])) {
			unset($this->purifiedValuesByExploded[$key]);
		}
		if (isset($this->rawValues[$key])) {
			unset($this->rawValues[$key]);
		}
	}

	/**
	 * Get all request keys
	 * @return array
	 */
	public function getKeys()
	{
		return array_keys($this->rawValues);
	}

	/**
	 * Function to check if the ajax request.
	 * @return boolean
	 */
	public function isAjax()
	{
		if (!empty($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] === true) {
			return true;
		} elseif (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
			return true;
		}
		return false;
	}

	/**
	 * Validating read access request
	 * @throws \App\Exceptions\Csrf
	 */
	public function validateReadAccess()
	{
		$user = vglobal('current_user');
		// Referer check if present - to over come 
		if (isset($_SERVER['HTTP_REFERER']) && $user) {//Check for user post authentication.
			if ((stripos($_SERVER['HTTP_REFERER'], \AppConfig::main('site_URL')) !== 0) && ($this->get('module') != 'Install')) {
				throw new \App\Exceptions\Csrf('Illegal request');
			}
		}
	}

	/**
	 * Validating write access request
	 * @param boolean $skipRequestTypeCheck
	 * @throws \App\Exceptions\Csrf
	 */
	public function validateWriteAccess($skipRequestTypeCheck = false)
	{
		if (!$skipRequestTypeCheck) {
			if ($_SERVER['REQUEST_METHOD'] !== 'POST')
				throw new \App\Exceptions\Csrf('Invalid request - validate Write Access');
		}
		$this->validateReadAccess();
		if (class_exists('CSRF') && !\CSRF::check(false)) {
			throw new \App\Exceptions\Csrf('Unsupported request');
		}
	}

	/**
	 * Static instance initialization
	 * @param boolean|array $request
	 * @return Request
	 */
	public static function init($request = false)
	{
		if (!static::$request) {
			static::$request = new self($request ? $request : $_REQUEST);
		}
		return static::$request;
	}

	/**
	 * Support static methods, all functions must start with "_"
	 * @param string $name
	 * @param null|array $arguments
	 * @return mied
	 * @throws \App\Exceptions\AppException
	 */
	public static function __callStatic($name, $arguments = null)
	{
		if (!static::$request) {
			self::init();
		}
		$function = ltrim($name, '_');
		if (!method_exists(static::$request, $function)) {
			throw new \App\Exceptions\AppException('Method not found');
		}
		if (empty($arguments)) {
			return static::$request->$function();
		} else {
			$first = array_shift($arguments);
			if (empty($arguments)) {
				return static::$request->$function($first);
			}
			return static::$request->$function($first, $arguments[0]);
		}
	}
}
