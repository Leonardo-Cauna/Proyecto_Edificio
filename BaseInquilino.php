<!DOCTYPE html>
	<html>
		<head>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<meta charset= "utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title class="center-text"> Inquilinos </title>
		</head>
		<body>
			<form method="post">
				<div class="container mt-5 text-center">
					<h1 class = "card-header">Inquilinos</h1> 
					<div class="card mt-2">
						<input type = "submit" value = "Abrir Puerta" name= "puerta"></input><br>
						<input type = "submit" value = "Ver registros" name="registros"></input><br>
						<button type = "submit" name= "cerrar">Cerrar Sesion</button>
					</div>
				</div>
			</form>
		</body>
	</html>
	<?php
		include("db.php");
		include("IP.php");
		$query = "SELECT Nombre FROM inquilinos WHERE IP = '$ip' and Online = '1'";
		$result = mysqli_query($conexion, $query);
		while ($row = $result->fetch_assoc()) 
		{
			$user = $row['Nombre'];
		}

		$query = "SELECT Edificio FROM inquilinos WHERE Nombre = '$user'";
		$result = mysqli_query($conexion, $query);
		while ($row = $result->fetch_assoc()) 
		{
			$dire = $row['Edificio'];
		}

		$query = "SELECT ID FROM Edificio WHERE Direccion = '$dire'";
		$result = mysqli_query($conexion, $query);
		while ($row = $result->fetch_assoc()) 
		{
			$ID = $row['ID'];
		}

		if(isset($_POST['puerta'])) 
	    {
	    	$query = "INSERT INTO aperturas (`Nombre Inquilino`,Edificio)VALUES('$user','$ID')"; 
            $result = mysqli_query($conexion, $query);
	    }
	    if(isset($_POST['registros'])) 
	    {
			header("location:registrosInquilino.php");
	    }
	    if(isset($_POST['cerrar'])) 
    	{
			$usuario = $user;
			echo $usuario;
			$query = "UPDATE inquilinos SET Online = '0' WHERE Nombre = '$usuario'";
			$result = mysqli_query($conexion, $query) or die(mysql_error());
			$query = "SELECT Online FROM inquilinos WHERE Nombre = '$user'";
			$result = mysqli_query($conexion, $query) or die(mysql_error());
			while ($row = $result->fetch_assoc()) 
			{
				$user = $row['Online']."<br>";
			}
			header("location:Index.php");
    	}
	?>