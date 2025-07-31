jQuery(document).ready(function() {
  $('#btnCrearSede').click(function() {
    vacios = validarFrmVacio('formNuevaSede');
    if(vacios > 0){

      Swal.fire({
				icon: 'warning',
				title: 'Advertencia',
				text: 'Debes llenar los campos!'
			  })

			return false;
    }
    var datos=$('#formNuevaSede').serialize();
    $.ajax({
      url: '../../public/procesos/sedes/crearSede.php',
      type: 'POST',
      dataType: 'json',
      data: datos,
      success:function(){

      }
    })
    .done(function(r) {
      if (r==0) {
        Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'La sede ya existe!'
				})
      }else if(!r.error){
        $('#tablaSede').load('../componentes/tablaSede.php');
        $('#formNuevaSede')[0].reset();
        $('#modalCrearSede').modal('hide');
        Swal.fire({
					icon: 'success',
					title: 'Se registro con éxito',
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
    return false;
  });

  //---------------------------UPDATE SEDE---------------
  $('#btnEditarSede').click(function() {
		var datos=$('#formEditarSede').serialize();
		$.ajax({
			url: '../../public/procesos/sedes/actualizarSede.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){

			}
		})
		.done(function(r) {
			if (!r.error) {
			  $('#tablaSede').load('../componentes/tablaSede.php');
				$('#modalEditarSede').modal('hide');
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
