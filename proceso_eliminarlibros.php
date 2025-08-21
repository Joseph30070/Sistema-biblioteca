<?php
require_once "conexion_entregable01.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $eliminar = $pdo->prepare("DELETE FROM libros WHERE Id = :id");
    $eliminar->bindParam(':id', $id);

    if ($eliminar->execute()) {
        echo "El libro fue eliminado correctamente.";
    } else {
        echo "Error al eliminar el libro.";
    }
} else {
    echo "El campo ID es obligatorio.";
}
?>


