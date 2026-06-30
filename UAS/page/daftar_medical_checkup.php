<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Daftar Medical Check Up</h1>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['daftar'])) {

    $nama_lengkap   = $_POST['nama_lengkap'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $alamat         = $_POST['alamat'];
    $no_hp          = $_POST['no_hp'];
    $jam_checkup    = $_POST['jam_checkup'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO medical_checkup
        (nama_lengkap, tanggal_lahir, jenis_kelamin, alamat, no_hp, jam_checkup, tanggal_daftar)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    mysqli_stmt_bind_param(
        $stmt,
        "sssssss",
        $nama_lengkap,
        $tanggal_lahir,
        $jenis_kelamin,
        $alamat,
        $no_hp,
        $jam_checkup,
        $tanggal_daftar
    );

    $insert = mysqli_stmt_execute($stmt);

    if ($insert) {

        echo '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i> Pendaftaran medical check up berhasil! Silakan datang sesuai jadwal yang dipilih.
        </div>';

        // Kosongkan kembali variabel form supaya tidak terisi data lama
        $nama_lengkap = $tanggal_lahir = $jenis_kelamin = $alamat = $no_hp = $jam_checkup = $tanggal_daftar = '';

    } else {

        echo '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-ban"></i> Pendaftaran gagal, silakan coba lagi. <br>
            '.mysqli_error($koneksi).'
        </div>';

    }
}
?>

<section class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">

                <div class="card card-outline card-primary shadow-sm">

                    <div class="card-header d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center mr-3"
                             style="width:42px;height:42px;border-radius:50%;background:#faeeda;">
                            <i class="fas fa-notes-medical" style="color:#854f0b;font-size:18px;"></i>
                        </div>
                        <div>
                            <h3 class="card-title mb-0" style="font-size:16px;">Pendaftaran Medical Check Up</h3>
                        </div>
                    </div>

                    <div class="card-body">

                        <form method="POST">

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text"
                                       name="nama_lengkap"
                                       value="<?= isset($nama_lengkap) ? htmlspecialchars($nama_lengkap) : '' ?>"
                                       class="form-control"
                                       placeholder="Masukkan nama lengkap"
                                       required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir</label>
                                    <input type="date"
                                           name="tanggal_lahir"
                                           value="<?= isset($tanggal_lahir) ? htmlspecialchars($tanggal_lahir) : '' ?>"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" <?= (isset($jenis_kelamin) && $jenis_kelamin == "Laki-laki") ? "selected" : "" ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= (isset($jenis_kelamin) && $jenis_kelamin == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                          class="form-control"
                                          rows="2"
                                          placeholder="Masukkan alamat"
                                          required><?= isset($alamat) ? htmlspecialchars($alamat) : '' ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text"
                                       name="no_hp"
                                       value="<?= isset($no_hp) ? htmlspecialchars($no_hp) : '' ?>"
                                       class="form-control"
                                       placeholder="08xxxxxxxxxx"
                                       required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Jam Check Up</label>
                                    <input type="time"
                                           name="jam_checkup"
                                           value="<?= isset($jam_checkup) ? htmlspecialchars($jam_checkup) : '' ?>"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal Daftar</label>
                                    <input type="date"
                                           name="tanggal_daftar"
                                           value="<?= isset($tanggal_daftar) ? htmlspecialchars($tanggal_daftar) : date('Y-m-d') ?>"
                                           class="form-control"
                                           required>
                                </div>
                            </div>

                            <button type="submit"
                                    name="daftar"
                                    class="btn btn-primary btn-block mt-3">
                                <i class="fas fa-paper-plane mr-1"></i> Daftar Sekarang
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>