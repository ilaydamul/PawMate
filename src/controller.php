<?php 
$sonuc = [];
if(isset($_POST["register_name"])){
    $name = $_POST["register_name"];
    $surname = $_POST["surname"];
    $username = $_POST["username"];
    $phone_no = $_POST["phone-no"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
}
echo json_encode($sonuc);
?>