<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title></title>
</head>

<body>
    <section class="container my-5 mx-auto bg-light col-12 col-lg-6">
        <form action="<?=brl?>usuario/login" method="POST" >
            <legend class="text-center my-2 text-bold">Inicio de Sesión</legend>
            <?php if(isset($_SESSION['login']) && $_SESSION['login'] == "no"):?>
                <h3 class="alert alert-danger text-center">Error al Identificar, Intentalo de nuevo</h3>
            <?php endif?>
            <?php Tlsx::dlssn('login');?>
            <fieldset>
                <div class="form-group">
                    <label for="mail" class="form-label mt-4">Usuario (# cédula)</label>
                    <input type="text" name="cedula" class="form-control " placeholder="Ej: 1 1234 5678"
                    data-inputmask="'mask': '9  9999  9999'" />
                </div>
                <div class="form-group">
                    <label for="contrasenia" class="form-label mt-4">Contraseña</label>
                    <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña">
                </div>
                <div class="w-100 text-center">
                <input type="submit" class="w-75 btn btn-lg  btn-outline-info my-4" id="btn_registrar"
                    value="Ingresar" disabled>
            </div>

            <p class="text-center">¿Aún no tienes una cuenta? <a href="<?=brl?>usuario/registro">Crear una</a></p>
            
        </form>
    </section>
    <!-- Agregar la biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Agregar la biblioteca Inputmask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <script src="../../assets/js/general.js"></script>
</body>

</html>