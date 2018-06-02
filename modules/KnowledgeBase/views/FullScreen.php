<?php

/**
 * Popup view for KnowledgeBase module
 * @package YetiForce.View
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Krzysztof Gastołek <krzysztof.gastolek@wars.pl>
 */
class KnowledgeBase_FullScreen_View extends Vtiger_Popup_View
{

	/**
	 * Function to check permission
	 * @param \App\Request $request
	 * @throws \App\Exceptions\NoPermittedToRecord
	 */
	public function checkPermission(\App\Request $request)
	{
		$recordId = $request->getInteger('record');
		if (!$recordId) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
		if (!\App\Privilege::isPermitted($request->getModule(), 'DetailView', $recordId)) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$previewView = new KnowledgeBase_PreviewContent_View();
		$previewView->process($request, false);
		$moduleName = $request->getModule();
		$viewer = $this->getViewer($request);
		$recordModel = Vtiger_Record_Model::getInstanceById($request->getInteger('record'), $moduleName);
		$type = str_replace('PLL_', '', $recordModel->get('knowledgebase_view'));
		$template = ucfirst(strtolower($type)) . 'View.tpl';
		$viewer->assign('IS_POPUP', true);
		$viewer->view($template, $moduleName);
	}
}
