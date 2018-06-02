<?php
/**
 * OSSMail CRMEntity class
 * @package YetiForce.CRMEntity
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */

/**
 * OSSMail CRMEntity class
 */
class OSSMail
{

	/**
	 * Module name
	 * @param string $moduleName
	 * @param string $eventType
	 * @throws \App\Exceptions\NotAllowedMethod
	 */
	public function moduleHandler($moduleName, $eventType)
	{
		$dbCommand = App\Db::getInstance()->createCommand();
		if ($eventType === 'module.postinstall') {
			$displayLabel = 'OSSMail';
			$dbCommand->update('vtiger_tab', ['customized' => 0], ['name' => $displayLabel])->execute();
			Settings_Vtiger_Module_Model::addSettingsField('LBL_MAIL', [
				'name' => 'Mail',
				'iconpath' => 'adminIcon-mail-download-history',
				'description' => 'LBL_OSSMAIL_DESCRIPTION',
				'linkto' => 'index.php?module=OSSMail&parent=Settings&view=index'
			]);
			$Module = vtlib\Module::getInstance($moduleName);
			$user_id = Users_Record_Model::getCurrentUserModel()->get('user_name');
			$dbCommand->insert('vtiger_ossmails_logs', ['action' => 'Action_InstallModule', 'info' => $moduleName . ' ' . $Module->version, 'user' => $user_id])->execute();
		} else if ($eventType === 'module.disabled') {
			$user_id = Users_Record_Model::getCurrentUserModel()->get('user_name');
			$dbCommand->insert('vtiger_ossmails_logs', ['action' => 'Action_DisabledModule', 'info' => $moduleName, 'user' => $user_id, 'start_time' => date('Y-m-d H:i:s')])->execute();
		} else if ($eventType === 'module.enabled') {
			if (Settings_ModuleManager_Library_Model::checkLibrary('roundcube')) {
				throw new \App\Exceptions\NotAllowedMethod(\App\Language::translateArgs('ERR_NO_REQUIRED_LIBRARY', 'Settings:Vtiger', 'roundcube'));
			}
			$user_id = Users_Record_Model::getCurrentUserModel()->get('user_name');
			$dbCommand->insert('vtiger_ossmails_logs', ['action' => 'Action_EnabledModule', 'info' => $moduleName, 'user' => $user_id, 'start_time' => date('Y-m-d H:i:s')])->execute();
		} else if ($eventType === 'module.postupdate') {
			$OSSMail = vtlib\Module::getInstance('OSSMail');
			if (version_compare($OSSMail->version, '1.39', '>')) {
				$user_id = Users_Record_Model::getCurrentUserModel()->get('user_name');
				$dbCommand->insert('vtiger_ossmails_logs', ['action' => 'Action_UpdateModule', 'info' => $moduleName . ' ' . $Module->version, 'user' => $user_id, 'start_time' => date('Y-m-d H:i:s')])->execute();
			}
		}
	}
}
