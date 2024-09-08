<?php  
if(isset($_POST['upd_doctor']))
{
    $idodc = $_POST['midp'];
    $ceddoc=trim($_POST['cem']);
    $nodoc=trim($_POST['named']);
    $apdoc=trim($_POST['apeme']);
    $id_especialidad=trim($_POST['espm']);
    $direcd=trim($_POST['dime']);
    $sexd=trim($_POST['geme']);
    $phd=trim($_POST['telme']);
    $nacd=trim($_POST['cumme']);
    $numco=trim($_POST['numcol']);
    $numpps=trim($_POST['numps']);


    try {

        $query = "UPDATE doctor SET ceddoc=:ceddoc,nodoc=:nodoc,apdoc=:apdoc,id_especialidad=:id_especialidad,direcd=:direcd,sexd=:sexd,phd=:phd,nacd=:nacd,numco=:numco,numpps=:numpps  WHERE idodc=:idodc LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':ceddoc' => $ceddoc,
            ':nodoc' => $nodoc,
            ':apdoc' => $apdoc,
            ':id_especialidad' => $id_especialidad,
            ':direcd' => $direcd,
            ':sexd' => $sexd,
            ':phd' => $phd,
            ':nacd' => $nacd,
            ':idodc' => $idodc,
            ':numco' => $numco,
            ':numpps' => $numpps

        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error", "success").then(function() {
            window.location = "mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
?>



