<?php
namespace App;

/**
 * Modules basic class
 * @package YetiForce.App
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Module
{

	protected static $moduleEntityCacheById = [];

	/**
	 * Cache for tabdata.php
	 * @var array 
	 */
	protected static $tabdataCache;

	/**
	 * Init tabdataCache
	 */
	public static function init()
	{
		static::$tabdataCache = require 'user_privileges/tabdata.php';
		static::$tabdataCache['tabName'] = array_flip(static::$tabdataCache['tabId']);
	}

	public static function getEntityInfo($mixed = false)
	{
		$entity = false;
		if ($mixed) {
			if (is_numeric($mixed)) {
				if (Cache::has('ModuleEntityById', $mixed)) {
					return Cache::get('ModuleEntityById', $mixed);
				}
			} else {
				if (Cache::has('ModuleEntityByName', $mixed)) {
					return Cache::get('ModuleEntityByName', $mixed);
				}
			}
		}
		if (!$entity) {
			$dataReader = (new \App\Db\Query())->from('vtiger_entityname')
					->createCommand()->query();
			while ($row = $dataReader->read()) {
				$row['fieldnameArr'] = explode(',', $row['fieldname']);
				$row['searchcolumnArr'] = explode(',', $row['searchcolumn']);
				Cache::save('ModuleEntityByName', $row['modulename'], $row);
				Cache::save('ModuleEntityById', $row['tabid'], $row);
				static::$moduleEntityCacheById[$row['tabid']] = $row;
			}
			if ($mixed) {
				if (is_numeric($mixed)) {
					return Cache::get('ModuleEntityById', $mixed);
				} else {
					return Cache::get('ModuleEntityByName', $mixed);
				}
			}
		}
		return $entity;
	}

	public static function getAllEntityModuleInfo($sort = false)
	{
		if (empty(static::$moduleEntityCacheById)) {
			static::getEntityInfo();
		}
		$entity = [];
		if ($sort) {
			foreach (static::$moduleEntityCacheById as $row) {
				$entity[$row['sequence']] = $row;
			}
			ksort($entity);
		} else {
			$entity = static::$moduleEntityCacheById;
		}
		return $entity;
	}

	protected static $isModuleActiveCache = [];

	public static function isModuleActive($moduleName)
	{
		if (isset(static::$isModuleActiveCache[$moduleName])) {
			return static::$isModuleActiveCache[$moduleName];
		}
		$moduleAlwaysActive = ['Administration', 'CustomView', 'Settings', 'Users', 'Migration',
			'Utilities', 'uploads', 'Import', 'System', 'com_vtiger_workflow', 'PickList'
		];
		if (in_array($moduleName, $moduleAlwaysActive)) {
			static::$isModuleActiveCache[$moduleName] = true;
			return true;
		}
		$moduleId = static::getModuleId($moduleName);
		$isActive = (isset(static::$tabdataCache['tabPresence'][$moduleId]) && static::$tabdataCache['tabPresence'][$moduleId] == 0) ? true : false;
		static::$isModuleActiveCache[$moduleName] = $isActive;
		return $isActive;
	}

	/**
	 * Get module id by module name
	 * @param string $moduleName
	 * @return int|bool
	 */
	public static function getModuleId($moduleName)
	{
		return isset(static::$tabdataCache['tabId'][$moduleName]) ? static::$tabdataCache['tabId'][$moduleName] : false;
	}

	/**
	 * Get module nane by module id
	 * @param int $tabId
	 * @return string|bool
	 */
	public static function getModuleName($tabId)
	{
		return isset(static::$tabdataCache['tabName'][$tabId]) ? static::$tabdataCache['tabName'][$tabId] : false;
	}

	/**
	 * Get module owner by module id
	 * @param int $tabId
	 * @return int
	 */
	public static function getModuleOwner($tabId)
	{
		return isset(static::$tabdataCache['tabOwnedby'][$tabId]) ? static::$tabdataCache['tabOwnedby'][$tabId] : false;
	}

	/**
	 * Function get module name
	 * @param string $moduleName
	 * @return string
	 */
	public static function getTabName($moduleName)
	{
		return $moduleName === 'Events' ? 'Calendar' : $moduleName;
	}

	/**
	 * Function to get the list of module for which the user defined sharing rules can be defined
	 * @param array $eliminateModules
	 * @return array
	 */
	public static function getSharingModuleList($eliminateModules = false)
	{
		$modules = \vtlib\Functions::getAllModules(true, true, 0, false, 0);
		$sharingModules = [];
		foreach ($modules as $tabId => $row) {
			if (!$eliminateModules || !in_array($row['name'], $eliminateModules)) {
				$sharingModules[] = $row['name'];
			}
		}
		return $sharingModules;
	}

	/**
	 * Get sql for name in display format
	 * @param string $moduleName
	 * @return string
	 */
	public static function getSqlForNameInDisplayFormat($moduleName)
	{
		$db = \App\Db::getInstance();
		$entityFieldInfo = static::getEntityInfo($moduleName);
		$fieldsName = $entityFieldInfo['fieldnameArr'];
		if (count($fieldsName) > 1) {
			$sqlString = 'CONCAT(';
			foreach ($fieldsName as &$column) {
				$sqlString .= "{$db->quoteTableName($entityFieldInfo['tablename'])}.{$db->quoteColumnName($column)},' ',";
			}
			$formattedName = new \yii\db\Expression(rtrim($sqlString, ',\' \',') . ')');
		} else {
			$fieldsName = array_pop($fieldsName);
			$formattedName = "{$db->quoteTableName($entityFieldInfo['tablename'])}.{$db->quoteColumnName($fieldsName)}";
		}
		return $formattedName;
	}

	/**
	 * Function to get a action id for a given action name
	 * @param string $action
	 * @return int|null
	 */
	public static function getActionId($action)
	{
		if (empty($action)) {
			return null;
		}
		if (Cache::has('getActionId', $action)) {
			return Cache::get('getActionId', $action);
		}
		$actionIds = static::$tabdataCache['actionId'];
		if (isset($actionIds[$action])) {
			$actionId = $actionIds[$action];
		}
		if (empty($actionId)) {
			$actionId = (new Db\Query())->select(['actionid'])->from('vtiger_actionmapping')->where(['actionname' => $action])->scalar();
		}
		if (is_numeric($actionId)) {
			$actionId = (int) $actionId;
		}
		Cache::save('getActionId', $action, $actionId, Cache::LONG);
		return $actionId;
	}
}

Module::init();
