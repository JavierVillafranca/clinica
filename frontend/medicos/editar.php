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
                <a href="#"><i class='bx bxs-user icon' ></i> Pacientes <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../pacientes/mostrar.php" >Lista de pacientes</a></li>
                    <li><a href="../pacientes/historial.php">Historias Medicas</a></li> 
                </ul>
            </li>

            <li>
                <a href="#" class="active"><i class='bx bxs-briefcase icon'></i> Médicos <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="mostrar.php">Lista de médicos</a></li>
                    <li><a href="historial.php">Editar Perfil</a></li>
                    <li><a href="laboratiorios.php">Especialidades</a></li>
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
 $sentencia = $connect->prepare("SELECT * FROM doctor INNER JOIN laboratory ON doctor.id_especialidad = laboratory.idlab WHERE idodc= '$id';");
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
    <h1>Actualizar médico</h1>
    
   <br>
    <hr>

    
    <input type="hidden" name="midp" value="<?php echo $d->idodc; ?>">

    
    <label for="psw"><b>Nombre del médico</b></label><span class="badge-warning">*</span>
    <input type="text"  name="named" value="<?php echo $d->nodoc; ?>"  required>

    <label for="psw"><b>Apellido del médico</b></label><span class="badge-warning">*</span>
    <input type="text"  name="apeme" value="<?php echo $d->apdoc; ?>"  required>

    <label for="psw"><b>Cédula del médico</b></label><span class="badge-warning">*</span>
    <input type="text" maxlength="10" name="cem" value="<?php echo $d->ceddoc; ?>"  required>

    
    <label for="psw"><b>Dirección del médico</b></label><span class="badge-warning">*</span>
    <input type="text"  name="dime" value="<?php echo $d->direcd; ?>"  required>

    <label for="psw"><b>Género del médico</b></label><span class="badge-warning">*</span>
    <select required name="geme"  id="gep">
        <option value="<?php echo $d->sexd; ?>"><?php echo $d->sexd; ?></option>
        <option value="0" disabled>------------------Seleccione----------------------------</option> 
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>

    </select>

    <label for="psw"><b>Especialidad del médico</b></label><span class="badge-warning">*</span>
    <select required name="espm"  id="">
        <option value="<?php echo $d->idlab; ?>"><?php echo $d->nomlab; ?></option>
        <option value="0" disabled>------------------Seleccione----------------------------</option> 
        
        <?php 
require '../../backend/bd/Conexion.php';

$stmt = $connect->prepare("SELECT * FROM laboratory ORDER BY nomlab ASC");
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "<option value='$idlab'>$nomlab</option>";
}
?>
    </select>

    <label for="psw"><b>Teléfono del médico</b></label><span class="badge-warning">*</span>
    <input type="text" maxlength="13"  name="telme" value="<?php echo $d->phd; ?>"  required>

    <label for="psw"><b>Fecha de Nacimiento del médico</b></label><span class="badge-warning">*</span>
    <input type="date"  name="cumme" value="<?php echo $d->nacd; ?>"  required>

    <label for="psw"><b>Número de colegio</b></label><span class="badge-warning">*</span>
    <input type="text" maxlength="6" value="<?php echo $d->numco; ?>" name="numcol" required>

    <label for="psw"><b>Número MPPS</b></label><span class="badge-warning">*</span>
    <input type="text" maxlength="6" value="<?php echo $d->numpps; ?>" name="numps" required>


    <hr>
   
    <button type="submit" name="upd_doctor" class="registerbtn">Guardar</button>
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


    <!-- NAVBAR -->
    
    <script src="../../backend/js/script.js"></script>
    <script src="../../backend/js/multistep.js"></script>
    <script src="../../backend/js/laboratory.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include_once '../../backend/php/upd_doctor.php' ?>

   
   
</body>
</html>


