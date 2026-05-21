<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "portofolio";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql    = "SELECT * FROM pesan ORDER BY waktu DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin — Pesan Masuk</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .header-admin {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout-btn {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
        }
        .logout-btn:hover {
            color: #c0392b;
        }
    </style>
</head>
<body>

<header>
    <div class="header-admin">
        <div>
            <h1>Admin Panel</h1>
            <h2>Daftar Pesan Masuk</h2>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <section>
            <h2>Pesan Masuk</h2>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Topik</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";         
                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['telepon']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['topik']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['pesan']) . "</td>";
                        echo "<td>" . $row['waktu'] . "</td>";
                        echo "</tr>";
                        $no++;   
                    }
                    ?>
                </tbody>
            </table>

        </section>
    </div>
</main>

<footer>
    <div class="container">
        <p><strong>Muhamad Fatio Sodirin</strong> - Admin Panel</p> 
        <p>Login sebagai: <strong><?= htmlspecialchars($_SESSION['nama_admin'] ?? 'Admin') ?></strong></p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</footer>

</body>
</html>

<?php mysqli_close($conn); ?>