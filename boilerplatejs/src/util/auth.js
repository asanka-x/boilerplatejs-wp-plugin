
define([], function () {


    var Auth = function () {

    };

    Auth.prototype.authenticate = function () {
        jso_configure({
            "rambase": {
                client_id: "hIfXjFjLHECbX5POZojc5Q2",
                redirect_uri: "http://localhost:2250/aouthcallback",
                authorization: "http://api.rambase.net/oauth2",
                presenttoken: "qs"
            }
        });

        jso_ensureTokens({
            "rambase": false
        });

        var accessToken = jso_getToken("rambase");
        console.log(accessToken);

    };
    return Auth;


});
