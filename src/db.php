<?php
$host = 'localhost';
$dbname = 'proje_teslimi_deneme_sunucusu';
$username = 'barisdemirci';
$password = "";
// Eğer passwordunuz varsa alttaki connect kısmına password=$password şeklinde ekleyebilirsiniz.
// PostgreSQL veritabanına bağlan
$conn = pg_connect("host=$host dbname=$dbname user=$username port=5432 password=$password"); 
?>
