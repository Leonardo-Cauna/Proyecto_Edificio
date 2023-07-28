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
$query = "SELECT * FROM inquilinos ORDER BY `ID Inquilino` ASC LIMIT $start_from, 14";
include("db.php");
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
                            <h5 class="text-center">Seleccione el inquilino que desea eliminar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row my-2">
                            <table border="1" cellpadding="4">
                            <tr>
                                <td bgcolor="#CCCCCC"><strong>ID</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Nombre</strong></td>
                                <td bgcolor="#CCCCCC"><strong>Departamento</strong></td>
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
            $ID = $row['ID Inquilino'];
            $nombre = $row['Nombre'];
            $Departamento = $row['Departamento'];
            $Edificio = $row['Edificio'];
?>
            <tr>
            <td><?php echo $ID?></td>
            <td><?php echo "<a href='BorrarInquilino.php?page=".$ID."'>" .$nombre. "</div>" ?></td>
            <td><?php echo $Departamento; ?></td>
            <td><?php echo $Edificio; ?></td>
            </tr>
<?php
 }
?>
</table>

<?php
    if (isset($_POST['base']))
        {
            header('location:baseEncargado.php');
        }
    $query = "SELECT COUNT(`ID Inquilino`) AS total FROM inquilinos";
    $result = mysqli_query($conexion, $query);
    while ($row = $result->fetch_assoc()) 
    {
        $total_pages = $row["total"] / 15;
    }
    echo "<div class='text-center'>
            <div class = 'card-footer'>";
    for ($i=1; $i<=$total_pages+1; $i++) {  
                // print links for all pages
                echo "<a href='BorrarInquilinos.php?page=".$i."'";
                echo ">".$i."</a> ";
    };
    echo "</div>
            </div>";
?>