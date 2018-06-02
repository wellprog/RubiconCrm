<?php

/**
 * Record Class for IStorages
 * @package YetiForce.Model
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */
class IStorages_Record_Model extends Vtiger_Record_Model
{

	/**
	 * Function returns the details of IStorages Hierarchy
	 * @return <Array>
	 */
	public function getHierarchy()
	{
		$focus = CRMEntity::getInstance($this->getModuleName());
		$hierarchy = $focus->getHierarchy($this->getId());
		foreach ($hierarchy['entries'] as $storageId => $storageInfo) {
			preg_match('/<a href="+/', $storageInfo[0], $matches);
			if (!empty($matches)) {
				preg_match('/[.\s]+/', $storageInfo[0], $dashes);
				preg_match("/<a(.*)>(.*)<\/a>/i", $storageInfo[0], $name);

				$recordModel = Vtiger_Record_Model::getCleanInstance('IStorages');
				$recordModel->setId($storageId);
				$hierarchy['entries'][$storageId][0] = $dashes[0] . "<a href=" . $recordModel->getDetailViewUrl() . ">" . $name[2] . "</a>";
			}
		}
		return $hierarchy;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($fieldName, $record = false, $rawText = false, $length = false)
	{
		// This is special field / displayed only in Products module [view=Detail relatedModule=IStorages]
		if ($fieldName === 'qtyinstock') {
			return $this->get($fieldName);
		}
		return parent::getDisplayValue($fieldName, $record, $rawText, $length);
	}
}
