define(['Boiler', 'text!./view.html', './viewmodel'], function(Boiler, template, ViewModel) {

	var Component = function(moduleContext) {
		//Boiler.ViewTemplate.setStyleText("{CSS_IDENTIFIER}", styleText);

		var panel, vm = null, DICTIONARY_KEY = "accessToken", self = this;

		this.activate = function(parent, params) {

			var storedAccessToken = moduleContext.retreiveObject(DICTIONARY_KEY);
			//if (storedAccessToken) {
			if (!panel) {
				panel = new Boiler.ViewTemplate(parent, template, null);
				vm = new ViewModel(moduleContext, storedAccessToken);
				ko.applyBindings(vm, panel.getDomElement());
			}

			panel.show();
			//}

		}

		this.deactivate = function() {
			if (panel) {
				panel.hide();
			}
		}
	};

	return Component;

});
