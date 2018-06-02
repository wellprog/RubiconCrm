/* {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} */
var Settings_Password_Js = {
	loadAction: function() {
        jQuery("#big_letters,#small_letters,#numbers,#special").change(function() {
			Settings_Password_Js.saveConf(jQuery(this).attr('name'), jQuery(this).is(':checked'));
        });
        jQuery("#min_length,#max_length,#change_time,#lock_time").change(function() {
			Settings_Password_Js.saveConf(jQuery(this).attr('name'), jQuery(this).val());
        });
		jQuery('#min_length,#max_length,#change_time,#lock_time').keyup(function () {  
			this.value = this.value.replace(/[^0-9\.]/g,''); 
		});
	},
	saveConf: function( type , vale ) {
        var params = {
			'module' : app.getModuleName(),
			'parent' : app.getParentModuleName(),
			'action': "Save",
            'type': type,
            'vale': vale
        }
        AppConnector.request(params).then(
			function(data) {
				var response = data['result'];
				var params = {
					text: response,
					type: 'info',
					animation: 'show'
				};
				Vtiger_Helper_Js.showPnotify(params);
			},
			function(data, err) {

			}
        );
	},
	registerEvents : function() {
		Settings_Password_Js.loadAction();
	}
}
jQuery(document).ready(function(){
	Settings_Password_Js.registerEvents();
})
