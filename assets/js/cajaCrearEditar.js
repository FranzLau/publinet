jQuery(document).ready(function() {
    $('#btnAperturarCaja').click(function(e) {

		e.preventDefault();

        const form = document.getElementById('formAperturarCaja');
        const datos = new FormData(form);

		$.ajax({
			url: '../../public/procesos/caja/aperturarCaja.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
            contentType: false,
            processData: false,
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
						$('#tabla-Caja').load('../componentes/tablaCaja.php');
						$('#formAperturarCaja')[0].reset();
						$('#modalAperturarCaja').modal('hide');
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
});