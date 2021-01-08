<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="Librerias/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Librerias/jquery-ui-1.12.1/jquery-ui.css">
	<script src="Librerias/sweetalert.min.js"></script>
	
	
</head>
<body>
<div class="container">
	<h1 align="center">Registro de usuario</h1>
	<hr>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
				<form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
					<label>Nombre personal</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required="">
					<label>Fecha de naciemiento</label>
					<input type="text" name="fechadeNacimiento" id="fechadeNacimiento" class="form-control" required="" readonly="">
					<label>Email(correo)</label>
					<input type="email" name="email" id="email" class="form-control" required="">
					<label>Nombre de usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control" required="">
					<label>Contraseña</label>
					<input type="password" name="password" id="password" class="form-control" required="">
					<br>
					<div class="row">
						<div class="col-sm-6 text-left">
						<button class="btn btn-primary">Registrar</button>	
						</div>

						<div class="col-sm-6 text-right">
						<a href="Index.php" class="btn btn-success">Ingresar</a>
						 
						</div>
					</div>
				</form>
				</div>
		<div class="col-sm-4"></div>
    </div>
</div>
<script src="Librerias/jquery-3.5.1.min.js"></script>
<script src="Librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
		
		$(function(){
			var fechaA= new Date();
			var yyyy=fechaA.getFullYear();

			$('#fechadeNacimiento').datepicker({

				changeMonth: true,
				changeYear: true,
				yearRange: '1900:' + yyyy,
				dateFormat:"dd-mm-yy"
			});	
		});

	function agregarUsuarioNuevo(){
		$.ajax({
			method:"POST",
			data:$('#frmRegistro').serialize(),
			url:"Procesos/usuarios/registro/agregarUsuario.php",
			success:function(respuesta){
				console.log(respuesta);
				respuesta = respuesta.trim();
				if(respuesta ==1){
					$('#frmRegistro')[0].reset();
					swal(":D","agregado con exito","sucess");
				}else if(respuesta == 2){

					swal("Este usuario ya ha sido ingresado, ingrese otro usuario");
				} 
				else{

					swal(":(","Fallo al agregar","Error");
				
				}

			}
	
		});
		return false;
	}
	</script>
</body>
</html>