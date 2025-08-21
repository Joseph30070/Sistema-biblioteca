<?php
require_once "conexion_entregable01.php";

// Enlazar el archivo CSS
echo '<!DOCTYPE html>';
echo '<html lang="es">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Lista de Libros</title>';
echo '<link rel="stylesheet" href="styles1.css">'; // Cambia el nombre si es diferente
echo '</head>';
echo '<body>';

// Consultar todos los libros
$consulta = $pdo->query("SELECT * FROM libros");
$libros = $consulta->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los registros en un array

if ($libros) {
    echo '<h3>Lista de Todos los Libros</h3>';
    echo '<table>';
    echo '<tr><th>ID</th><th>Título</th><th>Autor</th><th>Precio</th><th>Stock</th><th>Categoría</th></tr>';
    foreach ($libros as $libro) { // Iterar sobre cada libro en el array y los coloca en un campo 
        echo '<tr>';
        echo '<td>' . htmlspecialchars($libro['Id']) . '</td>';
        echo '<td>' . htmlspecialchars($libro['Titulo']) . '</td>';
        echo '<td>' . htmlspecialchars($libro['Autor']) . '</td>';
        echo '<td>' . htmlspecialchars($libro['Precio']) . '</td>';
        echo '<td>' . htmlspecialchars($libro['Stock']) . '</td>';
        echo '<td>' . htmlspecialchars($libro['Categoria']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No se encontraron libros en la base de datos.</p>';
}

echo '</body>';
echo '</html>';
?>













