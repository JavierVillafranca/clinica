<?php 
    require '../backend/bd/Conexion.php';

    if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $username = $_POST['username'];
    
    $password = MD5($_POST['password']);

    if($username == '')
      $errMsg = 'Digite su usuario';
    if($password == '')
      $errMsg = 'Digite su contraseña';

    if($errMsg == '') {
      try {
$stmt = $connect->prepare('SELECT id, username, name, password, rol FROM users WHERE username = :username');


        $stmt->execute(array(
          ':username' => $username
          
          
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "El usuario: $username no se encuentra , puede solicitarlo con el administrador.";
        }
        else {
          if($password == $data['password']) {

            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['rol'] = $data['rol'];
           
            
            
          if($_SESSION['rol'] == 1){
                header('Location: admin/escritorio.php');
              }
          elseif($_SESSION['rol'] == 2){
                header('Location: recepcion/escritorio.php');
              } 
          elseif($_SESSION['rol'] == 3){
                header('Location: usuarios/escritorio.php');
              }     
                  exit;
                }
                else
                  $errMsg = 'Contraseña incorrecta';
                  echo '<script>';
                  echo 'document.getElementByClass("form-input span-2").value = "";';
                  echo '</script>';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
 ?>