<?php

/**
 * Ldap authorization method class
 * @package YetiForce.UserAuthMethods
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Users_Ldap_AuthMethod
{

	/**
	 * Users record model
	 * @var Users_Record_Model
	 */
	protected $userRecordModel;

	/**
	 * Construct
	 * @param Users_Record_Model $recordModel
	 */
	public function __construct($recordModel)
	{
		$this->userRecordModel = $recordModel;
	}

	/**
	 * Ldap process
	 * @param array $auth
	 * @param string $password
	 * @return bool|null
	 */
	public function process($auth, $password)
	{
		\App\Log::trace('Start LDAP authentication', 'UserAuthentication');
		$users = explode(',', $auth['ldap']['users']);
		if (in_array($this->userRecordModel->getId(), $users)) {
			$port = $auth['ldap']['port'] == '' ? 389 : $auth['ldap']['port'];
			$ds = ldap_connect($auth['ldap']['server'], $port);
			if (!$ds) {
				\App\Log::error('Error LDAP authentication: Could not connect to LDAP server.', 'UserAuthentication');
			}
			ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3); // Try version 3.  Will fail and default to v2.
			ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
			ldap_set_option($ds, LDAP_OPT_TIMELIMIT, 5);
			ldap_set_option($ds, LDAP_OPT_TIMEOUT, 5);
			ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 5);
			if (parse_url($auth['ldap']['server'])['scheme'] === 'tls') {
				ldap_start_tls($ds);
			}
			$bind = ldap_bind($ds, $this->userRecordModel->get('user_name') . $auth['ldap']['domain'], $password);
			if (!$bind) {
				\App\Log::error('LDAP authentication: LDAP bind failed. |' . ldap_errno($ds) . '|' . ldap_error($ds), 'UserAuthentication');
			}
			\App\Session::set('UserAuthType', 'LDAP');
			return $bind;
		} else {
			\App\Log::trace($this->userRecordModel->get('user_name') . ' user does not belong to the LDAP', 'UserAuthentication');
		}
		\App\Log::trace('End LDAP authentication', 'UserAuthentication');
		return null;
	}
}
