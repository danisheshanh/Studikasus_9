<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "energi_aceh"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM struktur_energi";
$result = $conn->query($sql);

echo "<h2>Data Struktur Energi Provinsi Aceh</h2>";
echo "<a href='input/index.html'>+ Tambah Data Baru</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse;'>
    <tr bgcolor='#f2f2f2'>
        <th>ID</th>
        <th>Nama Objek</th>
        <th>Kabupaten/Kota</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th colspan='2'>Aksi</th> 
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["namobj"] . "</td>
            <td>" . $row["kab_kota"] . "</td>
            <td>" . $row["latitude"] . "</td>
            <td>" . $row["longitude"] . "</td>
            <td><a href='delete.php?id=" . $row["id"] . "'>hapus</a></td>
            <td><a href='edit/index.php?id=" . $row["id"] . "'>edit</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>