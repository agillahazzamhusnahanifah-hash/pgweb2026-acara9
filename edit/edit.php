<?php
    $id = $_POST['id'];
    $day= $_POST['day'];
    $datetime= $_POST['datetime'];
    $latitude= $_POST['latitude'];
    $longitude= $_POST['longitude'];
    $level_kepercayaan= $_POST['level_kepercayaan'];
    $desa= $_POST['desa'];
    $kecamatan= $_POST['kecamatan'];
    $kotakabupaten= $_POST['kotakabupaten'];
    $provinsi= $_POST['provinsi'];
    $sumber= $_POST['sumber'];
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
    $sql = "UPDATE hotspot_point SET day='$day', datetime='$datetime', latitude='$latitude', longitude='$longitude', level_kepercayaan='$level_kepercayaan', desa='$desa', kecamatan='$kecamatan', kotakabupaten='$kotakabupaten', provinsi='$provinsi', sumber='$sumber'
    WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: index.php");
    exit();

    }else {
        echo "Error: ". $sql."<br>".$conn->error;
    }

    $conn->close();
?>