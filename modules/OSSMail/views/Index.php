<?php
/**
 * OSSMail index view class
 * @package YetiForce.View
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */

/**
 * OSSMail index view class
 */
class OSSMail_Index_View extends Vtiger_Index_View
{

	/**
	 * Main url
	 * @var string
	 */
	protected $mainUrl = 'modules/OSSMail/roundcube/';

	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
		if (!IS_PUBLIC_DIR) {
			$this->mainUrl = 'public_html/' . $this->mainUrl;
		}
		$this->mainUrl = OSSMail_Record_Model::getSiteUrl() . $this->mainUrl;
	}

	/**
	 * Init autologin
	 */
	public function initAutologin()
	{
		$config = Settings_Mail_Config_Model::getConfig('autologin');
		if ($config['autologinActive'] == 'true') {
			$account = OSSMail_Autologin_Model::getAutologinUsers();
			if ($account) {
				$rcUser = (isset($_SESSION['AutoLoginUser']) && array_key_exists($_SESSION['AutoLoginUser'], $account)) ? $account[$_SESSION['AutoLoginUser']] : reset($account);

				$key = md5($rcUser['rcuser_id'] . microtime());
				if (strpos($this->mainUrl, '?') !== false) {
					$this->mainUrl .= '&';
				} else {
					$this->mainUrl .= '?';
				}
				$this->mainUrl .= '_autologin=1&_autologinKey=' . $key;
				$currentUserModel = Users_Record_Model::getCurrentUserModel();
				$userId = $currentUserModel->getId();
				$params = ['language' => \App\Language::getLanguage()];
				$dbCommand = \App\Db::getInstance()->createCommand();
				$dbCommand->delete('u_#__mail_autologin', ['cuid' => $userId])->execute();
				$dbCommand->insert('u_#__mail_autologin', ['key' => $key, 'ruid' => $rcUser['rcuser_id'], 'cuid' => $userId, 'params' => \App\Json::encode($params)])->execute();
			}
		}
	}

	/**
	 * Pre process
	 * @param \App\Request $request
	 * @param bool $display
	 */
	public function preProcess(\App\Request $request, $display = true)
	{
		$this->initAutologin();

		parent::preProcess($request, $display);
	}

	/**
	 * Process
	 * @param \App\Request $request
	 */
	public function process(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$viewer = $this->getViewer($request);
		$viewer->assign('URL', $this->mainUrl);
		$viewer->view('index.tpl', $moduleName);
	}
}
