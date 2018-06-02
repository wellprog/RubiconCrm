<?php

/**
 * Forgot password action class
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Users_ForgotPassword_Action extends Vtiger_Action_Controller
{

	/**
	 * {@inheritDoc}
	 */
	public function loginRequired()
	{
		return false;
	}

	/**
	 * {@inheritDoc}
	 */
	public function checkPermission(\App\Request $request)
	{
		return true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$userName = $request->get('user_name');
		$email = $request->get('emailId');
		$moduleModel = Users_Module_Model::getInstance($moduleName);
		$bruteForceInstance = Settings_BruteForce_Module_Model::getCleanInstance();
		if ($bruteForceInstance->isActive() && $bruteForceInstance->isBlockedIp()) {
			$bruteForceInstance->incAttempts();
			$moduleModel->saveLoginHistory(strtolower($userName), 'Blocked IP');
			header('Location: index.php?module=Users&view=Login');
			return false;
		}
		$isExists = (new \App\Db\Query())->from('vtiger_users')->where(['status' => 'Active', 'deleted' => 0, 'email1' => $email])->andWhere(['or', ['user_name' => $userName], ['user_name' => strtolower($userName)]])->exists();
		if ($isExists) {
			$password = \App\Encryption::generateUserPassword();
			$userRecordModel = Users_Record_Model::getInstanceByName($userName);
			vglobal('current_user', $userRecordModel->getEntity());
			\App\User::setCurrentUserId($userRecordModel->getId());
			\App\User::getCurrentUserModel();

			$userRecordModel->set('user_password', $password);
			$userRecordModel->save();
			\App\Mailer::sendFromTemplate([
				'template' => 'UsersResetPassword',
				'moduleName' => $moduleName,
				'recordId' => $userRecordModel->getId(),
				'to' => $userRecordModel->get('email1'),
				'password' => $password,
			]);
			\App\Session::set('UserLoginMessage', App\Language::translate('LBL_SEND_EMAIL_RESET_PASSWORD', $moduleName));
			\App\Session::set('UserLoginMessageType', 'success');
			$moduleModel->saveLoginHistory($userName, 'ForgotPasswordSendMail');
		} else {
			\App\Session::set('UserLoginMessage', App\Language::translate('LBL_NO_USER_FOUND', $moduleName));
			\App\Session::set('UserLoginMessageType', 'error');
			$bruteForceInstance->updateBlockedIp();
			if ($bruteForceInstance->isBlockedIp()) {
				$bruteForceInstance->sendNotificationEmail();
				\App\Session::set('UserLoginMessage', App\Language::translate('LBL_TOO_MANY_FAILED_LOGIN_ATTEMPTS', $moduleName));
			}
			$moduleModel->saveLoginHistory(App\Purifier::encodeHtml($request->getRaw('user_name')), 'ForgotPasswordNoUserFound');
		}
		header("Location: index.php?module=Users&view=Login");
	}
}
