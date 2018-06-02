<?php

/**
 * Countries index view class
 * @package YetiForce.Include
 * @license licenses/License.html
 * @author Wojciech Bruggemann <w.bruggemann@yetiforce.com>
 */
class Settings_Countries_Index_View extends Settings_Vtiger_Index_View
{

	/**
	 * Process
	 * @param \App\Request $request
	 */
	public function process(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$qualifiedModuleName = $request->getModule(false);

		$viewer = $this->getViewer($request);
		$viewer->assign('QUALIFIED_MODULE', $qualifiedModuleName);
		$viewer->assign('MODULE', $moduleName);
		$viewer->view('Index.tpl', $qualifiedModuleName);
	}
}
