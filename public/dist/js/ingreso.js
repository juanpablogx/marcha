$(() => {

    $('#btnRecuperar').off('click').on('click', ()=>{
        console.log('le dio al boton');
        var correo = $('#correoReiniciar').val();
        if(correo == '') {
            alert('Debe ingresar un correo');
        } else {

            $.ajax({
                type: "POST",
                url: 'http://localhost/marcha/public/emailRecuperar',
                data: {"correo": correo},
                success: function (response) {
                    console.log(response);
                    var res = JSON.parse(response);
                    alert(res.mensaje);
                }
            });
        }
    });

  // window.open(url); // Para abrir otro archivo

});