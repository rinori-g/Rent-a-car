<?php 
include_once('includes/sqlFunctions.php'); 

function fshijKategori(){
    $kategoriaid = $_POST['kategoriaid'];
    $dbcon = connection();
    $sql = "DELETE FROM kategorite WHERE kategoriaid = $kategoriaid";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header("Location: kategorite.php");
    }
}

fshijKategori();

?>


