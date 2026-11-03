<?php
$id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "energi_aceh";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$sql = "DELETE FROM struktur_energi WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    // Berhasil dihapus
} else {
    echo "Error: ".$sql. "<br>".$conn->error;
}
$conn->close();
header("Location: index.php");
?>