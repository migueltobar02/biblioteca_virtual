<?php
require '../config/Db_conect.php';
$conect= conectar(); 

// Verificar si se ha proporcionado un ID válido
if (isset($_GET['id'])) {
    // 1=inactivo 0=activo
    $id_producto = $conect->real_escape_string($_GET['id']);

    // Si se ha hecho clic en Aceptar en la alerta de confirmación
    if (isset($_GET['confirm']) && $_GET['confirm'] === '1') {
        $sql = "UPDATE books SET state_book = '0' WHERE id_book = '$id_producto'";
        
        if ($result = $conect->query($sql)) {
            // Libro eliminado exitosamente
            $conect->close();
            header('Location:admin.php'); 
        } else {
            // Error al eliminar el libro
            echo "Error al eliminar el libro.";
        }
    } else {
        // Mostrar la alerta de confirmación
        echo '<script>
                var confirmar = confirm("¿Estás seguro de eliminar este libro?");
                if (confirmar) {
                    // Si el usuario hace clic en Aceptar, redirigir a esta página con el parámetro confirm=1
                    window.location.href = "eliminar_producto.php?id=' . $id_producto . '&confirm=1";
                    exit();
                } else {
                    // Si el usuario hace clic en Cancelar, redirigir a esta página sin el parámetro confirm
                    window.location.href = "admin.php";
                }
              </script>';
    }
} else {
    // No se proporcionó un ID válido
    echo "ID de producto no válido.";
}

?>