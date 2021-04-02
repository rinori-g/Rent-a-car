<?php include_once('includes/sqlFunctions.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Rent a car</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css" />
    <script src="https://use.fontawesome.com/3ca95fdef9.js"></script>
    <style>
        #shtoForma {
            width: 90%;
            margin: 50px 40px;
        }

        #hi {
            color: #009933;
            padding: 20px 0px 10px 10px;
            margin: 0px 15px;
            font-size: 25px;
            border-bottom: 2px solid #009933;
        }

        label,
        input {
            width: 100%;
            padding: 10px;
        }

        label {
            color: #009933;
            font-weight: bold;
            margin-left: -10px;
        }

        input {
            outline: none;
            margin: 10px 0px;
        }

        input[type='submit'] {
            width: 150px;
            float: right;
            margin: 30px 0px;
            margin-right: -25px;
            color: #fff;
            background-color: #009933;
            border: none;
        }

        input[type='submit']:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <?php
    if (isset($_POST['shtoKategori'])) {
        $emri = $_POST['emri'];
        $pershkrimi = $_POST['pershkrimi'];
        shtoKategori($emri, $pershkrimi);
    }

    if(isset($_GET['kategoriaid'])){
        $kategorit = mysqli_fetch_assoc(merrKategoriId($_GET['kategoriaid']));
    }

    if(isset($_POST['modifikoKategori'])){
        $emri = $_POST['emri'];
        $pershkrimi = $_POST['pershkrimi'];
        modifikoKategori($_GET['kategoriaid'], $emri, $pershkrimi);
    }

    ?>
    <div class="container">
        <div id="header">
            <div id="logo">
                <img src="images/logo.png" alt="Logo" width="100" height="50">
            </div>
            <div id="menu">
                <ul>
                    <li><a href="index.php" class="active">Ballina</a></li>
                    <li><a href="klientet.php">Klientet</a></li>
                    <li><a href="automjetet.php">Automjetet</a></li>
                    <li><a href="rezervimet.php">Rezervimet</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <p style="color: #009933;float:right;margin-right:50px;margin-top:40px"></p>
            <div style="clear: both;"></div>
        </div>
        <div id="main">
            <div id="slide-bar">
                <div class="image">
                    <?php if (isset($_GET['kategoriaid'])) : ?>
                        <h1>Modifikimi i kategorive</h1>
                    <?php else : ?>
                        <h1>Shtimi i kategorive</h1>
                    <?php endif ?>
                </div>
            </div>
            <?php if (isset($_GET['kategoriaid'])) : ?>
                <h1 id="hi">Forma per modifikimin e kategorive</h1>
            <?php else : ?>
                <h1 id="hi">Forma per shtimin e kategorive</h1>
            <?php endif ?>
            <form method="post" id="shtoForma">
                <label for="emri">Emri</label>
                <input type="text" name="emri" value="<?php if(isset($_GET['kategoriaid'])) : echo $kategorit['emri']; endif ?>">
                <label for="pershkrimi">Pershkrimi</label>
                <input type="text" name="pershkrimi" value="<?php if(isset($_GET['kategoriaid'])) : echo $kategorit['pershkrimi']; endif ?>">

                <?php if(isset($_GET['kategoriaid'])) : ?>
                    <input type="submit" name="modifikoKategori" value="Modifiko Kategori">
                <?php else : ?>
                    <input type="submit" name="shtoKategori" value="Shto Kategori">
                <?php endif ?>
            </form>
            <div style="clear: both;"></div>
        </div>
        <hr>
        <div id="footer">
            <p>&copy; Rent a Car 2020. All rights reserved.</p>
            <ul>
                <li><a href="#"><img src="images/insta.png" alt="Instagram"></a></li>
                <li><a href="#"><img src="images/facebook.png" alt="Facebook"></a></li>
                <li><a href="#"><img src="images/snap.png" alt="Snapchat"></a></li>
            </ul>
        </div>
    </div>
</body>

</html>