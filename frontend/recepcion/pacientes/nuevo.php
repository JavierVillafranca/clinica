<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 2){
    header('location: ../../login.php');

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

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="../../../backend/css/datatable.css">
    <link rel="stylesheet" type="text/css" href="../../../backend/css/buttonsdataTables.css">
    <link rel="stylesheet" type="text/css" href="../../../backend/css/font.css">




    <title>La Cruz</title>
</head>
<body>
    
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="../escritorio.php" class="brand"><img src="../../img/cm1.png" alt="" style="width:220px; height:180px;"> </a>
        <ul class="side-menu">
            <li><a href="../escritorio.php" ><i class='bx bxs-dashboard icon' ></i>Inicio</a></li>
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
                    <li><a href="mostrar.php" >Lista de pacientes</a></li>
                    <li><a href="nuevo.php">Nuevo paciente</a></li>
                   
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
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                </div>
            </form>
            
           
            <span class="divider"></span>
            <div class="profile">
            <img src="../../img/cm4.png" alt="">
                <ul class="profile-link">
                <li><a href="../profile/mostrar.php?id=<?php echo $id ?>"><i class='bx bxs-user-circle icon' ></i>Mi Perfil</a></li>
                    
                    <li>
                     <a href="../../salir.php"><i class='bx bxs-log-out-circle' ></i>Cerrar Sesión</a>
                    </li>
                   
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->

        <main>
           
           <!-- multistep form -->


<form action="" enctype="multipart/form-data" method="POST"  autocomplete="off" onsubmit="return validacion()">
  <div class="containerss">
    <h1>Nuevos pacientes</h1>
    <div class="alert-danger">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Importante!</strong> Es importante rellenar los campos con &nbsp;<span class="badge-warning">*</span>
</div>
    <hr>

    <label for="psw"><b>Nombre del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: Juan Raul" name="namp" required>

    <label for="psw"><b>Apellido del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: Ramirez Requena" name="apep" required>

    <label for="email"><b>Cedula del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: 22114578" name="nhi" maxlength="8" required>

    <label for="psw"><b>Fecha de nacimiento del paciente</b></label><span class="badge-warning">*</span>
    <input type="date" name="cump" required>

    <label for="psw"><b>Lugar de nacimiento del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: centro medico la cruz" name="lugn" required>

    <label for="psw"><b>Dirección del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: calle los medanos" name="dip" required>

    <label for="psw"><b>Género del paciente</b></label><span class="badge-warning">*</span>
    <select required name="gep" id="gep">
    <option disabled selected value="">Seleccione</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>

    <label for="psw"><b>Grupo sanguíneo del paciente</b></label><span class="badge-warning">*</span>
    <select required name="grp" id="grp">
    <option disabled selected value="">Seleccione</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>

    <label for="psw"><b>Teléfono del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" maxlength="13" placeholder="ejm: 04145678957" name="telp" required>

    <label for="psw"><b>Ocupacion del paciente</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="ejm: Ingeniero" name="ocupa" required>

    <hr>
   
    <button type="submit" name="add_patiens" class="registerbtn">Guardar</button>
  </div>
  
</form>

        </main>
        <!-- MAIN -->
    </section>
    <script src="../../../backend/js/jquery.min.js"></script>
    <script src="../../../backend/js/script.js"></script>


    <!-- NAVBAR -->
    
    <script src="../../../backend/js/multistep.js"></script>
    <script src="../../../backend/js/vpat.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include_once '../../../backend/php/add_patiens2.php' ?>
   
</body>
</html>


