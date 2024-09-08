<?php
require_once('../../backend/bd/Conexion.php');

try {
    // Verificar si se ha hecho clic en el enlace
    if (isset($_GET['id']) && isset($_GET['state'])) {
        // Obtener el ID y el estado desde el enlace
        $id = $_GET['id'];
        $state = $_GET['state'];

        // Actualizar el valor de la columna "state" en la tabla "events"
        $query = "UPDATE events SET state = :state WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':state', $state);
        $query_execute = $statement->execute();

        if ($query_execute) {
            echo '<script type="text/javascript">
                    swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
                        location.href = window.location.href;
                    });
                </script>';
            exit(0);
        } else {
            echo '<script type="text/javascript">
                    swal("Error!", "Error al actualizar", "error").then(function() {
                        location.href = window.location.href;
                    });
                </script>';
            exit(0);
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>