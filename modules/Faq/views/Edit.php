<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * Contributor(s): YetiForce.com
 * *********************************************************************************** */

class Faq_Edit_View extends Vtiger_Edit_View
{

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		if ($request->isEmpty('record')) {
			$parentId = $request->get('parentId');
			$parentModule = $request->get('parentModule');
			if ($parentId && $parentModule === 'HelpDesk') {
				$parentRecordModel = Vtiger_Record_Model::getInstanceById($parentId, $parentModule);
				$this->record = Faq_Record_Model::getInstanceFromHelpDesk($parentRecordModel);
			}
		}
		parent::process($request);
	}
}
