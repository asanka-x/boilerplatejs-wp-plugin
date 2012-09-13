 function rambaseLogin(username, password) {
	if (!validateData()) return;
	debugger;
	var parameters = 	'client_id' + '=' + 'DUiraFF1mE6BCnMiHmVL0A2' + '&' +
						'client_secret' + '=' + 'RjyA7TYan0O00JQSAQ_A8A2' + '&' +
						'username' + '=' + $('#username').val() + '&' +
						'password' + '=' + $('#password').val() + '&' +
						'grant_type' + '=' + 'password';
	$.ajax({
		url: "https://api.rambase.net/oauth2/access_token",
		dataType: "json",
		contentType: "application/x-www-form-urlencoded",
		type: "post",
		host: "api.rambase.net",
		data: parameters,
		success: function (message) {
			//debugger;
			if (message != null) {
				hideLoginForm();
				loginSuccessMessage();
				
				if (message.access_token!='')
					navigateToHomePage(message.access_token);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			//debugger;
			if (textStatus=="error")
				loginFailureMessage(errorThrown);
		},
	});
}

function keyPressEvent(e) {
	debugger;
    if (e.keyCode == 13) {
        rambaseLogin();
        return false;
    }
}

function validateData(username, password)
{
	var username = $('#username').val();
	var password = $('#password').val();
	
	if ((username=='') || (password=='')){
		showValidateMessage();
		return false;
	}
	return true;
}

function showValidateMessage(){
	$('#message').show(0);
	$('#message').html("Username & password should not empty");
	$('#message').css('color','#FF0000');
}

function showLoginForm(){
	$('#login').show('normal');
}

function hideLoginForm(){
	$('#login').hide('normal');
}

function loginSuccessMessage(){
	$('#message').show(0);
	$('#message').html("Login successful!");
	$('#message').css('color','#44AA44');
}

function loginFailureMessage(error) {
	$('#message').show(0);
	$('#message').html("Login failed: " + error);
	$('#message').css('color','#FF0000');
}
function navigateToHomePage(accesstoken){
	var pubsub = new PubSub();
	window.location.href = "login.html";
	amplify.store("accessToken",accesstoken);
}