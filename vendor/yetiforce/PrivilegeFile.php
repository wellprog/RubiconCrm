<?php
namespace App;

/**
 * Privilege File basic class
 * @package YetiForce.App
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class PrivilegeFile
{

	protected static $usersFile = 'user_privileges/users.php';
	protected static $usersFileCache = false;

	/**
	 * Create users privileges file
	 */
	public static function createUsersFile()
	{
		$entityData = Module::getEntityInfo('Users');
		$dataReader = (new \App\Db\Query())->select(['id', 'first_name', 'last_name', 'is_admin', 'cal_color', 'status', 'email1', 'user_name', 'deleted'])->from('vtiger_users')->createCommand()->query();
		$users = [];
		// Get the id and the name.
		while ($row = $dataReader->read()) {
			$fullName = '';
			foreach ($entityData['fieldnameArr'] as $field) {
				$fullName .= ' ' . $row[$field];
			}
			$row['fullName'] = trim($fullName);
			$users['id'][$row['id']] = array_map('\App\Purifier::encodeHtml', $row);
			$users['userName'][$row['user_name']] = $row['id'];
		}
		file_put_contents(static::$usersFile, '<?php return ' . Utils::varExport($users) . ';');
	}

	/**
	 * get general users privileges file
	 * @param string $type
	 * @return array
	 */
	public static function getUser($type)
	{
		if (static::$usersFileCache === false) {
			static::$usersFileCache = require static::$usersFile;
		}
		return isset(static::$usersFileCache[$type]) ? static::$usersFileCache[$type] : false;
	}

	/**
	 * Creates a file with all the user, user-role,user-profile, user-groups informations 
	 * @param $userId -- user id:: Type integer
	 */
	public static function createUserPrivilegesFile($userId)
	{
		$file = ROOT_DIRECTORY . DIRECTORY_SEPARATOR . 'user_privileges' . DIRECTORY_SEPARATOR . "user_privileges_$userId.php";
		$user = [];
		$userInstance = \CRMEntity::getInstance('Users');
		$userInstance->retrieveEntityInfo($userId, 'Users');
		$userInstance->column_fields['is_admin'] = $userInstance->is_admin === 'on';
		foreach ($userInstance->column_fields as $field => $value) {
			if ($field !== 'currency_symbol') {
				$userInstance->column_fields[$field] = \App\Purifier::encodeHtml($value);
			}
		}
		$entityData = Module::getEntityInfo('Users');
		$displayName = '';
		foreach ($entityData['fieldnameArr'] as $field) {
			$displayName .= ' ' . $userInstance->column_fields[$field];
		}
		$userRoleInfo = PrivilegeUtil::getRoleDetail($userInstance->column_fields['roleid']);
		$user['details'] = $userInstance->column_fields;
		$user['displayName'] = trim($displayName);
		$user['profiles'] = PrivilegeUtil::getProfilesByRole($userInstance->column_fields['roleid']);
		$user['groups'] = PrivilegeUtil::getUserGroups($userId);
		$user['parent_roles'] = $userRoleInfo['parentRoles'];
		$user['parent_role_seq'] = $userRoleInfo['parentrole'];
		file_put_contents($file, 'return ' . Utils::varExport($user) . ';' . PHP_EOL, FILE_APPEND);
	}
}
