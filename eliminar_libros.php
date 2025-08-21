<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Libro</title>
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

            // Manejar el envío del formulario de eliminación
            $('#form-eliminar').submit(function(event) {
                event.preventDefault(); // Evitar el envío tradicional del formulario
                var id = $('#id').val();

                $.ajax({
                    url: 'proceso_eliminarlibros.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        $('#mensaje').html(response); 
                        mostrarLibros(); // Actualizar la tabla automaticamente
                    },
                    error: function() {
                        $('#mensaje').html('Error al eliminar el libro.');
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h2>Eliminar un Libro</h2>

    <!-- Mostrar todos los registros en una tabla -->
    <div id="tabla-libros"></div>

    <!-- Formulario para eliminar el libro -->
    <form id="form-eliminar">
        <label for="id">Ingresar el ID del libro a eliminar:</label>
        <input type="number" name="id" id="id" required><br><br>

        <input type="submit" value="Eliminar">
        <a href="form_entregable01.php" class="btn btn-back">Volver</a>
    </form>

    <div id="mensaje"></div> 
</body>
</html>






