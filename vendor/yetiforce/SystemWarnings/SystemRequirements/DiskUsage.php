<?php
namespace App\SystemWarnings\SystemRequirements;

/**
 * Disk usage system warnings class
 * @package YetiForce.SystemWarning
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class DiskUsage extends \App\SystemWarnings\Template
{

	protected $title = 'LBL_DISK_USAGE';
	protected $priority = 9;
	protected $precentAlert = 90;

	/**
	 * Check disk space
	 */
	public function process()
	{
		$this->status = 1;
		$dir = ROOT_DIRECTORY . DIRECTORY_SEPARATOR;
		$total = disk_total_space($dir);
		$free = disk_free_space($dir);
		$used = ($total - $free) / $total * 100;
		if ($used > $this->precentAlert) {
			$this->status = 0;
		} else {
			foreach (\Settings_ConfReport_Module_Model::$writableFilesAndFolders as $value) {
				if ($this->status === 0) {
					break;
				}
				$path = ROOT_DIRECTORY . DIRECTORY_SEPARATOR . $value;
				if (is_dir($path)) {
					$total = disk_total_space($path);
					$free = disk_free_space($path);
					$used = ($total - $free) / $total * 100;
					if ($used > $this->precentAlert) {
						$this->status = 0;
						$dir = $path;
					}
				}
			}
		}
		if ($this->status === 0) {
			$this->description = \App\Language::translateArgs('LBL_DISK_FULL', 'Settings:SystemWarnings', \vtlib\Functions::showBytes($free), \vtlib\Functions::showBytes($total), $dir);
		}
	}
}
