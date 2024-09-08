<?php
// Ruta de la carpeta de respaldo
$backupFolder = "C:\\xampp\\htdocs\\la_cruz\\backend\\backup\\";

// Obtener la lista de archivos en la carpeta de respaldo
$files = scandir($backupFolder);

// Eliminar los archivos "." y ".." de la lista
$files = array_diff($files, array('.', '..'));

// Ordenar los archivos por fecha de modificación (el más reciente primero)
usort($files, function($a, $b) use ($backupFolder) {
    return filemtime($backupFolder . $b) - filemtime($backupFolder . $a);
});

// Seleccionar el archivo más reciente
$latestFile = $backupFolder . reset($files);

// Comando para importar la base de datos utilizando el archivo seleccionado
$command = "mysql -h localhost -u root citas_medicas < {$latestFile}";

// Ejecutar el comando
exec($command, $output, $return_var);

// Verificar si se realizó la importación correctamente
if ($return_var === 0) {
    // Mostrar mensaje de éxito
    header("Location: mostrar.php");
  } else {
    // Redireccionar a mostrar.php con un mensaje en la URL
    header("Location: mostrar.php");
}
?>

