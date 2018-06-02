<?php

/**
 * OSSMailView DetailView model class
 * @package YetiForce.Model
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
class OSSMailView_DetailView_Model extends Vtiger_DetailView_Model
{

	public function getDetailViewLinks($linkParams)
	{
		$currentUserModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		$recordModel = $this->getRecord();
		$linkModelList = parent::getDetailViewLinks($linkParams);
		unset($linkModelList['DETAIL_VIEW_ADDITIONAL']);

		$userPrivilegesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		$permission = $userPrivilegesModel->hasModulePermission('OSSMail');
		if ($permission && AppConfig::main('isActiveSendingMails') && \App\Privilege::isPermitted('OSSMail')) {
			$recordId = $recordModel->getId();
			if ($currentUserModel->get('internal_mailer') == 1) {
				$config = OSSMail_Module_Model::getComposeParameters();
				$url = OSSMail_Module_Model::getComposeUrl();

				$detailViewLinks[] = [
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linklabel' => '',
					'linkhint' => 'LBL_REPLY',
					'linkdata' => ['url' => $url . '&mid=' . $recordId . '&type=reply', 'popup' => $config['popup']],
					'linkimg' => \App\Layout::getLayoutFile('modules/OSSMailView/previewReply.png'),
					'linkclass' => 'sendMailBtn'
				];
				$detailViewLinks[] = [
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linklabel' => '',
					'linkhint' => 'LBL_REPLYALLL',
					'linkdata' => ['url' => $url . '&mid=' . $recordId . '&type=replyAll', 'popup' => $config['popup']],
					'linkimg' => \App\Layout::getLayoutFile('modules/OSSMailView/previewReplyAll.png'),
					'linkclass' => 'sendMailBtn'
				];
				$detailViewLinks[] = [
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linklabel' => '',
					'linkhint' => 'LBL_FORWARD',
					'linkdata' => ['url' => $url . '&mid=' . $recordId . '&type=forward', 'popup' => $config['popup']],
					'linkicon' => 'glyphicon glyphicon-share-alt',
					'linkclass' => 'sendMailBtn'
				];
			} else {
				$detailViewLinks[] = [
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linkhref' => true,
					'linklabel' => '',
					'linkhint' => 'LBL_REPLY',
					'linkurl' => OSSMail_Module_Model::getExternalUrlForWidget($recordModel, 'reply'),
					'linkimg' => \App\Layout::getLayoutFile('modules/OSSMailView/previewReply.png'),
					'linkclass' => 'sendMailBtn'
				];
				$detailViewLinks[] = [
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linkhref' => true,
					'linklabel' => '',
					'linkhint' => 'LBL_REPLYALLL',
					'linkurl' => OSSMail_Module_Model::getExternalUrlForWidget($recordModel, 'replyAll'),
					'linkimg' => \App\Layout::getLayoutFile('modules/OSSMailView/previewReplyAll.png'),
					'linkclass' => 'sendMailBtn'
				];
				$detailViewLinks[] = [
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linkhref' => true,
					'linklabel' => '',
					'linkhint' => 'LBL_FORWARD',
					'linkurl' => OSSMail_Module_Model::getExternalUrlForWidget($recordModel, 'forward'),
					'linkicon' => 'glyphicon glyphicon-share-alt',
					'linkclass' => 'sendMailBtn'
				];
			}

			if (\App\Privilege::isPermitted('OSSMailView', 'PrintMail')) {
				$detailViewLinks[] = [
					'linktype' => 'DETAIL_VIEW_ADDITIONAL',
					'linklabel' => '',
					'linkhint' => 'LBL_PRINT',
					'linkurl' => 'javascript:OSSMailView_Detail_Js.printMail();',
					'linkicon' => 'glyphicon glyphicon-print'
				];
			}
			foreach ($detailViewLinks as $detailViewLink) {
				$linkModelList['DETAIL_VIEW_ADDITIONAL'][] = Vtiger_Link_Model::getInstanceFromValues($detailViewLink);
			}
		}
		$linkModelDetailViewList = $linkModelList['DETAIL_VIEW_BASIC'];
		$countOfList = count($linkModelDetailViewList);
		for ($i = 0; $i < $countOfList; $i++) {
			$linkModel = $linkModelDetailViewList[$i];
			if ($linkModel->get('linklabel') == 'LBL_DUPLICATE') {
				unset($linkModelList['DETAIL_VIEW_BASIC'][$i]);
				break;
			}
		}
		return $linkModelList;
	}
}
