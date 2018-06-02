<?php

/**
 * UIType sharedOwner Field Class
 * @package YetiForce.Fields
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 * @author Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */
class Vtiger_SharedOwner_UIType extends Vtiger_Base_UIType
{

	/**
	 * {@inheritDoc}
	 */
	public function getDBValue($value, $recordModel = false)
	{
		if (is_array($value)) {
			$value = implode(',', $value);
		}
		return \App\Purifier::decodeHtml($value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate($value, $isUserFormat = false)
	{
		if ($this->validate || empty($value)) {
			return;
		}
		if (!is_array($value)) {
			settype($value, 'array');
		}
		foreach ($value as $shownerid) {
			if (!is_numeric($shownerid)) {
				throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . $value, 406);
			}
		}
		$this->validate = true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$isAdmin = \App\User::getCurrentUserModel()->isAdmin();
		if (empty($value)) {
			return '';
		} elseif (!is_array($value)) {
			$values = explode(',', $value);
		}
		$displayValue = [];
		foreach ($values as $shownerid) {
			$ownerName = rtrim(\App\Fields\Owner::getLabel($shownerid));
			if (!$isAdmin || $rawText) {
				$displayValue[] = $ownerName;
				continue;
			}
			$detailViewUrl = '';
			switch (\App\Fields\Owner::getType($shownerid)) {
				case 'Users':
					$userModel = Users_Privileges_Model::getInstanceById($shownerid);
					$userModel->setModule('Users');
					if ($userModel->get('status') === 'Inactive') {
						$ownerName = '<span class="redColor">' . $ownerName . '</span>';
					}
					if (App\User::getCurrentUserModel()->isAdmin()) {
						$detailViewUrl = $userModel->getDetailViewUrl();
					}
					break;
				case 'Groups':
					if (App\User::getCurrentUserModel()->isAdmin()) {
						$recordModel = new Settings_Groups_Record_Model();
						$recordModel->set('groupid', $shownerid);
						$detailViewUrl = $recordModel->getDetailViewUrl();
					}
					break;
				default:
					$ownerName = '<span class="redColor">---</span>';
					break;
			}
			if (!empty($detailViewUrl)) {
				$displayValue[] = "<a href=\"$detailViewUrl\">$ownerName</a>";
			}
		}
		return implode(', ', $displayValue);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getListViewDisplayValue($value, $record = false, $recordModel = false, $rawText = false)
	{
		$values = $this->getSharedOwners($record);
		if (empty($values)) {
			return '';
		}
		$display = $shownerData = [];
		$maxLengthText = $this->getFieldModel()->get('maxlengthtext');
		$isAdmin = \App\User::getCurrentUserModel()->isAdmin();
		foreach ($values as $key => $shownerid) {
			$name = \App\Fields\Owner::getLabel($shownerid);
			switch (\App\Fields\Owner::getType($shownerid)) {
				case 'Users':
					$userModel = Users_Privileges_Model::getInstanceById($shownerid);
					$userModel->setModule('Users');
					$display[$key] = $name;
					if ($userModel->get('status') === 'Inactive') {
						$shownerData[$key]['inactive'] = true;
					}
					if ($isAdmin && !$rawText) {
						$shownerData[$key]['link'] = $userModel->getDetailViewUrl();
					}
					break;
				case 'Groups':
					if (empty($name)) {
						continue;
					}
					$display[$key] = $name;
					$recordModel = new Settings_Groups_Record_Model();
					$recordModel->set('groupid', $shownerid);
					$detailViewUrl = $recordModel->getDetailViewUrl();
					if ($isAdmin && !$rawText) {
						$shownerData[$key]['link'] = $detailViewUrl;
					}

					break;

				default:
					break;
			}
		}
		$display = implode(', ', $display);
		$display = explode(', ', \vtlib\Functions::textLength($display, $maxLengthText));
		foreach ($display as $key => &$shownerName) {
			if (isset($shownerData[$key]['inactive'])) {
				$shownerName = '<span class="redColor">' . $shownerName . '</span>';
			}
			if (isset($shownerData[$key]['link'])) {
				$shownerName = "<a href='" . $shownerData[$key]['link'] . "'>$shownerName</a>";
			}
		}
		return implode(', ', $display);
	}

	/**
	 * Function to get the share users list
	 * @param int $record record ID
	 * @param bool $returnArray whether return data in an array
	 * @return array
	 */
	public static function getSharedOwners($record, $moduleName = false)
	{
		$shownerid = Vtiger_Cache::get('SharedOwner', $record);
		if ($shownerid !== false) {
			return $shownerid;
		}

		$query = (new \App\Db\Query())->select('userid')->from('u_#__crmentity_showners')->where(['crmid' => $record])->distinct();
		$values = $query->column();
		if (empty($values))
			$values = [];
		Vtiger_Cache::set('SharedOwner', $record, $values);
		return $values;
	}

	public static function getSearchViewList($moduleName, $cvId)
	{
		$queryGenerator = new App\QueryGenerator($moduleName);
		$queryGenerator->initForCustomViewById($cvId);
		$queryGenerator->setFields([]);
		$queryGenerator->setCustomColumn('u_#__crmentity_showners.userid');
		$queryGenerator->addJoin(['INNER JOIN', 'u_#__crmentity_showners', "{$queryGenerator->getColumnName('id')} = u_#__crmentity_showners.crmid"]);
		$dataReader = $queryGenerator->createQuery()->distinct()->createCommand()->query();
		$users = $group = [];
		while ($id = $dataReader->readColumn(0)) {
			$name = \App\Fields\Owner::getUserLabel($id);
			if (!empty($name)) {
				$users[$id] = $name;
				continue;
			}
			$name = \App\Fields\Owner::getGroupName($id);
			if ($name !== false) {
				$group[$id] = $name;
				continue;
			}
		}
		asort($users);
		asort($group);
		return ['users' => $users, 'group' => $group];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTemplateName()
	{
		return 'uitypes/SharedOwner.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getListSearchTemplateName()
	{
		return 'uitypes/SharedOwnerFieldSearchView.tpl';
	}

	/**
	 * {@inheritDoc}
	 */
	public function isListviewSortable()
	{
		return false;
	}
}
