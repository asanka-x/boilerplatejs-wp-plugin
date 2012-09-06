define(['Boiler', './settings', './departments/component', './clickCounter/component'], function(Boiler, settings, DepartmentComponent, ClickCounterComponent) {

	var Module = function(globalContext) {

		var context = new Boiler.Context(globalContext);
		context.addSettings(settings);

		var controller = new Boiler.DomController($('body'));
		//add routes with DOM node selector queries and relavant components
		controller.addRoutes({
			".departments" : new DepartmentComponent(context),
			".clickcounter" : new ClickCounterComponent(context)
		});
		controller.start();
		
		var controller = new Boiler.UrlController($(".appcontent"));
		controller.addRoutes( {
			'departments/:name:' : new DepartmentComponent(context),
			'clickcounter' : new ClickCounterComponent(context)
		});
		controller.start();

	};

	return Module;

});
