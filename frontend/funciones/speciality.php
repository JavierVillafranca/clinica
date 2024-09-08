 <?php 
  require '../../backend/bd/Conexion.php'; 
  $el_continente = $_POST['continente'];
  $stmt = $connect->query("SELECT * FROM doctor INNER JOIN laboratory ON doctor.id_especialidad = laboratory.idlab WHERE idodc = $el_continente");



  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

  extract($row);
  ?>
  <option value="<?php echo $idlab; ?>"><?php echo $nomlab; ?></option>

  <?php
}

?>

  