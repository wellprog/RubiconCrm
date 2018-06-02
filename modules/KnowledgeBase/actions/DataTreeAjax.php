<?php

/**
 * Action to get data of tree
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Tomasz Kur <t.kur@yetiforce.com>
 */
class KnowledgeBase_DataTreeAjax_Action extends Vtiger_Action_Controller
{

	/**
	 * {@inheritDoc}
	 */
	public function checkPermission(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$userPrivilegesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		$permission = $userPrivilegesModel->hasModulePermission($moduleName);
		if (!$permission) {
			throw new \App\Exceptions\NoPermitted('LBL_PERMISSION_DENIED', 406);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$treeModel = KnowledgeBase_Tree_Model::getInstance($moduleModel);
		$allFolders = $treeModel->getFolders();
		$documents = $treeModel->getDocuments();
		if (!is_array($documents)) {
			$documents = [];
		}
		$dataOfTree = array_merge($allFolders, $documents);
		$response = new Vtiger_Response();
		$response->setResult($dataOfTree);
		$response->emit();
	}
}
