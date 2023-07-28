<?php
if (isset($_GET["page"])) 
{ 
    $page=$_GET["page"]; 
} 
else 
{ 
    $page=1; 
}
$start_from = ($page-1) * 14;
include("db.php");
include("IP.php");
$query = "SELECT Nombre FROM usuarios WHERE IP = '$ip' AND Online = 1";
$result = mysqli_query($conexion, $query);
while ($row = $result->fetch_assoc()) 
{
    $user = $row['Nombre'];
}
$query = "SELECT * FROM edificio WHERE Gerente = '$user' ORDER BY ID ASC LIMIT $start_from, 14";
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
                            <input type = "submit" value = "Volver atras" name= "base"></input><br>
                    <div class="card-header">
                            <h5 class="text-center">Seleccione la guia a la que desea concurrir</h5>
                    </div>
                    <div class="card-body">
                        <div class="row my-2">
                            <table border="1" cellpadding="4">
                            <tr>
                                <td bgcolor="#CCCCCC"><strong>Nombre</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Direccion del edificio</strong></td>
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
            $nombre = $row['Nombre'];
            $direccion = $row['Direccion']
?>
            <tr>
            <td><?php echo "<a href='edificio.php?page=".$ID."'>" .$nombre. "</div>" ?></td>
            <td><?php echo $direccion ?></td>
            </tr>
<?php
 }
?>
</table>
<?php
$query = "SELECT COUNT(ID) AS total FROM edificio";
$result = mysqli_query($conexion, $query);
while ($row = $result->fetch_assoc()) 
{
    $total_pages = $row["total"] / 15;
}
echo "<div class='text-center'>
        <div class = 'card-footer'>";
for ($i=1; $i<=$total_pages+1; $i++) {  
            // print links for all pages
            echo "<a href='Edificios.php?page=".$i."'";
            echo ">".$i."</a> ";
};
echo "</div>
        </div>";
if (isset($_POST['base']))
    {
        header('location:baseencargado.php');
    }
?>