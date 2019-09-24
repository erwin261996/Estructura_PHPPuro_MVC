
$("#AlertSession").css({
					display: 'none'
				});

$("#submitLogin").on('click',function(e) {
	e.preventDefault();
	/* Act on the event */

	let usuario = $("#formUsuario").val();
	let pass = $("#formPass").val();

	$.post('home/login', {'formUsuario': usuario, 'formPass':pass}, function(datos) {
		/*optional stuff to do after success */
		if(datos.verificado == 1) {
			window.location=url+'main';
		} else {
			setTimeout(function(){
				$("#AlertSession").fadeIn(1500);
				$("#AlertSession").html('ERROR: Usuario o Contraseña incorrectos')
			}, 200);
			setTimeout(function() {
		        $("#AlertSession").fadeOut(1500);
		    },6000);
		}
	}, 'json');
});