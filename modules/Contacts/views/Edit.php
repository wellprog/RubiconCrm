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

class Contacts_Edit_View extends Vtiger_Edit_View
{

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$viewer = $this->getViewer($request);
		$viewer->assign('IMAGE_DETAILS', $this->record->getImageDetails());

		$salutationFieldModel = Vtiger_Field_Model::getInstance('salutationtype', $this->record->getModule());
		// Fix for http://trac.vtiger.com/cgi-bin/trac.cgi/ticket/7851
		$salutationType = $request->get('salutationtype');
		if (!empty($salutationType)) {
			$salutationFieldModel->set('fieldvalue', $salutationFieldModel->getUITypeModel()->getDBValue($salutationType, $this->record));
		} else {
			$salutationFieldModel->set('fieldvalue', $this->record->get('salutationtype'));
		}
		$viewer->assign('SALUTATION_FIELD_MODEL', $salutationFieldModel);

		parent::process($request);
	}
}
