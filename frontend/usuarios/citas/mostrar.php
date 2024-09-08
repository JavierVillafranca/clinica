<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 3){
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
                <a href="#" class="active"><i class='bx bxs-book-alt icon' ></i> Citas <i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="mostrar.php">Lista de citas</a></li>
                    <li><a href="calendario.php">Calendario</a></li>
                   
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
                <a href="#"><i class='bx bxs-spray-can icon' ></i> Medicina<i class='bx bx-chevron-right icon-right' ></i></a>
                <ul class="side-dropdown">
                    <li><a href="../venta.php">Vender</a></li>
                    <li><a href="../mostrar.php">Listado</a></li>
                    <li><a href="../categoria.php">Categoria</a></li>
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
         
            
          <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Citas</h3>
                      

                    </div>
                   <div class="table-responsive" style="overflow-x:auto;">
                       <?php 
require '../../../backend/bd/Conexion.php';
$sentencia = $connect->prepare("SELECT events.id, events.title, patients.idpa, patients.numhs,patients.nompa, patients.apepa, doctor.idodc, doctor.ceddoc, doctor.nodoc, doctor.apdoc, laboratory.idlab, laboratory.nomlab, events.start, events.end, events.color, events.state,events.monto FROM events INNER JOIN patients ON events.idpa = patients.idpa INNER JOIN doctor ON events.idodc = doctor.idodc INNER JOIN laboratory ON events.idlab = laboratory.idlab INNER JOIN users ON doctor.userid=users.id WHERE doctor.userid = $id;");
 $sentencia->execute();
$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
     ?>
     <?php if(count($data)>0):?>
         <table id="example" class="responsive-table">
            <thead>
                <tr>
                    <th scope="col">Pacientes</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $d):?>
                    <tr>
                        <th scope="row"><?php echo $d->nompa ?>&nbsp;<?php echo $d->apepa ?></th>
                        <td data-title="Cita"><?php echo $d->title ?></td>
                        <td data-title="Fecha inicio"><?php echo $d->start ?></td>
                        <td data-title="Estado">

                        <label class="switch">
  <input type="checkbox" id="<?=$d->id?>" value="<?=$d->state ?>" <?=$d->state == '1' ? 'checked' : '' ;?> onclick="checkSwitch(this)"/>
  <span class="slider"></span>
</label>

<script>
  function checkSwitch(checkbox) {
    if (checkbox.checked) {
      alert("No puedes habilitar una cita cancelada, comunicarselo a recepcion o al administrador");
        checkbox.checked = false;
    }
    else{
        alert("No puedes cancelar una cita, comunicarselo a recepcion o al administrador");
        checkbox.checked = true;
    }
  }
</script>







    

                        <td data-title="Acciones">        

                            <a title="Información" href="../citas/info.php?id=<?php echo $d->id ?>" class="fa fa-info"></a>
                            <input type='hidden' name='idcita' value="<?php echo  $d->idcita; ?>">
                            
                            <?php 
                                echo '<a title="Actualizar" href="editar.php?id='.$d->id. '" class="fa fa-pencil tooltip"></a>';
                                echo ' ';
                                echo '<a title="Boleta"  href="documento.php?id='.$d->id.'" class="fa fa-file-text-o"></a>';                      
                            ?>
                             <a title="Documentos" href="documentos_nuevo.php?id=<?php echo $d->idpa ?>" class="bx bx-archive-in" ></a>

                            <br>


                        </td>
                    </tr>

                    <?php endforeach; ?>
            </tbody>
         </table> 
         <?php else:?>
  
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      No hay citas agendadas.
    </div>
    <?php endif; ?>
                    </div>
                </div>
            </div>  

        </main>
        <!-- MAIN -->
    </section>
    
    <!-- NAVBAR -->
    <script src="../../../backend/js/jquery.min.js"></script>
    
    <script src="../../../backend/js/script.js"></script>
    
    <!-- Data Tables -->
    <script type="text/javascript" src="../../../backend/js/datatable.js"></script>
    <script type="text/javascript" src="../../../backend/js/datatablebuttons.js"></script>
    <script type="text/javascript" src="../../../backend/js/jszip.js"></script>
    <script type="text/javascript" src="../../../backend/js/pdfmake.js"></script>
    <script type="text/javascript" src="../../../backend/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../../backend/js/buttonshtml5.js"></script>
    <script type="text/javascript" src="../../../backend/js/buttonsprint.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'pdf', 'print'
        ]
    } );
} );
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 
</body>
</html>


