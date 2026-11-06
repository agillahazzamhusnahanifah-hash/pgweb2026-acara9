<!DOCTYPE html>
<html>
<body>
<h2>Form Edit</h2>
<?php

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("Error: No ID specified in the URL. <a href='../index.php'>Go Back</a>");
    }
// Sesuaikan dengan setting MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pemantauan_karhutla";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM hotspot_point WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";
        while($row = $result->fetch_assoc()) {
            echo "<input type='hidden' name='id' value='".$row['id']."'><br>";
            echo "<label for='day'>Day:</label><br>";
            echo "<input type='text' id='day' name='day' value='".$row['day']."'><br>";
            echo "<label for='datetime'>Datetime:</label><br>";
            echo "<input type='text' id='dtm' name='datetime' value='".$row['datetime']."'><br>";
            echo "<label for='latitude'>Latitude:</label><br>";
            echo "<input type='text' id='lat' name='latitude' value='".$row['latitude']."'><br>";
            echo "<label for='longitude'>Longitude:</label><br>";
            echo "<input type='text' id='long' name='longitude' value='".$row['longitude']."'><br>";
            echo "<label for='level_kepercayaan'>Level Kepercayaan:</label><br>";
            echo "<input type='text' id='lvlkep' name='level_kepercayaan' value='".$row['level_kepercayaan']."'><br>";
            echo "<label for='desa'>Desa:</label><br>";
            echo "<input type='text' id='desa' name='desa' value='".$row['desa']."'><br>";
            echo "<label for='kecamatan'>Kecamatan:</label><br>";
            echo "<input type='text' id='kec' name='kecamatan' value='".$row['kecamatan']."'><br>";
            echo "<label for='kotakabupaten'>Kotakabupaten:</label><br>";
            echo "<input type='text' id='kkb' name='kotakabupaten' value='".$row['kotakabupaten']."'><br>";
            echo "<label for='provinsi'>Provinsi:</label><br>";
            echo "<input type='text' id='prov' name='provinsi' value='".$row['provinsi']."'><br>";
            echo "<label for='sumber'>Sumber:</label><br>";
            echo "<input type='text' id='sbr' name='sumber' value='".$row['sumber']."'><br><br>";
        }
        echo "<input type='submit' value='Submit'>";
        echo "</form>"; 
    } else {
        echo "No record found with ID $id.";
    }
    $conn->close();
?>
<p id="informasi"></p>
</body>
</html>
