<?php
$id = $_POST['id'];
$namobj = $_POST['namobj'];
$kab_kota = $_POST['kab_kota'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "energi_aceh";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menjalankan query update
$sql = "UPDATE struktur_energi SET namobj='$namobj', kab_kota='$kab_kota', latitude='$latitude', longitude='$longitude' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    // Kembali ke direktori luar tempat file index.php berada
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql. "<br>" . $conn->error;
}
$conn->close();
?>