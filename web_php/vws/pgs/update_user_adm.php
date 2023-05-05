<section class="container my-5 mx-auto bg-lightcol-12 col-lg-6">
    <form action="<?=brl?>admin/upd&id=<?= $usr->id_usuario?>" method="POST" enctype="multipart/form-data">
        <legend class="text-center my-2 text-bold">Actualizar de Datos Personales</legend>
        <fieldset>

            <div class="form-group">
                <label for="nombre" class="form-label mt-4">Nombre Completo</label>
                <input type="text" name="nombre" class="form-control" value="<?= $usr->nombre?>" />
            </div>
            <div class="form-group">
                <label for="tel" class="form-label mt-4">Télefono Casa o Trabajo</label>
                <input type="text" name="tel" class="form-control" value="<?= $usr->telefono?>"
                    data-inputmask="'mask': '9999 - 9999'" />
            </div>
            </div>

            <div class="form-group">
                <label for="telc" class="form-label mt-4">Télefono Celular</label>
                <input type="text" name="telc" class="form-control" value="<?= $usr->celular?>"
                    data-inputmask="'mask': '9999 - 9999'" />
            </div>
            </div>
            <div class="form-group">
                <label for="nacimiento" class="form-label mt-4">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="nacimiento" value="<?= $usr->nacimiento?>">
            </div>
            <div class="form-group">
                <label for="fotoup" class="form-label mt-4">Actualizar la imagen principal:</label><br>
                <img src="<?=brl. $usr->foto?>" class="img_user my-2" alt="">
                <input class="form-control" type="file" name="fotoup" accept=".jpg, .jpeg, .png">
            </div>
            <div class="w-100 text-center">
                <input type="submit" class="w-75 btn btn-lg btn-outline-primary my-4" id="update"
                    value="Actualizar" >
            </div>
        </fieldset>
    </form>
</section>