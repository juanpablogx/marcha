$(() => {
    $('#btnReiniciarPass').on('click', () => {
        var newpass = $('#pass').val();
        var cnewpass = $('#cpass').val();
        var token = $('#inputToken').val();

        if(!(newpass == cnewpass)) {
            alert('Las contraseñas no coinciden');
        } else {
            var datos = {"token": token, "contrasena": newpass};

            $.ajax({
                type: "POST",
                url: "php/reiniciar_contrasena.php",
                data: datos,
                success: function (response) {
                    var res = JSON.parse(response);
                    alert(res.mensaje);

                    if(res.estado == 'ok') {
                        window.open('index.php');
                    }
                }
            });
        }

        
    });
});