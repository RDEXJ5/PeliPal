<?php 
$clave = "0";
$nombre = "";
$apellidoP = "";
$apellidoM = "";
$telefono = "";
$correo = "";
$claveEstudios = "";

$f1=$_POST['f1'];
if (!empty($f1))
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ejemplo1";

    $conn = mysqli_connect($host, $username, $password, $dbname)or die("La conexión falló: " . mysqli_connect_error());
    if (!$conn) 
    {
      die("Fallo de conexión : " . mysqli_connect_error());
    }
    else
        echo "Conexión establecida con éxito";
    
$sql="select * from datos1 where Clave=$f1"; 

$resultado = mysqli_query($conn, $sql); 

if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) 
    {
        $clave = $fila["Clave"];
        $nombre = $fila["Nombre"];
        $apellidoP = $fila["ApellidoP"];
        $apellidoM = $fila["ApellidoM"];
        $telefono = $fila["telefono"];
        $correo = $fila["correo"];
        $claveEstudios = $fila["claveEstudios"];
    }
} else {
    echo "0 resultados.";
}
//Cerrar la conexión
mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Operaciones con BD</title>

</head>
<body>

    <form name="f1" method="post" action="actualizacion.php"> 
                            <table border="1" width="391"> 
                                <tr> 
                                    <td width="119" height="27"> 
                                        <p><b>Clave:</b></p> 
                                    </td> 
                                    <td width="256" height="27"> 
                                        <p><input type="text" name="f1" size="10" value="<?php echo $clave; ?>"></p> 
                                    </td> 
                                </tr> 
                                <tr> 
                                    <td width="119"> 
                                        <p>Nombre:</p> 
                                    </td> 
                                    <td width="256"> 
                                        <p><input type="text" name="f2" size="35" value="<?php echo $nombre; ?>"></p> 
                                    </td> 
                                </tr> 
                                <tr> 
                                    <td width="119"> 
                                        <p>Apellido Paterno:</p> 
                                    </td> 
                                    <td width="256"> 
                                        <p><input type="text" name="f3" size="35" value="<?php echo $apellidoP; ?>"></p> 
                                    </td> 
                                </tr> 
                                <tr> 
                                    <td width="119"> 
                                        <p>Apellido Materno</p> 
                                    </td> 
                                    <td width="256"> 
                                        <p><input type="text" name="f4" size="35" value="<?php echo $apellidoM; ?>"></p> 
                                    </td> 
                                </tr> 
                                <tr> 
                                    <td width="119"> 
                                        <p>Telefono:</p> 
                                    </td> 
                                    <td width="256"> 
                                        <p><input type="text" name="f5" size="26" value="<?php echo $telefono; ?>"></p> 
                                    </td> 
                                </tr> 
                                <tr> 
                                    <td width="119"> 
                                        <p>Email:</p> 
                                    </td> 
                                    <td width="256"> 
                                        <p><input type="text" name="f6" size="35" value="<?php echo $correo; ?>"></p> 
                                    </td> 
                                </tr> 
                                <tr> 
                                    <td width="119"> 
                                        <p><b>Clave estudios:</b></p> 
                                    </td> 
                                    <td width="256"> 
                                        <p><select name="f7" size="1" value="<?php echo $claveEstudios; ?>"> 
                                        <option value="1" <?php if($claveEstudios == 1) echo 'selected'; ?>>Ing. en Sistemas Computacionales</option> 
                                        <option value="2" <?php if($claveEstudios == 2) echo 'selected'; ?>>Ing. en Sistemas de Información</option> 
                                        <option value="3" <?php if($claveEstudios == 3) echo 'selected'; ?>>Lic. en redes </option> 
                                        <option value="4" <?php if($claveEstudios == 4) echo 'selected'; ?>>Ing. en Telecomunicaciones</option> 
                                        <option value="5" <?php if($claveEstudios == 5) echo 'selected'; ?>>Ing. en Mecatrónica</option> 
                                        </select></p> 
                                    </td> 
                                </tr> 
    
                               
                            </table> 
                             &nbsp;&nbsp;
                            <p align="left">&nbsp;<input class="btn btn-danger" type="submit" name="boton" value="Actualizar informacion">  
                            &nbsp;&nbsp;</p> 
        </form>

</body>
</html>