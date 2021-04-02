<?php 
include_once('includes/sqlFunctions.php'); 

function fshijAutomjetin(){
    $automjetiid = $_POST['automjetiid'];
    $dbcon = connection();
    $sql = "DELETE FROM automjetet WHERE automjetiid = $automjetiid";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header("Location: automjetet.php");
    }
}

fshijAutomjetin();

?>
