<section class="container my-5 mx-auto bg-light col-12 col-lg-6">
    <form action="<?=brl?>admin/guardar" method="POST" enctype="multipart/form-data">
        <legend class="text-center my-2 text-bold">Registro de usrs </legend>
      
        <fieldset>

            <div class="form-group">
                <label for="cedula" class="form-label mt-4">Cédula</label>
                <input type="text" name="cedula" class="form-control" placeholder="Ej: 1 1234 5678"
                    data-inputmask="'mask': '9  9999  9999'" />
            </div>
            <div class="form-group">
                <label for="nombre" class="form-label mt-4">Nombre Completo</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre y apellidos" />
            </div>
            <div class="form-group">
                <label for="mail" class="form-label mt-4">Correo eléctronico</label>
                <input type="email" class="form-control" name="mail" placeholder="Ej: user@example.com">
            </div>
            <div class="form-group">
                <label for="tel" class="form-label mt-4">Télefono Casa o Trabajo</label>
                <input type="text" name="tel" class="form-control" placeholder="Ej: 2222 - 3333"
                    data-inputmask="'mask': '9999 - 9999'" />
            </div>
            </div>

            <div class="form-group">
                <label for="telc" class="form-label mt-4">Télefono Celular</label>
                <input type="text" name="telc" class="form-control" placeholder="Ej: 8888 - 8888"
                    data-inputmask="'mask': '9999 - 9999'" />
            </div>
            </div>
            <div class="form-group">
                <label for="contrasenia" class="form-label mt-4">Contraseña</label>
                <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña">
            </div>

            <div class="form-group">
                <label for="nacimiento" class="form-label mt-4">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="nacimiento">
            </div>
            <div class="form-group">
                <label for="fotoup" class="form-label mt-4">Foto de Perfil</label><br>
                <input class="form-control" type="file" name="foto" accept=".jpg, .jpeg, .png">
            </div>
            <div class="w-100 text-center">
                <input type="submit" class="w-75 btn btn-lg btn-outline-primary my-4" id="btn_registrar"
                    value="Registrar" disabled>
            </div>
        </fieldset>
    </form>
</section>