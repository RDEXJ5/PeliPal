<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "cine";

$conn = mysqli_connect($host, $username, $password, $dbname) 
    or die("La conexión falló: " . mysqli_connect_error());

$id = $_GET['id'];
$sql = "SELECT * FROM clasificaciones WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $fila = mysqli_fetch_assoc($result);
  $nombre = $fila['Nombre'];
} else {
  echo "<div class='alert alert-danger text-center mt-5'>Registro no encontrado.</div>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Clasificación</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-header bg-warning text-dark d-flex align-items-center">
      <i class="bi bi-pencil-square me-2 fs-5"></i>
      <h5 class="mb-0">Editar Clasificación</h5>
    </div>

    <div class="card-body">
      <form action="actualizarClasf.php" method="post">
        <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input type="text" id="id" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="nombre" class="form-label">Clasificación</label>
          <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
        </div>
        <div class="d-flex justify-content-between">
          <a href="clasificaciones.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver
          </a>
          <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Guardar Cambios
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
