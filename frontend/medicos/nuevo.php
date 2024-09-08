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
         
<form action="" enctype="multipart/form-data" method="POST"  autocomplete="off" onsubmit="return validacion()">
  <div class="containerss">
    <h1>Nuevo médico</h1>
    <div class="alert-danger">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Importante!</strong> Es importante rellenar los campos con &nbsp;<span class="badge-warning">*</span>
</div>
    <hr>

    <label for="psw"><b>Nombre del médico</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: Juan Jose" name="named" required>

    <label for="psw"><b>Apellido del médico</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: Ramirez" name="apeme" required>

    <label for="psw"><b>Cédula del médico</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: 9741478" name="cem" maxlength="8" required>

    <label for="psw"><b>Dirección del médico</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: calle bolivar" name="dime" required>

    <label for="psw"><b>Género del médico</b></label><span class="badge-warning">*</span>
    <select required name="geme" id="gep">
    <option disabled selected>Seleccione</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>

    <label for="psw"><b>Especialidad del médico</b></label><span class="badge-warning">*</span>
    <select required name="espm" id="lab">
    </select>


    <label for="psw"><b>Teléfono del médico</b></label><span class="badge-warning">*</span>
    <input type="text" maxlength="13" placeholder="ejm: 04147415894 " name="telme" required>

    <label for="psw"><b>Fecha de nacimiento del médico</b></label><span class="badge-warning">*</span>
    <input type="date" name="cumme" required>

    <label for="psw"><b>Número de colegio</b></label><span class="badge-warning">*</span>
    <input type="text" maxlength="6" placeholder="" name="numcol" required>

    <label for="psw"><b>Número MPPS</b></label><span class="badge-warning">*</span>
    <input type="text" maxlength="6" placeholder="" name="numps" required>

    <hr>
   
    <button type="submit" name="add_doctor" class="registerbtn">Guardar</button>
  </div>
  
</form>

        </main>
        <!-- MAIN -->
    </section>
    <script src="../../backend/js/jquery.min.js"></script>


    <!-- NAVBAR -->
    
    <script src="../../backend/js/script.js"></script>
    <script src="../../backend/js/multistep.js"></script>
    <script src="../../backend/js/vpat.js"></script>
    <script src="../../backend/js/laboratory.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include_once '../../backend/php/add_doctor.php' ?>
</body>
</html>


