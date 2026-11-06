<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pemantauan_karhutla";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM hotspot_point";
    $result = $conn->query($sql);
    
    echo("<h3>SEBARAN TITIK HOTSPOT KEBAKARAN HUTAN KALIMANTAN</h3>"); 
    echo "<a href='input/index.html'>Input</a>";
    if ($result->num_rows > 0) {
        // 1. Properly closed the echo string, <tr>, and <th> tags
        echo "<table border='1px'>
                <tr>
                    <th>id</th>
                    <th>day</th>
                    <th>datetime</th>
                    <th>latitude</th>
                    <th>longitude</th>
                    <th>level_kepercayaan</th>
                    <th>desa</th>
                    <th>kecamatan</th>
                    <th>kotakabupaten</th>
                    <th>provinsi</th>
                    <th>sumber</th>
                    <th colspan='2'>Aksi</th>
                </tr>";

        // 2. Fixed string concatenations and included all 6 database columns to match the headers
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["day"] . "</td>
                    <td>" . $row["datetime"] . "</td>
                    <td>" . $row["latitude"] . "</td>
                    <td>" . $row["longitude"] . "</td>
                    <td>" . $row["level_kepercayaan"] . "</td>
                    <td>" . $row["desa"] . "</td>
                    <td>" . $row["kecamatan"] . "</td>
                    <td>" . $row["kotakabupaten"] . "</td>
                    <td>" . $row["provinsi"] . "</td>
                    <td>" . $row["sumber"] . "</td>
                    <td><a href=delete.php?id=".$row["id"].">hapus</a></td>
                    <td><a href=edit/index.php?id=".$row["id"].">edit</a></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    
    $conn->close();
?>