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

            <input type="submit" value="Registrar">
        </form>
    </section>

    <!-- Aquí se mostrará el mensaje -->
    <div id="Muestra"></div>

    <!-- Botones de navegación -->
    <div class="navigation">
        <a href="mostrar_libros.php" class="btn">Mostrar Libros</a>
        <a href="eliminar_libros.php" class="btn">Eliminar Libro</a>
        <a href="actualizar_libros.php" class="btn">Actualizar Libro</a>
    </div>

    <script>
        $(document).ready(function(){
            $("#formRegistrarLibro").on("submit", function(e){
                e.preventDefault(); // evita que el form recargue la página

                $.ajax({
                    url: 'guardarlibros.php', // 👈 usa el nombre correcto
                    type: 'POST',
                    data: $(this).serialize(), // envía todos los campos del form
                    success: function(respuesta){
                        $("#Muestra").html("<p style='color:green; font-weight:bold;'>" + respuesta + "</p>");
                        $("#formRegistrarLibro")[0].reset(); // limpia los campos del formulario
                    },
                    error: function(){
                        $("#Muestra").html("<p style='color:red;'>Error en la solicitud.</p>");
                    }
                });
            });
        });
    </script>
</body>
</html>



