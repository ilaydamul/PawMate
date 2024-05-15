<?php
$host = 'localhost';
$dbname = 'pawmate';
$username = 'postgres';
$password = "1q2w3e4rA.";
// Eğer passwordunuz varsa alttaki connect kısmına password=$password şeklinde ekleyebilirsiniz.
// PostgreSQL veritabanına bağlan
$conn = pg_connect("host=$host dbname=$dbname user=$username port=5432 password=$password"); 
?>
