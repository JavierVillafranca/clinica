<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
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
    



    <title>La Cruz</title>
</head>
<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="../admin/escritorio.php" class="brand"><img src="../img/cm1.png" alt="" style="width:220px; height:180px;"> </a>
        <ul class="side-menu">
            <li><a href="../admin/escritorio.php" ><i class='bx bxs-dashboard icon' ></i>Inicio</a></li>
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
                <a href="#" class="active"><i class='bx bxs-user icon' ></i> Pacientes <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../pacientes/mostrar.php" >Lista de pacientes</a></li>
                    <li><a href="../pacientes/historial.php">Historias Medicas</a></li> 
                </ul>
            </li>

            <li>
                <a href="#"><i class='bx bxs-briefcase icon'></i> Médicos <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="../medicos/mostrar.php">Lista de médicos</a></li>
                    <li><a href="../medicos/historial.php">Editar Perfil</a></li>
                    <li><a href="../medicos/laboratiorios.php">Especialidades</a></li>
                </ul>
            </li>


            <li>
                <a href="#"><i class='bx bxs-spray-can icon' ></i> Medicina<i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../medicinas/venta.php">Vender</a></li>
                    <li><a href="../medicinas/mostrar.php">Listado</a></li>
                    <li><a href="../medicinas/nuevo.php">Nueva</a></li>
                    <li><a href="../medicinas/categoria.php">Categoria</a></li>
                    <li><a href="../medicinas/historial.php">Historial</a></li>

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
            <i class='bx bx-menu toggle-sidebar'></i>
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
       
           <!-- multistep form -->
<?php 
require '../../backend/bd/Conexion.php';
 $id = $_GET['id'];
 $sentencia = $connect->prepare("SELECT * FROM patients  WHERE idpa= '$id';");
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
    <h1>Información del paciente</h1>

    <hr>

    <label for="psw"><b>Nombre del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" disabled value="<?php echo $d->nompa; ?>" name="namp" required>

    <label for="psw"><b>Apellido del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" disabled  value="<?php echo $d->apepa; ?>" name="apep" required>

    <label for="psw"><b>Cédula del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" disabled value="<?php echo $d->numhs; ?>" name="nhi" maxlength="14" required>

    <label for="psw"><b>Fecha de nacimiento del paciente</b></label><span class="badge-warning">*</span>
    <input type="date" disabled  value="<?php echo $d->cump; ?>" name="cump" required>

    <label for="psw"><b>Lugar de nacimiento del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" disabled value="<?php echo $d->lugna; ?>" name="lugn" required>

    <label for="psw"><b>Dirección del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" disabled value="<?php echo $d->direc; ?>" name="dip" required>

    <label for="psw"><b>Género del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" value="<?php echo $d->sex; ?>" required name="gep" id="gep" disabled>
     
    <label for="psw"><b>Grupo sanguíneo del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" value="<?php echo $d->grup; ?>" required name="grp" id="grp" disabled>


    <label for="psw"><b>Teléfono del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" disabled maxlength="13" value="<?php echo $d->phon; ?>" name="telp" required>

    <label for="psw"><b>Ocupación del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" disabled value="<?php echo $d->ocup; ?>" name="ocupa" required>

    <hr>
   
   
  </div>
  
</form>

        <?php endforeach; ?>
  
    <?php else:?>
      <p class="alert alert-warning">No hay datos</p>
    <?php endif; ?>
        </main>
        <!-- MAIN -->
    </section>
    <script src="../../backend/js/jquery.min.js"></script>
    <script src="../../backend/js/script.js"></script>
    

   
</body>
</html>


