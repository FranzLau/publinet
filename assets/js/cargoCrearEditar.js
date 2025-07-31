jQuery(document).ready(function() {
    $('#btnAddCargo').click(function() {
      vacios = validarFrmVacio('formNewCargo');
      if(vacios > 0){
        Swal.fire({
                  icon: 'warning',
                  title: 'Advertencia',
                  text: 'Debes llenar los campos!'
        })
        return false;
      }
      const datos=$('#formNewCargo').serialize();
      $.ajax({
        url: '../../public/procesos/cargo/crearCargo.php',
        type: 'POST',
        dataType: 'json',
        data: datos
      })
      .done(function(r) {
        if (r==0) {
          Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'el cargo ya existe!'
                  })
        }else if(!r.error){
          $('#tabCargo').load('../componentes/tablaCargo.php');
          $('#formNewCargo')[0].reset();
          $('#modalCrearCargo').modal('hide');
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
    $('#btnEdCargo').click(function() {
          var datos=$('#formEdCargo').serialize();
          $.ajax({
              url: '../../public/procesos/cargo/actualizarCargo.php',
              type: 'POST',
              dataType: 'json',
              data: datos,
              success:function(){
  
              }
          })
          .done(function(r) {
              if (!r.error) {
                $('#tabCargo').load('../componentes/tablaCargo.php');
                  $('#modalEdCargo').modal('hide');
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
  