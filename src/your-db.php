<?php
$host = 'localhost';
$dbname = 'postgres';
$username = 'barisdemirci';
// PostgreSQL veritabanına bağlan
$conn = pg_connect("host=$host dbname=$dbname user=$username"); 
?>
