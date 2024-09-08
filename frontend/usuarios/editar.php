<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 3){
    header('location: ../login.php');

}
$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../backend/css/admin.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../img/cm2.png">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="../../backend/css/datatable.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/buttonsdataTables.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/font.css">


    <title>La Cruz</title>
</head>
<body>
    
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="../admin/escritorio.php" class="brand"><img src="../img/cm1.png" alt="" style="width:220px; height:180px;"></a>
        <ul class="side-menu">
            <li><a href="escritorio.php" ><i class='bx bxs-dashboard icon' ></i>Inicio</a></li>
            <li class="divider" data-text="Menú">Menú</li>
            <li>
                <a href="#"><i class='bx bxs-book-alt icon' ></i> Citas <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="citas/mostrar.php">Lista de citas</a></li>
                    <li><a href="citas/calendario.php">Calendario</a></li>
                   
                </ul>
            </li>

            <li>
                <a href="#"><i class='bx bxs-user icon' ></i> Pacientes <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="pacientes/mostrar.php" >Lista de pacientes</a></li>
                    <li><a href="pacientes/historial.php">Historias Medicas</a></li>  
                </ul>
            </li>

            <li>
                <a href="#" class="active"><i class='bx bxs-spray-can icon' ></i> Medicina<i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="venta.php">Vender</a></li>
                    <li><a href="mostrar.php">Listado</a></li>
                    
                    <li><a href="categoria.php">Categoria</a></li>

                </ul>
            </li>

            <li>
                <a href="#"><i class='bx bxs-cog icon' ></i> Ajustes<i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="ajustes/mostrar.php">Ajustes</a></li>

                    
                </ul>
            </li>

          
           
        </ul>
       

    </section>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar' ></i>
            <form action="#">
                <div class="form-group">
                </div>
            </form>
            
           
            <span class="divider"></span>
            <div class="profile">
            <img src="../img/cm4.png" alt="">
                <ul class="profile-link">
                <li><a href="../profile/mostrar.php?id=<?php echo $id ?>"><i class='bx bxs-user-circle icon' ></i>Mi Perfil</a></li>
                    
                    <li>
                     <a href="../salir.php"><i class='bx bxs-log-out-circle' ></i>Cerrar Sesión</a>
                    </li>
                   
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            
         <?php 
require '../../backend/bd/Conexion.php';
 $id = $_GET['id'];
 $sentencia = $connect->prepare("SELECT product.idprcd, product.codpro, product.nompro, category.idcat, category.nomcat, product.preprd, product.stock, product.state, product.fere FROM product INNER JOIN category ON product.idcat = category.idcat WHERE idprcd= '$id';");
 $sentencia->execute();

$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
   ?>
   <?php if(count($data)>0):?>
        <?php foreach($data as $d):?>    
<form action="" enctype="multipart/form-data" method="POST"  autocomplete="off" onsubmit="return validacion()">
  <div class="containerss">
    <h1>Actualizar medicinas</h1>
   
    <div class="alert-danger">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Importante!</strong> Es importante rellenar los campos con &nbsp;<span class="badge-warning">*</span>
</div>
    <hr>
    <br>
    <label for="email"><b>Código de la medicina</b></label><span class="badge-warning">*</span>
    <input type="text" value="<?php echo $d->codpro; ?>" placeholder="ejm:  877578VNRB4" maxlength="14" name="medicode" required>
    <input type="hidden" name="meid" value="<?php echo $d->idprcd; ?>">

    <label for="email"><b>Nombre de la medicina</b></label><span class="badge-warning">*</span>
    <input value="<?php echo $d->nompro; ?>" type="text" placeholder="ejm:  PRADAXA 75 MG X 30 CÁPSULAS" name="mediname" required>

    <label for="psw"><b>Categoria de la medicina</b></label><span class="badge-warning">*</span>
    <select required name="medicate">
        <option value="<?php echo $d->idcat; ?>"><?php echo $d->nomcat; ?></option>
        <option>---------------------------------</option>
        <?php
            $stmt = $connect->prepare('SELECT * FROM category'); 
                $stmt->execute();

            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                extract($row);
            ?>
            <option value="<?php echo $idcat; ?>"><?php echo $nomcat; ?></option>
            <?php
                }
        ?>
        
    </select>

    <label for="email"><b>Precio de la medicina</b></label><span class="badge-warning">*</span>
    <input type="text" value="<?php echo $d->preprd; ?>" placeholder="ejm: 25.90" name="mediprec" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>

    <hr>
   
    <button type="submit" name="upd_medicine" class="registerbtn">Guardar</button>
  </div>
  
</form>

<?php endforeach; ?>
  
    <?php else:?>
      <p class="alert alert-warning">No hay datos</p>
    <?php endif; ?>

        </main>
        <!-- MAIN -->
    </section>
    
    <!-- NAVBAR -->
    <script src="../../backend/js/jquery.min.js"></script>
 
    <script src="../../backend/js/script.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 <?php include_once '../../backend/php/upd_medicine.php' ?>
</body>
</html>


