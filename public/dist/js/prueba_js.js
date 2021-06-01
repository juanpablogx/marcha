function cargarListaUsuarios(){
	$.ajax({
		url: 'http://localhost/marcha/public/getListaUsuarios',
		type: 'GET',
		dataType: 'json'
	})
	.done(function(data) {
		console.log("success");
		console.log(data);
	})
	.fail(function(data) {
		console.log("error");
		console.log(data);
	});
}