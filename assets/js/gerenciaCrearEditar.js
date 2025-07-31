jQuery(document).ready(function() {
    $('#btnAddGerencia').click(function() {
        vacios = validarFrmVacio('formNewGerencia');
        if(vacios > 0){
  
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'Debes llenar los campos!'
            })
            return false;
        }
        var datos=$('#formNewGerencia').serialize();
        $.ajax({
            url: '../../public/procesos/gerencia/crearGerencia.php',
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
                $('#tabGerencia').load('../componentes/tablaGerencia.php');
                $('#formNewGerencia')[0].reset();
                $('#modalCrearGerencia').modal('hide');
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
  
    //---------------------------UPDATE GERENCIA---------------
    $('#btnEdGerenc').click(function() {
          var datos=$('#formEdGerenc').serialize();
          $.ajax({
              url: '../../public/procesos/gerencia/actualizarGerencia.php',
              type: 'POST',
              dataType: 'json',
              data: datos,
              success:function(){
  
              }
          })
          .done(function(r) {
                if (!r.error) {
                    $('#tabGerencia').load('../componentes/tablaGerencia.php');
                    $('#modalEdGerenc').modal('hide');
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