<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Contacto</title>
	<!-- CSS de Bootstrap -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Formulario de Contacto</h1>
		<form method="POST" action="<?=brl?>content/correo">
			<div class="mb-3">
				<label for="nombre" class="form-label">Nombre:</label>
				<input type="text" class="form-control" id="nombre" name="nombre" required>
			</div>

			<div class="mb-3">
				<label for="correo" class="form-label">Correo:</label>
				<input type="email" class="form-control" id="correo" name="correo" required>
			</div>

			<div class="mb-3">
				<label for="mensaje" class="form-label">Mensaje:</label>
				<textarea class="form-control" id="mensaje" name="contenido" rows="5" required></textarea>
			</div>

			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>
	
	<!-- JavaScript de Bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
