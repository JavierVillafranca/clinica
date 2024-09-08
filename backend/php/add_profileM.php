<?php
require '../../backend/bd/Conexion.php';
$id = $_GET['id'];
if (isset($_POST['add_profileM'])) {
    $username = $_POST['namedc'];
    $name = $_POST['named'];
    $password = MD5($_POST['pwdm']);
    $rol = $_POST['rlm'];

    try {
        // Verificar si ya existe un usuario con el mismo nombre
        $query = "SELECT COUNT(*) FROM users WHERE username = :username";
        $statement = $connect->prepare($query);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        $count = $statement->fetchColumn();

        if ($count > 0) {
            // Mostrar mensaje de error si el usuario ya existe
            echo '<script type="text/javascript">
                swal("Error!", "Ya existe un usuario con ese nombre", "error");
            </script>';
        } else {
            // Verificar si el perfil ya tiene un usuario creado
            $query = "SELECT userid FROM doctor WHERE idodc = :id";
            $statement = $connect->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $existingUserId = $statement->fetchColumn();

            if ($existingUserId) {
                // Mostrar mensaje de error si el perfil ya tiene un usuario creado
                echo '<script type="text/javascript">
                    swal("Error!", "El perfil ya tiene un usuario creado", "error");
                </script>';
            } else {
                // Crear el nuevo usuario
                $query = "INSERT INTO users (username, name, password, rol) VALUES (:username,:name, :password, :rol)";
                $statement = $connect->prepare($query);

                $data = [
                    ':username' => $username,
                    ':name' => $name,
                    ':password' => $password,
                    ':rol' => $rol,
                ];

                $query_execute = $statement->execute($data);

                if ($query_execute) {
                    $lastInsertedId = $connect->lastInsertId(); // Obtener el último ID insertado en la tabla users

                    $query = "UPDATE doctor SET userid = :userid WHERE idodc = $id";
                    $statement = $connect->prepare($query);

                    $data = [
                        ':userid' => $lastInsertedId,
                    ];

                    $query_execute = $statement->execute($data);

                    echo '<script type="text/javascript">
                        swal("¡Registrado!", "Perfil creado correctamente", "success").then(function() {
                            window.location = "mostrar.php";
                        });
                    </script>';
                }
            }
        }
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}
?>

