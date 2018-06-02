<?php

/**
 * Quick detail modal view class
 * @package YetiForce.View
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Vtiger_QuickDetailModal_View extends Vtiger_BasicModal_View
{

	/**
	 * Checking permissions
	 * @param \App\Request $request
	 * @throws \App\Exceptions\NoPermittedToRecord
	 */
	public function checkPermission(\App\Request $request)
	{
		if ($request->isEmpty('record', true)) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
		if (!\App\Privilege::isPermitted($request->getModule(), 'DetailView', $request->getInteger('record'))) {
			throw new \App\Exceptions\NoPermittedToRecord('LBL_NO_PERMISSIONS_FOR_THE_RECORD', 406);
		}
	}

	public function getSize(\App\Request $request)
	{
		return 'modalRightSiteBar';
	}

	/**
	 * Process
	 * @param \App\Request $request
	 */
	public function process(\App\Request $request)
	{
		$this->preProcess($request);
		$moduleName = $request->getModule();
		$detailModel = Vtiger_DetailView_Model::getInstance($moduleName, $request->getInteger('record'));
		$recordModel = $detailModel->getRecord();
		$detailModel->getWidgets();
		$handlerClass = Vtiger_Loader::getComponentClassName('View', 'Detail', $moduleName);
		$detailView = new $handlerClass();
		$detailView->record = $detailModel;

		$widgets = [];
		foreach ($detailModel->widgets as $dw) {
			foreach ($dw as $widget) {
				if (!empty($widget['url'])) {
					parse_str($widget['url'], $output);
					$method = $output['mode'];
					$widgetRequest = new \App\Request($output, false);
					$widgetRequest->set('isReadOnly', true);
					if ($detailView->isMethodExposed($method)) {
						$label = '';
						if (!empty($widget['label'])) {
							$label = App\Language::translate($widget['label'], $moduleName);
						} elseif ($widget['type'] === 'RelatedModule') {
							$relatedModule = App\Module::getModuleName($widget['data']['relatedmodule']);
							$label = App\Language::translate($relatedModule, $relatedModule);
						}
						$widgets[] = ['title' => $label, 'content' => $detailView->$method($widgetRequest)];
					}
				} elseif ($widget['type'] === 'Summary') {
					$request->set('isReadOnly', 'true');
					$widgets[] = [
						'content' => $detailView->showModuleSummaryView($request)
					];
				}
			}
		}
		$viewer = $this->getViewer($request);
		$viewer->assign('RECORD', $recordModel);
		$viewer->assign('MODULE_NAME', $moduleName);
		$viewer->assign('WIDGETS', $widgets);
		$viewer->view('QuickDetailModal.tpl', $moduleName);
		$this->postProcess($request);
	}
}
