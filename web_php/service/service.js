$(document).ready(function () {
    // Función para validar si el correo ya está registrado
    function validarCorreo(correo) {
        return $.ajax({
            url: "usuario/validar",
            type: "POST",
            data: { correo: correo },
            dataType: "json",
        });
    }

    // Función para registrar el usuario
    function registrarUsuario() {
        $.ajax({
            url: "usuario/registro",
            type: "POST",
            data: $("#registro-form").serialize(),
            success: function (response) {
                // Maneja la respuesta del servidor
                if (response == "success") {
                    Swal.fire("Registro exitoso", "", "success");
                    $("#registro-form")[0].reset();
                } else {
                    Swal.fire("Error en el registro", "", "error");
                    
                }
            },
        });
    }

    // Validación y registro de usuario
    $("#registro-form").submit(function (e) {
        e.preventDefault(); // Evita que el formulario se envíe por defecto

        var correo = $('input[name="correo"]').val();
        var cedula = $('input[name="cedula"]').val();

        // Validar si el correo o la cédula ya existen en la base de datos
        $.when(validarCorreo(correo), validarCedula(cedula)).done(function (
            responseCorreo,
            responseCedula
        ) {
            if (responseCorreo[0].existe) {
                Swal.fire("El correo electrónico ya está registrado", "", "error");
            } else if (responseCedula[0].existe) {
                Swal.fire("La cédula ya está registrada", "", "error");
            } else {
                // Registrar el usuario si el correo y la cédula no existen
                registrarUsuario();
            }
        });
    });
});
