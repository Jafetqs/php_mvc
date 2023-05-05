<?php
$db = Db::connect();

// Configuración de la paginación
$records_per_page = 10; // cantidad de registros por página
$page_range = 3; // cantidad de páginas a mostrar en la barra de navegación

// Consulta para obtener el número total de registros
$sl = "SELECT COUNT(*) as count FROM props WHERE estado != 'Alquilada' AND estado != 'Vendida'";
$req = $db->query($sl);
$row = $req->fetch_object();
$total_records = $row->count;

// Cálculo de la cantidad total de páginas
$total_pg = ceil($total_records / $records_per_page);

// Obtener la página actual
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

// Asegurarnos de que la página actual no sea menor que 1 ni mayor que la cantidad total de páginas
if ($current_page < 1) {
    $current_page = 1;
} elseif ($current_page > $total_pg) {
    $current_page = $total_pg;
}

// Cálculo de la posición inicial de los registros
$offset = ($current_page - 1) * $records_per_page;

// Consulta para obtener los registros de la página actual
$query = "SELECT * FROM props WHERE estado != 'Alquilada' AND estado != 'Vendida' LIMIT $records_per_page OFFSET $offset";
$in = $db->query($query);

?>

<div class="d-flex justify-content-start ml-5 flex-wrap">
    <?php while($inmb = $in->fetch_object()):?>
    <div class="card w-25 m-2">
        <img src="<?=brl.$inmb->img1?>" class="d-block user-select-none" width="100%" height="200">
        <div class="card-body">
            <h4><?=$inmb->nombre?></h4>
            <p class="card-text"><?=$inmb->provincia?>, <?=$inmb->direccion?> </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">$ <?=$inmb->precio?></li>
            <li class="list-group-item">Cuartos: <?=$inmb->numero_cuartos?></li>
            <li class="list-group-item">Baños: <?=$inmb->numero_bannos?></li>
            <li class="list-group-item">Espacios en cochera: <?=$inmb->espacios_cochera?></li>
        </ul>
        <div class="card-body text-center">
            <a class="btn btn-primary" href="<?=brl?>propiedad/dtll&id=<?=$inmb->id_inmueble?>" class="card-link">Más
                información</a>
        </div>
    </div>
    <?php endwhile;?>
</div>

<nav aria-label="Barra de navegación de paginación">
    <ul class="pagination justify-content-center mt-3">

        <?php if ($current_page > 1): ?>
        <li class="page-item">
            <a class="page-link" href="<?=brl?>propiedad/index&page=<?php echo $current_page - 1 ?>" aria-label="Anterior">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Anterior</ </a>
        </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pg; $i++) : ?>
        <?php if ($i == $current_page) : ?>
        <li class="page-item active">
            <a class="page-link" href="<?=brl?>propiedad/index&page=<?php echo $i ?>">
                <?php echo $i ?>
                <span class="sr-only">(current)</span>
            </a>
        </li>
        <?php else : ?>
        <li class="page-item">
            <a class="page-link" href="<?=brl?>propiedad/index&page=<?php echo $i ?>">
                <?php echo $i ?>
            </a>
        </li>
        <?php endif; ?>
        <?php endfor; ?>

        <?php if ($current_page < $total_pg): ?>
        <li class="page-item">
            <a class="page-link" href="<?=brl?>propiedad/index&page=<?php echo $current_page + 1 ?>" aria-label="Siguiente">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Siguiente</span>
            </a>
        </li>
        <?php endif; ?>

    </ul>
</nav>