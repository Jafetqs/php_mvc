<section>
    <h1 class="text-center my-5">Gestion de Propiedades</h1>
    <div class="text-center">

        <a href="<?=brl?>admin/report" type="button" class="btn btn-primary  my-4">Generar un Reporte</a>
        <?php if(isset($_SESSION['pdf']) && $_SESSION['pdf'] == true): ?>
            <a href="<?=brl?>cts/pdfs/reporte_usuarios.pdf" type="button" class="btn btn-primary  my-4" download>Descargar</a>
        <?php endif; ?>
        <?php Tlsx::dlssn('pdf');?>
    </div>

    <table class="table table-hover w-75 mx-auto">
        <thead>
            <tr>
                <th scope="col">Nombre propiedad</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if($inm && $inm->num_rows > 0):
                while($inmb = $inm->fetch_object()):
                ?>
            <tr class="table-primary">
                <th scope="row"><?=$inmb->nombre?></th>
                <td><a href="<?=brl?>admin/edit&id=<?=$inmb->id_inmueble?>" type="button" class="btn btn-warning">Editar</a>
                </td>
                <td><a href="<?=brl?>admin/dlt&id=<?=$inmb->id_inmueble?>" type="button" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php   endwhile;
                endif;?>
        </tbody>
    </table>

</section>