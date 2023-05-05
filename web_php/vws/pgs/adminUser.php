<section>
    <h1 class="text-center my-5">Gestion de usrs</h1>
    <div class="text-center">
        <a href="<?=brl?>admin/registro" type="button" class="btn btn-primary  my-4">Crear un Usuario Administrador</a>
    </div>
    <?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'completed'): ?>
        <h3 class="alert alert-success">Registro completado correctamente</h5>
        <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
            <h3 class="alert alert-danger text-center">Registro fallido, Intentelo de nuevo.</h3>
            <small>Nota: Debe ingresar todos los campos ya que son requeridos. Si ingresó una cédula utilizada anteriormente, debe <a href="<?=brl?>usuario/login_form">Iniciar Sesión</a></small>
        <?php endif; ?>
        <?php Tlsx::dlssn('register');?>
    <table class="table table-hover w-75 mx-auto">
        <thead>
            <tr>
                <th scope="col">Nombre Usuario</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if($inm && $inm->num_rows > 0):
                while($inmb = $inm->fetch_object()):
                ?>
            <tr class="table-primary">
                <th scope="row"><?=$inmb->nombre?></th>
                <td><a href="<?=brl?>admin/upu&id=<?=$inmb->id_usuario?>" type="button" class="btn btn-warning">Editar</a>
                </td>
                <td><a href="<?=brl?>admin/dltus&id=<?=$inmb->id_usuario?>" type="button" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php   endwhile;
                endif;?>
        </tbody>
    </table>

</section>