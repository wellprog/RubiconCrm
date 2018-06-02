<?php

/**
 * OSSTimeControl calendar view class
 * @package YetiForce.View
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
class OSSTimeControl_Calendar_View extends Vtiger_Index_View
{

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$viewer = $this->getViewer($request);
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$viewer->assign('CURRENT_USER', $currentUserModel);
		$viewer->assign('EVENT_LIMIT', AppConfig::module('Calendar', 'EVENT_LIMIT'));
		$viewer->assign('WEEK_VIEW', AppConfig::module('Calendar', 'SHOW_TIMELINE_WEEK') ? 'agendaWeek' : 'basicWeek');
		$viewer->assign('DAY_VIEW', AppConfig::module('Calendar', 'SHOW_TIMELINE_DAY') ? 'agendaDay' : 'basicDay');
		$viewer->view('CalendarView.tpl', $request->getModule());
	}

	/**
	 * {@inheritDoc}
	 */
	public function postProcess(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$viewer = $this->getViewer($request);
		$viewer->view('CalendarViewPostProcess.tpl', $moduleName);
		parent::postProcess($request);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getFooterScripts(\App\Request $request)
	{
		$headerScriptInstances = parent::getFooterScripts($request);
		$moduleName = $request->getModule();
		$jsFileNames = [
			'~libraries/fullcalendar/fullcalendar.js',
			'modules.' . $moduleName . '.resources.Calendar',
		];

		$jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
		$headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
		return $headerScriptInstances;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getHeaderCss(\App\Request $request)
	{
		$headerCssInstances = parent::getHeaderCss($request);
		$cssFileNames = [
			'~libraries/fullcalendar/fullcalendar.min.css',
			'~libraries/fullcalendar/fullcalendarCRM.css',
		];
		$cssInstances = $this->checkAndConvertCssStyles($cssFileNames);
		$headerCssInstances = array_merge($headerCssInstances, $cssInstances);

		return $headerCssInstances;
	}
}
