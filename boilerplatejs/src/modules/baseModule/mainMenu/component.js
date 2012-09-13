define(['require', 'Boiler', 'text!./view.html', 'i18n!./nls/resources', 'path!./style.css'], function(require, Boiler, template, nls, cssPath) {

	var Component = function(moduleContext) {
		var panel = null, DICTIONARY_KEY = "accessToken";
		var storedAccessToken = moduleContext.retreiveObject(DICTIONARY_KEY);
		
		return {
			activate : function(parent) {
				panel = new Boiler.ViewTemplate(parent, template, nls);
				Boiler.ViewTemplate.setStyleLink(cssPath);
			},

			deactivate : function() {
				if (panel) {
					panel.remove();
				}
			}
		};
		
		moduleContext.notify("ViewCustomerPanel", {
		"sender" : "MainMenu"
	});
	};

	
	return Component;

});
