<section class="container my-5 mx-auto bg-light col-12 col-lg-6">
    <form action="<?=brl?>propiedad/guardar" method="POST" enctype="multipart/form-data">
        <legend class="text-center my-2 text-bold">Publicar inmueble</legend>
        <fieldset>


            <div class="form-group">
                <label for="nombre" class="form-label mt-4"><b class="text-danger">*</b> Nombre del Inmueble</label>
                <input type="text" name="inmueble" class="form-control" placeholder="" />
            </div>
            <div class="form-group">
                <label for="provincia" class="form-label mt-4"><b class="text-danger">*</b> provincia</label>
                <select name="provincia" class="form-select">
                    <option value="">Provincia</option>
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
                <label for="direccion" class="form-label mt-4"><b class="text-danger">*</b> Dirección</label>
                <input type="text" name="direccion" class="form-control" placeholder="" />
            </div>
            <div class="form-group">
                <label for="precio" class="form-label mt-4"><b class="text-danger">*</b>Precio</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" name="precio" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
            </div>
            <div class="form-group">
                <label for="cuartos" class="form-label mt-4"><b class="text-danger">*</b> Cantidad de Cuartos</label>
                <input type="number" class="form-control" name="cuartos" placeholder="">
            </div>

            <div class="form-group">
                <label for="bannos" class="form-label mt-4"><b class="text-danger">*</b>Cantidad de Baños</label>
                <input type="number" class="form-control" name="bannos">
            </div>
            <div class="form-group">
                <label for="cochera" class="form-label mt-4"><b class="text-danger">*</b> Espacios en cochera</label>
                <input type="number" class="form-control" name="cochera">
            </div>
            <div class="form-group">
                <label for="estado" class="form-label mt-4"><b class="text-danger">*</b> Estado</label>
                <select name="estado" class="form-select">
                    <option value="">Estado</option>
                    <option value="En Venta">En Venta</option>
                    <option value="Vendida">Vendida</option>
                    <option value="Alquiler">Alquiler</option>
                    <option value="Alquilada">Alquilada </option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto" class="form-label mt-4"><b class="text-danger">*</b> Elija la imagen
                    principal:</label>
                <input class="form-control" type="file" name="img1" accept=".jpg, .jpeg, .png" maxlength="8388608">
            </div>
            <div class="form-group">
                <label for="foto" class="form-label mt-4"> Elija la segunda imagen (opcional):</label>
                <input class="form-control" type="file" name="img2" accept=".jpg, .jpeg, .png" maxlength="8388608">
            </div>
            <div class="form-group">
                <label for="foto" class="form-label mt-4"> Elija la tercera imagen (opcional):</label>
                <input class="form-control" type="file" name="img3" accept=".jpg, .jpeg, .png" maxlength="8388608">
            </div>
            <div class="w-100 text-center">
                <input type="submit" class="w-75 btn btn-lg btn-outline-primary my-4" id="btn_publicar" value="Publicar"
                    disabled>
            </div>
        </fieldset>
    </form>
</section>