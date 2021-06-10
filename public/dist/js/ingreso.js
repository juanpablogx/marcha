$(() => {

    $('#btnRecuperar').on('click', ()=>{
        console.log('le dio al boton');
        var correo = $('#correoReiniciar').val();
        if(correo == '') {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Debe ingresar un correo',
                showConfirmButton: false,
                timer: 2000
            });
        } else {
            $("#btnRecuperar").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

            $("#btnRecuperar").attr('disabled', true);
            $.ajax({
                type: "POST",
                url: "http://localhost/marcha/public/emailRecuperar",
                data: {'correo': correo},
                dataType: "json",
                success: function (response) {
                    if(response.estado) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.mensaje,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: response.mensaje,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                    
                    $("#btnRecuperar").html('Enviar');
                    $("#btnRecuperar").attr('disabled', false);
                },
                error: function (x, r, e) {
                    console.log(x);
                    console.log(r);
                    console.log(e);
                }
            });
        }
    });

  // window.open(url); // Para abrir otro archivo

});