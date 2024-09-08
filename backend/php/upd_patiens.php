<?php  
if(isset($_POST['upd_patiens']))
{
    $idpa = $_POST['pid'];
    $numhs=trim($_POST['nhi']);
    $nompa=trim($_POST['namp']);
    $apepa=trim($_POST['apep']);
    $lugna=trim($_POST['lugn']);
    $direc=trim($_POST['dip']);
    $sex=trim($_POST['gep']);
    $grup=trim($_POST['grp']);
    $phon=trim($_POST['telp']);
    $ocup=trim($_POST['ocupa']);
    $cump=trim($_POST['cump']);

    try {

        $query = "UPDATE patients SET numhs=:numhs, nompa=:nompa, apepa=:apepa,lugna=:lugna,direc=:direc,sex=:sex,grup=:grup,phon=:phon,ocup=:ocup, cump=:cump WHERE idpa=:idpa LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':numhs' => $numhs,
            ':nompa' => $nompa,
            ':apepa' => $apepa,
            ':lugna' => $lugna,
            ':direc' => $direc,
            ':sex' => $sex,
            ':grup' => $grup,
            ':phon' => $phon,
            ':ocup' => $ocup,
            ':cump' => $cump,
            ':idpa' => $idpa
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



