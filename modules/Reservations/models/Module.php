<?php

/**
 * Reservations module model class
 * @package YetiForce.Model
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
class Reservations_Module_Model extends Vtiger_Module_Model
{

	public function getCalendarViewUrl()
	{
		return 'index.php?module=' . $this->get('name') . '&view=Calendar';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getSideBarLinks($linkParams)
	{
		$links = Vtiger_Link_Model::getAllByType($this->getId(), ['SIDEBARLINK', 'SIDEBARWIDGET'], $linkParams);
		$links['SIDEBARLINK'][] = Vtiger_Link_Model::getInstanceFromValues([
				'linktype' => 'SIDEBARLINK',
				'linklabel' => 'LBL_CALENDAR_VIEW',
				'linkurl' => $this->getCalendarViewUrl(),
				'linkicon' => 'glyphicon glyphicon-calendar',
		]);
		$links['SIDEBARLINK'][] = Vtiger_Link_Model::getInstanceFromValues([
				'linktype' => 'SIDEBARLINK',
				'linklabel' => 'LBL_RECORDS_LIST',
				'linkurl' => $this->getListViewUrl(),
				'linkicon' => 'glyphicon glyphicon-list',
		]);
		if ($linkParams['ACTION'] === 'Calendar') {
			$links['SIDEBARWIDGET'][] = Vtiger_Link_Model::getInstanceFromValues([
					'linktype' => 'SIDEBARWIDGET',
					'linklabel' => 'LBL_USERS',
					'linkurl' => 'module=' . $this->get('name') . '&view=RightPanel&mode=getUsersList',
					'linkicon' => ''
			]);
			$links['SIDEBARWIDGET'][] = Vtiger_Link_Model::getInstanceFromValues([
					'linktype' => 'SIDEBARWIDGET',
					'linklabel' => 'LBL_TYPE',
					'linkurl' => 'module=' . $this->get('name') . '&view=RightPanel&mode=getTypesList',
					'linkicon' => ''
			]);
		}
		return $links;
	}

	/**
	 * Function to get the Default View Component Name
	 * @return string
	 */
	public function getDefaultViewName()
	{
		return 'Calendar';
	}
}
