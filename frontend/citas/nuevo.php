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
                <a href="#" class="active"><i class='bx bxs-book-alt icon' ></i> Citas <i class='bx bx-chevron-right icon-right' ></i></a>
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


<form action="" enctype="multipart/form-data" method="POST"  autocomplete="off">
  <div class="containerss">
    <h1>Nueva cita</h1>
   
    <div class="alert-danger">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Importante!</strong> Es importante rellenar los campos con &nbsp;<span class="badge-warning">*</span><br>
 
</div>
    <hr>
<br>
    <label for="psw"><b>Motivo de consulta</b></label><span class="badge-warning">*</span>
    <textarea name="appnam" style="height:180px" required> </textarea>
      
    <label for="psw"><b>Cédula del paciente</b></label><span class="badge-warning">*</span>
    <br><br>
    <select required name="apppac" id="pati">
    </select>

    <br><br>

    <label for="psw"><b>Nombre del médico</b></label><span class="badge-warning">*</span>
    <br><br>
    <select required name="appdoc" id="doc">
    </select>


    <select  name="applab" id="spe" style="display: none;">
    </select>
    

    <br><br><label for="psw"><b>Fecha inicial</b></label><span class="badge-warning">*</span>
    <input type="datetime-local"  name="appini"required>

    <label for="psw"><b>Fecha final</b></label><span class="badge-warning">*</span>
    <input type="datetime-local"  name="appfin"required>

    <label for="psw"><b>Color</b></label><span class="badge-warning">*</span>
    <select required name="appco" id="gep" onchange="updateColor(this)">
        <option disabled selected value="">Seleccione</option>
        <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
        <option style="color:#0000FF;" value="#0000FF">&#9724; Azul</option>
        <option style="color:#00FF00;" value="#00FF00">&#9724; Verde</option>
        <option style="color:#FF00FF;" value="#FF00FF">&#9724; Magenta</option>
        <option style="color:#00FFFF;" value="#00FFFF">&#9724; Azul claro</option>
        <option style="color:#8800FF;" value="#8800FF">&#9724; Violeta</option>
        <option style="color:#FF4500;" value="#FF4500">&#9724; Anaranjado</option>
        <option style="color:#FFFF00;" value="#FFFF00">&#9724; Amarillo</option>

        </select>

        <script>
function updateColor(select) {
    var selectedColor = select.options[select.selectedIndex].style.color;
    select.style.color = selectedColor;
}
</script>

    <label for="psw"><b>Monto a pagar</b></label><span class="badge-warning">*</span>
    <input type="text" placeholder="0$" name="appmont" required>

    <hr>
   
    <button type="submit" name="add_appointment" class="registerbtn">Guardar</button>
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
    <script src="../../backend/js/patiens.js"></script>
    <script src="../../backend/js/doctor.js"></script>
    <script src="../../backend/js/laboratory.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
     <?php include_once '../../backend/php/add_appointment.php' ?>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script>
// Aplicar Select2 al campo de selección
$(document).ready(function() {
  $('#pati').select2();
});

$(document).ready(function() {
  $('#doc').select2();
});



</script>
   
</body>
</html>


