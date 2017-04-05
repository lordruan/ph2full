var fn_get_parameter = function (name) {
    url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
},
fn_add_alerta = function (message, type) {
	    $('#alertas').append(
	        '<div class="alert alert-'+type+'">' +
	            '<button type="button" class="close" data-dismiss="alert">' +
	            '&times;</button>' + message + '</div>');
	};