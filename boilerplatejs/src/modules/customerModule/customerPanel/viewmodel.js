define([], function() {

	var ViewModel = function(moduleContext, accessToken) {
		var self = this;
		this.customers = ko.observableArray();
		if (accessToken) {
			var serverUrl = moduleContext.getSettings().urls.customers + "&$access_token=" + accessToken;

			var jsonCall = $.getJSON(serverUrl, function(result) {
				console.log(result.customers);
				self.customers(result.customers);
			})
			// If session is already expired, getJSON() throws an error and user will be redirected to login page.
			.error(function() {
				window.location = "http://localhost/trunk/login.html";
			})
		}

	};

	return ViewModel;
});
