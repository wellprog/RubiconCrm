<?php

/**
 * Tree Category Modal Class
 * @package YetiForce.View
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Vtiger_TreeCategoryModal_View extends Vtiger_BasicModal_View
{

	public function checkPermission(\App\Request $request)
	{
		$recordId = $request->getInteger('src_record');
		if (!$recordId) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
		if (!\App\Privilege::isPermitted($request->getByType('src_module', 2), 'DetailView', $recordId)) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
	}

	/**
	 * Function to get size modal window
	 * @param \App\Request $request
	 * @return string
	 */
	public function getSize(\App\Request $request)
	{
		return 'modal-lg';
	}

	public function process(\App\Request $request)
	{
		$this->preProcess($request);
		$viewer = $this->getViewer($request);
		$moduleName = $request->getModule();
		$srcRecord = $request->getInteger('src_record');
		$srcModule = $request->getByType('src_module', 2);

		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$treeCategoryModel = Vtiger_TreeCategoryModal_Model::getInstance($moduleModel);
		$treeCategoryModel->set('srcRecord', $srcRecord);
		$treeCategoryModel->set('srcModule', $srcModule);
		$this->relationType = $treeCategoryModel->getRelationType();

		$viewer->assign('TREE', \App\Json::encode($treeCategoryModel->getTreeData()));
		$viewer->assign('SRC_RECORD', $srcRecord);
		$viewer->assign('SRC_MODULE', $srcModule);
		$viewer->assign('TEMPLATE', $treeCategoryModel->getTemplate());
		$viewer->assign('MODULE', $moduleName);
		$viewer->assign('SELECTABLE_CATEGORY', AppConfig::relation('SELECTABLE_CATEGORY') ? 1 : 0);
		$viewer->assign('RELATION_TYPE', $this->relationType);
		$viewer->assign('USER_MODEL', Users_Record_Model::getCurrentUserModel());
		$viewer->view('TreeCategoryModal.tpl', $moduleName);
		$this->postProcess($request);
	}

	public function getModalScripts(\App\Request $request)
	{
		$parentScriptInstances = parent::getModalScripts($request);

		$scripts = [
			'~libraries/jquery/jstree/jstree.js'
		];
		if (AppConfig::relation('SELECTABLE_CATEGORY')) {
			$scripts[] = '~libraries/jquery/jstree/jstree.category.js';
			$scripts[] = '~libraries/jquery/jstree/jstree.checkbox.js';
		}
		if ($this->relationType == 1) {
			$scripts[] = '~libraries/jquery/jstree/jstree.edit.js';
		}
		$scripts[] = 'modules.Vtiger.resources.TreeCategoryModal';

		$modalInstances = $this->checkAndConvertJsScripts($scripts);
		$scriptInstances = array_merge($modalInstances, $parentScriptInstances);
		return $scriptInstances;
	}

	public function getModalCss(\App\Request $request)
	{
		$parentCssInstances = parent::getModalCss($request);
		$cssFileNames = [
			'~libraries/jquery/jstree/themes/proton/style.css',
		];
		$modalInstances = $this->checkAndConvertCssStyles($cssFileNames);
		$cssInstances = array_merge($modalInstances, $parentCssInstances);
		return $cssInstances;
	}
}
