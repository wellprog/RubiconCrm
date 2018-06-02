<?php

/**
 * @package YetiForce.View
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 * @author Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */
class OSSPasswords_Detail_View extends Vtiger_Detail_View
{

	/**
	 * {@inheritDoc}
	 */
	public function getFooterScripts(\App\Request $request)
	{
		$headerScriptInstances = parent::getFooterScripts($request);
		$jsFileNames = [
			'modules.OSSPasswords.resources.gen_pass',
			'libraries.jquery.clipboardjs.clipboard',
			'modules.OSSPasswords.resources.zClipDetailView'
		];

		$jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
		$headerScriptInstances = array_merge($jsScriptInstances, $headerScriptInstances);
		return $headerScriptInstances;
	}

	/**
	 * {@inheritDoc}
	 */
	public function isAjaxEnabled($recordModel)
	{
		return false;
	}
}
