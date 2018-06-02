<?php

/**
 * List preview view class
 * @package YetiForce.View
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Vtiger_ListPreview_View extends Vtiger_List_View
{

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$viewer = $this->getViewer($request);
		$viewer->view('ListViewPreviewTop.tpl', $moduleName);
		parent::process($request);
		$viewer->view('ListViewPreviewBottom.tpl', $moduleName);
	}

	/**
	 * {@inheritDoc}
	 */
	public function initializeListViewContents(\App\Request $request, Vtiger_Viewer $viewer)
	{
		$moduleName = $request->getModule();
		if ($request->isAjax()) {
			if (!isset($this->viewName)) {
				$this->viewName = App\CustomView::getInstance($moduleName)->getViewId();
			}
		}
		if (!$this->listViewModel) {
			$this->listViewModel = Vtiger_ListView_Model::getInstance($moduleName, $this->viewName);
		}
		//$this->listViewModel->getQueryGenerator()->setFields(array_merge(['id'], $this->listViewModel->getModule()->getNameFields()));
		parent::initializeListViewContents($request, $viewer);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getFooterScripts(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$scripts = parent::getFooterScripts($request);
		unset($scripts['modules.Vtiger.resources.ListPreview']);
		return array_merge($scripts, $this->checkAndConvertJsScripts([
				'~libraries/splitjs/split.js',
				'modules.Vtiger.resources.ListPreview',
				"modules.$moduleName.resources.ListPreview"
		]));
	}

	/**
	 * {@inheritDoc}
	 */
	public function getHeaderCss(\App\Request $request)
	{
		return array_merge(parent::getHeaderCss($request), $this->checkAndConvertCssStyles([
				'~libraries/jquery/splitjs/split.css'
		]));
	}
}
