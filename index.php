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
    <?php require_once("src/header.php");
    $sql = "SELECT ilan_hayvan_cinsiyet, MAX(ilan_hayvan_yas) AS max_yas
FROM ilanlar
WHERE ilan_hayvan_cinsiyet = '0'
GROUP BY ilan_hayvan_cinsiyet
HAVING MAX(ilan_hayvan_yas) IS NOT NULL";
    $old_animals = pg_query($conn, $sql);
    $old_animals = pg_fetch_assoc($old_animals);
    if(empty($old_animals)){
        $old_animals["metin"] = "Ana sayfa";
    }
    else {
        $old_animals["metin"] = "Biliyor musunuz? Sitemizdeki en yaşlı dişi hayvan " . $old_animals["max_yas"] . " yaşındadır.";
    }
    ?>
    <?php
    if (isset($_GET["cinsiyet"]) && $_GET["cinsiyet"] != "tumu") {
        $cinsiyet = $_GET["cinsiyet"];
        $functionQuery = "CREATE OR REPLACE FUNCTION get_animals_by_gender_simple(gender_code smallint)
        RETURNS TABLE (ilan_id integer, ilan_hayvan_isim varchar(100), ilan_hayvan_yas smallint, ilan_hayvan_cinsiyet smallint, ilan_baslik varchar(255), ilan_hayvan_aciklama text)
        AS $$
        DECLARE
            hayvan RECORD;
            animals_cursor CURSOR FOR 
                SELECT ilanlar.ilan_id, ilanlar.ilan_hayvan_isim, ilanlar.ilan_hayvan_yas, ilanlar.ilan_hayvan_cinsiyet, ilanlar.ilan_baslik, ilanlar.ilan_hayvan_aciklama 
                FROM ilanlar 
                WHERE ilanlar.ilan_hayvan_cinsiyet = gender_code;
        BEGIN
            OPEN animals_cursor;
            LOOP
                FETCH animals_cursor INTO hayvan;
                EXIT WHEN NOT FOUND;
                ilan_id := hayvan.ilan_id;
                ilan_hayvan_isim := hayvan.ilan_hayvan_isim;
                ilan_hayvan_yas := hayvan.ilan_hayvan_yas;
                ilan_hayvan_cinsiyet := hayvan.ilan_hayvan_cinsiyet;
                ilan_baslik := hayvan.ilan_baslik;
                ilan_hayvan_aciklama := hayvan.ilan_hayvan_aciklama;
                RETURN NEXT;
            END LOOP;
            CLOSE animals_cursor;
        END;
        $$ LANGUAGE plpgsql;
        ";
        pg_query($conn, $functionQuery);
        $resultFunction = pg_query_params($conn, 'SELECT * FROM get_animals_by_gender_simple($1)', [$cinsiyet]);
        $resultFunction = pg_fetch_all($resultFunction);
    }
    if (isset($_GET["tur"]) && $_GET["tur"] != "tumu") {
        $tur = $_GET["tur"];
        $functionTwoQuery = "CREATE OR REPLACE FUNCTION get_animals_by_type_simple(type_code character varying(50))
        RETURNS TABLE (ilan_id integer, ilan_hayvan_isim varchar(100), ilan_hayvan_yas smallint, ilan_hayvan_cinsiyet smallint, ilan_baslik varchar(255), ilan_hayvan_aciklama text)
        AS $$
        BEGIN
            RETURN QUERY SELECT ilanlar.ilan_id, ilanlar.ilan_hayvan_isim, ilanlar.ilan_hayvan_yas, ilanlar.ilan_hayvan_cinsiyet, ilanlar.ilan_baslik, ilanlar.ilan_hayvan_aciklama 
                FROM ilanlar 
                WHERE ilanlar.ilan_hayvan_tur = type_code;
        END;
        $$ LANGUAGE plpgsql;
        ";
        pg_query($conn, $functionTwoQuery);
        $resultFunction = pg_query_params($conn, 'SELECT * FROM get_animals_by_type_simple($1)', [$tur]);
        $resultFunction = pg_fetch_all($resultFunction);
    }   
    if(isset($_GET["yas"]) && $_GET["yas"]){
        $yas = $_GET["yas"];
        $functionThreeQuery = "CREATE OR REPLACE FUNCTION get_animals_by_age_simple(age_code smallint)
        RETURNS TABLE (ilan_id integer, ilan_hayvan_isim varchar(100), ilan_hayvan_yas smallint, ilan_hayvan_cinsiyet smallint, ilan_baslik varchar(255), ilan_hayvan_aciklama text)
        AS $$
        BEGIN
            RETURN QUERY SELECT ilanlar.ilan_id, ilanlar.ilan_hayvan_isim, ilanlar.ilan_hayvan_yas, ilanlar.ilan_hayvan_cinsiyet, ilanlar.ilan_baslik, ilanlar.ilan_hayvan_aciklama 
                FROM ilanlar 
                WHERE ilanlar.ilan_hayvan_yas = age_code;
        END;
        $$ LANGUAGE plpgsql;
        ";
        pg_query($conn, $functionThreeQuery);
        $resultFunction = pg_query_params($conn, 'SELECT * FROM get_animals_by_age_simple($1)', [$yas]);
        $resultFunction = pg_fetch_all($resultFunction);
    }
    ?>
    <section class="banner">
        <div class="container">
            <h1>
               <?= $old_animals["metin"]; ?>
            </h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <h1 class="title">İlanlar</h1>
            <!-- Filtreleme Alanı -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="filter">
                        <h5>Cinsiyete göre filtrele</h5>
                        <form action="" method="GET">
                            <div class="mb-3 d-flex">
                                <label for="yas" class="me-2">Cinsiyet:</label>
                                <select class="form-select-sm me-2" id="cinsiyet" name="cinsiyet">
                                    <option value="tumu">Tümü</option>
                                    <option <?php $selected =  ($_GET["cinsiyet"] == 0) ? "selected" : "noselected"; ?> <?= $selected ?> value="0">Dişi</option>
                                    <option <?php $selected =  ($_GET["cinsiyet"] == 1) ? "selected" : "noselected"; ?> <?= $selected ?> value="1">Erkek</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Filtrele</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="filter">
                        <h5>Belirtilen yaşa göre verileri getir</h5>
                        <form action="" method="GET">
                            <div class="mb-3 d-flex">
                                <label for="yas" class="me-2">Yaş:</label>
                                <input type="number" name="yas">
                                <button type="submit" class="btn btn-primary">Filtrele</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="filter">
                        <h5>Türe göre filtrele</h5>
                        <form action="" method="GET">
                            <div class="mb-3 d-flex">
                                <label for="yas" class="me-2">Tür:</label>
                                <select class="form-select-sm me-2" id="tur" name="tur">
                                    <option value="tumu">Tümü</option>
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
                                <button type="submit" class="btn btn-primary">Filtrele</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- İlan Listesi -->
            <div class="ilanlar">
                <?php if (@$_GET["cinsiyet"] != "tumu" && isset($_GET["cinsiyet"])) { ?>
                    <?php foreach ($resultFunction as $value) { ?>
                        <div class="ilan-detay">
                            <a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" title="ilan" class="ilan-resim">
                                <img src="images/cat.jpg" alt="ilan">
                            </a>
                            <div class="ilan-icerik">
                                <h2><a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" title="Kuri Yuva Arıyor!"><?= $value["ilan_baslik"]; ?></a></h2>
                                <div class="ilan-info">
                                    <?= $value["ilan_hayvan_aciklama"] ?>
                                </div>
                                <a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" class="ilan-link">Detayı Gör</a>
                            </div>
                        </div>
                    <?php }
                } 
                elseif ($_GET["tur"] != "tumu" && isset($_GET["tur"])) {
                    if(count($resultFunction) == 0){
                        echo "Sonuç bulunamadı!";
                    }else{
                    ?>
                    <?php foreach ($resultFunction as $value) { ?>
                        <div class="ilan-detay">
                            <a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" title="ilan" class="ilan-resim">
                                <img src="images/cat.jpg" alt="ilan">
                            </a>
                            <div class="ilan-icerik">
                                <h2><a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" title="Kuri Yuva Arıyor!"><?= $value["ilan_baslik"]; ?></a></h2>
                                <div class="ilan-info">
                                    <?= $value["ilan_hayvan_aciklama"] ?>
                                </div>
                                <a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" class="ilan-link">Detayı Gör</a>
                            </div>
                        </div>
                    <?php }}
                } elseif ($_GET["yas"] && isset($_GET["yas"])) {
                    if(count($resultFunction) == 0){
                        echo '<div class="alert alert-warning">Henüz ilan eklenmemiş.</div>';
                    }else{
                    ?>
                    <?php foreach ($resultFunction as $value) { ?>
                        <div class="ilan-detay">
                            <a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" title="ilan" class="ilan-resim">
                                <img src="images/cat.jpg" alt="ilan">
                            </a>
                            <div class="ilan-icerik">
                                <h2><a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" title="Kuri Yuva Arıyor!"><?= $value["ilan_baslik"]; ?></a></h2>
                                <div class="ilan-info">
                                    <?= $value["ilan_hayvan_aciklama"] ?>
                                </div>
                                <a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" class="ilan-link">Detayı Gör</a>
                            </div>
                        </div>
                    <?php }}
                }
                else { $ilanQuery = pg_fetch_all(pg_query($conn, "SELECT * FROM ilanlar")); if(!empty($ilanQuery)){ ?>
                    <?php foreach ($ilanQuery as $value) { ?>
                        <div class="ilan-detay">
                            <a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" title="ilan" class="ilan-resim">
                                <img src="images/cat.jpg" alt="ilan">
                            </a>
                            <div class="ilan-icerik">
                                <h2><a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" title="Kuri Yuva Arıyor!"><?= $value["ilan_baslik"]; ?></a></h2>
                                <div class="ilan-info">
                                    <?= $value["ilan_hayvan_aciklama"] ?>
                                </div>
                                <a href="advert-detail.php?id=<?= $value["ilan_id"]; ?>" class="ilan-link">Detayı Gör</a>
                            </div>
                        </div>
                <?php } } else { ?>
                    <div class="alert alert-warning">Henüz ilan eklenmemiş.</div>
            <?php } }  ?>
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