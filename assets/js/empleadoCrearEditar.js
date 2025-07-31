jQuery(document).ready(function() {
  	// Aqui empezamos a agregar empleado
  	$('#btnGuardarEmpleado').click(function() {
		vacios = validarFrmVacio('formNuevoEmpleado');
		if(vacios > 0){

			Swal.fire({
				icon: 'warning',
				title: 'Advertencia',
				text: 'Debes llenar los campos!'
				});

			return false;
		}

		var datos=$('#formNuevoEmpleado').serialize();

		$.ajax({
			url: '../../public/procesos/empleados/crearEmpleado.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(res){
				if (res.error) {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: res.mensaje
					});
				} else {
					Swal.fire({
						icon: 'success',
						title: 'Felicidades',
						text: res.mensaje,
						showConfirmButton: false,
						timer: 1500
					});
					setTimeout(() => {
						$('#tablaEmpleados').load('../componentes/tablaEmpleados.php');
						$('#formNuevoEmpleado')[0].reset();
						$('#modalNuevoEmpleado').modal('hide');
					},1500);
				}
			},
			error: function(xhr) {
				console.log(xhr,responseText);
				Swal.fire ({
					icon: 'error',
					title: 'Error',
					text: 'No se pudo conectar con el servidor'
				});
			}
		});
	});
  //------- ACTUALIZAR EMPLEADO -----------------------------------------------------
  $('#btnEditarEmpleado').click(function() {
		var datos = $('#formEditarEmpleado').serialize();

		$.ajax({
			url: '../../public/procesos/empleados/actualizarEmpleado.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success: function(res){
				if (res.error) {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: res.mensaje
					});
				} else {
					Swal.fire({
						icon: 'success',
						title: 'Felicidades',
						text: res.mensaje,
						showConfirmButton: false,
						timer: 1500
					}).then( ()=> {
						$('#tablaEmpleados').load('../componentes/tablaEmpleados.php');
						$('#modalEditarEmpleado').modal('hide');
					});
				}
			}
		})
	});
});
