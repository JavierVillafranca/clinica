<?php
require_once('../../backend/bd/Conexion.php');

if(isset($_POST['delete_patients'])){
    $idodc = trim($_POST['idodc']);

    try {
        // Verificar si el médico está registrado en una cita médica
        $query = "SELECT COUNT(*) FROM events WHERE idodc = :idodc";
        $statement = $connect->prepare($query);
        $statement->bindParam(':idodc', $idodc, PDO::PARAM_INT);
        $statement->execute();
        $count = $statement->fetchColumn();

        if ($count > 0) {
            // Mostrar mensaje de error si el médico está registrado en una cita médica
            echo '<script type="text/javascript">
                swal("Error!", "El médico está registrado en una cita médica y no se puede eliminar", "error").then(function() {
                    window.location = "mostrar.php";
                });
            </script>';
        } else {
            // Obtener el userid del médico que se va a eliminar
            $query = "SELECT userid FROM doctor WHERE idodc = :idodc";
            $statement = $connect->prepare($query);
            $statement->bindParam(':idodc', $idodc, PDO::PARAM_INT);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $userid = $row['userid'];

            // Eliminar el médico de la tabla doctor
            $query = "DELETE FROM doctor WHERE idodc = :idodc";
            $statement = $connect->prepare($query);
            $statement->bindParam(':idodc', $idodc, PDO::PARAM_INT);
            $statement->execute();

            // Eliminar el usuario de la tabla users
            $query = "DELETE FROM users WHERE id = :userid";
            $statement = $connect->prepare($query);
            $statement->bindParam(':userid', $userid, PDO::PARAM_INT);
            $statement->execute();

            if($statement->rowCount() > 0) {
                echo '<script type="text/javascript">
                    swal("Eliminado!", "Eliminado correctamente", "success").then(function() {
                        window.location = "mostrar.php";
                    });
                </script>';
            } else {
                echo '<script type="text/javascript">
                    swal("Error!", "Error al eliminar", "error").then(function() {
                        window.location = "mostrar.php";
                    });
                </script>';
            }
        }
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

?>



 

