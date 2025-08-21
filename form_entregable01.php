<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA MERLIN</title>
    <link rel="stylesheet" href="styles1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <h1>BIBLIOTECA MERLÍN</h1>

    <!-- Formulario para registrar nuevos libros -->
    <section>
        <form id="formRegistrarLibro">
            <h2>REGISTRAR NUEVOS LIBROS</h2>
            <label for="titulo">Título del libro:</label>
            <input type="text" name="titulo" id="titulo" required>

            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" required>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" step="0.01" required>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" required>

            <label for="categoria">Categoría:</label>
            <input type="text" name="categoria" id="categoria" required>

            <input type="button" value="Registrar" onclick="registrarLibro();">
        </form>
    </section>

    <div id="Muestra"></div>

    <!-- Botones de navegación -->
    <div class="navigation">
        <a href="mostrar_libros.php" class="btn">Mostrar Libros</a>
        <a href="eliminar_libros.php" class="btn">Eliminar Libro</a>
        <a href="actualizar_libros.php" class="btn">Actualizar Libro</a>
    </div>
    <script>
        function registrarLibro() {
            var titulo = document.getElementById('titulo').value;
            var autor = document.getElementById('autor').value;
            var precio = document.getElementById('precio').value;
            var stock = document.getElementById('stock').value;
            var categoria = document.getElementById('categoria').value;

            var datos = "titulo=" + titulo + "&autor=" + autor + "&precio=" + precio + "&stock=" + stock + "&categoria=" + categoria;

            $.ajax({
                url: 'guardarlibros.php',
                type: 'POST',
                data: datos,
            })
            .done(function(respuesta) {
                $('#Muestra').html(respuesta);
            })
            .fail(function() {
                console.log("Error en la solicitud.");
            })
            .always(function() {
                console.log("Operación completada.");
            });
        }
    </script>


</body>
</html>


