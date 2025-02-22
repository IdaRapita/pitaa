<?php
include 'header.php';
include 'navbar.php';
?>

<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-1">
            <h6 class="m-0 font-weight-bold text-primary mt-3">Ulasan Saya</h6>
        </div>
        <div class="card-body">
            <!-- Form untuk Menambahkan Ulasan -->
            <form method="POST" action="proses_ulasan.php">
                <div class="form-group">
                    <label for="id_buku">Pilih Buku:</label>
                    <select name="id_buku" class="form-control" required>
                        <?php
                        include('../koneksi.php');
                        $queryBuku = mysqli_query($koneksi, "SELECT * FROM buku");
                        while ($buku = mysqli_fetch_array($queryBuku)) {
                            echo "<option value='{$buku['id_buku']}'>{$buku['judul']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ulasan">Ulasan:</label>
                    <textarea name="ulasan" class="form-control" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <select name="rating" class="form-control" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
            </form>
            <!-- End Form untuk Menambahkan Ulasan -->

            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   
                    <tbody>
                        <?php
                        // Filter data
                        $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
                        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

                        $whereClause = '';
                        if ($filter && $keyword) {
                            $whereClause = "WHERE $filter LIKE '%$keyword%'";
                        }

                        $no = 1;
                        $id_user = $_SESSION['id_user']; // Ambil id_user dari session

                        $query = mysqli_query($koneksi, "SELECT * FROM ulasanbuku, buku, user 
                        WHERE ulasanbuku.id_user=user.id_user 
                        AND ulasanbuku.id_user=$id_user 
                        AND ulasanbuku.id_buku=buku.id_buku 
                        ORDER BY ulasan ASC");

                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['judul']; ?></td>
                            <td><?php echo $row['ulasan']; ?></td>
                            <td><?php echo $row['rating']; ?></td>
                            <td>
                                <a href="" data-bs-toggle="modal"
                                    data-bs-target="#modalDetailUlasan<?php echo $row['id_ulasan']; ?>"
                                    class="btn btn-secondary">Detail</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Ulasan -->
<?php
$data = "SELECT * FROM ulasanbuku, user, buku WHERE ulasanbuku.id_user=user.id_user AND ulasanbuku.id_buku=buku.id_buku ORDER BY ulasan ASC";
$result = mysqli_query($koneksi, $data);
while ($row = mysqli_fetch_array($result)) {
?>
<div class="modal fade" id="modalDetailUlasan<?= $row['id_ulasan']; ?>" tabindex="-1"
    aria-labelledby="modalDetailUlasanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDetailUlasanLabel"><i class="bi bi-journal-bookmark-fill"></i>
                    Detail Ulasan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../img/<?= $row['image']; ?>" alt="" width="200">
                        </div>
                        <div class="col-md-8">
                            <form action="">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="" class="col-form-label">Peminjam :</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <label for="" class="col-form-label"><?= $row['nama_lengkap']; ?></label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="" class="col-form-label">Judul Buku :</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <label for="" class="col-form-label"><?= $row['judul']; ?></label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="" class="col-form-label">Ulasan :</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <label for="" class="col-form-label"><?= $row['ulasan']; ?></label>
                                    </div>
                                </div>
                                <td>
                                    <?php
                                        $rating = $row['rating'];
                                        for ($i = 0; $i < $rating; $i++) {
                                            echo '<i class="bi bi-star-fill text-warning"></i>';
                                        }
                                        for ($i = $rating; $i < 5; $i++) {
                                            echo '<i class="bi bi-star text-warning"></i>';
                                        }
                                    ?>
                                </td>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<div class="content mt-3 fixed-bottom">
    <p class="text-center text-white"> Aplikasi Perpustakaan Digital | 2024 </p>
</div>

<?php } ?>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>