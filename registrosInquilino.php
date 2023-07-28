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
include("IP.php");
$query = "SELECT Nombre FROM inquilinos WHERE IP = '$ip' and Online = '1'";
$result = mysqli_query($conexion, $query);
while ($row = $result->fetch_assoc()) 
{
    $user = $row['Nombre'];
}

$query = "SELECT Edificio FROM inquilinos WHERE IP = '$ip' and Online = '1'";
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

$query = "SELECT * FROM Aperturas WHERE `Nombre Inquilino` = '$user' AND Edificio = $ID ORDER BY ID DESC";
$result = mysqli_query($conexion, $query);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
            <div class="container mt-1"> 
                <div class="card">
                    <form method = "POST">
                            <input type = "submit" value = "Volver atras" name= "atras"></input><br>
                    <div class="card-header">
                            <h5 class="text-center">Aperturas en orden cronologico</h5>
                    </div>
                    <div class="card-body">
                        <div class="row my-2">
                            <table border="1" cellpadding="4">
                            <tr>
                                <td bgcolor="#CCCCCC"><strong>ID</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Hora</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Nombre de Inquilino</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Edificio</strong></td>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </body>
<?php
while ($row = $result->fetch_assoc()) 
{
            $ID = $row['ID'];
            $hora = $row['Hora'];
            $direccion = $row['Nombre Inquilino'];
            $edificio = $row['Edificio'];
?>
            <tr>
            <td><?php echo $ID?></td>
            <td><?php echo $hora?></td>
            <td><?php echo $direccion?></td>
            <td><?php echo $edificio?></td>
            </tr>
<?php
 }
?>
</table>
<?php
    if (isset($_POST['atras']))
    {
        header('location:BaseInquilino.php');
    }
?>
<!-- <?php
$query = "SELECT COUNT(ID) AS total FROM Aperturas";
$result = mysqli_query($conexion, $query);
while ($row = $result->fetch_assoc()) 
{
    $total_pages = $row["total"] / 15;
}
echo "<div class='text-center'>
        <div class = 'card-footer'>";
for ($i=1; $i<=$total_pages+1; $i++) {  
            // print links for all pages
            echo "<a href='Edificio.php?page=".$i."'";
            echo ">".$i."</a> ";
};
echo "</div>
        </div>";
?> -->