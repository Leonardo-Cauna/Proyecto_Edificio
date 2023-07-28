<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Nuevo edificio</title>
    </head>
    <body class="">
            <div class="container mt-5"> 
                <div class="card">
                    <form method = "POST">
                            <input type = "submit" value = "Volver atras" name= "base"></input><br>
                        <div class="card-header">
                            <h1 class="text-center">Ingrese los datos del nuevo edificio</h1>
                        </div>
                        <div class="card-body">
                            <form method = "post">
                                <div class="row my-2">
                                    <div class="col-md-6">
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"></input>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion"></input>
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="col-md-6">
                                        <input list="gerentes" name="gerente" id="gerente" placeholder="Gerentes">
                                            <datalist id="gerentes">
                                                <?php
                                                    include "db.php";
                                                    $query = "SELECT Nombre FROM Usuarios ORDER BY `Nombre` ASC";
                                                    $result = mysqli_query($conexion, $query);
                                                    $items = "";
                                                    while ($row = $result->fetch_assoc()) 
                                                    {
                                                        $nombre ="'"; 
                                                        $nombre .= $row['Nombre'];
                                                        $nombre .="'"; 
                                                        ?>
                                                        <?php echo "<option value=".$nombre.">" ?>
                                                        <?php
                                                    }
                                                ?>
                                            </datalist>
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
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $list = $_POST['gerente'];
        $query = "SELECT * FROM edificio WHERE Direccion = '$direccion'";
        $result = mysqli_query($conexion, $query);
        $filas= mysqli_num_rows($result);
        if (empty($error))
            {
                if(!$filas)
                {
                    $query = "SELECT * FROM usuarios WHERE nombre = '$list' and `Es Admin?` = 0";
                    $result = mysqli_query($conexion, $query);
                    $filas= mysqli_num_rows($result);

                    if($filas)
                    {
                        $query = "INSERT INTO edificio (Nombre,Direccion,Gerente)VALUES('$nombre','$direccion','$list')"; 
                        $result = mysqli_query($conexion, $query);
                        mysqli_close($conexion);
                    }
                }
            }
        header('location:borraredificios.php');
    }
    if (isset($_POST['base']))
    {
        header('location:baseadmin.php');
    }
?>
