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
       
 <div class="input-block">
    
           <?php
    require_once('../../backend/bd/Conexion.php');
        $user_id = $_SESSION['id'];
      $cart_grand_total = 0;
      $select_cart_items = $connect->prepare("SELECT cart.idv, users.id, users.username, users.name,product.nompro, product.idprcd, product.codpro, product.preprd, product.stock, cart.name, cart.price, cart.quantity FROM cart  INNER JOIN users ON cart.user_id = users.id INNER JOIN product ON cart.idprcd = product.idprcd WHERE user_id = ?");
      $select_cart_items->execute([$user_id]);
      if($select_cart_items->rowCount() > 0){
         while($fetch_cart_items = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
            $cart_total_price = ($fetch_cart_items['preprd'] * $fetch_cart_items['quantity']);
            $cart_grand_total += $cart_total_price;
   ?>
   <p> <?= $fetch_cart_items['name']; ?> <span>(<?= ''.$fetch_cart_items['preprd'].'$ x '. $fetch_cart_items['quantity']; ?>)</span> </p>
   <?php
    }
   }else{
      echo '<p class="empty"><p class="alert alert-warning">Tu carrito esta vació</p></p>';

   }
   ?>
   <div class="grand-total">Precio Total : <span><?php echo number_format($cart_grand_total, 2); ?>$</span></div>
   
 </div>          
<form action="" enctype="multipart/form-data" method="POST"  autocomplete="off" onsubmit="return validacion()">
  <div class="containerss">
    <h1>Finalizar compra</h1>
   
    <div class="alert-danger">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Importante!</strong> Es importante rellenar los campos con &nbsp;<span class="badge-warning">*</span>
</div>
    <hr>
    <br>
    <label for="email"><b>Nombres y apellidos del cliente</b></label><span class="badge-warning">*</span>
    <input type="text"  name="nomcl" placeholder="ejm: Jesús Perez Martinez" required>
    <input type="hidden" name="pdrus" value="<?php echo $_SESSION['id']; ?>">
    

    <label for="psw"><b>Comprobante de pago</b></label><span class="badge-warning">*</span>
    <select required name="cxcom" id="cat">
        <option value="Boleta">Boleta</option>
       
    </select>

    <label for="psw"><b>Método de pago</b></label><span class="badge-warning">*</span>
        <select required name="cxtcre" id="cat">
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta">Tarjeta</option>
        </select>


    <hr>
   
    <button type="submit" id="validate"  name="order" class="registerbtn <?= ($cart_grand_total > 1)?'':'disabled'; ?>">Guardar</button>
    <button onclick="location.href='cart.php'" class="pabtn ">Cancelar</button>
  </div>
  
</form>

<?php
// Resto del código...

if(isset($_POST['order'])) {
    // Obtener los valores enviados a través del formulario
    $userId = $_POST['pdrus'];

    // Obtener los detalles de la orden desde la base de datos
    $selectCartItems = $connect->prepare("SELECT cart.idv, product.idprcd, cart.quantity FROM cart INNER JOIN product ON cart.idprcd = product.idprcd WHERE user_id = ?");
    $selectCartItems->execute([$userId]);

    // Actualizar el stock de cada medicina en la base de datos
    while($fetchCartItems = $selectCartItems->fetch(PDO::FETCH_ASSOC)){
        $productId = $fetchCartItems['idprcd'];
        $quantity = $fetchCartItems['quantity'];

        // Ejemplo de consulta SQL UPDATE
        $updateStockQuery = $connect->prepare("UPDATE product SET stock = stock - :quantity WHERE idprcd = :productId");
        $updateStockQuery->bindParam(':quantity', $quantity);
        $updateStockQuery->bindParam(':productId', $productId);
        $updateStockQuery->execute();
    }

    // Redirigir o mostrar un mensaje de éxito al usuario después de actualizar el stock
}
?>


        </main>
        <!-- MAIN -->
    </section>
    
    <!-- NAVBAR -->
    <script src="../../backend/js/jquery.min.js"></script>
   
    <script src="../../backend/js/script.js"></script>
    <script src="../../backend/js/patiens.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php
    include_once '../../backend/php/add_check.php'
?>
    <script>
$('#validate').click(function() {

    if ($('#cxtcre').val().trim() === '') {
        
        swal("Debe seleccionar una opción");

    } else {
       swal("Campos correctos");
    }
});
</script>

</body>
</html>


