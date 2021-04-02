<?php 
include_once('includes/sqlFunctions.php'); 

function fshijKlientin(){
    $klientiid = $_POST['klientiid'];
    $dbcon = connection();
    $sql = "DELETE FROM klientet WHERE klientiid = $klientiid";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header("Location: klientet.php");
    }
}

fshijKlientin();

?>


