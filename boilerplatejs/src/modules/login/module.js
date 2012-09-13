define(['Boiler', './settings', './loginPanel/component'], function(Boiler, settings, LoginPanel, SamplePanel2) {

	var Module = function(globalContext) {

		var context = new Boiler.Context("login", globalContext);
		context.addSettings(settings);

		var controller = new Boiler.DomController($("body"));
		controller.addRoutes( {
			'.login' : new LoginPanel(context)
		});
		controller.start();

	};

	return Module;

});
