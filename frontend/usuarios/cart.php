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
          
         
          <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3> Finalizar pago de medicinas</h3>
                      

                    </div>
                   <div class="table-responsive" style="overflow-x:auto;">
                       
         <table id="example" class="responsive-table">
            <thead>
                <tr>

                    <th scope="col">Código</th>
                    <th scope="col">Medicinas</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col"></th>
                   
                </tr>
            </thead>
            <tbody>
                <?php 
require '../../backend/bd/Conexion.php';
$grand_total = 0;
$select_cart = $connect->prepare("SELECT cart.idv, users.id, users.username, users.name,product.nompro, product.idprcd, product.codpro, product.preprd, product.stock, cart.name, cart.price, cart.quantity FROM cart  INNER JOIN users ON cart.user_id = users.id INNER JOIN product ON cart.idprcd = product.idprcd ;");
 $select_cart->execute();
 if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){ 
     ?>
   
            
                    <tr>
                        <th scope="row"><?= $fetch_cart['codpro']; ?></th>
                        <td data-title="Medicinas"><?= $fetch_cart['nompro']; ?></td>
                        <td data-title="Precio"><?= $fetch_cart['preprd']; ?>$</td>
                        <td data-title="Stock"><?= $fetch_cart['stock']; ?></td>
                        <td data-title="Cantidad">
                         <form action="" method="POST">
                  <div class="form-group">
                     <input type="hidden" name="prdt" value="<?= $fetch_cart['idv']; ?>">
                       <input type="number" name="p_qty" value="<?= $fetch_cart['quantity']; ?>" style="width:100px;" min="1" max="99" class="form-control" placeholder="Cantidad">
                     </div>
                <button type="submit" name="update_qty" class="btn btn-primary" style="cursor: pointer;"> <i class="fa fa-refresh"></i></button>
               </form>   
                        </td>
            <td data-title="Subtotal"><?= $sub_total = ($fetch_cart['preprd'] * $fetch_cart['quantity']); ?>$</td>

                        <td style="width:260px;">
            <a title="Eliminar" onclick="return confirm('Eliminar del carrito?');" href="eliminar.php?id=<?= $fetch_cart['idv']; ?>" class="fa fa-trash"></a>                            
                        </td>
            
                    </tr>
                   <?php
      $grand_total += $sub_total;
      }
   }else{
      echo '<p class="alert alert-warning">Tu carrito esta vació</p>';
   }
   ?>
            </tbody>
         </table> 
           <h1 style="font-size:42px; color:#000000;">Precio Total: <?php echo number_format($grand_total, 2); ?>$
        
                    </div>
                    <div>
                        <button  onclick="location.href='new_sale.php'" class="registerbtn">CONTINUAR COMPRANDO </button>
                       
                        <button class="pabtn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="location.href='checkout.php'">PRECEDER PAGO</button>
                    </div>
                </div>
            </div>  

        </main>
        <!-- MAIN -->
    </section>
    
    <!-- NAVBAR -->
    <script src="../../backend/js/jquery.min.js"></script>
    
    <script src="../../backend/js/script.js"></script>
    
    <!-- Data Tables -->
    <script type="text/javascript" src="../../backend/js/datatable.js"></script>
    <script type="text/javascript" src="../../backend/js/datatablebuttons.js"></script>
    <script type="text/javascript" src="../../backend/js/jszip.js"></script>
    <script type="text/javascript" src="../../backend/js/pdfmake.js"></script>
    <script type="text/javascript" src="../../backend/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../backend/js/buttonshtml5.js"></script>
    <script type="text/javascript" src="../../backend/js/buttonsprint.js"></script>
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
<?php include_once '../../backend/php/upd_cart.php' ?>
</body>
</html>


