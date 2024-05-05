<?php 
session_start();
function post($key){
    return htmlspecialchars(trim($_POST[$key]));
}

require_once("db.php");
if(isset($_POST["register_name"])){
    $sonuc = array();
    $name = $_POST["register_name"];
    $surname = $_POST["surname"];
    $username = $_POST["username"];
    $phone_no = $_POST["phone-no"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = pg_select($conn, "kullanicilar", ["kullanici_email" => $email]);
    $resultTwo = pg_select($conn, "kullanicilar", ["kullanici_nickname" => $username]);
    if(count($result) > 0){
        $sonuc["status"] = "error";
        $sonuc["message"] = "Bu email adresi ile daha önce kayıt olunmuş!";
        echo json_encode($sonuc);
        exit();
    }
    if(count($resultTwo) > 0){
        $sonuc["status"] = "error";
        $sonuc["message"] = "Bu kullanıcı adı daha önce alınmış!";
        echo json_encode($sonuc);
        exit();
    }
    $query = "INSERT INTO kullanicilar (kullanici_ad, kullanici_soyad, kullanici_nickname, kullanici_telefon_no, kullanici_adres, kullanici_email, kullanici_sifre) VALUES ('$name', '$surname', '$username', '$phone_no', '$address', '$email', '$password')";
    $solve = pg_query($conn, $query);
    if(!$solve){
        $sonuc["status"] = "error";
        $sonuc["message"] = "Kayıt olunurken bir hata oluştu!";
    }else{
        $sonuc["status"] = "success";
        $sonuc["message"] = "Başarılı bir şekilde kayıt oldunuz!";
    }
    pg_close($conn);
}
if(isset($_POST["username"])){
    $sonuc = array();
    $email = post("username");
    $password = post("password");
    $result = pg_select($conn, "kullanicilar", ["kullanici_nickname" => $username , "kullanici_sifre" => $password]);
    if(count($result) > 0 && $result[0]["kullanici_sifre"] == $password && $result[0]["kullanici_nickname"] == $username){
        $sonuc["status"] = "success";
        $sonuc["message"] = "Başarılı bir şekilde giriş yaptınız!";
        $_SESSION["user"] = $result[0]["kullanici_nickname"];
        $_SESSION["user_id"] = $result[0]["kullanici_id"];
        $_SESSION["user_name"] = $result[0]["kullanici_ad"];
        $_SESSION["user_surname"] = $result[0]["kullanici_soyad"];
    }else{
        $sonuc["status"] = "error";
        $sonuc["message"] = "Email veya şifre hatalı!";
    }
    pg_close($conn);
}
if(isset($_POST["profile_name"]) || isset($_POST["profile_password"])){
    $sonuc = array();
    $name = post("profile_name");
    $surname = post("profile_surname");
    $username = post("profile_username");
    $phone_no = post("profile_phone-no");
    $address = post("profile_address");
    $email = post("profile_email");
    $password = post("profile_password");
    $query = "UPDATE kullanicilar SET kullanici_ad = '$name', kullanici_soyad = '$surname', kullanici_nickname = '$username', kullanici_telefon_no = '$phone_no', kullanici_adres = '$address', kullanici_email = '$email', kullanici_sifre = '$password' WHERE kullanici_id = '".$_SESSION["user_id"]."'";
    $solve = pg_query($conn, $query);
    if(!$solve){
        $sonuc["status"] = "error";
        $sonuc["message"] = "Profil güncellenirken bir hata oluştu!";
    }else{
        $sonuc["status"] = "success";
        $sonuc["message"] = "Profil başarılı bir şekilde güncellendi!";
    }
    pg_close($conn);
}
echo json_encode($sonuc);
?>