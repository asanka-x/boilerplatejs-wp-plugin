define(['Boiler', './settings', './customerPanel/component'], function(Boiler, settings, CustomerComponent) {

	var Module = function(globalContext) {

		var context = new Boiler.Context(globalContext);

		context.addSettings(settings);

		var controller = new Boiler.DomController($('body'));
		controller.addRoutes({
			'.customers' : new CustomerComponent(context)
		});
		controller.start();

		var urlController = new Boiler.UrlController($(".appcontent"));
		urlController.addRoutes({
			'customers' : new CustomerComponent(context)
		});
		urlController.start();

	};

	return Module;

});
