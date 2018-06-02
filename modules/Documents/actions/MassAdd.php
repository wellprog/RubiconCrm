<?php

/**
 * Action to mass upload files
 * @package YetiForce.Action
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Tomasz Kur <t.kur@yetiforce.com>
 */
class Documents_MassAdd_Action extends Vtiger_Mass_Action
{

	/**
	 * {@inheritDoc}
	 */
	public function checkPermission(\App\Request $request)
	{
		if (!\App\Privilege::isPermitted($request->getModule(), 'CreateView')) {
			throw new \App\Exceptions\NoPermitted('LBL_PERMISSION_DENIED', 406);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function process(\App\Request $request)
	{
		$moduleName = $request->getModule();
		$nameFiles = $request->get('nameFile');
		foreach ($_FILES as $file) {
			$countFiles = count($file['name']);
			for ($i = 0; $i < $countFiles; $i++) {
				$originalFile = [
					'name' => $file['name'][$i],
					'type' => $file['type'][$i],
					'tmp_name' => $file['tmp_name'][$i],
					'error' => $file['error'][$i],
					'size' => $file['size'][$i],
				];
				$recordeModel = Vtiger_Record_Model::getCleanInstance($moduleName);
				$recordeModel->set('notes_title', $nameFiles[$i]);
				$recordeModel->set('assigned_user_id', App\User::getCurrentUserId());
				$recordeModel->file = $originalFile;
				$recordeModel->set('filelocationtype', 'I');
				$recordeModel->set('filestatus', true);
				$recordeModel->save();
			}
		}
		$response = new Vtiger_Response();
		$response->setResult(true);
		$response->emit();
	}
}
