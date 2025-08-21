<?php
require_once "conexion_entregable01.php";

if (isset($_POST['id']) && isset($_POST['precio']) && isset($_POST['stock'])) {
    $id = $_POST['id'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $actualizar = $pdo->prepare("UPDATE libros SET Precio = :precio, Stock = :stock WHERE Id = :id");
    $actualizar->bindParam(':id', $id);
    $actualizar->bindParam(':precio', $precio);
    $actualizar->bindParam(':stock', $stock);

    if ($actualizar->execute()) {
        echo "El libro fue actualizado correctamente.";
    } else {
        echo "Error al actualizar el libro.";
    }
} else {
    echo "Todos los campos son obligatorios.";
}
?>


