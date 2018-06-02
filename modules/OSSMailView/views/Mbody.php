<?php

/**
 * OSSMailView mbody view class
 * @package YetiForce.View
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
Class OSSMailView_Mbody_View extends Vtiger_Index_View
{

	public function preProcess(\App\Request $request, $display = true)
	{
		
	}

	public function postProcess(\App\Request $request, $display = true)
	{
		
	}

	public function checkPermission(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$recordId = $request->getInteger('record');

		$recordPermission = \App\Privilege::isPermitted($moduleName, 'DetailView', $recordId);
		if (!$recordPermission) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
		return true;
	}

	public function process(\App\Request $request)
	{
		if (class_exists('CSRF')) {
			CSRF::$frameBreaker = false;
			CSRF::$rewriteJs = null;
		}
		$moduleName = $request->getModule();
		$record = $request->getInteger('record');
		$recordModel = Vtiger_Record_Model::getInstanceById($record, $moduleName);
		$viewer = $this->getViewer($request);
		$viewer->assign('MODULENAME', $moduleName);
		$viewer->assign('CONTENT', vtlib\Functions::getHtmlOrPlainText($recordModel->getDisplayValue('content')));
		$viewer->assign('RECORD', $record);
		$viewer->view('mbody.tpl', 'OSSMailView');
	}
}
