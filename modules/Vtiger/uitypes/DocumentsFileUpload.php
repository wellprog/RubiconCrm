<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class Vtiger_DocumentsFileUpload_UIType extends Vtiger_Base_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/DocumentsFileUpload.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getListViewDisplayValue($value, $record = false, $recordModel = false, $rawText = false)
	{
		return $this->getDisplayValue(\vtlib\Functions::textLength($value, $this->getFieldModel()->get('maxlengthtext')), $record, $recordModel, $rawText);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$value = \App\Purifier::encodeHtml($value);
		if ($recordModel) {
			$fileLocationType = $recordModel->get('filelocationtype');
			$fileStatus = $recordModel->get('filestatus');
			if (!empty($value) && $fileStatus) {
				if ($fileLocationType === 'I') {
					$fileId = (new App\Db\Query())->select(['attachmentsid'])
							->from('vtiger_seattachmentsrel')->where(['crmid' => $record])->scalar();
					if ($fileId) {
						return '<a href="file.php?module=Documents&action=DownloadFile&record=' . $record . '&fileid=' . $fileId . '"' .
							' title="' . \App\Language::translate('LBL_DOWNLOAD_FILE', 'Documents') . '" >' . $value . '</a>';
					}
				} else {
					return '<a href="' . $value . '" target="_blank" title="' . \App\Language::translate('LBL_DOWNLOAD_FILE', 'Documents') . '" >' . $value . '</a>';
				}
			}
		}
		return $value;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDBValue($value, $recordModel = false)
	{
		if ($value === null) {
			$fileName = (new App\Db\Query())->select(['filename'])->from('vtiger_notes')->where(['notesid' => $this->id])->one();
			if ($fileName) {
				return App\Purifier::decodeHtml($fileName);
			}
			return '';
		}
		return App\Purifier::decodeHtml($value);
	}
}
