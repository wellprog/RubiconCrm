<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * Contributor(s): YetiForce.com
 * ********************************************************************************** */

include_once 'modules/Vtiger/CRMEntity.php';

class RTestsAnswers extends Vtiger_CRMEntity
{

	public $table_name = 'vtiger_rtestsanswers';
	public $table_index = 'rtestsanswersid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	public $customFieldTable = ['vtiger_rtestsanswerscf', 'rtestsanswersid'];

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	public $tab_name = ['vtiger_crmentity', 'vtiger_rtestsanswers', 'vtiger_rtestsanswerscf'];

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	public $tab_name_index = [
		'vtiger_crmentity' => 'crmid',
		'vtiger_rtestsanswers' => 'rtestsanswersid',
		'vtiger_rtestsanswerscf' => 'rtestsanswersid'
	];

	/**
	 * Mandatory for Listing (Related listview)
	 */
	public $list_fields = [
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
		'Текст ответа' => ['rtestsanswers', 'text'],
		'Assigned To' => ['crmentity', 'smownerid']
	];
	public $list_fields_name = [
		/* Format: Field Label => fieldname */
		'Текст ответа' => 'text',
		'Assigned To' => 'assigned_user_id',
	];
	// Make the field link to detail view
	public $list_link_field = 'text';
	// For Popup listview and UI type support
	public $search_fields = [
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
		'Текст ответа' => ['rtestsanswers', 'text'],
		'Assigned To' => ['vtiger_crmentity', 'assigned_user_id'],
	];
	public $search_fields_name = [
		/* Format: Field Label => fieldname */
		'Текст ответа' => 'text',
		'Assigned To' => 'assigned_user_id',
	];
	// For Popup window record selection
	public $popup_fields = ['text'];
	// For Alphabetical search
	public $def_basicsearch_col = 'text';
	// Column value to use on detail view record text display
	public $def_detailview_recname = 'text';
	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	public $mandatory_fields = ['text', 'assigned_user_id'];
	public $default_order_by = '';
	public $default_sort_order = 'ASC';

	/**
	 * Invoked when special actions are performed on the module.
	 * @param String Module name
	 * @param String Event Type
	 */
	public function moduleHandler($moduleName, $eventType)
	{
		if ($eventType === 'module.postinstall') {
			
		} else if ($eventType === 'module.disabled') {
			
		} else if ($eventType === 'module.preuninstall') {
			
		} else if ($eventType === 'module.preupdate') {
			
		} else if ($eventType === 'module.postupdate') {
			
		}
	}
}
