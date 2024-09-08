<?php 
require '../../backend/bd/Conexion.php';

$stmt = $connect->prepare("SELECT * FROM laboratory ORDER BY nomlab ASC");
$stmt->execute();

echo "<option disabled selected>Seleccione</option>";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "<option value='$idlab'>$nomlab</option>";
}
?>


