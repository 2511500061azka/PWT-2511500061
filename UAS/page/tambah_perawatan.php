<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Perawatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?page=perawatan">Data Perawatan</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php

if(isset($_POST['simpan'])){

    $nama           = $_POST['nama'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $umur           = $_POST['umur'];
    $alamat         = $_POST['alamat'];
    $poli           = $_POST['poli'];
    $dokter         = $_POST['dokter'];
    $jam_perawatan  = $_POST['jam_perawatan'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    $simpan = mysqli_query($koneksi,"INSERT INTO perawatan
        (
            nama,
            tanggal_lahir,
            jenis_kelamin,
            umur,
            alamat,
            poli,
            dokter,
            jam_perawatan,
            tanggal_daftar
        )
        VALUES
        (
            '$nama',
            '$tanggal_lahir',
            $jenis_kelamin,
            '$umur',
            '$alamat',
            '$poli',
            '$dokter',
            '$jam_perawatan'
            'tanggal_daftar'
        )
    ");

    if($simpan){

        echo '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i> Data Berhasil Disimpan
        </div>';

        echo '<meta http-equiv="refresh" content="1;url=index.php?page=perawatan">';

    }else{

        echo '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-ban"></i> Gagal Menyimpan Data <br>
            '.mysqli_error($koneksi).'
        </div>';

    }
}
?>

<div class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card card-outline card-primary shadow-sm">

                    <div class="card-header d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center mr-3"
                             style="width:42px;height:42px;border-radius:50%;background:#e1f5ee;">
                            <i class="fas fa-procedures" style="color:#0f6e56;font-size:18px;"></i>
                        </div>
                        <div>
                            <h3 class="card-title mb-0" style="font-size:16px;">Tambah Data Perawatan</h3>
                        </div>
                        <div class="card-tools ml-auto">
                            <a href="index.php?page=perawatan" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        <form method="POST">

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text"
                                       name="nama"
                                       class="form-control"
                                       placeholder="Masukkan nama lengkap"
                                       required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir</label>
                                    <input type="date"
                                           name="tanggal_lahir"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin"
                                            class="form-control"
                                            required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" <?= (isset($jenis_kelamin) && $jenis_kelamin == "Laki-laki") ? "selected" : "" ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= (isset($jenis_kelamin) && $jenis_kelamin == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Umur</label>
                                <input type="number"
                                       name="umur"
                                       class="form-control"
                                       min="0"
                                       required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                          class="form-control"
                                          rows="3"
                                          placeholder="Masukkan alamat"
                                          required></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Poli</label>
                                    <select name="poli"
                                            class="form-control"
                                            required>
                                        <option value="">-- Pilih Poli --</option>
                                        <option value="Poli Umum">Poli Umum</option>
                                        <option value="Poli Penyakit Dalam">Poli Penyakit Dalam</option>
                                        <option value="Poli Anak">Poli Anak</option>
                                        <option value="Poli Kandungan">Poli Kandungan</option>
                                        <option value="Poli Bedah">Poli Mata</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Dokter</label>
                                    <input type="text"
                                           name="dokter"
                                           class="form-control"
                                           placeholder="Nama dokter"
                                           required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Jam Perawatan</label>
                                    <input type="time"
                                           name="jam_perawatan"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal Daftar</label>
                                    <input type="date"
                                           name="tanggal_daftar"
                                           value="<?= isset($tanggal_daftar) ? htmlspecialchars($tanggal_daftar) : '' ?>"
                                           class="form-control"
                                           required>
                                </div>
                            </div>

                            <button type="submit"
                                    name="simpan"
                                    class="btn btn-primary mt-2">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>

                            <a href="index.php?page=perawatan"
                               class="btn btn-secondary mt-2">
                                Kembali
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
