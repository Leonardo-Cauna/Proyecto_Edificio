<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Nuevo inquilino</title>
    </head>
    <body class="">
            <div class="container mt-5"> 
                <div class="card">
                    <form method = "POST">
                            <input type = "submit" value = "Volver atras" name= "base"></input><br>
                        <div class="card-header">
                            <h1 class="text-center">Seleccione los parametros del nuevo inquilino</h1>
                        </div>
                        <div class="card-body">
                            <form method = "post">
                                <div class="row my-2">
                                    <div class="col-md-6">
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"></input>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="departamento" id="departamento" class="form-control" placeholder="Departamento"></input>
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <input type = "password" class="form-control" placeholder="contraseña" name = "pass"> </input>
                                    </div>
                                </div>
                        </div>

                        <div class="card-footer text-center">
                            <input type="submit" name="save" id="save" value="Confirmar"></input>
                            </form>
                        </div>
                </div>
            </div>
    </body>
</html>
<?php
    if(isset($_POST['save']))
    {
        include "db.php";
        $nombre = $_POST['nombre'];
        $departamento = $_POST['departamento'];
        $edificio = $_POST['Edificio'];
        $contraseña = $_POST['pass'];
        $query = "SELECT * FROM Inquilinos WHERE Nombre = '$nombre' AND Edificio = '$edificio'";
        $result = mysqli_query($conexion, $query);
        $filas= mysqli_num_rows($result);
        if (empty($error))
            {
                if(!$filas)
                {
                    $query = "SELECT * FROM Edificio WHERE direccion = '$edificio'";
                    $result = mysqli_query($conexion, $query);
                    $filas= mysqli_num_rows($result);

                    if($filas)
                    {
                    $query = "INSERT INTO Inquilinos (Nombre,Departamento,Contraseña,Edificio) VALUES ('$nombre','$departamento','$contraseña','$edificio')"; 
                    $result = mysqli_query($conexion, $query);
                    mysqli_close($conexion);
                    }
                }
            }
        header('location:borrarinquilinos.php');
    }
    if (isset($_POST['base']))
    {
        header('location:baseencargado.php');
    }
?>
