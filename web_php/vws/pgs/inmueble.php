<?php if(isset($dt)):?>
    <div class="d-flex justify-content-center flex-wrap m-3">
    <?php if (isset($dt->img1) && $dt->img1 != null && in_array(pathinfo($dt->img1, PATHINFO_EXTENSION), array('jpg', 'png','webp'))): ?>
    <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top object-fit-cover" style="height: 200px; cursor: pointer;" src="<?= brl . $dt->img1 ?>"
            alt="..." data-bs-toggle="modal" data-bs-target="#modal1">
    </div>
    <?php endif; ?>

    <?php if (isset($dt->img2) && $dt->img2 != null && in_array(pathinfo($dt->img2, PATHINFO_EXTENSION), array('jpg', 'png','webp'))): ?>
    <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top object-fit-cover" style="height: 200px; cursor: pointer;" src="<?= brl . $dt->img2 ?>"
            alt="..." data-bs-toggle="modal" data-bs-target="#modal2">
    </div>
    <?php endif; ?>

    <?php if (isset($dt->img3) && $dt->img3 != null && in_array(pathinfo($dt->img3, PATHINFO_EXTENSION), array('jpg', 'png','webp'))): ?>
    <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top object-fit-cover" style="height: 200px; cursor: pointer;" src="<?= brl . $dt->img3 ?>"
            alt="..." data-bs-toggle="modal" data-bs-target="#modal3">
    </div>
    <?php endif; ?>

</div>

<!-- Modal 1 -->
<div class="modal fade modal-lg" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="<?= brl . $dt->img1 ?>" alt="..." class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade modal-lg" id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img src="<?= brl . $dt->img2 ?>" alt="..." class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Modal 3 -->
<div class="modal fade modal-lg" id="modal3" tabindex="-1" aria-labelledby="modal3Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img src="<?= brl . $dt->img3 ?>" alt="..." class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->



<div>
    <h2 class="text-center text-primary"><?=$dt->nombre?></h2>
    <div class="d-flex justify-content-center">
        <div class="card_info m-3">
            <div class="card-body">
                <h5 class="card-title">Información de la casa</h5>
                <ul class="list-unstyled">
                    <li>Precio: ₡ <?=$dt->precio?></li>
                    <li>Cuartos: <?=$dt->numero_cuartos?></li>
                    <li>Baños: <?=$dt->numero_bannos?></li>
                    <li>Espacios en cochera: <?=$dt->espacios_cochera?></li>
                    <li class="badge rounded-pill bg-info"><?=$dt->estado?></li>
                </ul>
            </div>
        </div>
        <div class="card_info m-3">
            <div class="card-body">
                <h5 class="card-title">Información del vendedor</h5>
                <p class="card-text">Vendedor: <?=$dt->vendedor?></p>
                <p class="card-text">Correo: <?=$dt->correo?></p>
                <p class="card-text">Télefono: <?=$dt->telefono?></p>
                <p class="card-text">WhatsApp: <?=$dt->celular?></p>
            </div>
        </div>
    </div>

</div>
<?php endif;?>