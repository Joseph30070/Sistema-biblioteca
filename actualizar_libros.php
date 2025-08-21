<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Libro</title>
    <link rel="stylesheet" href="styles1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para mostrar la tabla de libros
            function mostrarLibros() {
                $.ajax({
                    url: 'mostrar_libros.php',
                    type: 'GET',
                    success: function(data) {
                        $('#tabla-libros').html(data);
                    },
                    error: function() {
                        $('#tabla-libros').html('<p>Error al cargar la lista de libros.</p>');
                    }
                });
            }

            // Mostrar la tabla de libros al cargar la página
            mostrarLibros();

            // Manejar el envío del formulario de actualización
            $('#form-actualizar').submit(function(event) {
                event.preventDefault(); // Evitar el envío tradicional del formulario
                var id = $('#id').val();
                var precio = $('#precio').val();
                var stock = $('#stock').val();

                $.ajax({
                    url: 'proceso_actualizarlibros.php',
                    type: 'POST',
                    data: { id: id, precio: precio, stock: stock },
                    success: function(response) {
                        $('#mensaje').html(response); 
                        mostrarLibros(); // Actualizar automaticamente despues de los nuevos precios
                    },
                    error: function() {
                        $('#mensaje').html('Error al actualizar el libro.');
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h2>Actualizar Precio y Stock de un Libro</h2>

    <!-- Mostrar todos los registros en una tabla -->
    <div id="tabla-libros"></div>

    <!-- Formulario para actualizar el libro -->
    <form id="form-actualizar">
        <label for="id">Ingresar el ID del libro a actualizar:</label>
        <input type="number" name="id" id="id" required><br><br>

        <label for="precio">Nuevo Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required><br><br>

        <label for="stock">Nuevo Stock:</label>
        <input type="number" name="stock" id="stock" required><br><br>

        <input type="submit" value="Actualizar">
        <a href="form_entregable01.php" class="btn btn-back">Volver</a>
    </form>

    <div id="mensaje"></div> 
</body>
</html>






