<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "portofolio";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $telepon  = mysqli_real_escape_string($conn, $_POST['telepon']);
    $tgl      = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
    $topik    = mysqli_real_escape_string($conn, $_POST['topik']);
    $pesan    = mysqli_real_escape_string($conn, $_POST['pesan']);

    $sql = "INSERT INTO pesan (nama, email, telepon, tgl_lahir, topik, pesan)
            VALUES ('$nama', '$email', '$telepon', '$tgl', '$topik', '$pesan')";

    mysqli_close($conn);
?>