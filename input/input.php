<?php
// Menangkap data dari form index.html
$namobj = $_POST['namobj'];
$kab_kota = $_POST['kab_kota'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Konfigurasi Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "energi_aceh";

// Membuat Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menjalankan query insert data baru
$sql = "INSERT INTO struktur_energi (namobj, kab_kota, latitude, longitude) 
        VALUES ('$namobj', '$kab_kota', '$latitude', '$longitude')";

if ($conn->query($sql) === TRUE) {
    // Jika berhasil, kembali ke direktori luar (halaman utama)
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>