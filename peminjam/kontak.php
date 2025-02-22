<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<style>
body {
    background-image: url('../assets/img/bg2.jpg');
    background-position: center;
    color: white; /* Menambahkan warna teks agar terlihat di latar belakang */
}
.container {
    background-color: rgba(0, 0, 0, 0.5); /* Menambahkan latar belakang transparan untuk kontainer */
    padding: 20px;
    border-radius: 10px;
}
</style>

<body>
    <div class="container">
        <h1>Kontak Peminjaman Buku</h1>
        <form action="proses_kontak.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon:</label>
                <input type="text" id="no_telepon" name="no_telepon" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan:</label>
                <textarea id="pesan" name="pesan" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</body>
</html>