<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Medical Check Up</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus" && isset($_GET['id'])) {

        $id = $_GET['id'];

        // Gunakan prepared statement untuk mencegah SQL Injection
        $stmtHapus = mysqli_prepare($koneksi, "DELETE FROM medical_checkup WHERE id_checkup = ?");
        mysqli_stmt_bind_param($stmtHapus, "s", $id);
        $hapus = mysqli_stmt_execute($stmtHapus);

        if ($hapus) {

            echo '
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i> Data Berhasil Dihapus
            </div>';

            echo '<meta http-equiv="refresh"
            content="1;url=index.php?page=medical_checkup">';

        } else {

            echo '
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-ban"></i> '.mysqli_error($koneksi).'
            </div>';

        }
    }
}
?>

<div class="content">
    <div class="container-fluid">

        <div class="card card-primary card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-notes-medical mr-1"></i>
                    Daftar Medical Check Up
                </h3>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Jam Medical Checkup</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    $no = 1;

                    $query = mysqli_query($koneksi,
                    "SELECT * FROM medical_checkup ORDER BY id_checkup DESC");

                    if (mysqli_num_rows($query) == 0) {
                        echo '<tr><td colspan="9" class="text-center text-muted py-4">
                                <i class="fas fa-folder-open mr-1"></i> Belum ada data medical check up
                              </td></tr>';
                    }

                    while ($data = mysqli_fetch_array($query)) {
                    ?>

                    <tr>

                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($data['nama_lengkap']) ?></td>
                        <td><?= htmlspecialchars(date('d-m-Y', strtotime($data['tanggal_lahir']))) ?></td>
                        <td>
                            <?php if ($data['jenis_kelamin'] == 'Laki-laki'): ?>
                                <span class="badge badge-info"><i class="fas fa-mars"></i> Laki-laki</span>
                            <?php else: ?>
                                <span class="badge badge-pink" style="background-color:#e83e8c;color:#fff;"><i class="fas fa-venus"></i> Perempuan</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($data['alamat']) ?></td>
                        <td><?= htmlspecialchars($data['no_hp']) ?></td>
                        <td><?= htmlspecialchars($data['jam_checkup']) ?></td>
                        <td><?= htmlspecialchars(date('d-m-Y', strtotime($data['tanggal_daftar']))) ?></td>

                        <td class="text-center">

                            <a href="index.php?page=edit_medical_checkup&id=<?= urlencode($data['id_checkup']) ?>"
                            class="btn btn-warning btn-sm"
                            title="Edit">
                            <i class="fas fa-edit"></i>
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