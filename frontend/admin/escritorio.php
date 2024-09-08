<?php
ob_start();
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../login.php');
    exit;
}

$id = $_SESSION['id'];
?>
<?php
require_once('../../backend/bd/Conexion.php');
$req = $connect->prepare("SELECT id, title, start, end, color FROM events WHERE state=1");
$req->execute();
$events = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../backend/css/admin.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../img/cm2.png">
    
    <link rel="stylesheet" href="../../backend/vendor/datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="../../backend/vendor/datatables/dataTables.bs4-custom.css" />
    <link href="../../backend/vendor/datatables/buttons.bs.css" rel="stylesheet" />


    <link href='../../backend/css/fullcalendar.css' rel='stylesheet' />
    <style type="text/css">
        #calendar {
            max-width: 800px;
        }

        .col-centered {
            float: none;
            margin: 0 auto;
        }
    </style>

    <title>La Cruz</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="escritorio.php" class="brand"> <img src="../img/cm1.png" alt="" style="width:220px; height:180px;"> </a>
        <ul class="side-menu">
            <li><a href="escritorio.php" class="active"><i class='bx bxs-dashboard icon'></i>Inicio</a></li>
            <li class="divider" data-text="Menú">Menú</li>
            <li>
                <a href="#"><i class='bx bxs-book-alt icon'></i> Citas <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="../citas/mostrar.php">Lista de citas</a></li>
                    <li><a href="../citas/nuevo.php">Nueva</a></li>
                    <li><a href="../citas/calendario.php">Calendario</a></li>

                </ul>
            </li>

            <li>
                <a href="#"><i class='bx bxs-user icon'></i> Pacientes <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="../pacientes/mostrar.php">Lista de pacientes</a></li>
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
                <a href="#"><i class='bx bxs-spray-can icon'></i> Medicina<i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="../medicinas/venta.php">Vender</a></li>
                    <li><a href="../medicinas/mostrar.php">Listado</a></li>
                    <li><a href="../medicinas/nuevo.php">Nueva</a></li>
                    <li><a href="../medicinas/categoria.php">Categoria</a></li>
                    <li><a href="../medicinas/historial.php">Historial</a></li>

                </ul>
            </li>

            <li>
                
                <a href="#"><i class='bx bxs-cog icon'></i> Ajustes<i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">

                    <li><a href="../ajustes/mostrar.php">Ajustes</a></li>

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

                    <li><a href="../profile/mostrar.php?id=<?php echo $id ?>"><i class='bx bxs-user-circle icon'></i> Mi Perfil</a></li>

                    <li>
                        <a href="../salir.php"><i class='bx bxs-log-out-circle'></i>Cerrar Sesión</a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <h1 class="title">Bienvenido <?php echo '<strong>' . $_SESSION['name'] . '</strong>'; ?></h1>
            
            <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>

                            <?php
                            $sql = "SELECT COUNT(*) total FROM patients";
                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                            $total = $result->fetchColumn();

                            ?>
                            <h2><?php echo  $total; ?></h2>
                            <p>Pacientes</p>
                        </div>
                        <i class='bx bx-user icon'></i>
                    </div>

                </div>
                <div class="card">
                    <div class="head">
                        <div>

                            <?php
                            $sql = "SELECT COUNT(*) total FROM doctor";
                            $result = $connect->query($sql);
                            $total = $result->fetchColumn();

                            ?>
                            <h2><?php echo  $total; ?></h2>
                            <p>Medicos</p>
                        </div>
                        <i class='bx bx-briefcase icon'></i>
                    </div>

                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <?php
                            $sql = "SELECT COUNT(*) total FROM users";
                            $result = $connect->query($sql); 
                            $total = $result->fetchColumn();

                            ?>
                            <h2><?php echo  $total; ?></h2>
                            <p>Usuarios</p>
                        </div>
                        <i class='bx bx-user-circle icon'></i>
                    </div>

                </div>


            </div>
            </div>
            <div class="data">
                <div class="content-data">
                    <div class="table-responsive" style="overflow-x:auto;">
                        <?php

                        $sentencia = $connect->prepare("SELECT * FROM doctor INNER JOIN laboratory  ON doctor.id_especialidad = laboratory.idlab ORDER BY idodc DESC LIMIT 6;");
                        $sentencia->execute();
                        $data =  array();
                        if ($sentencia) {
                            while ($r = $sentencia->fetchObject()) {
                                $data[] = $r;
                            }
                        }
                        ?>
                        <?php if (count($data) > 0) : ?>
                            <table id="example" class="responsive-table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;">Nuevos médicos</th>
                                        <th scope="col" style="text-align: center;">Especialidad</th>

                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach ($data as $d) : ?>
                                        <tr>

                                            <td data-title="Paciente"><?php echo $d->nodoc ?>&nbsp;<?php echo $d->apdoc ?></td>
                                            <td data-title="Especialidad"><?php echo $d->nomlab ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>

                            <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                No hay Medicos agregados.
                            </div>
                        <?php endif; ?>


                    </div>

                </div>

                <div class="content-data">

                    <div class="table-responsive" style="overflow-x:auto;">
                        <?php

                        $sentencia = $connect->prepare("SELECT * FROM patients ORDER BY idpa DESC LIMIT 6;");
                        $sentencia->execute();
                        $data =  array();
                        if ($sentencia) {
                            while ($r = $sentencia->fetchObject()) {
                                $data[] = $r;
                            }
                        }
                        ?>
                        <?php if (count($data) > 0) : ?>
                            <table id="example" class="responsive-table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;">Nuevos pacientes</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $d) : ?>
                                        <tr>

                                            <td data-title="Paciente"><?php echo $d->nompa ?>&nbsp;<?php echo $d->apepa ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>

                            <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                No hay Pacientes agregados.
                            </div>
                        <?php endif; ?>


                    </div>
                </div>
            </div>

            <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Calendario</h3>

                    </div>
                    <div id="calendar" class="col-centered">

                    </div>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- NAVBAR -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../backend/js/script.js"></script>

    <script src="../../backend/vendor/datatables/dataTables.min.js"></script>
    <script src="../../backend/vendor/datatables/dataTables.bootstrap.min.js"></script>

    <script src="../../backend/vendor/datatables/custom/custom-datatables.js"></script>
    <script src="../../backend/vendor/datatables/custom/fixedHeader.js"></script>

    <script src='../../backend/js/moment.min.js'></script>
    <script src='../../backend/js/fullcalendar/fullcalendar.min.js'></script>
    <script src='../../backend/js/fullcalendar/fullcalendar.js'></script>
    <script src='../../backend/js/fullcalendar/locale/es.js'></script>

    <script>
        $(document).ready(function() {

            var date = new Date();
            var yyyy = date.getFullYear().toString();
            var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString();
            var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString();

            $('#calendar').fullCalendar({
                header: {
                    language: 'es',
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay',

                },
                defaultDate: yyyy + "-" + mm + "-" + dd,
                editable: true,
                eventLimit: true,
                selectable: true,
                selectHelper: true,
                select: function(start, end) {

                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');
                },
                eventRender: function(event, element) {
                    element.bind('dblclick', function() {
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #color').val(event.color);
                        $('#ModalEdit').modal('show');
                    });
                },
                eventDrop: function(event, delta, revertFunc) { 

                    edit(event);

                },
                eventResize: function(event, dayDelta, minuteDelta, revertFunc) { 

                    edit(event);

                },
                events: [
                    <?php foreach ($events as $event) :

                        $start = explode(" ", $event['start']);
                        $end = explode(" ", $event['end']);
                        if ($start[1] == '00:00:00') {
                            $start = $start[0];
                        } else {
                            $start = $event['start'];
                        }
                        if ($end[1] == '00:00:00') {
                            $end = $end[0];
                        } else {
                            $end = $event['end'];
                        }
                    ?> {
                            id: '<?php echo $event['id']; ?>',
                            title: '<?php echo $event['title']; ?>',
                            start: '<?php echo $start; ?>',
                            end: '<?php echo $end; ?>',
                            color: '<?php echo $event['color']; ?>',
                        },
                    <?php endforeach; ?>
                ]
            });



        });
    </script>
</body>

</html>