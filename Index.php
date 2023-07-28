<!DOCTYPE html>
<?php
	include("IP.php");
	include("db.php");
	$query = "SELECT * FROM usuarios WHERE IP = '$ip' and Online = '1'";
	$result = mysqli_query($conexion, $query);
	$filas= mysqli_num_rows($result);
	if (!$filas) 
	{
		$query = "SELECT * FROM inquilinos WHERE IP = '$ip' and Online = '1'";
		$result = mysqli_query($conexion, $query);
		$filas= mysqli_num_rows($result);
		if($filas)
		{
			header("location:BaseInquilino.php");
		}
		?>
			<head>
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<meta charset= "utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title> Iniciar Sesion </title>

			</head>
			<body>
				<div class="container mt-5 text-center"> 
					<div class="card mt-5">
						<h1 class = "card-header">Iniciar Sesion</h1>
						<form method="post">
							<div class="mt-2">
								<?php echo "Si eres inquilino ingresa tu edificio <br>"?>
								<input list="edificio" name="Edificio" id="Edificio" placeholder="Edificios">
	                                <datalist id="edificio">
	                                    <?php
	                                        include "db.php";
	                                        $query = "SELECT Nombre, Direccion FROM Edificio ORDER BY Nombre ASC";
	                                        $result = mysqli_query($conexion, $query);
	                                        $items = "2";
	                                        while ($row = $result->fetch_assoc()) 
	                                        {
	                                            $direccion ="'"; 
	                                            $direccion .= $row['Direccion'];
	                                            $direccion .="'"; 
	                                            $nombre= $row['Nombre'];
	                                            ?>
	                                                <?php echo "<option value=".$direccion.">".$nombre ?>
	                                        <?php
	                                        }
	                                        ?>
	                                </datalist>
                            </div>
							<div class="mt-2">
							<input type = "text" placeholder="Nombre de usuario" name = "user"> </input><br>
							</div>
							<div class="mt-2">
							<input type = "password" placeholder="contraseña" name = "pass"> </input><br>
							</div>
							<div class="mt-2 card-footer">
								<input type = "submit" value = "iniciar sesion" name= "login"></input><br>
							</div>
						</form>
					</div>
				</div>
			</body>
		</html>
		<?php
	}
	else
	{
		$query = "SELECT * FROM usuarios WHERE IP = '$ip' and Online = '1' and `Es Admin?` = '1'";
		$result = mysqli_query($conexion, $query);
		$filas = mysqli_num_rows($result);
		if($filas)
		{
			header("location:BaseAdmin.php");
		}
		else
		{
			header("location:BaseEncargado.php");
		}
	}
    if(isset($_POST['login'])) 
    {
     	$user = $_POST['user'];
		$pass = $_POST['pass'];
		$dire = $_POST['Edificio'];
		$_SESSION['register'] = $user;
		include("db.php");
		$query = "SELECT * FROM usuarios WHERE Nombre = '$user' and Contraseña = '$pass'";
		$result = mysqli_query($conexion, $query);
		$filas= mysqli_num_rows($result);
		mysqli_free_result($result);
		if($filas)
		{
			$query = "UPDATE `usuarios` SET `Online` = '1', `IP`='$ip' WHERE `Nombre` = '$user' and `Contraseña` = '$pass'";
			$result = mysqli_query($conexion, $query);
			?>
			<h1 class="bad">Has iniciado sesion correctamente</h1>
			<?php
			$query = "SELECT `Es Admin?` FROM usuarios WHERE IP = '$ip' and Online = '1' and `Es Admin?` = '1'";
			$result = mysqli_query($conexion, $query);
			$filas = mysqli_num_rows($result);
			if($filas)
			{
				header("location:BaseAdmin.php");
			}
			else
			{
				header("location:BaseEncargado.php");
			}
		}
		else
		{
			$query = "SELECT * FROM inquilinos WHERE Nombre = '$user' and Contraseña = '$pass' and Edificio = '$dire'";
			$result = mysqli_query($conexion, $query);
			$filas= mysqli_num_rows($result);
			mysqli_free_result($result);
			if($filas)
			{
				$query = "UPDATE `inquilinos` SET `Online` = '1', `IP`='$ip' WHERE `Nombre` = '$user' and `Contraseña` = '$pass' and Edificio = '$dire'";
				$result = mysqli_query($conexion, $query);
				header("location:BaseInquilino.php");
			}
			else
			{
				?>
				<h1 class="bad text-center">ERROR EN LA AUTENTIFICACION</h1>
				<?php
			}
		}
    }
?>