<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario - Cine</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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
                <button type="submit" class="btn btn-dark w-100 text-start text-white">
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

    <!-- Contenido principal -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
      <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-header bg-primary text-white d-flex align-items-center">
          <i class="bi bi-clipboard2-check me-2 fs-5"></i>
          <h5 class="mb-0">Registro de Función</h5>
        </div>

        <div class="card-body">
            <form action="phpInsertar/gdFuncion.php" method="post">
                <div class="mb-3">
                  <label for="titulo" class="form-label">Hora de Inicio</label>
                  <input type="text" class="form-control" id="titulo" name="d1" required>
                </div>

                <div class="mb-3">
                  <label for="titulo" class="form-label">Hora de Fin</label>
                  <input type="text" class="form-control" id="titulo" name="d2" required>
                </div>

                <div class="mb-3">
                  <label for="titulo" class="form-label">Fecha</label>
                  <input type="date" class="form-control" id="titulo" name="d3" required>
                </div>

                <div class="mb-3">
                  <label for="genero" class="form-label">Pelicula</label>
                  <select id="genero" name="d4" class="form-select" required>
                    <option value="">Seleccione una Pelicula</option>
                    <?php
                        // Conexión a la base de datos
                        $conn = mysqli_connect("localhost", "root", "", "cine");
                        $sql = "SELECT id, titulo FROM peliculas";
                        $resultado = mysqli_query($conn, $sql);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<option value='{$fila['id']}'>{$fila['titulo']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                  <label for="sala" class="form-label">Sala</label>
                  <select id="sala" name="d5" class="form-select" required>
                    <option value="">Seleccione una sala</option>
                    <?php
                        // Conexión a la base de datos
                        $conn = mysqli_connect("localhost", "root", "", "cine");
                        $sql = "SELECT id, nombre FROM salas";
                        $resultado = mysqli_query($conn, $sql);

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<option value='{$fila['id']}'>{$fila['nombre']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                  <button type="reset" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Limpiar
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Guardar
                  </button>
                </div>
            </form>
        </div>
      </div>
    </main>
  </div>
</div>

</body>
</html>
