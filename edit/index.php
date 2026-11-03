<!DOCTYPE html>
<html>
<head><title>Form Edit Energi Aceh</title></head>
<body>
<h2>Form Edit Struktur Energi</h2>
<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "energi_aceh"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM struktur_energi WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form action='edit.php' method='post'>";
    while($row = $result->fetch_assoc()) {
        echo "<input type='hidden' name='id' value='".$row['id']."'><br>";
        
        echo "<label for='namobj'>Nama Objek: </label><br>";
        echo "<input type='text' name='namobj' style='width:300px;' value='".$row['namobj']."'><br><br>";
        
        echo "<label for='kab_kota'>Kabupaten/Kota: </label><br>";
        echo "<input type='text' name='kab_kota' style='width:300px;' value='".$row['kab_kota']."'><br><br>";
        
        echo "<label for='latitude'>Latitude: </label><br>";
        echo "<input type='text' name='latitude' value='".$row['latitude']."'><br><br>";
        
        echo "<label for='longitude'>Longitude: </label><br>";
        echo "<input type='text' name='longitude' value='".$row['longitude']."'><br><br>";
        
        echo "<input type='submit' value='Simpan Perubahan'>";
    }
    echo "</form>";
} else {
    echo "Data tidak ditemukan.";
}
$conn->close();
?>
</body>
</html>