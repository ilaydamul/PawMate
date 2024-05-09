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

    <?php require_once("src/header.php");
    ?>

    <section class="banner">
        <div class="container">
            <h1>İlanlarım</h1>
        </div>
    </section>

    <section class="profile-container">
        <div class="container">
            <h2 class="title">İlan Ekle</h2>
            <form class="custom-form" style="justify-content: space-between;" onsubmit="return false;" name="create_advert">
                <div class="half-input">
                    <input type="text" name="advert_title" placeholder="İlan Başlığı">
                </div>
                <div class="half-input">
                    <input type="text" name="advert_name" placeholder="Hayvan Adı">
                </div>
                <div class="half-input">
                    <input type="number" name="advert_age" placeholder="Yaş">
                </div>

                <div class="half-input">
                    <select name="advert_gender" id="">
                        <option value="0">Dişi</option>
                        <option value="1">Erkek</option>
                    </select>
                </div>
                <div class="input">
                    <select id="hayvanlar" name="advert_tur">
                        <option value="kedi">Kedi</option>
                        <option value="kopek">Köpek</option>
                        <option value="kus">Kuş</option>
                        <option value="balik">Balık</option>
                        <option value="tavsan">Tavşan</option>
                        <option value="tavuk">Tavuk</option>
                        <option value="hamster">Hamster</option>
                        <option value="sincap">Sincap</option>
                        <option value="papağan">Papağan</option>
                        <option value="kaplumbaga">Kaplumbağa</option>
                        <option value="iguan">İguana</option>
                        <option value="degu">Degu</option>
                        <option value="kertenkele">Kertenkele</option>
                        <option value="sulukus">Su kuşu</option>
                        <option value="fare">Fare</option>
                        <option value="kanarya">Kanarya</option>
                        <option value="ördek">Ördek</option>
                        <option value="yilan">Yılan</option>
                        <option value="hamamböceği">Hamamböceği</option>
                    </select>

                </div>
                <div>
                    <textarea name="description" id="description" rows="5" placeholder="Açıklama"></textarea>
                </div>
                <div class="btns">
                    <button class="custom-btn" id="add-ad" type="submit">Ekle</button>
                </div>

            </form>

        </div>
    </section>
    <section class="section">
        <div class="container">
            <h2 class="title">Yaptığım Başvurular</h2>
            <div class="advertisements">
                <?php $ilan_id = pg_select($conn, "ilan_basvurulari", ["ilan_basvuran_kullanici_id" => $_SESSION["user_id"]]);
                foreach ($ilan_id as $value) {
                    $ilan = pg_select($conn, "ilanlar", ["ilan_id" => $value["ilan_basvurulan_ilan_id"]]);
                    $ilanlar[] = $ilan[0];
                }
                ?>
                <div class="ilanlar">
                    <?php
                    foreach ($ilanlar as $value) {
                    ?>
                        <div class="ilan-detay">
                            <a href="/advert-detail.html" title="ilan" class="ilan-resim">
                                <img src="images/cat.jpg" alt="ilan">
                            </a>
                            <div class="ilan-icerik">
                                <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!"><?= $value["ilan_baslik"]; ?></a></h2>
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


    <section class="section">
        <div class="container">
            <h2 class="title">Açtığım İlanlar</h2>
            <div class="ilanlar">
                <?php
                $ilan_datas = pg_select($conn, "ilanlar", ["ilan_kullanici_id" => $_SESSION["user_id"]]);
                if (count($ilan_datas) == 0) {
                    echo "<p>Henüz ilan açmamışsınız!</p>";
                }
                foreach ($ilan_datas as $value) {
                ?>
                    <div class="ilan-detay">
                        <a href="/advert-detail.html" title="ilan" class="ilan-resim">
                            <img src="images/cat.jpg" alt="ilan">
                        </a>
                        <div class="ilan-icerik">
                            <h2><a href="/advert-detail.html" title="Kuri Yuva Arıyor!"><?= $value["ilan_baslik"]; ?></a></h2>
                            <div class="ilan-info">
                                <?= $value["ilan_hayvan_aciklama"]; ?>
                            </div>
                            <a href="advert-detail.php?id=<?= $value["ilan_id"] ?>" class="ilan-link">Detayı Gör</a>
                            <button name="delete_button" data-id="<?= $value["ilan_id"]; ?>" class="ilan-link" style="background-color: red; border:none; width:100%;">Sil</button>
                        </div>
                    </div>
                <?php } ?>
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