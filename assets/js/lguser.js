jQuery(document).ready(function() {
    
    console.log("Pagina lista");
    
    $('#btnlg').click(function(e) {

        e.preventDefault(); // Previene que recargue la pagina si el boton esta dentro de un formulario
        
        const userform = $('#userlg').val().trim();
        const passform = $('#passlg').val().trim();

        if (userform === "" || passform === "") {
            Swal.fire ({
                icon: 'warning',
                title: 'Advertencia',
                text: 'Ingrese usuario y contraseña'
            });
            return;
        }

        $.ajax({
            url: 'login.php',
            type: 'POST',
            dataType: 'json',
            data: {
                userphp:userform,
                passphp:passform
            },
            success:function(respuesta){
                console.log("Respuesta de login", respuesta);

                if (!respuesta.error) {
                    //Redireccionamos si login es correcto + SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: `Bienvenido ${respuesta.usuario}!`,
                        text: 'Has iniciado sesión correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        // Redirigir al dashboard despues del mensaje
                        location.href = 'public/views/';
                    });
                } else {
                    Swal.fire ({
                        icon: 'error',
                        title: 'Error',
                        text: respuesta.mensaje || 'Datos incorrectos'
                    });
                }
            },
            error: function(xhr, status, error){
                console.error("AJAX error:", error);
                console.log("Respuesta del servidor:", xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error de servidor',
                    text: 'No se pudo conectar con el servidor.'
                });
            }
        });
    });
});
