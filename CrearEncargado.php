<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Nuevo encargado</title>
    </head>
    <body class="">
            <div class="container mt-5"> 
                <div class="card">
                    <form method = "POST">
                            <input type = "submit" value = "Volver atras" name= "base"></input><br>
                        <div class="card-header">
                            <h1 class="text-center">Seleccione los parametros del nuevo encargado</h1>
                        </div>
                        <div class="card-body">
                            <form method = "post">
                                <div class="row my-2">
                                    <div class="col-md-6">
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"></input>
                                    </div>
                                    <div class="col-md-6">
                                        <input type = "password" class="form-control" placeholder="contraseña" name = "pass" id="contraseña"> </input>
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
        $contraseña = $_POST['pass'];
        $query = "SELECT * FROM Usuarios WHERE Nombre = '$nombre'";
        $result = mysqli_query($conexion, $query);
        $filas= mysqli_num_rows($result);
        if (empty($error))
            {
                if(!$filas)
                {
                    $query = "INSERT INTO Usuarios (Nombre,Contraseña,`Es Admin?`)VALUES('$nombre','$contraseña','0')"; 
                    $result = mysqli_query($conexion, $query);
                    mysqli_close($conexion);
                }
            }
        header('location:borrarEncargados.php');
    }
    if (isset($_POST['base']))
    {
        header('location:baseadmin.php');
    }
?>
