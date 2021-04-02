<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sqlFunctions.php'); ?>


        <div id="main">
            <div id="slide-bar">
                <div class="image">
                    <h1>Kategorite e automjeteve</h1>
                </div>
            </div>
            <div class="tabela">
                <h1 style="margin-bottom: 50px;">Kategorite</h1>
                <div style="clear: both;"></div>
                <table id="klientet_table">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Emri</th>
                            <th style="width: 60%;">Pershkrimi</th>
                            <th style="width: 10%;">Modifiko</th>
                            <th style="width: 10%;">Fshiej</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $kategorite = merrKategori();
                        while ($kategorit = mysqli_fetch_assoc($kategorite)) { ?>
                            <tr>
                                <td><?php echo $kategorit['emri']; ?></td>
                                <td><?php echo $kategorit['pershkrimi']; ?></td>
                                <td id="modifiko">
                                <a href="shto_modifiko_kategori.php?kategoriaid=<?php echo $kategorit['kategoriaid']; ?>">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                        </td>
                        <td id="fshiej">
                            <form action="fshijKategori.php" method="post">
                                <input type="text" name="kategoriaid" hidden value="<?php echo $kategorit['kategoriaid']; ?>">
                                <button type="submit" style="border: none;background-color:transparent;cursor:pointer;" name="deleteKlient" onclick="return fshijKategori()">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <script>
                                function fshijKategori() {
                                    $confirm = confirm('A jeni te sigurt qe doni ta fshini kategorine ?');
                                    if ($confirm) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                }
                            </script>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
                </table>
                <button onclick="window.location.href='shto_modifiko_kategori.php'" id="shto_klient"><i class="fa fa-plus" aria-hidden="true"></i> Shto kategori</button>

                <div style="clear: both;"></div>
            </div>
        </div>
        <hr>
        <?php include_once('includes/footer.php'); ?>