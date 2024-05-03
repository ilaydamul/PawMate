<?php 
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
    pg_insert($conn, 'kullanicilar', array('kullanici_ad' => $name, 'kullanici_soyad' => $surname, 'kullanici_nickname' => $username, 'kullanici_telefon_no' => $phone_no, 'kullanici_adres' => $address, 'kullanici_email' => $email, 'kullanici_sifre' => $password));
    pg_close($conn);

}
echo json_encode($sonuc);
?>