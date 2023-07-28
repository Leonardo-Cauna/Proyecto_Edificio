<?php
if (isset($_GET["page"])) 
{ 
    $page=$_GET["page"]; 
} 
else 
{ 
    $page=1; 
}
$start_from = ($page-1);
include("db.php");
$query = "SELECT * FROM Edificio WHERE `ID` = $page";
$result = mysqli_query($conexion, $query);
while ($row = $result->fetch_assoc()) 
{
            $ID = $row['ID'];
            $nombre = $row['Nombre'];
            $direccion = $row['Direccion'];
            $encargado = $row['Gerente'];
echo "<title>  ".$nombre."</title>";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
            <div class="container mt-1"> 
                <div class="card">
                    <form method = "POST">
                            <input type = "submit" value = "Volver atras" name= "edificios"></input><br>
                    <div class="card-header">
                            <h5 class="text-center">Confirme el edificio a borrar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row my-2">
                            <table border="1" cellpadding="4">
                            <tr>
                                <td bgcolor="#CCCCCC"><strong>ID</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Nombre</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Direccion</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Encargado</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Eliminar</strong></td>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </body>
<?php
?>
            <tr>
            <td><?php echo $ID?></td>
            <td><?php echo $nombre?></td>
            <td><?php echo $direccion?></td>
            <td><?php echo $encargado?></td>
                <td> <input type = "submit" value = "Eliminar Usuario" name="Eliminar"></input> </td>
            </form>
            </tr>
<?php
 }
?>
</table>
<?php
    $query = "SELECT `ID` FROM Edificio";
    $result = mysqli_query($conexion, $query);
    echo "<div class='text-center'><div class = 'card-footer'>"; 
    $aux = 0;
    while ($row = $result->fetch_assoc()) 
    {
        $aux++;
        $ID = $row["ID"];
        echo "<a href='borraredificio.php?page=".$ID."'";
        echo ">".$aux."</a> ";
    }
    echo "</div></div>";
    if(isset($_POST['Eliminar']))
    {
        $query = "DELETE FROM Edificio WHERE `ID` = '$page'";
        $result = mysqli_query($conexion, $query);
        $query = "DELETE FROM Aperturas WHERE `Edificio` = '$page'";
        $result = mysqli_query($conexion, $query);
        $query = "DELETE FROM Inquilinos WHERE `Edificio` = '$direccion'";
        $result = mysqli_query($conexion, $query);
        header('location:borraredificios.php');
    }

    if (isset($_POST['edificios']))
    {
        header('location:borraredificios.php');
    }
?>