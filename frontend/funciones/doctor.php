 <?php 
 require '../../backend/bd/Conexion.php';
 echo '<option value="0">Seleccione</option>';
 $stmt = $connect->prepare('SELECT * FROM `doctor` INNER JOIN laboratory ON doctor.id_especialidad = laboratory.idlab ORDER BY idodc ASC');

  $stmt->execute();


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idodc; ?>"><?php echo $nodoc; ?>&nbsp;<?php echo $apdoc; ?>&nbsp; <?php echo '---------  ' . $nomlab; ?></option>

            <?php
        }

  ?>


