<?php
$host = 'localhost';
$dbname = 'postgres';
$username = 'barisdemirci';
// PostgreSQL veritabanına bağlan
$conn = pg_connect("host=$host dbname=$dbname user=$username");
if (!$conn) {
    echo "Veritabanına bağlanırken hata oluştu.";
} else {
    echo "Veritabanına başarıyla bağlandı.";
}
pg_close($conn);
?>
