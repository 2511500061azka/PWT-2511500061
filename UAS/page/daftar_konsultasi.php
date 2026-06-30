<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Daftar Konsultasi</h1>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['daftar'])) {

    $nama           = $_POST['nama'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $umur           = $_POST['umur'];
    $alamat         = $_POST['alamat'];
    $poli           = $_POST['poli'];
    $dokter         = $_POST['dokter'];
    $jam_konsul     = $_POST['jam_konsul'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO konsultasi
        (nama, tanggal_lahir, umur, alamat, poli, dokter, jam_konsul, tanggal_daftar)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    mysqli_stmt_bind_param(
        $stmt,
        "ssisssss",
        $nama,
        $tanggal_lahir,
        $umur,
        $alamat,
        $poli,
        $dokter,
        $jam_konsul,
        $tanggal_daftar
    );

    $insert = mysqli_stmt_execute($stmt);

    if ($insert) {

        echo '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i> Pendaftaran konsultasi berhasil! Silakan datang sesuai jadwal yang dipilih.
        </div>';

        // Kosongkan kembali variabel form supaya tidak terisi data lama
        $nama = $tanggal_lahir = $umur = $alamat = $poli = $dokter = $jam_konsul = $tanggal_daftar = '';

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
                             style="width:42px;height:42px;border-radius:50%;background:#e6f1fb;">
                            <i class="fas fa-stethoscope" style="color:#185fa5;font-size:18px;"></i>
                        </div>
                        <div>
                            <h3 class="card-title mb-0" style="font-size:16px;">Pendaftaran Konsultasi</h3>
                        </div>
                    </div>

                    <div class="card-body">

                        <form method="POST">

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text"
                                       name="nama"
                                       value="<?= isset($nama) ? htmlspecialchars($nama) : '' ?>"
                                       class="form-control"
                                       placeholder="Masukkan nama lengkap"
                                       required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>Tanggal Lahir</label>
                                    <input type="date"
                                           name="tanggal_lahir"
                                           value="<?= isset($tanggal_lahir) ? htmlspecialchars($tanggal_lahir) : '' ?>"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" <?= (isset($jenis_kelamin) && $jenis_kelamin == "Laki-laki") ? "selected" : "" ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= (isset($jenis_kelamin) && $jenis_kelamin == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Umur</label>
                                    <input type="number"
                                           name="umur"
                                           value="<?= isset($umur) ? htmlspecialchars($umur) : '' ?>"
                                           class="form-control"
                                           min="0"
                                           required>
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

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Poli</label>
                                    <select name="poli" class="form-control" required>
                                        <option value="">-- Pilih Poli --</option>
                                        <option value="Umum" <?= (isset($poli) && $poli == "Umum") ? "selected" : "" ?>>Umum</option>
                                        <option value="Gigi" <?= (isset($poli) && $poli == "Gigi") ? "selected" : "" ?>>Gigi</option>
                                        <option value="Anak" <?= (isset($poli) && $poli == "Anak") ? "selected" : "" ?>>Anak</option>
                                        <option value="Kandungan" <?= (isset($poli) && $poli == "Kandungan") ? "selected" : "" ?>>Kandungan</option>
                                        <option value="Mata" <?= (isset($poli) && $poli == "Mata") ? "selected" : "" ?>>Mata</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Dokter</label>
                                    <input type="text"
                                           name="dokter"
                                           value="<?= isset($dokter) ? htmlspecialchars($dokter) : '' ?>"
                                           class="form-control"
                                           placeholder="Nama dokter"
                                           required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Jam Konsultasi</label>
                                    <input type="time"
                                           name="jam_konsul"
                                           value="<?= isset($jam_konsul) ? htmlspecialchars($jam_konsul) : '' ?>"
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