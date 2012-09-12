define(['Boiler', './mainMenu/component', './language/component', './theme/component', './landingPage/component'], function(Boiler, MainMenuComponent, LanguageComponent, ThemeComponent, LandingPageComponent) {

	var Module = function(globalContext) {
		var context = new Boiler.Context(globalContext);

		//scoped DomController that will be effective only on $('#page-content')
		var controller = new Boiler.DomController($('body'));
		//add routes with DOM node selector queries and relavant components
		controller.addRoutes({
			".main-menu" : new MainMenuComponent(context),
			".language" : new LanguageComponent(context),
			".theme" : new ThemeComponent(context)
		});
		controller.start();

		//the landing page should respond to the root URL, so let's use an URLController too
		var controller = new Boiler.UrlController($(".appcontent"));
		controller.addRoutes({
			"/" : new LandingPageComponent()
		});
		controller.start();
	};

	return Module;

});