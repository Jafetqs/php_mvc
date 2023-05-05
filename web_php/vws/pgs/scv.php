
<?php if($src): ?>
<div class="d-flex justify-content-start ml-5 flex-wrap">
    <?php while($d = $src->fetch_object()):?>
    <div class="card w-25 m-2">
        <img src="<?=brl.$d->img1?>" class="d-block user-select-none" width="100%" height="200">
        <div class="card-body">
            <h4><?=$d->nombre?></h4>
            <p class="card-text"><?=$d->provincia?>, <?=$d->direccion?> </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">₡ <?=$d->precio?></li>
            <li class="list-group-item">Cuartos: <?=$d->numero_cuartos?></li>
            <li class="list-group-item">Baños: <?=$d->numero_bannos?></li>
            <li class="list-group-item">Espacios en cochera: <?=$d->espacios_cochera?></li>
        </ul>
        <div class="card-body text-center">
            <a class="btn btn-primary" href="<?=brl?>propiedad/dtll&id=<?=$d->id_inmueble?>" class="card-link">Más información</a>
        </div>
    </div>
    <?php endwhile;?>
</div>
<?php else: ?>
    <h2>No hay resultados de tu busqueda</h2>
<?php endif;?>
