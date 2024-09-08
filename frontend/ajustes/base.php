<?php
// Configuración de la base de datos
$db_host = 'localhost'; // Host del Servidor MySQL
$db_name = 'citas_medicas'; // Nombre de la Base de datos
$db_user = 'root'; // Usuario de MySQL
$db_pass = ''; // Contraseña de Usuario MySQL

$fecha = date("Ymd-His"); // Obtenemos la fecha y hora para identificar el respaldo

// Construimos el nombre de archivo SQL Ejemplo: mibase_20170101-081120.sql
$salidasql = $db_name.'_'.$fecha.'.sql';

// Ruta donde guardar el archivo SQL
$backupPath = "C:\\xampp\\htdocs\\la_cruz\\backend\\backup\\{$salidasql}";

// Comando para generar respaldo de MySQL
$command = "mysqldump -h localhost -u root citas_medicas > {$backupPath}";

// Ejecutar el comando
exec($command);

// Verificar si se creó el respaldo
if (file_exists($backupPath)) {
    // Redireccionar a mostrar.php con un mensaje en la URL
    header("Location: mostrar.php");
  } else {
    // Redireccionar a mostrar.php con un mensaje en la URL
    header("Location: mostrar.php");
  }
  ?>



