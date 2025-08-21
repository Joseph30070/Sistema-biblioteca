<?php
require_once "conexion_entregable01.php";

if (isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['precio']) && isset($_POST['stock']) && isset($_POST['categoria'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];

    $ingreso = $pdo->prepare("INSERT INTO libros (Titulo, Autor, Precio, Stock, Categoria) VALUES (:titulo, :autor, :precio, :stock, :categoria)");

    $ingreso->bindParam(':titulo', $titulo);
    $ingreso->bindParam(':autor', $autor);
    $ingreso->bindParam(':precio', $precio);
    $ingreso->bindParam(':stock', $stock);
    $ingreso->bindParam(':categoria', $categoria);

    if ($ingreso->execute()) {
        echo "¡El libro '$titulo' de autor '$autor' con precio '$precio', stock '$stock' y categoría '$categoria' se ha registrado correctamente!";
    } else {
        echo "Error al registrar el libro.";
    }
} else {
    echo "Todos los campos son obligatorios.";
}
?>
