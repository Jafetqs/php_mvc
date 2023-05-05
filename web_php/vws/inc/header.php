
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VINMUBLES.COM</title>
    <link rel="stylesheet" href="<?=brl?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=brl?>assets/css/style.css">
    <link rel="icon" type="image/png" href="<?=brl?>assets/img/favicon.ico"/>
    <link type="text/css" href="assets/css/fontawesome.rtl.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ba302772e8.js" crossorigin="anonymous"></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
	<!-- Incluye el archivo JavaScript de Mapbox -->
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
</head>

<body>
    <header>
        <!-- nav -->
        <section>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand btn btn-outline-info" href="<?=brl?>">VINMUBLES.COM</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?=brl?>">Inicio
                                    <span class="visually-hidden">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=brl?>propiedad/index">Propiedades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=brl?>content/contact">Contáctenos</a>
                            </li>
                            <?php if(isset($_SESSION['identity'])):?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=brl?>propiedad/gestionUser">Mis Propiedades</a>
                            </li>
                            <?php endif;?>
                            <?php if(isset($_SESSION['admin'])):?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Administrar</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?=brl?>admin/gestionAdminUs">Usuarios</a>
                                    <a class="dropdown-item" href="<?=brl?>admin/gestionAdmin">Propiedades</a>
                                </div>
                            </li>
                            <?php endif;?>
                        </ul>
                        <form class="d-flex" action="<?=brl?>propiedad/vsc" method="POST">
                            <input class="form-control me-sm-2" type="search" name="bs" placeholder="Buscar">
        
                            <button type="button" class="btn btn-outline-dark m-2 my-sm-0">Buscar</button>
                        </form>
                        <?php if(!isset($_SESSION['identity'])):?>
                        <div>
                            <a href="<?=brl?>usuario/login_form" class="btn btn-dark my-2 " type="submit">Ingresar</a>
                        </div>
                        <?php else:?>
                        <div>
                            <a href="<?=brl?>usuario/logout" class="btn btn-dark my-2 " type="submit">Cerrar
                                Sesión</a>
                        </div>
                        <?php endif;?>
                    </div>
            </nav>
            <!-- <hr><hr><hr><hr><hr> -->
        </section>
    </header>
