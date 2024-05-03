<?php error_reporting(0); ?>
<header>
        <div class="container">
            <div class="header">
                <div class="header-left">
                    <a href="index.html" title="PawMate" class="logo">
                        <img src="images/pawmate-logo.png" alt="PawMate Logo">
                    </a>
                    <div class="header-links">
                        <a href="index.php" title="Anasayfa">Anasayfa</a>
                        <a href="my-adverts.php" title="İlanlarım">İlanlarım</a>
                    </div>
                </div>
                <div class="header-links">
                    <?php if($_SESSION["nick"]){ ?>
                    <a href="login.php">Çıkış Yap</a>
                    <a href="profile.php">Profil</a>
                    <?php }else {?>
                        <a href="login.php">Giriş Yap</a>
                        <a href="register.php">Kayıt Ol</a>
                        <?php } ?>
                    </div>
            </div>
        </div>
    </header>
