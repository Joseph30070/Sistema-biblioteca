<?php
require_once "conexion_entregable01.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validar que los campos existan y no estén vacíos
    $titulo = trim($_POST['titulo'] ?? '');
    $autor = trim($_POST['autor'] ?? '');
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $categoria = trim($_POST['categoria'] ?? '');

    if ($titulo === '' || $autor === '' || $precio === '' || $stock === '' || $categoria === '') {
        $mensaje = "<div class='alert alert-danger'>⚠️ Todos los campos son obligatorios.</div>";
    } elseif (!is_numeric($precio) || $precio < 0) {
        $mensaje = "<div class='alert alert-warning'>⚠️ El precio debe ser un número positivo.</div>";
    } elseif (!is_numeric($stock) || $stock < 0) {
        $mensaje = "<div class='alert alert-warning'>⚠️ El stock debe ser un número positivo.</div>";
    } else {
        try {
            $ingreso = $pdo->prepare("INSERT INTO libros (Titulo, Autor, Precio, Stock, Categoria) 
                                      VALUES (:titulo, :autor, :precio, :stock, :categoria)");

            $ingreso->bindParam(':titulo', $titulo);
            $ingreso->bindParam(':autor', $autor);
            $ingreso->bindParam(':precio', $precio);
            $ingreso->bindParam(':stock', $stock);
            $ingreso->bindParam(':categoria', $categoria);

            if ($ingreso->execute()) {
                $mensaje = "<div class='alert alert-success'>
                              ✅ El libro <strong>" . htmlspecialchars($titulo) . "</strong> 
                              de <em>" . htmlspecialchars($autor) . "</em> fue registrado correctamente.
                              <div class='mt-3'>
                                  <button onclick='window.location.reload()' class='btn btn-primary'>
                                      Registrar otro libro
                                  </button>
                              </div>
                            </div>";
            } else {
                $mensaje = "<div class='alert alert-danger'>❌ Error al registrar el libro.</div>";
            }
        } catch (PDOException $e) {
            $mensaje = "<div class='alert alert-danger'>❌ Error en la base de datos: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    }
} else {
    $mensaje = "<div class='alert alert-info'>ℹ️ No se enviaron datos.</div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guardar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Registro de Libros</h2>
    <?= $mensaje ?? '' ?> 
</body>
</html>


