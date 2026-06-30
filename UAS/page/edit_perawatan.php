<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Perawatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?page=perawatan">Data Perawatan</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php

$id = $_GET['id'] ?? '';

$edit = mysqli_query($koneksi,
"SELECT * FROM perawatan
WHERE id_perawatan='$id'");

$data = mysqli_fetch_array($edit);

if(isset($_POST['update'])){

    $nama          = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $umur          = $_POST['umur'];
    $alamat        = $_POST['alamat'];
    $poli          = $_POST['poli'];
    $dokter        = $_POST['dokter'];
    $jam_perawatan = $_POST['jam_perawatan'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    $update = mysqli_query($koneksi,"UPDATE perawatan SET

        nama='$nama',
        tanggal_lahir='$tanggal_lahir',
        jenis_kelamin ='$jenis_kelamin',
        umur='$umur',
        alamat='$alamat',
        poli='$poli',
        dokter='$dokter',
        jam_perawatan='$jam_perawatan',
        tanggal_daftar = '$tanggal_daftar'
    WHERE id_perawatan='$id'
    ");

    if($update){

        echo '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i> Data Berhasil Diupdate
        </div>';

        echo '<meta http-equiv="refresh"
        content="1;url=index.php?page=perawatan">';

    }else{

        echo '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-ban"></i> Gagal Diupdate <br>
            '.mysqli_error($koneksi).'
        </div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">

        <div class="card card-warning card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-procedures mr-1"></i>
                    Edit Perawatan
                </h3>
                <div class="card-tools">
                    <a href="index.php?page=perawatan" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <form method="POST">
            <div class="card-body">

                <div class="form-group">
                    <label>ID Perawatan</label>
                    <input type="text"
                           class="form-control"
                           value="<?= $data['id_perawatan']; ?>"
                           readonly>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   value="<?= $data['nama']; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Umur</label>
                            <input type="number"
                                   name="umur"
                                   class="form-control"
                                   value="<?= $data['umur']; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date"
                                   name="tanggal_lahir"
                                   class="form-control"
                                   value="<?= $data['tanggal_lahir']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin"
                                    class="form-control"
                                    required>

                            <option value="Laki-laki"
                                        <?= ($data['jenis_kelamin'] == "Laki-laki") ? "selected" : ""; ?>>
                                            Laki-laki
                            </option>

                            <option value="Perempuan"
                                        <?= ($data['jenis_kelamin'] == "Perempuan") ? "selected" : ""; ?>>
                                            Perempuan
                            </option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              rows="3"><?= $data['alamat']; ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Poli</label>
                            <input type="text"
                                   name="poli"
                                   class="form-control"
                                   value="<?= $data['poli']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dokter</label>
                            <input type="text"
                                   name="dokter"
                                   class="form-control"
                                   value="<?= $data['dokter']; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jam Perawatan</label>
                            <input type="time"
                                   name="jam_perawatan"
                                   class="form-control"
                                   value="<?= $data['jam_perawatan']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Daftar</label>
                            <input type="date"
                            name="tanggal_daftar"
                            value="<?= htmlspecialchars($data['tanggal_daftar']) ?>"
                            class="form-control"
                            required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <input type="submit"
                       name="update"
                       value="Update"
                       class="btn btn-warning">

                <a href="index.php?page=perawatan"
                   class="btn btn-secondary">
                   Kembali
                </a>
            </div>

            </form>

        </div>

    </div>
</section>
