<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cine";

    $conn = mysqli_connect($host, $username, $password, $dbname) or die("<div class='alert alert-danger text-center'>La conexión falló: " . mysqli_connect_error() . "</div>");

    if (!$conn) {
        die("<div class='alert alert-danger text-center'>Fallo de conexión: " . mysqli_connect_error() . "</div>");
    }

    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];

    $sql = "INSERT INTO peliculas (titulo, idGeneros, idClasificacion) 
            VALUES ('$d1','$d2')";

    if (mysqli_query($conn, $sql)) {
        echo "<br> <h3 class='text-info'> El registro fue añadido correctamente </h3>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);

    $url_archivo_local = 'salas.php';
    echo '<a href="' . $url_archivo_local . '">Regresar a la página de Ingresar</a>';
?>