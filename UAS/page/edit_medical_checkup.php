<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Medical Check Up</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?page=medical_checkup">Medical Check Up</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php

$id = $_GET['id'] ?? '';

// Gunakan prepared statement untuk mencegah SQL Injection
$stmt = mysqli_prepare($koneksi, "SELECT * FROM medical_checkup WHERE id_checkup = ?");
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$edit = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($edit);

// Jika data tidak ditemukan, hentikan agar tidak error
if (!$data) {
    echo '
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-ban"></i> Data tidak ditemukan
            </div>
            <a href="index.php?page=medical_checkup" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </section>';
    exit;
}

if (isset($_POST['update'])) {

    $nama_lengkap   = $_POST['nama_lengkap'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $alamat         = $_POST['alamat'];
    $no_hp          = $_POST['no_hp'];
    $jam_checkup    = $_POST['jam_checkup'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    $stmtUpdate = mysqli_prepare($koneksi, "UPDATE medical_checkup SET
        nama_lengkap = ?,
        tanggal_lahir = ?,
        jenis_kelamin = ?,
        alamat = ?,
        no_hp = ?,
        jam_checkup = ?,
        tanggal_daftar = ?
        WHERE id_checkup = ?
    ");

    mysqli_stmt_bind_param(
        $stmtUpdate,
        "ssssssss",
        $nama_lengkap,
        $tanggal_lahir,
        $jenis_kelamin,
        $alamat,
        $no_hp,
        $jam_checkup,
        $tanggal_daftar,
        $id
    );

    $update = mysqli_stmt_execute($stmtUpdate);

    if ($update) {

        echo '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i> Data Berhasil Diupdate
        </div>';

        echo '<meta http-equiv="refresh"
        content="1;url=index.php?page=medical_checkup">';

        // refresh data setelah update agar form menampilkan data terbaru
        $data['nama_lengkap']   = $nama_lengkap;
        $data['tanggal_lahir']  = $tanggal_lahir;
        $data['jenis_kelamin']  = $jenis_kelamin;
        $data['alamat']         = $alamat;
        $data['no_hp']          = $no_hp;
        $data['jam_checkup']    = $jam_checkup;
        $data['tanggal_daftar'] = $tanggal_daftar;

    } else {

        echo '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-ban"></i> '.mysqli_error($koneksi).'
        </div>';

    }
}
?>

<section class="content">
<div class="container-fluid">

<div class="card card-warning card-outline">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-notes-medical mr-1"></i>
            Edit Medical Check Up
        </h3>
        <div class="card-tools">
            <a href="index.php?page=medical_checkup" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

<form method="POST">
<div class="card-body">

<div class="form-group">
<label>Nama Lengkap</label>
<input type="text"
name="nama_lengkap"
value="<?= htmlspecialchars($data['nama_lengkap']) ?>"
class="form-control"
required>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date"
        name="tanggal_lahir"
        value="<?= htmlspecialchars($data['tanggal_lahir']) ?>"
        class="form-control"
        required>
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
rows="3"
required><?= htmlspecialchars($data['alamat']) ?></textarea>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label>No HP</label>
        <input type="text"
        name="no_hp"
        value="<?= htmlspecialchars($data['no_hp']) ?>"
        class="form-control"
        required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label>Jam Check Up</label>
        <input type="time"
        name="jam_checkup"
        value="<?= htmlspecialchars($data['jam_checkup']) ?>"
        class="form-control"
        required>
        </div>
    </div>
</div>

<div class="form-group">
<label>Tanggal Daftar</label>
<input type="date"
name="tanggal_daftar"
value="<?= htmlspecialchars($data['tanggal_daftar']) ?>"
class="form-control"
required>
</div>

</div>

<div class="card-footer">
    <input type="submit"
           name="update"
           value="Update"
           class="btn btn-warning">

    <a href="index.php?page=medical_checkup"
       class="btn btn-secondary">
       Kembali
    </a>
</div>

</form>

</div>

</div>
</section>
