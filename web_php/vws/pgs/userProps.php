<section>
    <h1 class="text-center my-5">Mis propiedades</h1>
    <div class="text-center">
        <a href="<?=brl?>propiedad/crear" type="button" class="btn btn-primary  my-4">Públicar
            una Propiedad</a>
    </div>

    <table class="table table-hover w-75 mx-auto">
        <thead>
            <tr>
                <th scope="col">Nombre propiedad</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if($props && $props->num_rows > 0):
                while($inmb = $props->fetch_object()):
                ?>
            <tr class="table-primary">
                <th scope="row"><?=$inmb->nombre?></th>
                <td><a href="<?=brl?>propiedad/edit&id=<?=$inmb->id_inmueble?>" type="button" class="btn btn-warning">Editar</a>
                </td>
                <td><a href="<?=brl?>propiedad/dlt&id=<?=$inmb->id_inmueble?>" type="button" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php   endwhile;
                endif;?>
        </tbody>
    </table>

</section>