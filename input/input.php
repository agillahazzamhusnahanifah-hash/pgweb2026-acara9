<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kecamatan= $_POST['kecamatan'];
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

    //sesuaikan dengan setting MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pemantauan_karhutla";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO hotspot_point (day, datetime, latitude, longitude, level_kepercayaan, desa, kecamatan, kota/kabupaten, provinsi, sumber)
            VALUES ('$kecamatan', '$day', '$datetime', '$latitude', '$longitude', '$level_kepercayaan', '$desa', '$kecamatan', '$kotakabupaten', '$provinsi', '$sumber')";

    if ($conn->query($sql)===TRUE){
        echo "New record created successfully";
    }else{
        echo "Error:" .$sql ."<br>" .$conn->error;
    }

    $conn->close();

    header("Location: index.php");
    exit();
}
?>