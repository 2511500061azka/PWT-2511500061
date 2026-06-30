<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Konsultasi</h1>
            </div>
        </div>
    </div>
</div>

<!-- HAPUS DATA -->
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus" && isset($_GET['id'])) {

        $id = $_GET['id'];

        $stmtHapus = mysqli_prepare($koneksi, "DELETE FROM konsultasi WHERE id_pendaftaran = ?");
        mysqli_stmt_bind_param($stmtHapus, "s", $id);
        $hapus = mysqli_stmt_execute($stmtHapus);

        if ($hapus) {
            echo '
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i> Data Berhasil Dihapus
            </div>';

            echo '<meta http-equiv="refresh" content="1;url=index.php?page=konsultasi">';
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-ban"></i> Gagal Menghapus Data : '.mysqli_error($koneksi).'
            </div>';
        }
    }
}

function esc($value) {
    return htmlspecialchars($value ?? '');
}
?>
<!-- menambahkan tombol tambah -->
<div class="content">
    <div class="container-fluid">

        <div class="card card-primary card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-md mr-1"></i>
                    Daftar Konsultasi
                </h3>
                <div class="card-tools">
                    <a href="index.php?page=tambah_konsultasi"
                       class="btn btn-primary btn-sm">
                       <i class="fas fa-plus"></i> Tambah Konsultasi
                    </a>
                </div>
            </div>

            <div class="card-body table-responsive p-0">

            <!-- header kolom -->
                <table class="table table-hover text-nowrap">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Poli</th>
                            <th>Dokter</th>
                            <th>Jam Konsul</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <!-- mengambil data dari database -->
                    <tbody>

                    <?php
                    $no = 1;

                    $query = mysqli_query($koneksi,
                    "SELECT * FROM konsultasi ORDER BY id_pendaftaran DESC");

                    if (mysqli_num_rows($query) == 0) {
                        echo '<tr><td colspan="10" class="text-center text-muted py-4">
                                <i class="fas fa-folder-open mr-1"></i> Belum ada data konsultasi
                              </td></tr>';
                    }

                    while ($data = mysqli_fetch_array($query)) {
                    ?>

                    <!-- isi satu baruis data -->
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= esc($data['nama']) ?></td>
                        <td><?= esc(date('d-m-Y', strtotime($data['tanggal_lahir']))) ?></td>
                        <td>
                            <?php if ($data['jenis_kelamin'] == 'Laki-laki'): ?>
                                <span class="badge badge-info"><i class="fas fa-mars"></i> Laki-laki</span>
                            <?php else: ?>
                                <span class="badge badge-pink" style="background-color:#e83e8c;color:#fff;"><i class="fas fa-venus"></i> Perempuan</span>
                            <?php endif; ?>
                        </td>
                        <td><span class="badge badge-secondary"><?= esc($data['umur']) ?> th</span></td>
                        <td><?= esc($data['alamat']) ?></td>
                        <td><span class="badge badge-info"><?= esc($data['poli']) ?></span></td>
                        <td><?= esc($data['dokter']) ?></td>
                        <td><?= esc($data['jam_konsul']) ?></td>
                        <td><?= esc(date('d-m-Y', strtotime($data['tanggal_daftar']))) ?></td>

                        <td class="text-center">

                            <a href="index.php?page=edit_konsultasi&id=<?= urlencode($data['id_pendaftaran']) ?>"
                               class="btn btn-warning btn-sm"
                               title="Edit">
                               <i class="fas fa-edit"></i>
                            </a>

                            <a href="index.php?page=konsultasi&action=hapus&id=<?= urlencode($data['id_pendaftaran']) ?>"
                               class="btn btn-danger btn-sm"
                               title="Hapus"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                               <i class="fas fa-trash"></i>
                            </a>

                        </td>
                    </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>