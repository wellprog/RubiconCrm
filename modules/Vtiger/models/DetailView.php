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

class Vtiger_DetailView_Model extends \App\Base
{

	protected $module = false;
	protected $record = false;
	public $widgetsList = [];
	public $widgets = [];

	/**
	 * Function to get Module instance
	 * @return Vtiger_Module_Model
	 */
	public function getModule()
	{
		return $this->module;
	}

	/**
	 * Function to set the module instance
	 * @param Vtiger_Module_Model $moduleInstance - module model
	 * @return Vtiger_DetailView_Model>
	 */
	public function setModule($moduleInstance)
	{
		$this->module = $moduleInstance;
		return $this;
	}

	/**
	 * Function to get the Record model
	 * @return Vtiger_Record_Model
	 */
	public function getRecord()
	{
		return $this->record;
	}

	/**
	 * Function to set the record instance3
	 * @param <type> $recordModuleInstance - record model
	 * @return Vtiger_DetailView_Model
	 */
	public function setRecord($recordModuleInstance)
	{
		$this->record = $recordModuleInstance;
		return $this;
	}

	/**
	 * Function to get the detail view links (links and widgets)
	 * @param <array> $linkParams - parameters which will be used to calicaulate the params
	 * @return <array> - array of link models in the format as below
	 *                   array('linktype'=>list of link models);
	 */
	public function getDetailViewLinks($linkParams)
	{
		if ($this->has('Links')) {
			return $this->get('Links');
		}
		$moduleModel = $this->getModule();
		$recordModel = $this->getRecord();
		$moduleName = $moduleModel->getName();
		$recordId = $recordModel->getId();
		$linkModelList = $detailViewLinks = [];
		if ($moduleModel->isPermitted('WorkflowTrigger') && $recordModel->isEditable()) {
			Vtiger_Loader::includeOnce('~~modules/com_vtiger_workflow/include.php');
			Vtiger_Loader::includeOnce('~~modules/com_vtiger_workflow/VTEntityMethodManager.php');
			$wfs = new VTWorkflowManager();
			$workflows = $wfs->getWorkflowsForModule($moduleName, VTWorkflowManager::$TRIGGER);
			if (count($workflows) > 0) {
				$detailViewLinks[] = [
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linklabel' => '',
					'linkurl' => 'javascript:Vtiger_Detail_Js.showWorkflowTriggerView(this)',
					'linkicon' => 'glyphicon glyphicon-plus-sign',
					'linkhint' => 'BTN_WORKFLOW_TRIGGER',
					'linkclass' => 'btn-warning',
				];
			}
		}
		if ($moduleModel->isPermitted('RecordMapping')) {
			$handlerClass = Vtiger_Loader::getComponentClassName('Model', 'MappedFields', $moduleName);
			$mfModel = new $handlerClass();
			if ($mfModel && $mfModel->checkActiveTemplates($recordId, $moduleName, 'Detail')) {
				$detailViewLinks[] = [
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linklabel' => '',
					'linkdata' => ['url' => 'index.php?module=' . $moduleName . '&view=GenerateModal&fromview=Detail&record=' . $recordId],
					'linkicon' => 'glyphicon glyphicon-new-window',
					'linkclass' => 'btn showModal',
					'linkhint' => 'BTN_GENERATE_RECORD',
				];
			}
		}
		if (AppConfig::module('ModTracker', 'WATCHDOG') && $moduleModel->isPermitted('WatchingRecords')) {
			$watchdog = Vtiger_Watchdog_Model::getInstanceById($recordId, $moduleName);
			$class = 'btn-default';
			if ($watchdog->isWatchingRecord()) {
				$class = 'btn-info';
			}
			$detailViewLinks[] = [
				'linktype' => 'DETAIL_VIEW_ADDITIONAL',
				'linklabel' => '',
				'linkurl' => 'javascript:Vtiger_Index_Js.changeWatching(this)',
				'linkicon' => 'glyphicon glyphicon-eye-open',
				'linkhint' => 'BTN_WATCHING_RECORD',
				'linkclass' => $class,
				'linkdata' => ['off' => 'btn-default', 'on' => 'btn-info', 'value' => $watchdog->isWatchingRecord() ? 0 : 1, 'record' => $recordId],
			];
		}
		$userPrivilegesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if ($userPrivilegesModel->hasModulePermission('Notification') && $userPrivilegesModel->hasModuleActionPermission('Notification', 'CreateView')) {
			$detailViewLinks[] = [
				'linktype' => 'DETAIL_VIEW_ADDITIONAL',
				'linklabel' => '',
				'linkurl' => 'javascript:Vtiger_Index_Js.sendNotification(this)',
				'linkicon' => 'glyphicon glyphicon-send',
				'linkhint' => 'LBL_SEND_NOTIFICATION'
			];
		}
		foreach ($detailViewLinks as $detailViewLink) {
			$linkModelList['DETAIL_VIEW_ADDITIONAL'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLink);
		}
		if ($recordModel->isEditable()) {
			$linkModelList['DETAIL_VIEW_BASIC'][] = Vtiger_Link_Model::getInstanceFromValues([
					'linktype' => 'DETAIL_VIEW_BASIC',
					'linklabel' => 'BTN_RECORD_EDIT',
					'linkurl' => $recordModel->getEditViewUrl(),
					'linkicon' => 'glyphicon glyphicon-pencil',
					'linkclass' => 'btn',
					'linkhint' => 'BTN_RECORD_EDIT',
			]);
		}
		$stateColors = AppConfig::search('LIST_ENTITY_STATE_COLOR');
		if ($recordModel->privilegeToActivate()) {
			$linkModelList['DETAIL_VIEW_EXTENDED'][] = Vtiger_Link_Model::getInstanceFromValues([
					'linktype' => 'DETAIL_VIEW_EXTENDED',
					'linklabel' => 'LBL_ACTIVATE_RECORD',
					'title' => \App\Language::translate('LBL_ACTIVATE_RECORD'),
					'linkurl' => 'javascript:app.showConfirmation({type: "href"},this)',
					'linkdata' => [
						'url' => 'index.php?module=' . $recordModel->getModuleName() . '&action=State&state=Active&record=' . $recordModel->getId(),
						'confirm' => \App\Language::translate('LBL_ACTIVATE_RECORD_DESC')
					],
					'linkicon' => 'fa fa-undo',
					'linkclass' => 'entityStateBtn',
					'style' => empty($stateColors['Active']) ? '' : "background: {$stateColors['Active']};"
			]);
		}
		if ($recordModel->privilegeToArchive()) {
			$linkModelList['DETAIL_VIEW_EXTENDED'][] = Vtiger_Link_Model::getInstanceFromValues([
					'linktype' => 'DETAIL_VIEW_EXTENDED',
					'linklabel' => 'LBL_ARCHIVE_RECORD',
					'title' => \App\Language::translate('LBL_ARCHIVE_RECORD'),
					'linkurl' => 'javascript:app.showConfirmation({type: "href"},this)',
					'linkdata' => [
						'url' => 'index.php?module=' . $recordModel->getModuleName() . '&action=State&state=Archived&record=' . $recordModel->getId(),
						'confirm' => \App\Language::translate('LBL_ARCHIVE_RECORD_DESC')
					],
					'linkicon' => 'fa fa-archive',
					'linkclass' => 'entityStateBtn',
					'style' => empty($stateColors['Archived']) ? '' : "background: {$stateColors['Archived']};"
			]);
		}
		if ($recordModel->privilegeToMoveToTrash()) {
			$linkModelList['DETAIL_VIEW_EXTENDED'][] = Vtiger_Link_Model::getInstanceFromValues([
					'linktype' => 'DETAIL_VIEW_EXTENDED',
					'linklabel' => 'LBL_MOVE_TO_TRASH',
					'title' => \App\Language::translate('LBL_MOVE_TO_TRASH'),
					'linkurl' => 'javascript:app.showConfirmation({type: "href"},this)',
					'linkdata' => [
						'url' => 'index.php?module=' . $recordModel->getModuleName() . '&action=State&state=Trash&record=' . $recordModel->getId(),
						'confirm' => \App\Language::translate('LBL_MOVE_TO_TRASH_DESC')
					],
					'linkicon' => 'glyphicon glyphicon-trash',
					'linkclass' => 'entityStateBtn',
					'style' => empty($stateColors['Trash']) ? '' : "background: {$stateColors['Trash']};"
			]);
		}
		if ($recordModel->privilegeToDelete()) {
			$linkModelList['DETAIL_VIEW_EXTENDED'][] = Vtiger_Link_Model::getInstanceFromValues([
					'linktype' => 'DETAIL_VIEW_EXTENDED',
					'linklabel' => 'LBL_DELETE_RECORD_COMPLETELY',
					'title' => \App\Language::translate('LBL_DELETE_RECORD_COMPLETELY'),
					'linkurl' => 'javascript:app.showConfirmation({type: "href"},this)',
					'linkdata' => [
						'url' => 'index.php?module=' . $recordModel->getModuleName() . '&action=Delete&record=' . $recordModel->getId(),
						'confirm' => \App\Language::translate('LBL_DELETE_RECORD_COMPLETELY_DESC')
					],
					'linkicon' => 'glyphicon glyphicon-erase',
					'linkclass' => 'btn-black'
			]);
		}
		if ($moduleModel->isPermitted('DuplicateRecord')) {
			$linkModelList['DETAIL_VIEW_BASIC'][] = Vtiger_Link_Model::getInstanceFromValues([
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linklabel' => 'LBL_DUPLICATE',
					'linkurl' => $recordModel->getDuplicateRecordUrl(),
					'linkicon' => 'glyphicon glyphicon-duplicate',
					'title' => \App\Language::translate('LBL_DUPLICATE_RECORD')
			]);
		}
		if (!Settings_ModuleManager_Library_Model::checkLibrary('mPDF') && $moduleModel->isPermitted('ExportPdf')) {
			$handlerClass = Vtiger_Loader::getComponentClassName('Model', 'PDF', $moduleName);
			$pdfModel = new $handlerClass();
			if ($pdfModel->checkActiveTemplates($recordId, $moduleName, 'Detail')) {
				$linkModelList['DETAIL_VIEW_BASIC'][] = Vtiger_Link_Model::getInstanceFromValues([
						'linktype' => 'DETAIL_VIEW_ADDITIONAL',
						'linklabel' => \App\Language::translate('LBL_EXPORT_PDF'),
						'linkurl' => 'javascript:Vtiger_Header_Js.getInstance().showPdfModal("index.php?module=' . $moduleName . '&view=PDF&fromview=Detail&record=' . $recordId . '");',
						'linkicon' => 'glyphicon glyphicon-save-file',
						'title' => \App\Language::translate('LBL_EXPORT_PDF')
				]);
			}
		}
		$relatedLinks = $this->getDetailViewRelatedLinks();
		foreach ($relatedLinks as &$relatedLinkEntry) {
			$relatedLink = Vtiger_Link_Model::getInstanceFromValues($relatedLinkEntry);
			$linkModelList[$relatedLink->getType()][] = $relatedLink;
		}
		$allLinks = Vtiger_Link_Model::getAllByType($moduleModel->getId(), ['DETAIL_VIEW_ADDITIONAL', 'DETAIL_VIEW_BASIC', 'DETAIL_VIEW_HEADER_WIDGET', 'DETAIL_VIEW_EXTENDED', 'DETAILVIEWTAB'], $linkParams);
		if (!empty($allLinks)) {
			foreach ($allLinks as $type => &$allLinksByType) {
				foreach ($allLinksByType as $linkModel) {
					$linkModelList[$type][] = $linkModel;
				}
			}
		}
		$this->set('Links', $linkModelList);
		return $linkModelList;
	}

	/**
	 * Function to get the detail view related links
	 * @return <array> - list of links parameters
	 */
	public function getDetailViewRelatedLinks()
	{
		$recordModel = $this->getRecord();
		$parentModuleModel = $this->getModule();
		$this->getWidgets();
		$relatedLinks = [];
		if ($parentModuleModel->isSummaryViewSupported() && $this->widgetsList) {
			$relatedLinks = [[
				'linktype' => 'DETAILVIEWTAB',
				'linklabel' => 'LBL_RECORD_SUMMARY',
				'linkKey' => 'LBL_RECORD_SUMMARY',
				'linkurl' => $recordModel->getDetailViewUrl() . '&mode=showDetailViewByMode&requestMode=summary',
				'linkicon' => '',
				'related' => 'Summary'
			]];
		}
		//link which shows the summary information(generally detail of record)
		$relatedLinks[] = [
			'linktype' => 'DETAILVIEWTAB',
			'linklabel' => 'LBL_RECORD_DETAILS',
			'linkKey' => 'LBL_RECORD_DETAILS',
			'linkurl' => $recordModel->getDetailViewUrl() . '&mode=showDetailViewByMode&requestMode=full',
			'linkicon' => '',
			'related' => 'Details'
		];
		$modCommentsModel = Vtiger_Module_Model::getInstance('ModComments');
		if ($parentModuleModel->isCommentEnabled() && $modCommentsModel->isPermitted('DetailView')) {
			$relatedLinks[] = [
				'linktype' => 'DETAILVIEWTAB',
				'linklabel' => 'ModComments',
				'linkurl' => $recordModel->getDetailViewUrl() . '&mode=showAllComments',
				'linkicon' => '',
				'related' => $modCommentsModel->getName(),
				'countRelated' => AppConfig::relation('SHOW_RECORDS_COUNT')
			];
		}
		if ($parentModuleModel->isTrackingEnabled()) {
			$relatedLinks[] = [
				'linktype' => 'DETAILVIEWTAB',
				'linklabel' => 'LBL_UPDATES',
				'linkurl' => $recordModel->getDetailViewUrl() . '&mode=showRecentActivities&page=1',
				'linkicon' => '',
				'related' => 'ModTracker',
				'countRelated' => AppConfig::module('ModTracker', 'UNREVIEWED_COUNT') && $parentModuleModel->isPermitted('ReviewingUpdates'),
				'badgeClass' => 'bgDanger'
			];
		}
		foreach ($parentModuleModel->getRelations() as $relation) {
			if ($relation->isRelatedViewType('RelatedTab')) {
				$relatedLinks[] = [
					'linktype' => 'DETAILVIEWRELATED',
					'linklabel' => $relation->get('label'),
					'linkurl' => $relation->getListUrl($recordModel),
					'linkicon' => '',
					'relatedModuleName' => $relation->get('relatedModuleName')
				];
			}
		}
		return $relatedLinks;
	}

	/**
	 *
	 * @param type $viewType
	 * @return type
	 */
	public function getBlocks($viewType)
	{
		$recordModel = $this->getRecord();
		$relatedLinks = [];
		foreach ($this->getModule()->getRelations() as $relation) {
			if ($relation->isRelatedViewType($viewType)) {
				$relatedLinks[] = Vtiger_Link_Model::getInstanceFromValues([
						'linklabel' => $relation->get('label'),
						'linkurl' => $relation->getListUrl($recordModel),
						'linkicon' => '',
						'relatedModuleName' => $relation->get('relatedModuleName')
				]);
			}
		}
		return $relatedLinks;
	}

	/**
	 * Function to get the detail view widgets
	 * @return <Array> - List of widgets , where each widget is an Vtiger_Link_Model
	 */
	public function getWidgets()
	{
		if (count($this->widgetsList) > 0)
			return;
		$moduleModel = $this->getModule();
		$module = $this->getModuleName();
		$record = $this->getRecord()->getId();
		$modelWidgets = $moduleModel->getWidgets($module);
		foreach ($modelWidgets as $widgetCol) {
			foreach ($widgetCol as $widget) {
				$widgetName = 'Vtiger_' . $widget['type'] . '_Widget';
				if (class_exists($widgetName)) {
					$this->widgetsList[] = $widget['type'];
					$widgetInstance = new $widgetName($module, $moduleModel, $record, $widget);
					$widgetObject = $widgetInstance->getWidget();
					if (count($widgetObject) > 0) {
						$this->widgets[$widgetObject['wcol']][] = $widgetObject;
					}
				}
			}
		}
	}

	/**
	 * Function to get the Quick Links for the Detail view of the module
	 * @param <Array> $linkParams
	 * @return <Array> List of Vtiger_Link_Model instances
	 */
	public function getSideBarLinks($linkParams)
	{
		$linkTypes = ['SIDEBARLINK', 'SIDEBARWIDGET'];
		$moduleLinks = $this->getModule()->getSideBarLinks($linkTypes);

		$listLinkTypes = ['DETAILVIEWSIDEBARLINK', 'DETAILVIEWSIDEBARWIDGET'];
		$listLinks = Vtiger_Link_Model::getAllByType($this->getModule()->getId(), $listLinkTypes);

		if (isset($listLinks['DETAILVIEWSIDEBARLINK'])) {
			foreach ($listLinks['DETAILVIEWSIDEBARLINK'] as $link) {
				$link->linkurl = $link->linkurl . '&record=' . $this->getRecord()->getId() . '&source_module=' . $this->getModule()->getName();
				$moduleLinks['SIDEBARLINK'][] = $link;
			}
		}

		if (isset($listLinks['DETAILVIEWSIDEBARWIDGET'])) {
			foreach ($listLinks['DETAILVIEWSIDEBARWIDGET'] as $link) {
				$link->linkurl = $link->linkurl . '&record=' . $this->getRecord()->getId() . '&source_module=' . $this->getModule()->getName();
				$moduleLinks['SIDEBARWIDGET'][] = $link;
			}
		}

		return $moduleLinks;
	}

	/**
	 * Function to get the module label
	 * @return string - label
	 */
	public function getModuleLabel()
	{
		return $this->getModule()->get('label');
	}

	/**
	 *  Function to get the module name
	 *  @return string - name of the module
	 */
	public function getModuleName()
	{
		return $this->getModule()->get('name');
	}

	/**
	 * Function to get the instance
	 * @param string $moduleName - module name
	 * @param string $recordId - record id
	 * @return Vtiger_DetailView_Model
	 */
	public static function getInstance($moduleName, $recordId)
	{
		$modelClassName = Vtiger_Loader::getComponentClassName('Model', 'DetailView', $moduleName);
		$instance = new $modelClassName();

		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		$recordModel = Vtiger_Record_Model::getInstanceById($recordId, $moduleName);
		return $instance->setModule($moduleModel)->setRecord($recordModel);
	}

	public function getCustomHeaderFields()
	{
		$moduleName = $this->getModuleName();
		$path = 'modules' . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . 'headerfields';
		if (!is_dir($path)) {
			return [];
		}
		$headerFields = [];
		foreach (new DirectoryIterator($path) as $fileinfo) {
			if (!$fileinfo->isDot()) {
				$filename = explode('.', $fileinfo->getFilename());
				$name = reset($filename);

				$modelClassName = Vtiger_Loader::getComponentClassName('HeaderField', $name, $moduleName);
				$instance = new $modelClassName;
				if (method_exists($instance, 'checkPermission') && !$instance->checkPermission()) {
					continue;
				}
				if ($result = $instance->process($this)) {
					$headerFields[$name] = $result;
				}
			}
		}
		ksort($headerFields);
		return $headerFields;
	}
}
