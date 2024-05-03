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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Advert | PawMate</title>

</head>

<body>

<?php require_once("src/header.php"); ?>

    <section class="banner">
        <div class="container">
            <h1>İlan Başlığı</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="detail-img">
                        <img src="images/cat.jpg" alt="image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-content">
                        <h2>Başvuru Başlığı</h2>
                            <ul>
                                <li><b>İlgili Kişi:</b> İlayda</li>
                                <li><b>Hayvan Adı:</b> Boray</li>
                                <li><b>Yaş:</b> 52</li>
                                <li><b>Cinsiyet:</b> Belirtmek İstemiyor</li>
                                <li><b>Tür:</b> Boray</li>
                                <li><b>Cins:</b> Cins</li>
                            </ul>
                        <div>
                            <p>Açıklama - Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque repellendus
                                earum aperiam
                                fugiat tempora aspernatur mollitia reprehenderit ipsa voluptates suscipit.</p>
                        </div>
                        <div>
                            <a href="#" class="advert-link" id="advert">İlana Başvur</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section class="section">
        <div class="container">
            <h2 class="title">Başvuru Yapanlar</h2>
            <div class="applications">
                <div class="app-item">
                    <img src="images/user.png" alt="user">
                    <span class="app-name">Ad Soyad</span>
                    <span class="app-loc">Konum</span>
                </div>
                <div class="app-item">
                    <img src="images/user.png" alt="user">
                    <span class="app-name">Ad Soyad</span>
                    <span class="app-loc">Konum</span>
                </div>
                <div class="app-item">
                    <img src="images/user.png" alt="user">
                    <span class="app-name">Ad Soyad</span>
                    <span class="app-loc">Konum</span>
                </div>
                <div class="app-item">
                    <img src="images/user.png" alt="user">
                    <span class="app-name">Ad Soyad</span>
                    <span class="app-loc">Konum</span>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JS -->
    <script src="js/script.js"></script>

</body>

</html>