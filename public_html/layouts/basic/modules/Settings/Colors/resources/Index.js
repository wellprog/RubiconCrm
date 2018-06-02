/* {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} */
Settings_Vtiger_Index_Js("Settings_Colors_Index_Js", {}, {
	registerEvents: function () {
		this.registerModuleTabEvent();
		this.registerModuleChangeEvent();
		this.registerModulePickListChangeEvent();
		this.initEvants();
	},
	initEvants: function () {
		var container = $('.UserColors');
		container.find('.updateUserColor').click(this.updateUserColor);
		container.find('.generateUserColor').click(this.generateUserColor);
		container.find('.removeUserColor').click(this.removeUserColor);
		container.find('.updateGroupColor').click(this.updateGroupColor);
		container.find('.generateGroupColor').click(this.generateGroupColor);
		container.find('.removeGroupColor').click(this.removeGroupColor);
		container.find('.updateModuleColor').click(this.updateModuleColor);
		container.find('.generateModuleColor').click(this.generateModuleColor);
		container.find('.removeModuleColor').click(this.removeModuleColor);
		container.find('.activeModuleColor').click(this.activeModuleColor);
		container.find('.addPicklistColorColumn').click(this.addPicklistColorColumn);
		container.find('.updatePicklistValueColor').click(this.updatePicklistValueColor);
		container.find('.generatePicklistValueColor').click(this.generatePicklistValueColor);
		container.find('.removePicklistValueColor').click(this.removePicklistValueColor);
		container.find('.updateColor').click(this.updateCalendarColor);
		container.find('#update_event').click(this.updateEvent);
		container.find('.generateColor').click(this.generateCalendarColor);
		container.find('.removeCalendarColor').click(this.removeCalendarColor);
	},
	updateUserColor: function (e) {
		var target = $(e.currentTarget);
		var editColorModal = jQuery('.UserColors .editColorContainer');
		var clonedContainer = editColorModal.clone(true, true);
		var colorPreview = $('#calendarColorPreviewUser' + target.data('record'));
		var callBackFunction = function (data) {
			data.find('.editColorContainer').removeClass('hide').show();
			var selectedColor = data.find('.selectedColor');
			selectedColor.val(colorPreview.data('color'));
			//register color picker
			var params = {
				flat: true,
				color: colorPreview.data('color'),
				onChange: function (hsb, hex, rgb) {
					selectedColor.val('#' + hex);
					colorPreview.data('color', '#' + hex);
				}
			};
			if (typeof customParams != 'undefined') {
				params = jQuery.extend(params, customParams);
			}
			data.find('.calendarColorPicker').ColorPicker(params);
			//save the user calendar with color
			data.find('[name="saveButton"]').click(function (e) {
				var progress = $.progressIndicator({
					'message': app.vtranslate('JS_LOADING_PLEASE_WAIT'),
					'blockInfo': {
						'enabled': true
					}
				});
				AppConnector.request({
					'module': 'Colors',
					'parent': 'Settings',
					'action': 'SaveAjax',
					'mode': 'updateUserColor',
					'color': selectedColor.val(),
					'record': target.data('record')
				}).then(
						function (data) {
							Vtiger_Helper_Js.showPnotify({
								text: data['result']['message'],
								animation: 'show',
								type: 'success'
							});
							return data['result'];
						}
				);
				colorPreview.css('background', selectedColor.val());
				target.data('color', selectedColor.val());
				progress.progressIndicator({'mode': 'hide'});
				app.hideModalWindow();
			});
		};
		app.showModalWindow(clonedContainer, function (data) {
			if (typeof callBackFunction == 'function') {
				callBackFunction(data);
			}
		}, {'width': '1000px'});
	},
	generateUserColor: function (e) {
		var target = $(e.currentTarget);
		var colorPreview = $('#calendarColorPreviewUser' + target.data('record'));
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'updateUserColor',
			record: target.data('record')
		}).then(
				function (data) {
					colorPreview.css('background', data['result'].color);
					colorPreview.data('color', data['result'].color);
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
				}
		);
	},
	removeUserColor: function (e) {
		var target = $(e.currentTarget);
		var colorPreview = $('#calendarColorPreviewUser' + target.data('record'));
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'removeUserColor',
			record: target.data('record')
		}).then(
				function (data) {
					colorPreview.css('background', '');
					colorPreview.data('color', '');
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
				}
		);
	},
	updateGroupColor: function (e) {
		var target = $(e.currentTarget);
		var editColorModal = jQuery('.UserColors .editColorContainer');
		var clonedContainer = editColorModal.clone(true, true);
		var colorPreview = $('#calendarColorPreviewGroup' + target.data('record'));
		var callBackFunction = function (data) {
			data.find('.editColorContainer').removeClass('hide').show();
			var selectedColor = data.find('.selectedColor');
			selectedColor.val(colorPreview.data('color'));
			//register color picker
			var params = {
				flat: true,
				color: colorPreview.data('color'),
				onChange: function (hsb, hex, rgb) {
					selectedColor.val('#' + hex);
					colorPreview.data('color', '#' + hex);
				}
			};
			if (typeof customParams != 'undefined') {
				params = jQuery.extend(params, customParams);
			}
			data.find('.calendarColorPicker').ColorPicker(params);
			//save the user calendar with color
			data.find('[name="saveButton"]').click(function (e) {
				var progress = $.progressIndicator({
					'message': app.vtranslate('JS_LOADING_PLEASE_WAIT'),
					'blockInfo': {
						'enabled': true
					}
				});
				AppConnector.request({
					'module': 'Colors',
					'parent': 'Settings',
					'action': 'SaveAjax',
					'mode': 'updateGroupColor',
					'color': selectedColor.val(),
					'record': target.data('record')
				}).then(
						function (data) {
							Vtiger_Helper_Js.showPnotify({
								text: data['result']['message'],
								animation: 'show',
								type: 'success'
							});
							return data['result'];
						}
				);
				colorPreview.css('background', selectedColor.val());
				target.data('color', selectedColor.val());
				progress.progressIndicator({'mode': 'hide'});
				app.hideModalWindow();
			});
		};
		app.showModalWindow(clonedContainer, function (data) {
			if (typeof callBackFunction == 'function') {
				callBackFunction(data);
			}
		}, {'width': '1000px'});
	},
	generateGroupColor: function (e) {
		var target = $(e.currentTarget);
		var colorPreview = $('#calendarColorPreviewGroup' + target.data('record'));
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'updateGroupColor',
			record: target.data('record')
		}).then(
				function (data) {
					colorPreview.css('background', data['result'].color);
					colorPreview.data('color', data['result'].color);
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
				}
		);
	},
	removeGroupColor: function (e) {
		var target = $(e.currentTarget);
		var colorPreview = $('#calendarColorPreviewGroup' + target.data('record'));
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'removeGroupColor',
			record: target.data('record')
		}).then(
				function (data) {
					colorPreview.css('background', '');
					colorPreview.data('color', '');
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
				}
		);
	},
	updateModuleColor: function (e) {
		var target = $(e.currentTarget);
		var editColorModal = jQuery('.UserColors .editColorContainer');
		var clonedContainer = editColorModal.clone(true, true);
		var colorPreview = $('#calendarColorPreviewModule' + target.data('record'));
		var callBackFunction = function (data) {
			data.find('.editColorContainer').removeClass('hide').show();
			var selectedColor = data.find('.selectedColor');
			selectedColor.val(colorPreview.data('color'));
			//register color picker
			var params = {
				flat: true,
				color: colorPreview.data('color'),
				onChange: function (hsb, hex, rgb) {
					selectedColor.val('#' + hex);
					colorPreview.data('color', '#' + hex);
				}
			};
			if (typeof customParams != 'undefined') {
				params = jQuery.extend(params, customParams);
			}
			data.find('.calendarColorPicker').ColorPicker(params);
			//save the user calendar with color
			data.find('[name="saveButton"]').click(function (e) {
				var progress = $.progressIndicator({
					'message': app.vtranslate('JS_LOADING_PLEASE_WAIT'),
					'blockInfo': {
						'enabled': true
					}
				});
				AppConnector.request({
					'module': 'Colors',
					'parent': 'Settings',
					'action': 'SaveAjax',
					'mode': 'updateModuleColor',
					'color': selectedColor.val(),
					'record': target.data('record')
				}).then(
						function (data) {
							Vtiger_Helper_Js.showPnotify({
								text: data['result']['message'],
								animation: 'show',
								type: 'success'
							});
							return data['result'];
						}
				);
				colorPreview.css('background', selectedColor.val());
				target.data('color', selectedColor.val());
				progress.progressIndicator({'mode': 'hide'});
				app.hideModalWindow();
			});
		};
		app.showModalWindow(clonedContainer, function (data) {
			if (typeof callBackFunction == 'function') {
				callBackFunction(data);
			}
		}, {'width': '1000px'});
	},
	generateModuleColor: function (e) {
		var target = $(e.currentTarget);
		var colorPreview = $('#calendarColorPreviewModule' + target.data('record'));
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'updateModuleColor',
			record: target.data('record')
		}).then(
				function (data) {
					colorPreview.css('background', data['result'].color);
					colorPreview.data('color', data['result'].color);
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
				}
		);
	},
	removeModuleColor: function (e) {
		var target = $(e.currentTarget);
		var colorPreview = $('#calendarColorPreviewModule' + target.data('record'));
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'removeModuleColor',
			record: target.data('record')
		}).then(
				function (data) {
					colorPreview.css('background', '');
					colorPreview.data('color', '');
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
				}
		);
	},
	activeModuleColor: function (e) {
		var target = $(e.currentTarget);
		var colorPreview = $('#calendarColorPreviewModule' + target.data('record'));
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'activeModuleColor',
			status: target.is(':checked'),
			color: colorPreview.data('color'),
			record: target.data('record')
		}).then(
				function (data) {
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
					colorPreview.css('background', data['result'].color);
					colorPreview.data('color', data['result'].color);
				}
		);
	},
	addPicklistColorColumn: function (e) {
		var container = jQuery('.picklistViewContentDiv');
		var target = $(e.currentTarget);
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'addPicklistColorColumn',
			picklistModule: target.data('fieldmodule'),
			fieldId: target.data('fieldid')
		}).then(
				function (data) {
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
					container.find('.modulePickList').trigger('change');
				}
		);
	},
	updatePicklistValueColor: function (e) {
		var container = jQuery('.picklistViewContentDiv');
		var target = $(e.currentTarget);
		var editColorModal = jQuery('.UserColors .editColorContainer');
		var clonedContainer = editColorModal.clone(true, true);
		var colorPreview = container.find('#calendarColorPreviewPicklistValue' + target.data('fieldvalueid'));
		var callBackFunction = function (data) {
			data.find('.editColorContainer').removeClass('hide').show();
			var selectedColor = data.find('.selectedColor');
			selectedColor.val(colorPreview.data('color'));
			//register color picker
			var params = {
				flat: true,
				color: colorPreview.data('color'),
				onChange: function (hsb, hex, rgb) {
					selectedColor.val('#' + hex);
					colorPreview.data('color', '#' + hex);
				}
			};
			if (typeof customParams != 'undefined') {
				params = jQuery.extend(params, customParams);
			}
			data.find('.calendarColorPicker').ColorPicker(params);
			//save the user calendar with color
			data.find('[name="saveButton"]').click(function (e) {
				var progress = $.progressIndicator({
					'message': app.vtranslate('JS_LOADING_PLEASE_WAIT'),
					'blockInfo': {
						'enabled': true
					}
				});

				AppConnector.request({
					module: 'Colors',
					parent: 'Settings',
					action: 'SaveAjax',
					mode: 'updatePicklistValueColor',
					color: selectedColor.val(),
					fieldId: target.data('fieldid'),
					fieldValueId: target.data('fieldvalueid')
				}).then(
						function (data) {
							Vtiger_Helper_Js.showPnotify({
								text: data['result']['message'],
								animation: 'show',
								type: 'success'
							});
							return data['result'];
						}
				);
				colorPreview.css('background', selectedColor.val());
				target.data('color', selectedColor.val());
				progress.progressIndicator({'mode': 'hide'});
				app.hideModalWindow();
			});
		};
		app.showModalWindow(clonedContainer, function (data) {
			if (typeof callBackFunction == 'function') {
				callBackFunction(data);
			}
		}, {'width': '1000px'});
	},
	generatePicklistValueColor: function (e) {
		var container = jQuery('.picklistViewContentDiv');
		var target = $(e.currentTarget);
		var colorPreview = container.find('#calendarColorPreviewPicklistValue' + target.data('fieldvalueid'));
		var progress = $.progressIndicator({
			'message': app.vtranslate('JS_LOADING_PLEASE_WAIT'),
			'blockInfo': {
				'enabled': true
			}
		});
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'updatePicklistValueColor',
			fieldId: target.data('fieldid'),
			fieldValueId: target.data('fieldvalueid')
		}).then(
				function (data) {
					colorPreview.css('background', data['result'].color);
					colorPreview.data('color', data['result'].color);
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
				}
		);
		progress.progressIndicator({'mode': 'hide'});
		app.hideModalWindow();
	},
	removePicklistValueColor: function (e) {
		var container = jQuery('.picklistViewContentDiv');
		var target = $(e.currentTarget);
		var colorPreview = container.find('#calendarColorPreviewPicklistValue' + target.data('fieldvalueid'));
		var progress = $.progressIndicator({
			'message': app.vtranslate('JS_LOADING_PLEASE_WAIT'),
			'blockInfo': {
				'enabled': true
			}
		});
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'removePicklistValueColor',
			fieldId: target.data('fieldid'),
			fieldValueId: target.data('fieldvalueid')
		}).then(
				function (data) {
					colorPreview.css('background', '');
					colorPreview.data('color', '');
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
				}
		);
		progress.progressIndicator({'mode': 'hide'});
		app.hideModalWindow();
	},
	generateCalendarColor: function (e) {
		var target = $(e.currentTarget);
		var closestTrElement = target.closest('tr');
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'updateCalendarColor',
			id: closestTrElement.data('id'),
			table: closestTrElement.data('table'),
			field: closestTrElement.data('field')
		}).then(
				function (data) {
					Settings_Colors_Index_Js.showMessage({type: 'success', text: data.result.message});
					closestTrElement.find('.calendarColor').css('background', data.result.color);
					closestTrElement.data('color', data.result.color);
				}
		);
	},
	updateCalendarColor: function (e) {
		var target = $(e.currentTarget);
		var closestTrElement = target.closest('tr');
		var editColorModal = jQuery('.UserColors .editColorContainer');
		var clonedContainer = editColorModal.clone(true, true);

		var callBackFunction = function (data) {
			data.find('.editColorContainer').removeClass('hide').show();
			var selectedColor = data.find('.selectedColor');
			selectedColor.val(closestTrElement.data('color'));
			//register color picker
			var params = {
				flat: true,
				color: closestTrElement.data('color'),
				onChange: function (hsb, hex, rgb) {
					selectedColor.val('#' + hex);
				}
			};
			if (typeof customParams != 'undefined') {
				params = jQuery.extend(params, customParams);
			}
			data.find('.calendarColorPicker').ColorPicker(params);

			//save the user calendar with color
			data.find('[name="saveButton"]').click(function (e) {
				var progress = $.progressIndicator({
					'message': app.vtranslate('Update labels'),
					'blockInfo': {
						'enabled': true
					}
				});
				AppConnector.request({
					module: 'Colors',
					parent: 'Settings',
					action: 'SaveAjax',
					mode: 'updateCalendarColor',
					color: selectedColor.val(),
					id: closestTrElement.data('id'),
					table: closestTrElement.data('table'),
					field: closestTrElement.data('field')
				}).then(
						function (data) {
							Vtiger_Helper_Js.showPnotify({
								text: data['result']['message'],
								animation: 'show',
								type: 'success'
							});
							return data['result'];
						}
				);
				closestTrElement.find('.calendarColor').css('background', selectedColor.val());
				closestTrElement.data('color', selectedColor.val());
				progress.progressIndicator({'mode': 'hide'});
				app.hideModalWindow();
			});
		}
		app.showModalWindow(clonedContainer, function (data) {
			if (typeof callBackFunction == 'function') {
				callBackFunction(data);
			}
		}, {'width': '1000px'});
	},
	removeCalendarColor: function (e) {
		var container = jQuery('#calendarColors');
		var target = $(e.currentTarget);
		var colorPreview = container.find('#calendarColorPreviewCalendar' + target.data('record'));
		var progress = $.progressIndicator({
			'message': app.vtranslate('JS_LOADING_PLEASE_WAIT'),
			'blockInfo': {
				'enabled': true
			}
		});
		AppConnector.request({
			module: 'Colors',
			parent: 'Settings',
			action: 'SaveAjax',
			mode: 'removeCalendarColor',
			id: target.data('record')
		}).then(
				function (data) {
					colorPreview.css('background', '');
					colorPreview.data('color', '');
					Vtiger_Helper_Js.showPnotify({
						text: data['result']['message'],
						animation: 'show',
						type: 'success'
					});
				}
		);
		progress.progressIndicator({'mode': 'hide'});
		app.hideModalWindow();
	},
	registerModuleTabEvent: function () {
		var thisInstance = this;
		jQuery('#picklistsColorsTab').on('click', function (e) {
			var progressIndicatorElement = jQuery.progressIndicator({
				'position': 'html',
				'blockInfo': {
					'enabled': true
				}
			});
			AppConnector.request({
				module: 'Colors',
				parent: app.getParentModuleName(),
				view: 'IndexAjax',
				mode: 'getPickListView'
			}).then(function (data) {
				var container = jQuery('.picklistViewContentDiv');
				container.html(data);
				progressIndicatorElement.progressIndicator({'mode': 'hide'});
				app.changeSelectElementView(jQuery('.pickListModulesSelectContainer'));
				thisInstance.registerModuleChangeEvent();
				container.find('.modulePickList').trigger('change');
			});
		});
	},
	registerModuleChangeEvent: function () {
		var thisInstance = this;
		var container = jQuery('.picklistViewContentDiv');
		container.find('.pickListModules').on('change', function (e) {
			var selectedModule = jQuery(e.currentTarget).val();
			if (selectedModule.length <= 0) {
				Settings_Vtiger_Index_Js.showMessage({'type': 'error', 'text': app.vtranslate('JS_PLEASE_SELECT_MODULE')});
			}
			var progressIndicatorElement = jQuery.progressIndicator({
				'position': 'html',
				'blockInfo': {
					'enabled': true
				}
			});
			AppConnector.request({
				module: 'Colors',
				parent: app.getParentModuleName(),
				source_module: selectedModule,
				view: 'IndexAjax',
				mode: 'getPickListView'
			}).then(function (data) {
				container.html(data);
				progressIndicatorElement.progressIndicator({'mode': 'hide'});
				app.changeSelectElementView(jQuery('.pickListModulesSelectContainer'));
				app.changeSelectElementView(jQuery('.pickListModulesPicklistSelectContainer'));
				thisInstance.registerModuleChangeEvent();
				thisInstance.registerModulePickListChangeEvent();
				jQuery('#modulePickList').trigger('change');
			});
		});
	},
	registerModulePickListChangeEvent: function () {
		var thisInstance = this;
		var container = jQuery('.picklistViewContentDiv');
		container.find('.modulePickList').on('change', function (e) {
			var progressIndicatorElement = jQuery.progressIndicator({
				'position': 'html',
				'blockInfo': {
					'enabled': true
				}
			});
			AppConnector.request({
				module: 'Colors',
				parent: app.getParentModuleName(),
				source_module: jQuery('#pickListModules').val(),
				view: 'IndexAjax',
				mode: 'getPickListView',
				fieldId: jQuery(e.currentTarget).val()
			}).then(function (data) {
				container.html(data);
				app.changeSelectElementView(jQuery('.pickListModulesSelectContainer'));
				app.changeSelectElementView(jQuery('.pickListModulesPicklistSelectContainer'));
				thisInstance.registerModuleChangeEvent();
				thisInstance.registerModulePickListChangeEvent();
				$('.UserColors .addPicklistColorColumn').click(thisInstance.addPicklistColorColumn);
				$('.UserColors .updatePicklistValueColor').click(thisInstance.updatePicklistValueColor);
				$('.UserColors .generatePicklistValueColor').click(thisInstance.generatePicklistValueColor);
				$('.UserColors .removePicklistValueColor').click(thisInstance.removePicklistValueColor);
				progressIndicatorElement.progressIndicator({'mode': 'hide'});
			});
		});
	}

});
