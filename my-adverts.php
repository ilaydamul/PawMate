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
            <h1>İlanlarım</h1>
        </div>
    </section>

    <section class="profile-container">
        <div class="container">
            <h2 class="title">İlan Ekle</h2>

            <form class="custom-form" style="justify-content: space-between;" action="">
                <div class="half-input">
                    <input type="text" name="title" placeholder="İlan Başlığı" >
                </div>
                <div class="half-input">
                    <input type="text" name="name" placeholder="Hayvan Adı" >
                </div>
                <div class="half-input">
                    <input type="text" name="age" placeholder="Yaş" >
                </div>

                <div class="half-input">
                    <input type="text" name="gender" placeholder="Cinsiyet" >
                </div>

                <div class="half-input">
                    <select id="cars">
                        <option value="cat">Kedi</option>
                        <option value="dog">Köpek</option>
                        <option value="bird">Kuş</option>
                        <option value="kertenkele">Kertenkele</option>
                      </select>
                      
                </div>
               
                <div class="half-input">
                    <input type="text" name="genus" placeholder="Cins" >
                </div>
               

                <div>
                    <textarea name="description" id="description" rows="5" placeholder="Açıklama"></textarea>
                </div>

                <div class="btns">
                    <button class="custom-btn" id="add-ad" type="button">Ekle</button>
                </div>

            </form>

        </div>
    </section>



    <section class="section">
        <div class="container">
            <h2 class="title">Yaptığım Başvurular</h2>
            <div class="advertisements">
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">
            <h2 class="title">Açtığım İlanlar</h2>
            <div class="advertisements">
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
                </div>
                <div class="advert-card">
                    <a href="/advert-detail.html" title="ilan" class="advert-img">
                        <img src="images/cat.jpg" alt="ilan">
                    </a>
                    <div class="advert-content">
                        <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!">Kuri Yuva Arıyor!</a></h2>
                        <div class="advert-info">
                            Sarıyer/İstanbul
                        </div>
                        <a href="/advert-detail.html" class="advert-link">Detayı Gör</a>
                    </div>
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