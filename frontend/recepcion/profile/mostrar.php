<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 2){
    header('location: ../../login.php');
exit;
  }
  $id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../../backend/css/admin.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../../img/cm2.png">





    <title>La Cruz</title>
</head>
<body>
    
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="../escritorio.php" class="brand"><img src="../../img/cm1.png" alt="" style="width:220px; height:180px;"></a>
        <ul class="side-menu">
            <li><a href="../escritorio.php" ><i class='bx bxs-dashboard icon' ></i> Inicio</a></li>
            <li class="divider" data-text="Menú">Menú</li>
            <li>
                <a href="#"><i class='bx bxs-book-alt icon' ></i> Citas <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../citas/mostrar.php">Lista de citas</a></li>
                    <li><a href="../citas/nuevo.php">Nueva</a></li>
                    <li><a href="../citas/calendario.php">Calendario</a></li>
                   
                </ul>
            </li>

            <li>
                <a href="#"><i class='bx bxs-user icon' ></i> Pacientes <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../pacientes/mostrar.php" >Lista de pacientes</a></li>
                    <li><a href="../pacientes/nuevo.php">Nuevo paciente</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class='bx bxs-cog icon' ></i> Ajustes<i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../ajustes/mostrar.php">Ajustes</a></li>                 
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
            <img src="../../img/cm4.png" alt="">
                <ul class="profile-link">
                <li><a href="mostrar.php?id=<?php echo $id ?>"><i class='bx bxs-user-circle icon' ></i>Mi Perfil</a></li>
                    
                    <li>
                     <a href="../../salir.php"><i class='bx bxs-log-out-circle' ></i>Cerrar Sesión</a>
                    </li>
                   
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <ul class="breadcrumbs">
            </ul>
    <?php 
require_once('../../../backend/bd/Conexion.php');
$sentencia = $connect->prepare("SELECT * FROM users WHERE id = $id;");
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
    <h1>Mi perfil</h1>
   
    <hr>
    <br>

    <label for="email"><b>Usuario del perfil</b></label><span class="badge-warning">*</span>
    <input type="text" value="<?php echo $d->username ?>" placeholder="ejm: admin01" name="prouser" required>
    <input type="hidden" name="proid" value="<?php echo $d->id ?>">

    <label for="email"><b>Nombre del perfil</b></label><span class="badge-warning">*</span>
    <input type="text" value="<?php echo $d->name ?>" placeholder="ejm: admin" name="proname" required>
   
    <hr>
   
    <button type="submit" name="upd_profile" class="registerbtn">Guardar</button>
  </div>
</form>
 <?php endforeach; ?>
 <?php else:?>
  
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      <strong>Danger!</strong> No hay datos.
    </div>
    <?php endif; ?>


<div class="content-data">
      <?php 
      require_once('../../../backend/bd/Conexion.php');
$sentencia = $connect->prepare("SELECT * FROM users WHERE id = $id;");
 $sentencia->execute();
$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
     ?>
     <?php if(count($data)>0):?> 
     <?php foreach($data as $e):?>   
   <form method="POST"  enctype="multipart/form-data">
    <div class="containerss">
         <h1>Actualizar contraseña</h1>
         <br>
    <label for="email"><b>Nueva contraseña</b></label><span class="badge-warning">*</span>
    <input type="password" placeholder="ejm: ******" name="newpass" required>
    <input type="hidden" name="newid" value="<?php echo $d->id ?>">
    </div>
       <hr>
   
    <button type="submit" name="upd_profile_pass" class="registerbtn">Guardar</button>
   </form>
    <?php endforeach; ?>
 <?php else:?>
  
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      <strong>Danger!</strong> No hay datos.
    </div>
    <?php endif; ?>
</div>

        </main>
        <!-- MAIN -->
    </section>
    
    <!-- NAVBAR -->
    <script src="../../../backend/js/jquery.min.js"></script>
    
    <script src="../../../backend/js/script.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 <?php include_once '../../../backend/php/upd_profile.php' ?>
  <?php include_once '../../../backend/php/upd_pass.php' ?>
</body>
</html>


