jQuery(document).ready(function() {
	
	// BOTON AGREGAR NUEVO USUARIO
	$('#btnSaveUser').click(function(e) {
		e.preventDefault();

		const pass1 = $('#pass-user').val();
		const pass2 = $('#pass2-user').val();

		// Validacion basica del lado del cliente
		if (pass1 !== pass2) {
			
			Swal.fire({
				icon: 'warning',
				title: 'Advertencia',
				text: 'Las contraseñas no coinciden'
			});
      		return;
		}

		if (pass1.length < 6) {
			
			Swal.fire({
				icon: 'warning',
				title: 'Advertencia',
				text: 'La contraseña debe tener al menos 6 caracteres'
			});
      		return;
		}

		const datos=$('#formNewUser').serialize();

		$.ajax({
			url: '../../public/procesos/usuario/crearUsuario.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success: function(res){
				if (res.error) {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: res.mensaje
					})
				} else {
					Swal.fire({
						icon: 'success',
						title: 'Felicidades',
						text: res.mensaje,
						showConfirmButton: false,
						timer: 1500
					});

					setTimeout(() => {
						$('#tablaUsuarios').load('../componentes/tablaUsuarios.php');
						$('#formNewUser')[0].reset();
						$('#modalNuevoUser').modal('hide');
					},1500);
				}
			},
			error: function (xhr, status, error){
				console.error("AJAX Error:", error);
				console.log("Respuesta del servidor:", xhr.responseText);
				Swal.fire('Error', 'No se pudo conectar con el servidor', 'error');
			}
		});
	});

	// BOTON PARA EDITAR EL USUARIO
	$('#btnEditUser').click(function() {
		var datos=$('#formEditUser').serialize();
		$.ajax({
			url: '../../public/procesos/usuario/actualizarUsuario.php',
			type: 'POST',
			dataType: 'json', //jQuery convierte JSON automaticmente
			data: datos,
			success: function(res) {

				if (res.error) {
					Swal.fire({
						icon: 'error',
        				title: 'Error',
        				text: res.mensaje
					})
				} else {
					Swal.fire({
						icon: 'success',
						title: 'Felicidades',
						text: res.mensaje,
						showConfirmButton: false,
						timer: 1500
					}).then( ()=> {
						$('#tablaUsuarios').load('../componentes/tablaUsuarios.php');
						$('#modalEditUser').modal('hide');
					});
				}
 			}
		})
  	});
});
