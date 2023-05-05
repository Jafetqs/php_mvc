$(document).ready(function() {
    $('input').focusout(function() {
      var cedula = $('input[name="cedula"]').val();
      var nombre = $('input[name="nombre"]').val();
      var mail = $('input[name="mail"]').val();
      var tel = $('input[name="tel"]').val();
      var telc = $('input[name="telc"]').val();
      var contrasenia = $('input[name="contrasenia"]').val();
      var nacimiento = $('input[name="nacimiento"]').val();
      var foto = $('input[name="foto"]').val();
  
      if (cedula == '' || nombre == '' || mail == '' || tel == '' || telc == '' || contrasenia == '' || nacimiento == '' || foto == '') {
        $('#btn_registrar').prop('disabled', true);
      } else {
        $('#btn_registrar').prop('disabled', false);
      }
    });
  });
  



$(document).ready(function () {
  $('input[name="cedula"]').inputmask();
  $('input[name="telc"]').inputmask();
  $('input[name="tel"]').inputmask();
});


$(document).ready(function() {
  $('input').focusout(function() {
    var inmueble = $('input[name="inmueble"]').val();
    var provincia = $('select[name="provincia"]').val();
    var direccion = $('input[name="direccion"]').val();
    var precio = $('input[name="precio"]').val();
    var cuartos = $('input[name="cuartos"]').val();
    var bannos = $('input[name="bannos"]').val();
    var cochera = $('input[name="cochera"]').val();
    var estado = $('select[name="estado"]').val();
    var foto1 = $('input[name="img1"]').val();
    
    // Validar que los campos requeridos no estén vacíos
    if (inmueble == '' || provincia == '' || direccion == '' || precio == '' || cuartos == '' || bannos == '' || cochera == '' || estado == '' || foto1 == '' || cuartos <= 0 || bannos <= 0 || cochera < 0) {
      $('#btn_publicar').prop('disabled', true);
    } else {
      $('#btn_publicar').prop('disabled', false);
    }
    
  });
});

// $(document).ready(function(){
//   $('.modal').modal();
//   console.log('Se ha hecho clic en la imagen.');
// });
