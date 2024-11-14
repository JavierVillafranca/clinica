<?php 
include_once '../backend/php/login.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>La Cruz</title>
    
    <link rel="stylesheet" href="../backend/css/style.css" />
    <link rel="icon" type="image/png" sizes="96x96" href="img/cm2.png">
    <style>
        /* Estilos del pop-up */
        .popup {
            display: none; /* Oculto por defecto */
            position: fixed;
            z-index: 1000;
            right: 20px; /* Espacio desde el lado derecho */
            bottom: 20px; /* Espacio desde la parte inferior */
            width: auto; /* Ancho automático */
            max-width: 300px; /* Ancho máximo del pop-up */
          
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border: 2px solid #00457c;
            text-align: center;
            
        }

        .popup-content h2{
          font-size: 21px;
          margin-bottom: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="heading">
            <img src="img/cm5.png" alt="" style="width:300px; height:250px; margin:-50px 0;">
        </h1>
        <?php 
        if (isset($errMsg)) {
            echo '<div style="color:#FF0000;text-align:center;font-size:20px; font-weight:bold;">'.$errMsg.'</div>';
        }
        ?>
        <form action="" method="POST" autocomplete="off">
            <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" class="form-input span-2" placeholder="Nombre de usuario" />
            <input type="password" required="true" name="password" value="<?php if(isset($_POST['password']) && isset($errMsg)) echo '' ?>" class="form-input span-2" id='passw' placeholder="Contraseña" />
            <button class="btn submit-btn span-2" name='login' type="submit">Iniciar sesión</button>
        </form>
    </div>

    <!-- Pop-Up de Inicio de Sesión -->
    <div id="loginPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Datos</h2>
            <p>Usuario: admin</p>
           <p>Usuario: recepcion</p>  
            <p>Usuario: medicoedgar</p>

            <p>Contraseña: 11111</p>
        </div>
    </div>

    <script>
        function openPopup() {
            document.getElementById("loginPopup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("loginPopup").style.display = "none";
        }

        // Mostrar el pop-up al cargar la página
        window.onload = function() {
            openPopup();
        }
    </script>
</body>
</html>
