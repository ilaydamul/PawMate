<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.3/swiper-bundle.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>PawMate</title>

</head>

<body>
<?php require_once("src/header.php"); ?>
    <section class="banner">
        <div class="container">
            <h1>Patiler Arasında Sonsuz Dostluk, Bir Pati Uzakta</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="ilanlar">
                <?php 
               foreach (pg_fetch_all(pg_query($conn, "SELECT * FROM ilanlar")) as $value) {
                ?>
                <div class="ilan-detay">
                    <a href="/advert-detail.html" title="ilan" class="ilan-resim">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="ilan-icerik">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!"><?= $value["ilan_baslik"];?></a></h2>
                        <div class="ilan-info">
                            <?= $value["ilan_hayvan_aciklama"] ?>
                        </div>
                        <a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" class="ilan-link">Detayı Gör</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        </div>
    </section>

    <footer>
        <div class="container">
            @<span id="year"></span> All Right Reserved.
        </div>
    </footer>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <!-- Swiper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.3/swiper-bundle.min.js"></script>

    <!-- JS -->
    <script src="js/script.js"></script>

</body>

</html>