<?php
namespace App\Fields;

/**
 * Owner class
 * @package YetiForce.App
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 * @author Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */
class Owner
{

	protected $moduleName;
	protected $searchValue;
	protected $currentUser;

	/**
	 * Function to get the instance
	 * @param string $moduleName
	 * @param mixed $currentUser
	 * @return \self
	 */
	public static function getInstance($moduleName = false, $currentUser = false)
	{
		if ($currentUser && $currentUser instanceof Users) {
			$currentUser = \App\User::getUserModel($currentUser->id);
		} elseif ($currentUser === false) {
			$currentUser = \App\User::getCurrentUserModel();
		} elseif (is_numeric($currentUser)) {
			$currentUser = \App\User::getUserModel($currentUser);
		} elseif (is_object($currentUser) && get_class($currentUser) === 'Users_Record_Model') {
			$currentUser = \App\User::getUserModel($currentUser->getId());
		}

		$cacheKey = $moduleName . $currentUser->getId();
		$instance = \Vtiger_Cache::get('App\Fields\Owner', $cacheKey);
		if ($instance === false) {
			$instance = new self();
			$instance->moduleName = $moduleName != false ? $moduleName : \App\Request::_get('module');
			$instance->currentUser = $currentUser;
			\Vtiger_Cache::set('App\Fields\Owner', $cacheKey, $instance);
		}
		return $instance;
	}

	public function find($value)
	{
		$this->searchValue = $value;
	}

	/**
	 * Function to get all the accessible groups
	 * @return <Array>
	 */
	public function getAccessibleGroups($private = '', $fieldType = false, $translate = false)
	{
		$cacheKey = $private . $this->moduleName . $fieldType;
		$accessibleGroups = \Vtiger_Cache::get('getAccessibleGroups', $cacheKey);
		if ($accessibleGroups === false) {
			$currentUserRoleModel = \Settings_Roles_Record_Model::getInstanceById($this->currentUser->getRole());
			if (!empty($fieldType) && $currentUserRoleModel->get('allowassignedrecordsto') == '5' && $private != 'Public') {
				$accessibleGroups = $this->getAllocation('groups', $private, $fieldType);
			} else {
				$accessibleGroups = $this->getGroups(false, $private);
			}
			\Vtiger_Cache::set('getAccessibleGroups', $cacheKey, $accessibleGroups);
		}
		if ($translate) {
			foreach ($accessibleGroups as &$name) {
				$name = \App\Language::translate($name);
			}
		}
		if (!empty($this->searchValue)) {
			$this->searchValue = strtolower($this->searchValue);
			$accessibleGroups = array_filter($accessibleGroups, function($name) {
				return strstr(strtolower($name), $this->searchValue);
			});
		}
		return $accessibleGroups;
	}

	/**
	 * Function to get all the accessible users
	 * @param string $private
	 * @param mixed $fieldType
	 * @return array
	 */
	public function getAccessibleUsers($private = '', $fieldType = false)
	{
		$cacheKey = $private . $this->moduleName . $fieldType . $fieldType;
		$accessibleUser = \Vtiger_Cache::get('getAccessibleUsers', $cacheKey);
		if ($accessibleUser === false) {
			$currentUserRoleModel = \Settings_Roles_Record_Model::getInstanceById($this->currentUser->getRole());
			if ($currentUserRoleModel->get('allowassignedrecordsto') == '1' || $private == 'Public') {
				$accessibleUser = $this->getUsers(false, 'Active', '', $private, true);
			} else if ($currentUserRoleModel->get('allowassignedrecordsto') == '2') {
				$currentUserRoleModel = \Settings_Roles_Record_Model::getInstanceById($this->currentUser->getRole());
				$sameLevelRoles = array_keys($currentUserRoleModel->getSameLevelRoles());
				$childernRoles = \App\PrivilegeUtil::getRoleSubordinates($this->currentUser->getRole());
				$roles = array_merge($sameLevelRoles, $sameLevelRoles);
				$accessibleUser = $this->getUsers(false, 'Active', '', '', false, array_unique($roles));
			} else if ($currentUserRoleModel->get('allowassignedrecordsto') == '3') {
				$childernRoles = \App\PrivilegeUtil::getRoleSubordinates($this->currentUser->getRole());
				$accessibleUser = $this->getUsers(false, 'Active', '', '', false, array_unique($childernRoles));
				$accessibleUser[$this->currentUser->getId()] = $this->currentUser->getName();
			} else if (!empty($fieldType) && $currentUserRoleModel->get('allowassignedrecordsto') == '5') {
				$accessibleUser = $this->getAllocation('users', '', $fieldType);
			} else {
				$accessibleUser[$this->currentUser->getId()] = $this->currentUser->getName();
			}
			\Vtiger_Cache::set('getAccessibleUsers', $cacheKey, $accessibleUser);
		}
		return $accessibleUser;
	}

	/**
	 * Get accessible
	 * @param string $private
	 * @param boolean $fieldType
	 * @param boolean $translate
	 * @return array
	 */
	public function getAccessible($private = '', $fieldType = false, $translate = false)
	{
		return [
			'users' => $this->getAccessibleUsers($private, $fieldType),
			'groups' => $this->getAccessibleGroups($private, $fieldType, $translate)
		];
	}

	/**
	 * Get allocation
	 * @param string $mode
	 * @param string $private
	 * @param string $fieldType
	 * @return array
	 */
	public function getAllocation($mode, $private = '', $fieldType)
	{
		if (\App\Request::_get('parent') != 'Settings') {
			$moduleName = $this->moduleName;
		}

		$result = [];
		$usersGroups = \Settings_RecordAllocation_Module_Model::getRecordAllocationByModule($fieldType, $moduleName);
		$usersGroups = ($usersGroups && $usersGroups[$this->currentUser->getId()]) ? $usersGroups[$this->currentUser->getId()] : [];
		if ($mode == 'users') {
			$users = $usersGroups ? $usersGroups['users'] : [];
			if (!empty($users)) {
				$result = $this->getUsers(false, 'Active', $users);
			}
		} else {
			$groups = $usersGroups ? $usersGroups['groups'] : [];
			if (!empty($groups)) {
				$groupsAll = $this->getGroups(false, $private);
				foreach ($groupsAll as $ID => $name) {
					if (in_array($ID, $groups)) {
						$result[$ID] = $name;
					}
				}
			}
		}
		return $result;
	}

	/**
	 * Function initiates users list
	 * @param string $status
	 * @param mixed $assignedUser
	 * @param string $private
	 * @param mixed $roles
	 * @return array
	 */
	public function &initUsers($status = 'Active', $assignedUser = '', $private = '', $roles = false)
	{
		$cacheKeyMod = $private === 'private' ? $this->moduleName : '';
		$cacheKeyAss = is_array($assignedUser) ? md5(json_encode($assignedUser)) : $assignedUser;
		$cacheKeyRole = is_array($roles) ? md5(json_encode($roles)) : $roles;
		$cacheKey = $cacheKeyMod . $status . $cacheKeyAss . $private . $cacheKeyRole;
		if (!\App\Cache::has('getUsers', $cacheKey)) {
			$entityData = \App\Module::getEntityInfo('Users');
			$query = $this->getQueryInitUsers($private, $status, $roles);
			if (!empty($assignedUser)) {
				$query->where(['vtiger_users.id' => $assignedUser]);
			}
			$tempResult = [];
			$dataReader = $query->createCommand()->query();
			// Get the id and the name.
			while ($row = $dataReader->read()) {
				$fullName = '';
				foreach ($entityData['fieldnameArr'] as &$field) {
					$fullName .= ' ' . $row[$field];
				}
				$row['fullName'] = trim($fullName);
				$tempResult[$row['id']] = array_map('\App\Purifier::encodeHtml', $row);
			}
			\App\Cache::save('getUsers', $cacheKey, $tempResult);
		}
		$tmp = \App\Cache::get('getUsers', $cacheKey);
		return $tmp;
	}

	/**
	 * Function gets sql query
	 * @param mixed $private
	 * @param mixed $status
	 * @param mixed $roles
	 * @return \App\Db\Query
	 */
	public function getQueryInitUsers($private = false, $status = false, $roles = false)
	{
		$entityData = \App\Module::getEntityInfo('Users');
		$selectFields = array_unique(array_merge($entityData['fieldnameArr'], ['id' => 'id', 'is_admin', 'cal_color', 'status']));
		// Including deleted vtiger_users for now.
		if ($private === 'private') {
			$userPrivileges = \App\User::getPrivilegesFile($this->currentUser->getId());
			\App\Log::trace('Sharing is Private. Only the current user should be listed');
			$query = new \App\Db\Query ();
			$query->select($selectFields)->from('vtiger_users')->where(['id' => $this->currentUser->getId()]);
			$queryByUserRole = new \App\Db\Query ();
			$selectFields['id'] = 'vtiger_user2role.userid';
			$queryByUserRole->
				select($selectFields)
				->from('vtiger_user2role')
				->innerJoin('vtiger_users', 'vtiger_user2role.userid = vtiger_users.id')
				->innerJoin('vtiger_role', 'vtiger_user2role.roleid = vtiger_role.roleid')
				->where(['vtiger_role.parentrole' => $userPrivileges['parent_role_seq'] . '::%']);
			$queryBySharing = new \App\Db\Query ();
			$selectFields['id'] = 'shareduserid';
			$queryBySharing->
				select($selectFields)
				->from('vtiger_tmp_write_user_sharing_per')
				->innerJoin('vtiger_users', 'vtiger_tmp_write_user_sharing_per.shareduserid = vtiger_users.id')
				->where(['vtiger_tmp_write_user_sharing_per.userid' => $this->currentUser->getId(), 'vtiger_tmp_write_user_sharing_per.tabid' => \App\Module::getModuleId($this->moduleName)]);
			$query->union($queryByUserRole)->union($queryBySharing);
		} elseif ($roles !== false) {
			$query = (new \App\Db\Query())->select($selectFields)->from('vtiger_users')->innerJoin('vtiger_user2role', 'vtiger_users.id = vtiger_user2role.userid')->where(['vtiger_user2role.roleid' => $roles]);
		} else {
			\App\Log::trace('Sharing is Public. All vtiger_users should be listed');
			$query = new \App\Db\Query();
			$query->select($selectFields)->from('vtiger_users');
		}
		$where = false;
		if (!empty($this->searchValue)) {
			$where [] = ['like', \App\Module::getSqlForNameInDisplayFormat('Users'), $this->searchValue];
		}
		if ($status) {
			$where [] = ['status' => $status];
		}
		if ($where) {
			$query->where(array_merge(['and'], $where));
		}
		return $query;
	}

	/**
	 * Function returns the user key in user array
	 * @param $addBlank -- boolean:: Type boolean
	 * @param $status -- user status:: Type string
	 * @param $assignedUser -- user id:: Type string or array
	 * @param $private -- sharing type:: Type string
	 * @param $onlyAdmin -- show only admin users:: Type boolean
	 * @returns $users -- user array:: Type array
	 *
	 */
	public function getUsers($addBlank = false, $status = 'Active', $assignedUser = '', $private = '', $onlyAdmin = false, $roles = false)
	{
		\App\Log::trace("Entering getUsers($addBlank,$status,$assignedUser,$private) method ...");

		$tempResult = $this->initUsers($status, $assignedUser, $private);

		if (!is_array($tempResult)) {
			return [];
		}
		$users = [];
		if ($addBlank === true) {
			// Add in a blank row
			$users[''] = '';
		}
		$adminInList = \AppConfig::performance('SHOW_ADMINISTRATORS_IN_USERS_LIST');
		$isAdmin = $this->currentUser->isAdmin();
		foreach ($tempResult as $key => $row) {
			if (!$onlyAdmin || $isAdmin || !(!$adminInList && $row['is_admin'] == 'on')) {
				$users[$key] = $row['fullName'];
			}
		}
		asort($users);
		\App\Log::trace('Exiting getUsers method ...');
		return $users;
	}

	/**
	 * Function to get groups
	 * @param boolean $addBlank
	 * @param string $private
	 * @return array
	 */
	public function getGroups($addBlank = true, $private = '')
	{
		\App\Log::trace("Entering getGroups($addBlank,$private) method ...");
		$moduleName = '';
		if (\App\Request::_get('parent') !== 'Settings' && $this->moduleName) {
			$moduleName = $this->moduleName;
			$tabId = \App\Module::getModuleId($moduleName);
		}
		$cacheKey = $addBlank . $private . $moduleName;
		if (\App\Cache::has('OwnerGroups', $cacheKey)) {
			return \App\Cache::get('OwnerGroups', $cacheKey);
		}
		// Including deleted vtiger_users for now.
		\App\Log::trace('Sharing is Public. All vtiger_users should be listed');
		$query = (new \App\Db\Query())->select(['groupid', 'groupname'])->from('vtiger_groups');
		if (!empty($moduleName) && $moduleName !== 'CustomView') {
			$subQuery = (new \App\Db\Query())->select(['groupid'])->from('vtiger_group2modules')->where(['tabid' => $tabId]);
			$query->where(['groupid' => $subQuery]);
		}
		if ($private === 'private') {
			$userPrivileges = \App\User::getPrivilegesFile($this->currentUser->getId());
			$query->andWhere(['groupid' => $this->currentUser->getId()]);
			$groupsAmount = count($userPrivileges['groups']);
			if ($groupsAmount) {
				$query->orWhere(['vtiger_groups.groupid' => $userPrivileges['groups']]);
			}
			\App\Log::trace('Sharing is Private. Only the current user should be listed');
			$unionQuery = (new \App\Db\Query())->select(['vtiger_group2role.groupid as groupid', 'vtiger_groups.groupname as groupname'])->from('vtiger_group2role')
				->innerJoin('vtiger_groups', 'vtiger_group2role.groupid = vtiger_groups.groupid')
				->innerJoin('vtiger_role', 'vtiger_group2role.roleid = vtiger_role.roleid')
				->where(['like', 'vtiger_role.parentrole', $userPrivileges['parent_role_seq'] . '::%', false]);
			$query->union($unionQuery);
			if ($groupsAmount) {
				$unionQuery = (new \App\Db\Query())->select(['vtiger_groups.groupid as groupid', 'vtiger_groups.groupname as groupname'])->from('vtiger_groups')
					->innerJoin('vtiger_group2rs', 'vtiger_groups.groupid = vtiger_group2rs.groupid')
					->where(['vtiger_group2rs.roleandsubid' => $userPrivileges['parent_roles']]);
				$query->union($unionQuery);
			}
			$unionQuery = (new \App\Db\Query())->select(['sharedgroupid as groupid', 'vtiger_groups.groupname as groupname'])
				->from('vtiger_tmp_write_group_sharing_per')
				->innerJoin('vtiger_groups', 'vtiger_tmp_write_group_sharing_per.sharedgroupid = vtiger_groups.groupid')
				->where(['vtiger_tmp_write_group_sharing_per.userid' => $this->currentUser->getId()])
				->andWhere(['vtiger_tmp_write_group_sharing_per.tabid' => $tabId]);
			$query->union($unionQuery);
		}
		$query->orderBy(['groupname' => SORT_ASC]);
		$dataReader = $query->createCommand()->query();
		$tempResult = [];
		if ($addBlank === true) {
			// Add in a blank row
			$tempResult[''] = '';
		}
		while ($row = $dataReader->read()) {
			$tempResult[$row['groupid']] = $row['groupname'];
		}
		\App\Cache::save('OwnerGroups', $cacheKey, $tempResult);
		\App\Log::trace('Exiting getGroups method ...');
		return $tempResult;
	}

	/**
	 * Function returns list of accessible users for a module
	 * @return <Array of Users_Record_Model>
	 */
	public function getAccessibleGroupForModule()
	{
		$curentUserPrivileges = \Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if ($this->currentUser->isAdmin() || $curentUserPrivileges->hasGlobalWritePermission()) {
			$groups = $this->getAccessibleGroups('');
		} else {
			$sharingAccessModel = \Settings_SharingAccess_Module_Model::getInstance($this->moduleName);
			if ($sharingAccessModel && $sharingAccessModel->isPrivate()) {
				$groups = $this->getAccessibleGroups('private');
			} else {
				$groups = $this->getAccessibleGroups('');
			}
		}
		return $groups;
	}

	/**
	 * Function returns list of accessible users for a module
	 * @param string $module
	 * @return <Array of Users_Record_Model>
	 */
	public function getAccessibleUsersForModule()
	{
		$curentUserPrivileges = \Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if ($this->currentUser->isAdmin() || $curentUserPrivileges->hasGlobalWritePermission()) {
			$users = $this->getAccessibleUsers('');
		} else {
			$sharingAccessModel = \Settings_SharingAccess_Module_Model::getInstance($this->moduleName);
			if ($sharingAccessModel && $sharingAccessModel->isPrivate()) {
				$users = $this->getAccessibleUsers('private');
			} else {
				$users = $this->getAccessibleUsers('');
			}
		}
		return $users;
	}

	/**
	 * Get users and group for module list
	 * @param boolean  $view
	 * @param boolean  $conditions
	 * @return array
	 */
	public function getUsersAndGroupForModuleList($view = false, $conditions = false)
	{
		$queryGenerator = new \App\QueryGenerator($this->moduleName, $this->currentUser->getId());
		if ($view) {
			$queryGenerator->initForCustomViewById($view);
		}
		if ($conditions) {
			$queryGenerator->addNativeCondition($conditions['condition']);
			if (!empty($conditions['join'])) {
				foreach ($conditions['join'] as $join) {
					$queryGenerator->addJoin($join);
				}
			}
		}
		$queryGenerator->setFields(['assigned_user_id']);
		$ids = $queryGenerator->createQuery()->distinct()->createCommand()->queryColumn();
		$users = $groups = [];
		$adminInList = \AppConfig::performance('SHOW_ADMINISTRATORS_IN_USERS_LIST');
		foreach ($ids as $id) {
			$userModel = \App\User::getUserModel($id);
			$name = $userModel->getName();
			if (!empty($name) && ($adminInList || (!$adminInList && !$userModel->isAdmin()))) {
				$users[$id] = $name;
			}
		}
		$diffIds = array_diff($ids, array_keys($users));
		if ($diffIds) {
			foreach (array_values($diffIds) as $id) {
				$name = self::getGroupName($id);
				if (!empty($name)) {
					$groups[$id] = $name;
				}
			}
		}
		return ['users' => $users, 'group' => $groups];
	}

	/**
	 * The function retrieves all users with active status
	 * @param string $status
	 * @return string
	 */
	public static function getAllUsers($status = 'Active')
	{
		$instance = new self();
		return $instance->initUsers($status);
	}

	protected static $usersIdsCache = [];

	/**
	 * The function retrieves user ids with active status
	 * @param string $status
	 * @return array
	 */
	public static function getUsersIds($status = 'Active')
	{
		if (!isset(self::$usersIdsCache[$status])) {
			$rows = [];
			if (\AppConfig::performance('ENABLE_CACHING_USERS')) {
				$rows = \App\PrivilegeFile::getUser('id');
			} else {
				$instance = new self();
				$rows = $instance->initUsers($status);
			}
			self::$usersIdsCache[$status] = array_keys($rows);
		}
		return self::$usersIdsCache[$status];
	}

	protected static $ownerLabelCache = [];
	protected static $userLabelCache = [];
	protected static $groupLabelCache = [];
	protected static $groupIdCache = [];

	/**
	 * Function gets labels
	 * @param int|array $mixedId
	 * @return int|array
	 */
	public static function getLabel($mixedId)
	{
		$multiMode = is_array($mixedId);
		$ids = $multiMode ? $mixedId : [$mixedId];
		$missing = [];
		foreach ($ids as $id) {
			if ($id && !isset(self::$ownerLabelCache[$id])) {
				$missing[] = $id;
			}
		}
		if (!empty($missing)) {
			foreach ($missing as $userId) {
				self::getUserLabel($userId);
			}
			$diffIds = array_diff($missing, array_keys(self::$ownerLabelCache));
			if ($diffIds) {
				foreach ($diffIds as $groupId) {
					self::getGroupName($groupId);
				}
			}
		}
		$result = [];
		foreach ($ids as $id) {
			if (isset(self::$ownerLabelCache[$id])) {
				$result[$id] = self::$ownerLabelCache[$id];
			} else {
				$result[$id] = NULL;
			}
		}
		return $multiMode ? $result : array_shift($result);
	}

	/**
	 * The function gets the group names
	 * @param int $id
	 * @return string
	 */
	public static function getGroupName($id)
	{
		if (isset(self::$groupLabelCache[$id])) {
			return self::$groupLabelCache[$id];
		}
		$label = false;
		$instance = new self();
		$groups = $instance->getGroups(false);
		if (isset($groups[$id])) {
			$label = $groups[$id];
			self::$groupLabelCache[$id] = self::$ownerLabelCache[$id] = $label;
			self::$groupIdCache[$label] = $id;
		}
		return $label;
	}

	/**
	 * Function to get the group id for a given group groupname
	 * @param string $name
	 * @return int
	 */
	public static function getGroupId($name)
	{
		if (isset(self::$groupIdCache[$name])) {
			return self::$groupIdCache[$name];
		}
		$id = false;
		$instance = new self();
		$groups = array_flip($instance->getGroups(false));
		if (isset($groups[$name])) {
			$id = self::$groupIdCache[$name] = $groups[$name];
		}
		return $id;
	}

	/**
	 * The function gets the user label
	 * @param int $id
	 * @param boolean $single
	 * @return string|boolean
	 */
	public static function getUserLabel($id, $single = false)
	{
		if (isset(self::$userLabelCache[$id])) {
			return self::$userLabelCache[$id];
		}

		if (\AppConfig::performance('ENABLE_CACHING_USERS')) {
			$users = \App\PrivilegeFile::getUser('id');
		} else {
			$instance = new self();
			if ($single) {
				$users = $instance->initUsers(false, $id);
			} else {
				$users = $instance->initUsers(false);
			}
		}
		foreach ($users as $uid => &$user) {
			self::$userLabelCache[$uid] = $user['fullName'];
			self::$ownerLabelCache[$uid] = $user['fullName'];
		}
		return isset($users[$id]) ? $users[$id]['fullName'] : false;
	}

	protected static $typeCache = [];

	/**
	 * Function checks record type
	 * @param int $id
	 * @return boolean
	 */
	public static function getType($id)
	{
		if (isset(self::$typeCache[$id])) {
			return self::$typeCache[$id];
		}
		if (\AppConfig::performance('ENABLE_CACHING_USERS')) {
			$users = \App\PrivilegeFile::getUser('id');
			$isExists = isset($users[$id]);
		} else {
			$isExists = (new \App\Db\Query())
				->from('vtiger_users')
				->where(['id' => $id])
				->exists();
		}
		$result = $isExists ? 'Users' : 'Groups';
		self::$typeCache[$id] = $result;
		return $result;
	}

	/**
	 * Transfer ownership records
	 * @param int $oldId
	 * @param int $newId
	 */
	public static function transferOwnership($oldId, $newId)
	{
		$db = \App\Db::getInstance();
		//Updating the smcreatorid,smownerid, modifiedby, smcreatorid in vtiger_crmentity
		$db->createCommand()->update('vtiger_crmentity', ['smcreatorid' => $newId], ['smcreatorid' => $oldId, 'setype' => 'ModComments'])->execute();
		$db->createCommand()->update('vtiger_crmentity', ['smownerid' => $newId], ['smownerid' => $oldId, 'setype' => 'ModComments'])->execute();
		$db->createCommand()->update('vtiger_crmentity', ['modifiedby' => $newId], ['modifiedby' => $oldId])->execute();
		//updating the vtiger_import_maps
		$db->createCommand()->update('vtiger_import_maps', ['date_modified' => date('Y-m-d H:i:s'), 'assigned_user_id' => $newId], ['assigned_user_id' => $oldId])->execute();
		$db->createCommand()->delete('vtiger_users2group', ['userid' => $oldId])->execute();

		$dataReader = (new \App\Db\Query())->select(['tabid', 'fieldname', 'tablename', 'columnname'])
				->from('vtiger_field')
				->leftJoin('vtiger_fieldmodulerel', 'vtiger_field.fieldid = vtiger_fieldmodulerel.fieldid')
				->where(['or', ['uitype' => [52, 53, 77, 101]], ['uitype' => 10, 'relmodule' => 'Users']])
				->createCommand()->query();
		$columnList = [];
		while ($row = $dataReader->read()) {
			$column = $row['tablename'] . '.' . $row['columnname'];
			if (!in_array($column, $columnList)) {
				$columnList[] = $column;
				if ($row['columnname'] === 'smcreatorid' || $row['columnname'] === 'smownerid') {
					$db->createCommand()->update($row['tablename'], [$row['columnname'] => $newId], ['and', [$row['columnname'] => $oldId], ['<>', 'setype', 'ModComments']])
						->execute();
				} else {
					$db->createCommand()->update($row['tablename'], [$row['columnname'] => $newId], [$row['columnname'] => $oldId])
						->execute();
				}
			}
		}
		static::transferOwnershipForWorkflow($oldId, $newId);
	}

	/**
	 * Transfer ownership workflow tasks
	 * @param type $oldId
	 * @param type $newId
	 */
	private static function transferOwnershipForWorkflow($oldId, $newId)
	{
		$db = \App\Db::getInstance();
		$ownerName = static::getLabel($oldId);
		$newOwnerName = static::getLabel($newId);
		//update workflow tasks Assigned User from Deleted User to Transfer User

		$nameSearchValue = '"fieldname":"assigned_user_id","value":"' . $ownerName . '"';
		$idSearchValue = '"fieldname":"assigned_user_id","value":"' . $oldId . '"';
		$fieldSearchValue = 's:16:"assigned_user_id"';
		$dataReader = (new \App\Db\Query())->select(['task', 'task_id', 'workflow_id'])->from('com_vtiger_workflowtasks')
				->where(['or like', 'task', [$nameSearchValue, $idSearchValue, $fieldSearchValue]])
				->createCommand()->query();
		require_once("modules/com_vtiger_workflow/VTTaskManager.php");
		while ($row = $dataReader->read()) {
			$task = $row['task'];
			$taskComponents = explode(':', $task);
			$classNameWithDoubleQuotes = $taskComponents[2];
			$className = str_replace('"', '', $classNameWithDoubleQuotes);
			require_once 'modules/com_vtiger_workflow/tasks/' . $className . '.php';
			$unserializeTask = unserialize($task);
			if (array_key_exists('field_value_mapping', $unserializeTask)) {
				$fieldMapping = \App\Json::decode($unserializeTask->field_value_mapping);
				if (!empty($fieldMapping)) {
					foreach ($fieldMapping as $key => $condition) {
						if ($condition['fieldname'] == 'assigned_user_id') {
							$value = $condition['value'];
							if (is_numeric($value) && $value == $oldId) {
								$condition['value'] = $newId;
							} else if ($value == $ownerName) {
								$condition['value'] = $newOwnerName;
							}
						}
						$fieldMapping[$key] = $condition;
					}
					$updatedTask = \App\Json::encode($fieldMapping);
					$unserializeTask->field_value_mapping = $updatedTask;
					$serializeTask = serialize($unserializeTask);
					$db->createCommand()->update('com_vtiger_workflowtasks', ['task' => $serializeTask], ['workflow_id' => $row['workflow_id'], 'task_id' => $row['task_id']])->execute();
				}
			} else {
				//For VTCreateTodoTask and VTCreateEventTask
				if (array_key_exists('assigned_user_id', $unserializeTask)) {
					$value = $unserializeTask->assigned_user_id;
					if ($value == $oldId) {
						$unserializeTask->assigned_user_id = $newId;
					}
					$serializeTask = serialize($unserializeTask);
					$db->createCommand()->update('com_vtiger_workflowtasks', ['task' => $serializeTask], ['workflow_id' => $row['workflow_id'], 'task_id' => $row['task_id']])->execute();
				}
			}
		}
	}
}
