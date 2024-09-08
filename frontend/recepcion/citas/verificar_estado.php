<?php
require_once('../../backend/bd/Conexion.php');

try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Obtener el estado actual de la cita
        $query_estado_actual = "SELECT state FROM citas WHERE id = :id";
        $statement_estado_actual = $connect->prepare($query_estado_actual);
        $statement_estado_actual->bindParam(':id', $id);
        $statement_estado_actual->execute();
        $estado_actual = $statement_estado_actual->fetchColumn();

        // Devolver el estado actual como respuesta
        echo $estado_actual;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>