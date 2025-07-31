jQuery(document).ready(function() {
  	$('#btnGuardarProducto').click(function(e) {
		
		e.preventDefault();

		vacios = validarFrmVacio('formRegProducto');
		if(vacios > 0){

			Swal.fire({
				icon: 'warning',
				title: 'Advertencia',
				text: 'Debes llenar los campos!'
			  })

		  	return false;
		}

		
		const datos=$('#formRegProducto').serialize();
		
		$.ajax({
			url: '../../public/procesos/producto/crearProducto.php',
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
						title: 'Se registró con éxito',
						text: res.mensaje,
						showConfirmButton: false,
						timer: 1500
					});
					setTimeout(() => {
						$('#tablaProductos').load('../componentes/tablaProductos.php');
						$('#formRegProducto')[0].reset();
						$('#modalAgregarProducto').modal('hide');
					}, 1500);
				}
			},
			error: function(xhr){
				console.log(xhr,responseText);
				Swal.fire({
					icon:'error',
					title: 'Error',
					text: 'No se pudo conectar con el servidor'
				});
			}
		});
	});
  //---------------------------UPDATE PRODUCTO---------------
  	$('#btnEditarProducto').click(function() {
		
		var datos=$('#formEditarProducto').serialize();
		
		$.ajax({
			url: '../../public/procesos/producto/actualizarProducto.php',
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
					}).then( ()=> {
						$('#tablaProductos').load('../componentes/tablaProductos.php');
			  			$('#modalEditarProducto').modal('hide');
					});
				}
			}
		})
	});

});
