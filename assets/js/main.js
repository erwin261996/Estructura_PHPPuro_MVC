$(function() {

	listaGestion();
	listaGestionCliente();

	$("#formtickets").submit(function (event){
        event.preventDefault();
        var formData = new FormData(document.getElementById("formtickets"));
        $.ajax({
            url:$("#formtickets").attr("action"),
            type:$("#formtickets").attr("method"),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
            	let xhrdatos = jQuery.parseJSON(data);
            	 $('#formtickets')[0].reset();
            	 $('#notickethtml').html('');
            	 $('#nombretickethtml').html('');
            	let output = '';
                $.each(xhrdatos, function(index, val) {
					 output += '<tr class="trtable" id="'+val['idgestion']+'" data_idgcliente="'+val['cod']+'" data_noTicket="'+val['id']+'" data_ticketNombre="'+val['nombre']+'" style="cursor: pointer">';
					 output += '<th scope="row">'+val['id']+'</th><td>'+val['nombre']+'</td>';
					 output += '</tr>';
				});

				$("#tbody-gestion").html(output);

				$(".trtable").on('click', function(e) {
					e.preventDefault();

					let id = e.currentTarget.id;
					let idgcliente = $(e.currentTarget).attr('data_idgcliente');
					let noticket = $(e.currentTarget).attr('data_noTicket');
					let ticketNombre = $(e.currentTarget).attr('data_ticketNombre');
					
					editarsolicitud(id, noticket, ticketNombre, idgcliente);

				});
            }
        });
    });
	

});

var listaGestion = function() {
	$.post('main/listaGestion', function(data) {

		let output = '';

		$("#cb_gestion").append('<option value="0">Seleccione ...</option>');
		$.each(data, function(index, val) {
			 output += '<button type="button" class="btn btn-primary mb-2 mr-2 clickbtn" id="'+val['id']+'">'+val['nombre']+'</button>';
			 $("#cb_gestion").append('<option value="' + val['id'] + '">' + val['nombre'] + '</option>');
		});

		$("#agrupacion-btn-list").html(output);

		$(".clickbtn").on('click', function(e) {
			e.preventDefault();
			noAtendido(e.currentTarget.id);
		});


	}, 'json');
}

var noAtendido = function(id) {
	let output = '';
	$.post('main/registrarGestion', {'codgestion': id}, function(data) {
		$.each(data, function(index, val) {
			 output += '<tr class="trtable" id="'+val['idgestion']+'" data_idgcliente="'+val['cod']+'" data_noTicket="'+val['id']+'" data_ticketNombre="'+val['nombre']+'" style="cursor: pointer">';
			 output += '<th scope="row">'+val['id']+'</th><td>'+val['nombre']+'</td>';
			 output += '</tr>';
		});

		$("#tbody-gestion").html(output);

		alert("Gestion agregada.");

		$(".trtable").on('click', function(e) {
			e.preventDefault();

			let id = e.currentTarget.id;
			let idgcliente = $(e.currentTarget).attr('data_idgcliente');
			let noticket = $(e.currentTarget).attr('data_noTicket');
			let ticketNombre = $(e.currentTarget).attr('data_ticketNombre');
			
			editarsolicitud(id, noticket, ticketNombre, idgcliente);


		});

	}, 'json');
}

var listaGestionCliente = function() {
	let output = '';
	$.post('main/listaGestionCliente', function(data) {
		$.each(data, function(index, val) {
			 output += '<tr class="trtable" id="'+val['idgestion']+'" data_idgcliente="'+val['cod']+'" data_noTicket="'+val['id']+'" data_ticketNombre="'+val['nombre']+'" style="cursor: pointer">';
			 output += '<th scope="row">'+val['id']+'</th><td>'+val['nombre']+'</td>';
			 output += '</tr>';
		});

		$("#tbody-gestion").html(output);

		$(".trtable").on('click', function(e) {
			e.preventDefault();

			let id = e.currentTarget.id;
			let idgcliente = $(e.currentTarget).attr('data_idgcliente');
			let noticket = $(e.currentTarget).attr('data_noTicket');
			let ticketNombre = $(e.currentTarget).attr('data_ticketNombre');
			
			editarsolicitud(id, noticket, ticketNombre, idgcliente);


		});


	}, 'json');
}

var editarsolicitud = function(id, noticket, nombre, idgcliente) {
	$("#notickethtml").html(noticket);
	$("#nombretickethtml").html(nombre);
	$("#cb_gestion").val(id);
	$("#codid").val(idgcliente);
}