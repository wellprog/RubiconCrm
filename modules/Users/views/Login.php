<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * Contributor(s): YetiForce.com
 * ********************************************************************************** */

class Users_Login_View extends Vtiger_View_Controller
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
	public function preProcess(\App\Request $request, $display = true)
	{
		parent::preProcess($request, false);
		$viewer = $this->getViewer($request);

		$selectedModule = $request->getModule();
		$viewer->assign('MODULE', $selectedModule);
		$viewer->assign('MODULE_NAME', $selectedModule);
		$viewer->assign('QUALIFIED_MODULE', $selectedModule);
		$viewer->assign('VIEW', $request->getByType('view'));
		$viewer->assign('USER_MODEL', Users_Record_Model::getCurrentUserModel());
		if ($display) {
			$this->preProcessDisplay($request);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function postProcess(\App\Request $request)
	{
		
	}

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$viewer = $this->getViewer($request);
		$viewer->assign('MODULE', $request->getModule());
		$viewer->assign('CURRENT_VERSION', \App\Version::get());
		$viewer->assign('LANGUAGE_SELECTION', AppConfig::main('langInLoginView'));
		$viewer->assign('LAYOUT_SELECTION', AppConfig::main('layoutInLoginView'));
		$viewer->assign('IS_BLOCKED_IP', Settings_BruteForce_Module_Model::getCleanInstance()->isBlockedIp());
		if (\App\Session::has('UserLoginMessage')) {
			$viewer->assign('MESSAGE', \App\Session::get('UserLoginMessage'));
			$viewer->assign('MESSAGE_TYPE', \App\Session::get('UserLoginMessageType'));
			\App\Session::delete('UserLoginMessage');
			\App\Session::delete('UserLoginMessageType');
		}
		$viewer->view('Login.tpl', 'Users');
	}

	/**
	 * {@inheritDoc}
	 */
	public function getHeaderCss(\App\Request $request)
	{
		$headerCssInstances = parent::getHeaderCss($request);

		$cssFileNames = [
			'skins.login',
		];
		$cssInstances = $this->checkAndConvertCssStyles($cssFileNames);
		$headerCssInstances = array_merge($headerCssInstances, $cssInstances);

		return $headerCssInstances;
	}
}
