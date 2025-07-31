jQuery(document).ready(function() {
	$('#btnCrearCategoria').click(function(e) {

		e.preventDefault();

		const datos = $('#formNuevaCategoria').serialize();

		$.ajax({
			url: '../../public/procesos/categorias/crearCategoria.php',
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
						$('#tablaCategoria').load('../componentes/tablaCategoria.php');
						$('#formNuevaCategoria')[0].reset();
						$('#modalCrearCategoria').modal('hide');
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
  	//---------------------------UPDATE CATEGORIA---------------
  	$('#btnEditarCategoria').click(function() {
		var datos=$('#formEditarCategoria').serialize();
		$.ajax({
			url: '../../public/procesos/categorias/actualizarCategoria.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){

			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tablaCategoria').load('../componentes/tablaCategoria.php');
				$('#modalEditarCategoria').modal('hide');
				Swal.fire({
					icon: 'success',
					title: 'Se actualizó con éxito',
					showConfirmButton: false,
					timer: 1500
				})
			}else{
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Hubo un error!'
				  })
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
  	});
});
