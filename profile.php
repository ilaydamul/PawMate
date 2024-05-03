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

    <title>Profile | PawMate</title>

</head>

<body>

   <?php require_once("src/header.php"); ?>

    <section class="banner">
        <div class="container">
            <h1>Profil</h1>
        </div>
    </section>


    <section class="profile-container">
        <div class="container">
            <div class="form-info">
                <h1>Profil</h1>
                <div class="little-text">Profilinizi güncelleyin</div>
            </div>
            <form class="custom-form" style="justify-content: space-between;" action="">
                <div class="half-input">
                    <input type="text" name="name" placeholder="Adınız" value="">
                </div>
                <div class="half-input">
                    <input type="text" name="surname" placeholder="Soyadınız" value="">
                </div>
                <div class="half-input">
                    <input type="text" name="username" placeholder="Kullanıcı Adınız" value="">
                </div>
                <div class="half-input">
                    <input type="text" name="phone-no" placeholder="Telefon No" value="">
                </div>
                <div>
                    <input type="text" name="address" placeholder="Adres" value="">
                </div>
                <div>
                    <input type="text" name="email" placeholder="E-Mail" value="">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Şifre" value="">
                </div>
                <div class="btns">
                    <button class="custom-btn" id="update" type="button">Güncelle</button>
                    <button class="custom-btn red-btn" type="button">Çıkış Yap</button>

                </div>

            </form>

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