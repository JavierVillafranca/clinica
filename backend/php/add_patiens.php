<?php 
require_once('../../backend/bd/Conexion.php'); 
 if(isset($_POST['add_patiens']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $numhs=trim($_POST['nhi']);
    $nompa=trim($_POST['namp']);
    $apepa=trim($_POST['apep']);
    $lugna=trim($_POST['lugn']);
    $direc=trim($_POST['dip']);
    $sex=trim($_POST['gep']);
    $grup=trim($_POST['grp']);
    $phon=trim($_POST['telp']);
    $ocup=trim($_POST['ocupa']);
    $cump=trim($_POST['cump']);
    
   
    
  if(empty($numhs)){
   $errMSG = "Please enter number.";
  }
  else if(empty($nompa)){
   $errMSG = "Please Enter your name.";
  }
   
  $stmt = "SELECT * FROM patients WHERE numhs ='$numhs'";
   if(empty($numhs)) {
             echo '<div id="cookiePopup" class="hide">
      <img src="../../backend/img/error.png" />
      <p>
        Ya existe el registro a agregar!
      </p>
      <button id="acceptCookie" type="button">OK</button>
    </div>';
         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM patients WHERE numhs ='$numhs'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
   $stmt = $connect->prepare("INSERT INTO patients(numhs,nompa,apepa,lugna,direc,sex,grup,phon,ocup,cump,state) VALUES(:numhs,:nompa,:apepa,:lugna,:direc,:sex,:grup,:phon,:ocup,:cump, '1')");


$stmt->bindParam(':numhs',$numhs);
$stmt->bindParam(':nompa',$nompa);
$stmt->bindParam(':apepa',$apepa);
$stmt->bindParam(':lugna',$lugna);
$stmt->bindParam(':direc',$direc);
$stmt->bindParam(':sex',$sex);
$stmt->bindParam(':grup',$grup);
$stmt->bindParam(':phon',$phon);
$stmt->bindParam(':ocup',$ocup);
$stmt->bindParam(':cump',$cump);


if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("Agregado!", "Agregado correctamente", "success").then(function() {
            window.location = "mostrar.php";
        });
        </script>';
   }
   else
   {
    $errMSG = "error while inserting....";
   }

  } 
            }

                else{
                     echo '<script type="text/javascript">
swal("Error!", "Error", "error").then(function() {
            window.location = "mostrar.php";
        });
        </script>';


}
  
  }
 
 }
?>