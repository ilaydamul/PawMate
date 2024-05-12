<?php
$host = 'localhost';
$dbname = 'veritabanı_adı';
$username = 'kullanıcı_adı';
$port = '5432';
$password = 'şifre';
// PostgreSQL veritabanına bağlan
$conn = pg_connect("host=$host dbname=$dbname user=$username port=$port password=$password"); 
?>
