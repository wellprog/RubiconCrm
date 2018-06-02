<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * ********************************************************************************** */
include_once dirname(__FILE__) . '/ModCommentsCore.php';
include_once dirname(__FILE__) . '/models/Comments.php';

require_once 'include/utils/VtlibUtils.php';

/**
 * ModComments main class
 */
class ModComments extends ModCommentsCore
{

	/**
	 * Invoked when special actions are performed on the module.
	 * @param string $moduleName Module name
	 * @param string $eventType Event Type (module.postinstall, module.disabled, module.enabled, module.preuninstall)
	 */
	public function moduleHandler($moduleName, $eventType)
	{
		parent::moduleHandler($moduleName, $eventType);
		if ($eventType === 'module.postinstall') {
			self::addWidgetTo(['Leads', 'Contacts', 'Accounts', 'Project', 'ProjectTask']);
			// Mark the module as Standard module
			\App\Db::getInstance()->createCommand()->update('vtiger_tab', ['customized' => 0,], ['name' => $moduleName])->execute();
		}
	}

	/**
	 * Transfer the comment records from one parent record to another.
	 * @param int Source parent record id
	 * @param int Target parent record id
	 */
	public static function transferRecords($currentParentId, $targetParentId)
	{
		\App\Db::getInstance()->createCommand()->update('vtiger_modcomments', ['related_to' => $targetParentId], ['related_to' => $currentParentId])->execute();
	}

	/**
	 * Get widget instance by name
	 * @param string $name
	 * @return boolean
	 */
	public static function getWidget($name)
	{
		if ($name === 'DetailViewBlockCommentWidget' &&
			\App\Privilege::isPermitted('ModComments', 'DetailView')) {
			require_once dirname(__FILE__) . '/widgets/DetailViewBlockComment.php';
			return (new ModComments_DetailViewBlockCommentWidget());
		}
		return false;
	}

	/**
	 * Add widget to other module.
	 * @param unknown_type $moduleNames
	 * @return unknown_type
	 */
	public static function addWidgetTo($moduleNames, $widgetType = 'DETAILVIEWWIDGET', $widgetName = 'DetailViewBlockCommentWidget')
	{
		if (empty($moduleNames))
			return;

		if (is_string($moduleNames))
			$moduleNames = [$moduleNames];

		$commentWidgetModules = [];
		foreach ($moduleNames as $moduleName) {
			$module = vtlib\Module::getInstance($moduleName);
			if ($module) {
				$module->addLink($widgetType, $widgetName, "block://ModComments:modules/ModComments/ModComments.php");
				$commentWidgetModules[] = $moduleName;
			}
		}
		if (count($commentWidgetModules) > 0) {
			$modCommentsModule = vtlib\Module::getInstance('ModComments');
			$modCommentsModule->addLink('HEADERSCRIPT', 'ModCommentsCommonHeaderScript', 'modules/ModComments/ModCommentsCommon.js');
			$modCommentsRelatedToField = vtlib\Field::getInstance('related_to', $modCommentsModule);
			$modCommentsRelatedToField->setRelatedModules($commentWidgetModules);
		}
	}

	/**
	 * Remove widget from other modules.
	 * @param unknown_type $moduleNames
	 * @param unknown_type $widgetType
	 * @param unknown_type $widgetName
	 * @return unknown_type
	 */
	public static function removeWidgetFrom($moduleNames, $widgetType = 'DETAILVIEWWIDGET', $widgetName = 'DetailViewBlockCommentWidget')
	{
		if (empty($moduleNames))
			return;

		if (is_string($moduleNames))
			$moduleNames = [$moduleNames];

		$commentWidgetModules = [];
		foreach ($moduleNames as $moduleName) {
			$module = vtlib\Module::getInstance($moduleName);
			if ($module) {
				$module->deleteLink($widgetType, $widgetName, "block://ModComments:modules/ModComments/ModComments.php");
				$commentWidgetModules[] = $moduleName;
			}
		}
		if (count($commentWidgetModules) > 0) {
			$modCommentsModule = vtlib\Module::getInstance('ModComments');
			$modCommentsRelatedToField = vtlib\Field::getInstance('related_to', $modCommentsModule);
			$modCommentsRelatedToField->unsetRelatedModules($commentWidgetModules);
		}
	}

	/**
	 * Wrap this instance as a model
	 */
	public function getAsCommentModel()
	{
		return new ModComments_CommentsModel($this->column_fields);
	}
}
