<section class="container my-5 mx-auto bg-light col-12 col-lg-6">
    <form action="<?=brl?>propiedad/rll&id=<?= $pro->id_inmueble?>"class="" method="POST" enctype="multipart/form-data">
        <legend class="text-center my-2 text-bold">Editar inmueble</legend>
        <fieldset> 


            <div class="form-group">
                <label for="nombre" class="form-label mt-4">Nombre del Inmueble</label>
                <input type="text" name="inmueble" class="form-control" placeholder="" value="<?= $pro->nombre?>"/>
            </div>
            <div class="form-group">
                <label for="provincia" class="form-label mt-4">provincia</label>
                <select name="provincia" id="" class="form-select">
                    <option value="<?= $pro->provincia?>">Actual: <?= $pro->provincia?></option>
                    <hr>
                    <option value="San José">San José</option>
                    <option value="Alajuela">Alajuela</option>
                    <option value="Cartago">Cartago</option>
                    <option value="Heredia">Heredia</option>
                    <option value="Guanacaste">Guanacaste</option>
                    <option value="Puntarenas">Puntarenas</option>
                    <option value="Limón">Limón</option>
                </select>
            </div>
            <div class="form-group">
                <label for="direccion" class="form-label mt-4">Dirección</label>
                <input type="text" name="direccion" class="form-control" placeholder="" value="<?=$pro->direccion?>" />
            </div>
            <div class="form-group">
                <label for="precio" class="form-label mt-4"><b class="text-danger">*</b>Precio</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" name="precio" class="form-control" aria-label="dolares" value="<?=$pro->precio?>">
                </div>
            </div>
            <div class="form-group">
                <label for="cuartos" class="form-label mt-4">Cantidad de Cuartos</label>
                <input type="number" class="form-control" name="cuartos" placeholder="" value="<?=$pro->numero_cuartos?>">
            </div>

            <div class="form-group">
                <label for="bannos" class="form-label mt-4">Cantidad de Baños</label>
                <input type="number" class="form-control" name="bannos" value="<?=$pro->numero_bannos?>">
            </div>
            <div class="form-group">
                <label for="cochera" class="form-label mt-4">Espacios en cochera</label>
                <input type="number" class="form-control" name="cochera" value="<?=$pro->espacios_cochera?>">
            </div>
            <div class="form-group">
                <label for="estado" class="form-label mt-4">Estado</label>
                <select name="estado" id="" class="form-select">
                    <option value="<?=$pro->estado?>">Actual: <?=$pro->estado?></option>
                    <option value="En Venta">En Venta</option>
                    <option value="Vendida">Vendida</option>
                    <option value="Alquiler">Alquiler</option>
                    <option value="Alquilada">Alquilada </option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto" class="form-label mt-4">Actualizar la imagen principal:</label><br>
                <img src="<?=brl.$pro->img1?>"class="w-50" alt="">
                <input class="form-control" type="file" name="img1u" accept=".jpg, .jpeg, .png">
            </div>
            <div class="form-group">
                <label for="foto" class="form-label mt-4"> Actualizar la segunda imagen (opcional):</label><br>
                <img src="<?=brl.$pro->img2?>" class="w-50" alt="">
                <input class="form-control" type="file" name="img2u"  accept=".jpg, .jpeg, .png">
            </div>
            <div class="form-group">
                <label for="foto" class="form-label mt-4"> Actualizar la tercera imagen (opcional):</label><br>
                <img src="<?=brl.$pro->img3?>" class="w-50" alt="">
                <input class="form-control" type="file" name="img3u"  accept=".jpg, .jpeg, .png">
            </div>
            <div class="w-100 text-center">
                <input type="submit" class="w-75 btn btn-lg btn-outline-primary my-4" id="btn_publicar"
                    value="Publicar">
            </div>
        </fieldset>
    </form>
</section>