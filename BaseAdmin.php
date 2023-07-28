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
						<button name="boton" value="1">Ingresar Nuevo Edificio</button><br>
						<button name="boton" value="2">Eliminar Edificio</button><br>
						<button name="boton" value="3">Modificar Edificio</button><br>
						<button name="boton" value="4">Ingresar Nuevo Encargado</button><br>
						<button name="boton" value="5">Eliminar Encargado</button><br>
						<button name="boton" value="6">Cerrar Sesion</button>
					</div>
				</div>
			</form>
		</body>
	</html>
	<?php
		
		if(isset($_POST['boton']))
		{
			switch($_POST['boton'])
			{
				default:
					print($_POST['boton']);
					break;
				case 1:
					header("location:crearedificio.php");
					break;
				case 2:
					header("location:BorrarEdificios.php");
					break;
				case 3:
					header("location:ModificarEdificio.php");
					break;
				case 4:
					header("location:crearencargado.php");
					break;
				case 5:
					header("location:borrarencargados.php");
					break;
				case 6:
					include("db.php");
					include("IP.php");
					$query = "SELECT Nombre FROM usuarios WHERE IP = '$ip' and Online = '1'";
					$result = mysqli_query($conexion, $query);
					while ($row = $result->fetch_assoc()) 
					{
						$user = $row['Nombre'];
					}
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
					break;
			}
		}
		
			

		// if(isset($_POST['edificio'])) 
	    // {
	    	
	    // }
	    // if(isset($_POST['encargado'])) 
	    // {
		// 	header("location:crearencargado.php");
	    // }
	    // if(isset($_POST['Bencargado'])) 
	    // {
		// 	header("location:borrarencargados.php");
	    // }
	    // if(isset($_POST['Bedificio'])) 
	    // {
		// 	header("location:BorrarEdificios.php");
	    // }
	    // if(isset($_POST['Medificio'])) 
	    // {
		// 	header("location:ModificarEdificio.php");
	    // }
	    // if(isset($_POST['cerrar'])) 
    	// {
		// 	$usuario = $user;
		// 	echo $usuario;
		// 	$query = "UPDATE usuarios SET Online = '0' WHERE Nombre = '$usuario'";
		// 	$result = mysqli_query($conexion, $query) or die(mysql_error());
		// 	$query = "SELECT Online FROM usuarios WHERE Nombre = '$user'";
		// 	$result = mysqli_query($conexion, $query) or die(mysql_error());
		// 	while ($row = $result->fetch_assoc()) 
		// 	{
		// 		$user = $row['Online']."<br>";
		// 	}
		// 	header("location:Index.php");
    	// }
	?>