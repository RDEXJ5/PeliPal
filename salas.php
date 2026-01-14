<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block bg-dark text-white min-vh-100 p-3">
            <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                <i class="bi bi-bootstrap fs-3 me-2 text-primary"></i>
                <span class="fs-4 fw-bold">Cine</span>
            </div>

            <div class="nav flex-column">
                <form action="inicio.php" method="get" class="mb-2">
                <button type="submit" class="btn btn-dark w-100 text-start">
                    <i class="bi bi-house-door me-2"></i>Inicio
                </button>
                </form>

                <form action="peliculas.php" method="get" class="mb-2">
                <button type="submit" class="btn btn-dark w-100 text-start text-white">
                    <i class="bi bi-film me-2"></i>Películas
                </button>
                </form>

                <form action="funciones.php" method="get" class="mb-2">
                <button type="submit" class="btn btn-dark w-100 text-start text-white">
                    <i class="bi bi-calendar-event me-2"></i>Funciones
                </button>
                </form>

                <form action="salas.php" method="get" class="mb-2">
                <button type="submit" class="btn btn-primary w-100 text-start text-white">
                    <i class="bi bi-tv me-2"></i>Salas
                </button>
                </form>

                <form action="generos.php" method="get" class="mb-2">
                <button type="submit" class="btn btn-dark w-100 text-start text-white">
                    <i class="bi bi-tags me-2"></i>Géneros
                </button>
                </form>

                <form action="clasificaciones.php" method="get" class="mb-2">
                <button type="submit" class="btn btn-dark w-100 text-start text-white">
                    <i class="bi bi-bookmark-star me-2"></i>Clasificaciones
                </button>
                </form>

                <form action="tipos_salas.php" method="get">
                <button type="submit" class="btn btn-dark w-100 text-start text-white">
                    <i class="bi bi-layout-text-window me-2"></i>Tipos de Salas
                </button>
                </form>
            </div>
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
 
            <h1 class="text-center mb-4">Interfaz CRUD</h1>

            <div class="d-flex justify-content-between mb-3">
                <a href="FormInsertar\regSala.php" class="btn btn-success">Agregar Nuevo</a>
            </div>

        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cine";

        $conn = mysqli_connect($host, $username, $password, $dbname) or die("<div class='alert alert-danger text-center'>La conexión falló: " . mysqli_connect_error() . "</div>");

        if (!$conn) {
            die("<div class='alert alert-danger text-center'>Fallo de conexión: " . mysqli_connect_error() . "</div>");
        }

        
        $sql = "SELECT salas.id, salas.nombre, tipossalas.nombre AS tipo_sala
        FROM salas
        INNER JOIN tipossalas ON salas.idTipoSala = tipossalas.id";

        $resultado = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-striped table-hover'>";
            echo "<thead class='table-dark'>
                    <tr>
                        <th>ID</th>
                        <th>Sala</th>
                        <th>Tipo de Sala</th>
                        <th>Acciones</th>
                    </tr>
                </thead><tbody>";
            
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>
                        <td>{$fila['id']}</td>
                        <td>{$fila['nombre']}</td>
                        <td>{$fila['tipo_sala']}</td>
                        <td>
                            <form action='FormActualizar/formSala.php' method='get' class='d-inline'>
                                <input type='hidden' name='id' value='{$fila['id']}'>
                                <button type='submit' class='btn btn-primary btn-sm'>
                                    <i class='bi bi-pencil-square'></i> Editar
                                </button>
                            </form>
                            <form action='eliminarClasif.php' method='post' class='d-inline'>
                                <input type='hidden' name='id' value='{$fila['id']}'>
                                    <button type='submit' class='btn btn-danger btn-sm'>
                                        <i class='bi bi-trash'></i> Eliminar
                                    </button>
                                </form>
                        </td>
                    </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<div class='alert alert-warning text-center'>No se encontraron resultados.</div>";
        }

        mysqli_close($conn);

        ?>

        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
