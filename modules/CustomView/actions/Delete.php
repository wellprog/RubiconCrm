<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class CustomView_Delete_Action extends Vtiger_Action_Controller
{

	/**
	 * {@inheritDoc}
	 */
	public function checkPermission(\App\Request $request)
	{
		if (!CustomView_Record_Model::getInstanceById($request->getInteger('record'))->privilegeToDelete()) {
			throw new \App\Exceptions\NoPermitted('LBL_PERMISSION_DENIED', 406);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$customViewModel = CustomView_Record_Model::getInstanceById($request->getInteger('record'));
		$customViewModel->delete();
		$listViewUrl = $customViewModel->getModule()->getListViewUrl();
		header("Location: $listViewUrl");
	}

	/**
	 * {@inheritDoc}
	 */
	public function validateRequest(\App\Request $request)
	{
		$request->validateWriteAccess();
	}
}
