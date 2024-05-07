<?php
session_start();
function post($key)
{
    return htmlspecialchars(trim($_POST[$key]));
}
require_once("db.php");
if (isset($_POST["register_name"])) {
    $sonuc = array();
    $name = $_POST["register_name"];
    $surname = $_POST["register_surname"];
    $username = $_POST["register_username"];
    $phone_no = $_POST["register_phone-no"];
    $address = $_POST["register_address"];
    $email = $_POST["register_email"];
    $password = $_POST["register_password"];
    $age = $_POST["register_age"];
    $result = pg_select($conn, "kullanicilar", ["kullanici_email" => $email]);
    $resultTwo = pg_select($conn, "kullanicilar", ["kullanici_nickname" => $username]);
    if (count($result) > 0) {
        $sonuc["status"] = "error";
        $sonuc["message"] = "Bu email adresi ile daha önce kayıt olunmuş!";
        echo json_encode($sonuc);
        exit();
    }
    if (count($resultTwo) > 0) {
        $sonuc["status"] = "error";
        $sonuc["message"] = "Bu kullanıcı adı daha önce alınmış!";
        echo json_encode($sonuc);
        exit();
    }
    $query = "INSERT INTO kullanicilar (kullanici_ad, kullanici_soyad, kullanici_nickname, kullanici_telefon_no, kullanici_adres, kullanici_email, kullanici_sifre, kullanici_yas) VALUES ('$name', '$surname', '$username', '$phone_no', '$address', '$email', '$password' , '$age')";
    $solve = pg_query($conn, $query);
    if (!$solve) {
        $sonuc["status"] = "error";
        $sonuc["message"] = "Eğer 18 yaşından küçük iseniz kayıt olamazsınız ve lütfen kayıt olurken telefon numaranızı doğru girdiğinizden emin olunuz!";
    } else {
        $sonuc["status"] = "success";
        $sonuc["message"] = "Başarılı bir şekilde kayıt oldunuz!";
    }
}
if (isset($_POST["username"])) {
    $sonuc = array();
    $username = post("username");
    $password = post("password");
    $query = "SELECT * FROM kullanicilar WHERE kullanici_nickname = '$username' AND kullanici_sifre = '$password'";
    $result = pg_query($conn, $query);
    $result = pg_fetch_all($result);
    if (count($result) > 0 && $result[0]["kullanici_sifre"] == $password && $result[0]["kullanici_nickname"] == $username) {
        $sonuc["status"] = "success";
        $sonuc["message"] = "Başarılı bir şekilde giriş yaptınız!";
        $_SESSION["user"] = $result[0]["kullanici_nickname"];
        $_SESSION["user_id"] = $result[0]["kullanici_id"];
        $_SESSION["user_name"] = $result[0]["kullanici_ad"];
        $_SESSION["user_surname"] = $result[0]["kullanici_soyad"];
    } else {
        $sonuc["status"] = "error";
        $sonuc["message"] = "Kullanıcı adı veya şifre hatalı!";
    }
}
if (isset($_POST["profile_name"]) || isset($_POST["profile_password"])) {
    $sonuc = array();
    $name = post("profile_name");
    $surname = post("profile_surname");
    $username = post("profile_username");
    $phone_no = post("profile_phone-no");
    $address = post("profile_address");
    $email = post("profile_email");
    $password = post("profile_password");
    $query = "UPDATE kullanicilar SET kullanici_ad = '$name', kullanici_soyad = '$surname', kullanici_nickname = '$username', kullanici_telefon_no = '$phone_no', kullanici_adres = '$address', kullanici_email = '$email', kullanici_sifre = '$password' WHERE kullanici_id = '" . $_SESSION["user_id"] . "'";
    $solve = pg_query($conn, $query);
    if (!$solve) {
        $sonuc["status"] = "error";
        $sonuc["message"] = "Profil güncellenirken bir hata oluştu!";
    } else {
        $sonuc["status"] = "success";
        $sonuc["message"] = "Profil başarılı bir şekilde güncellendi!";
    }
}
if (isset($_POST["advert_title"]) && isset($_POST["advert_name"]) && isset($_POST["advert_age"])) {
    $sonuc = array();
    $user_id = $_SESSION["user_id"];
    $title = post("advert_title");
    $name = post("advert_name");
    $age = post("advert_age");
    $advert_gender = post("advert_gender");
    $advert_tur = post("advert_tur");
    $advert_genus = post("advert_genus");
    $advert_description = post("description");
    $query = "INSERT INTO ilanlar (ilan_baslik, ilan_kullanici_id , ilan_hayvan_isim, ilan_hayvan_yas, ilan_hayvan_tur, ilan_hayvan_cins, ilan_hayvan_cinsiyet, ilan_hayvan_aciklama) VALUES ('$title', '$user_id', '$name', '$age', '$advert_tur', '$advert_genus', '$advert_gender', '$advert_description')";
    $solve = pg_query($conn, $query);
    if (!$solve) {
    } else {
        $sonuc["status"] = "success";
        $sonuc["message"] = "Hayvan ilanı başarılı bir şekilde oluşturuldu!";
    }
}
pg_close($conn);
echo json_encode($sonuc);
