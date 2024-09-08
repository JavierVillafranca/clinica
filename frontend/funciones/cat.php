 <?php 
 require '../../backend/bd/Conexion.php';
 $stmt = $connect->prepare('SELECT * FROM `category` ORDER BY idcat   ASC');

  $stmt->execute();


 ?>
 <option disabled selected>Seleccione</option>
 <?php 
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            
            <option value="<?php echo $idcat; ?>"><?php echo $nomcat; ?></option>

            <?php
        }

  ?>


