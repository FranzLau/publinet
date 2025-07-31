jQuery(document).ready(function() {
    $('#btnAddArea').click(function() {
      vacios = validarFrmVacio('formNewArea');
      if(vacios > 0){
  
        Swal.fire({
                  icon: 'warning',
                  title: 'Advertencia',
                  text: 'Debes llenar los campos!'
                })
  
              return false;
      }
      var datos=$('#formNewArea').serialize();
      $.ajax({
        url: '../../public/procesos/area/crearArea.php',
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
          $('#tabArea').load('../componentes/tablaArea.php');
          $('#formNewArea')[0].reset();
          $('#modalCrearArea').modal('hide');
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
  
    //---------------------------UPDATE AREA---------------
    $('#btnEdArea').click(function() {
          var datos=$('#formEdArea').serialize();
          $.ajax({
              url: '../../public/procesos/area/actualizarArea.php',
              type: 'POST',
              dataType: 'json',
              data: datos,
              success:function(){
  
              }
          })
          .done(function(r) {
                if (!r.error) {
                    $('#tabArea').load('../componentes/tablaArea.php');
                    $('#modalEdArea').modal('hide');
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
  