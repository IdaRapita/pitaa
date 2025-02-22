<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../login.php?pesan=info_login");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman Buku ITBI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<style>
body {
    background-image: url('../assets/img/bg2.jpg');
    background-position: center;
    background-size: cover;
    color: white; /* Mengubah warna teks menjadi putih untuk kontras yang lebih baik */
}
.container {
    background-color: rgba(0, 0, 0, 0.7); /* Menambahkan latar belakang gelap dengan transparansi */
    padding: 20px;
    border-radius: 10px; /* Menambahkan sudut melengkung */
}
</style>

<body>
    <div class="container">
        <h1 class="text-center">Sistem Peminjaman Buku ITBI</h1>
        <!-- Konten lainnya akan ditambahkan di sini -->
    </div>
</body>
</html>