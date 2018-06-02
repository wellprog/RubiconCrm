/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * Contributor(s): YetiForce.com
 *************************************************************************************/

Vtiger_Detail_Js("Campaigns_Detail_Js", {}, {
	/**
	 * Function to register email enabled actions
	 */
	registerEmailEnabledActions: function () {
		var moduleName = app.getModuleName();
		var className = moduleName + "_List_Js";
		var listInstance = new window[className]();
		listInstance.registerEvents();
		listInstance.markSelectedRecords();
	},
	registerEventForRelatedTabClick: function () {
		var thisInstance = this;
		var detailContentsHolder = thisInstance.getContentHolder();
		var detailContainer = detailContentsHolder.closest('div.detailViewInfo');
		jQuery('.related', detailContainer).on('click', 'li', function (e, urlAttributes) {
			var tabElement = jQuery(e.currentTarget);
			if (!tabElement.hasClass('dropdown')) {
				var element = jQuery('<div></div>');
				element.progressIndicator({
					'position': 'html',
					'blockInfo': {
						'enabled': true,
						'elementToBlock': detailContainer
					}
				});
				var url = tabElement.data('url');
				if (typeof urlAttributes != 'undefined') {
					var callBack = urlAttributes.callback;
					delete urlAttributes.callback;
				}
				thisInstance.loadContents(url, urlAttributes).then(
						function (data) {
							thisInstance.deSelectAllrelatedTabs();
							thisInstance.markTabAsSelected(tabElement);
							app.showBtnSwitch(detailContentsHolder.find('.switchBtn'));
							Vtiger_Helper_Js.showHorizontalTopScrollBar();
							thisInstance.registerHelpInfo();
							app.registerModal(detailContentsHolder);
							app.registerMoreContent(detailContentsHolder.find('button.moreBtn'));
							element.progressIndicator({'mode': 'hide'});
							var emailEnabledModule = jQuery(data).find('[name="emailEnabledModules"]').val();
							if (emailEnabledModule) {
								var listInstance = new Campaigns_List_Js();
								listInstance.registerEvents();
							}
							if (typeof callBack == 'function') {
								callBack(data);
							}
							//Summary tab is clicked
							if (tabElement.data('linkKey') == thisInstance.detailViewSummaryTabLabel) {
								thisInstance.loadWidgets();
							}
							thisInstance.registerBasicEvents();
						},
						function () {
							element.progressIndicator({'mode': 'hide'});
						}
				);
			}
		});
	},
	registerEvents: function () {
		this._super();
		//Calling registerevents of campaigns list to handle checkboxs click of related records
		var listInstance = Vtiger_List_Js.getInstance();
		listInstance.registerEvents();
		var thisInstance = this;
		app.event.on('RelatedList.AfterLoad', function (event, instance) {
			var response = instance.content;
			response.find('[name="selectedIds"]').data('selectedIds', "");
			response.find('[name="excludedIds"]').data('excludedIds', "");
			var emailEnabledModule = response.find('[name="emailEnabledModules"]').val();
			if (emailEnabledModule) {
				thisInstance.registerEmailEnabledActions();
			}
		});
	}
});
