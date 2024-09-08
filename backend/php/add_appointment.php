<?php 
require_once('../../backend/bd/Conexion.php'); 

if(isset($_POST['add_appointment'])) {
    $title = trim($_POST['appnam']);
    $idpa = trim($_POST['apppac']);
    $idodc = trim($_POST['appdoc']);
    $idlab = trim($_POST['applab']);
    $color = trim($_POST['appco']);
    $start = $_POST['appini'];
    $end = $_POST['appfin'];
    $monto = $_POST['appmont'];

    // Verificar si el periodo de tiempo está ocupado
    $query = "SELECT COUNT(*) FROM events WHERE idodc = :idodc AND ((start <= :start AND end >= :start) OR (start <= :end AND end >= :end)) AND state = 1";
    $statement = $connect->prepare($query);
    $statement->bindParam(':idodc', $idodc, PDO::PARAM_INT);
    $statement->bindParam(':start', $start);
    $statement->bindParam(':end', $end);
    $statement->execute();
    $count = $statement->fetchColumn();

    if ($count > 0) {
        // Mostrar mensaje de error si el periodo está ocupado
        echo '<script type="text/javascript">
            swal("Error!", "El periodo de tiempo está ocupado para este médico", "error");
        </script>';
    } else {
        // Insertar la cita en la base de datos
        $insertQuery = "INSERT INTO events(title, idpa, idodc, idlab, color, start, end, state, monto) 
                        VALUES(:title, :idpa, :idodc, :idlab, :color, :start, :end, 1, :monto)";

        $insertStmt = $connect->prepare($insertQuery);

        $insertStmt->bindParam(':title', $title);
        $insertStmt->bindParam(':idpa', $idpa);
        $insertStmt->bindParam(':idodc', $idodc);
        $insertStmt->bindParam(':idlab', $idlab);
        $insertStmt->bindParam(':color', $color);
        $insertStmt->bindParam(':start', $start);
        $insertStmt->bindParam(':end', $end);
        $insertStmt->bindParam(':monto', $monto);

        $insertStmt->execute();

        $lastInsertId = $connect->lastInsertId();
        if ($lastInsertId > 0) {
            echo '<script type="text/javascript">
                swal("¡Registrado!", "Se reservó la cita correctamente", "success").then(function() {
                    window.location = "mostrar.php";
                });
            </script>';
        } else {
            echo '<script type="text/javascript">
                swal("Error!", "No se pueden agregar datos, comuníquese con el administrador", "error").then(function() {
                    window.location = "nuevo.php";
                });
            </script>';
            print_r($sql->errorInfo());
        }
    }
}
?>
