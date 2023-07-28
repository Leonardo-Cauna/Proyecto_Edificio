<!DOCTYPE html>
	<html>
		<head>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<meta charset= "utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title class="center-text"> Admin </title>
		</head>
		<body>
			<form method="post">
				<div class="container mt-5 text-center">
					<h1 class = "card-header">Administradores</h1> 
					<div class="card mt-2">
						<input type = "submit" value = "Ingresar Nuevo Edificio" name= "edificio"></input><br>
						<input type = "submit" value = "Eliminar Edificio" name="Bedificio"></input><br>
						<input type = "submit" value = "Modificar Edificio" name="Medificio"></input><br>
						<input type = "submit" value = "Ingresar Nuevo Encargado" name="encargado"></input><br>
						<input type = "submit" value = "Eliminar Encargado" name="Bencargado"></input><br>
						<button type = "submit" name= "cerrar">Cerrar Sesion</button>
					</div>
				</div>
			</form>
		</body>
	</html>
	<?php
		include("db.php");
		include("IP.php");
		$query = "SELECT Nombre FROM usuarios WHERE IP = '$ip' and Online = '1'";
		$result = mysqli_query($conexion, $query);
		while ($row = $result->fetch_assoc()) 
		{
			$user = $row['Nombre'];
		}
		if(isset($_POST['edificio'])) 
	    {
	    	header("location:crearedificio.php");
	    }
	    if(isset($_POST['encargado'])) 
	    {
			header("location:crearencargado.php");
	    }
	    if(isset($_POST['Bencargado'])) 
	    {
			header("location:borrarencargados.php");
	    }
	    if(isset($_POST['Bedificio'])) 
	    {
			header("location:BorrarEdificios.php");
	    }
	    if(isset($_POST['Medificio'])) 
	    {
			header("location:ModificarEdificio.php");
	    }
	    if(isset($_POST['cerrar'])) 
    	{
			$usuario = $user;
			echo $usuario;
			$query = "UPDATE usuarios SET Online = '0' WHERE Nombre = '$usuario'";
			$result = mysqli_query($conexion, $query) or die(mysql_error());
			$query = "SELECT Online FROM usuarios WHERE Nombre = '$user'";
			$result = mysqli_query($conexion, $query) or die(mysql_error());
			while ($row = $result->fetch_assoc()) 
			{
				$user = $row['Online']."<br>";
			}
			header("location:Index.php");
    	}
	?>