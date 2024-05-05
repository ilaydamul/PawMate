<?php 
session_start();
require_once("src/classess.php");
$controlClass = new controlClass();
$controlClass->SessionCheck();
?>
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

    <title>PawMate | Giriş Yap</title>

</head>

<body>

    <section class="form-container">
        <div class="form-box">
            <div class="logo">
                <img src="images/pawmate-logo.png" alt="PawMate Logo">
            </div>
            <div class="form-info">
                <h1>Giriş Yap</h1>
                <div class="little-text">PawMate'e giriş yapın</div>
            </div>
            <form class="custom-form" name="login_form" onsubmit="return false;">
                <div>
                    <input type="text" name="username" placeholder="Kullanıcı Adı">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Şifre">
                </div>
                <button class="custom-btn" type="submit">Giriş Yap</button>
            </form>
            <div class="little-text text-center mt-3">
                Hesabınız yok mu? <a href="register.php" title="Hemen Kayıt Ol">Hemen Kayıt Ol <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

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
    <script src="js/controller.js"></script>

</body>

</html>