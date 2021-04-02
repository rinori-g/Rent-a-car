<?php 

global $dbcon;
function connection(){
    $dbcon = mysqli_connect('localhost','root','','rentacardb');
    if(!$dbcon){
        die(mysqli_error($dbcon));
    }
    return $dbcon;
}
connection();

function merr5KlientetEFundit(){
    $dbcon = connection();
    $sql = "SELECT * FROM klientet ORDER BY klientiid DESC limit 5";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function merrKlientet(){
    $dbcon = connection();
    $sql = "SELECT * FROM klientet";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function shtoKlient($emri, $mbiemri, $email, $telefoni, $nr_personal, $adresa){
    $dbcon = connection();
    $sql = "INSERT INTO klientet(emri, mbiemri, email, nr_personal, telefoni, adresa, username, password)";
    $sql.="VALUES('$emri','$mbiemri','$email',$nr_personal, '$telefoni','$adresa','user','password')";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: klientet.php');
    }
}

function merrKlientinId($klientiid){
    $dbcon = connection();
    $sql = "SELECT * FROM klientet WHERE klientiid = $klientiid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function modifikoKlient($klientiid, $emri, $mbiemri, $email, $telefoni, $nr_personal, $adresa){
    $dbcon = connection();
    $sql = "UPDATE klientet SET emri = '$emri', mbiemri = '$mbiemri', email = '$email', telefoni = '$telefoni',
            nr_personal = $nr_personal, adresa = '$adresa' WHERE klientiid = $klientiid ";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: klientet.php');
    }
}
function merrKategoriId($kategoriaid){
    $dbcon = connection();
    $sql = "SELECT * FROM kategorite WHERE kategoriaid = $kategoriaid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}
function modifikoKategori($kategoriaid, $emri, $pershkrimi){
    $dbcon = connection();
    $sql = "UPDATE kategorite SET emri = '$emri', pershkrimi = '$pershkrimi' WHERE kategoriaid = $kategoriaid ";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: kategorite.php');
    }
}
function merrKategori(){
    $dbcon = connection();
    $sql = "SELECT * FROM kategorite";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function shtoKategori($emri, $pershkrimi){
    $dbcon = connection();
    $sql = "INSERT INTO kategorite(emri, pershkrimi) VALUES('$emri', '$pershkrimi')";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: kategorite.php');
    }
}
function merrAutomjetet(){
    $dbcon = connection();
    $sql = "SELECT a.*, k.emri as kategoria FROM automjetet a INNER JOIN kategorite k ON a.kategoriaid = k.kategoriaid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function shtoAutomjet($emri, $kategoriaid, $nr_regjistrimit, $pershkrimi, $kostoja){
    $dbcon = connection();
    $sql = "INSERT INTO automjetet(emri, kategoriaid, nr_regjistrimit, pershkrimi, kostoja) VALUES('$emri', $kategoriaid, '$nr_regjistrimit', '$pershkrimi', $kostoja)";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: automjetet.php');
    }
}
function merrAutomjetinId($automjetiid){
    $dbcon = connection();
    $sql = "SELECT * FROM automjetet WHERE automjetiid = $automjetiid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function modifikoAutomjet($automjetiid, $emri, $kategoriaid, $nr_regjistrimit, $pershkrimi, $kostoja){
    $dbcon = connection();
    $sql = "UPDATE automjetet SET emri = '$emri', kategoriaid = $kategoriaid, nr_regjistrimit = '$nr_regjistrimit', pershkrimi = '$pershkrimi', kostoja = $kostoja where automjetiid = $automjetiid" ;
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: automjetet.php');
    }
}

function register($emri, $mbiemri, $email, $telefoni, $nr_personal, $adresa, $username, $password){
    $dbcon = connection();
    $sql = "INSERT INTO klientet(emri, mbiemri, email, nr_personal, telefoni, adresa, username, password)";
    $sql.="VALUES('$emri','$mbiemri','$email',$nr_personal, '$telefoni','$adresa','$username','$password')";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: login.php');
    }
}

function login($username, $password){
    $dbcon = connection();
    $sql = "SELECT * FROM klientet WHERE username = '$username'";
    $result = mysqli_query($dbcon, $sql);
    if($result){
        if(mysqli_num_rows($result) == 1){
            $res = mysqli_fetch_assoc($result);
            if(password_verify($password, $res['password'])){
                header("Location: index.php");
                session_start();
                $_SESSION['klientiid'] = $res['klientiid'];
                $_SESSION['emri'] = $res['emri'];
                $_SESSION['mbiemri'] = $res['mbiemri'];
                $_SESSION['roli'] = $res['roli'];
            }else{
                echo "<script>alert('Username ose Password nuk jane ne rregull!');</script>";
            }
        }
    }
}

function merrRezervimetId($klientiid){
    $dbcon = connection();
    $sql = "SELECT r.*, a.emri FROM rezervimet r INNER JOIN automjetet a ON r.automjetiid = a.automjetiid WHERE klientiid = $klientiid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}
