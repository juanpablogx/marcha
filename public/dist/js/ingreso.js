$(() => {

    $('#btnRecuperar').on('click', ()=>{
        console.log('le dio al boton');
        var correo = $('#correoReiniciar').val();
        if(correo == '') {
            alert('Debe ingresar un correo');
        } else {
            $.ajax({
                type: "POST",
                url: "http://localhost/marcha/public/emailRecuperar",
                data: {'correo': correo},
                dataType: "json",
                success: function (response) {
                    alert(response.mensaje);
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