<?php
require_once('../../backend/bd/Conexion.php');

if(isset($_POST['delete_patients'])){
    $idpa = trim($_POST['idpa']);

    // Verificar si el paciente está registrado en una cita médica
    $query = "SELECT COUNT(*) FROM events WHERE idpa = :idpa";
    $statement = $connect->prepare($query);
    $statement->bindParam(':idpa', $idpa, PDO::PARAM_INT);
    $statement->execute();
    $count = $statement->fetchColumn();

    if ($count > 0) {
        // Mostrar mensaje de error si el paciente está registrado en una cita médica
        echo '<script type="text/javascript">
            swal("Error!", "El paciente está registrado en una cita médica y no se puede eliminar", "error").then(function() {
                window.location = "mostrar.php";
            });
        </script>';
    } else {
        // Eliminar el registro del paciente
        $consulta = "DELETE FROM `patients` WHERE `idpa`=:idpa";
        $sql = $connect->prepare($consulta);
        $sql->bindParam(':idpa', $idpa, PDO::PARAM_INT);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo '<script type="text/javascript">
                swal("Eliminado!", "Eliminado correctamente", "success").then(function() {
                    window.location = "mostrar.php";
                });
            </script>';
        } else {
            echo '<script type="text/javascript">
                swal("Error!", "Error al eliminar el paciente", "error").then(function() {
                    window.location = "mostrar.php";
                });
            </script>';
            print_r($sql->errorInfo());
        }
    }
}

?>


 

