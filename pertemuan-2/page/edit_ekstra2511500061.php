<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Ekstrakurikuler</h1>
            </div>
        </div>
    </div>
</div>

    <?php
    $kd = $_GET['kd'];
    $edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM ekstra_2511500061 WHERE id_ekstra061='$kd'"));

    if(isset($_POST['tambah'])){
        $id_ekstra061 = $_POST['id_ekstra061'];
        $nama_ekstra061 = $_POST['nama_ekstra061'];
        $ket061 = $_POST['ket061'];
        $semester061 = $_POST['semester061'];
        $thn_ajaran061 = $_POST['thn_ajaran061'];
        
        $insert = mysqli_query($koneksi,"UPDATE ekstra_2511500061 SET nama_ekstra061='$nama_ekstra061', ket061='$ket061', semester061='$semester061', thn_ajaran061='$thn_ajaran061' WHERE id_ekstra061='$id_ekstra061'");
        if ($insert) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra2511500061">';
        } else {
            echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Gagal Disimpan</h4></div>';
        }
    }
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="card-body p-2">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="id_ekstra061">Id Ekstrakurikuler</label>
                                <input type="text" name="id_ekstra061" value="<?= $edit['id_ekstra061']; ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_ekstra061">Nama Ekstrakurikuler</label>
                                <input type="text" name="nama_ekstra061" value="<?= $edit['nama_ekstra061']; ?>" id="nama_ekstra061" placeholder="Nama Ekstrakurikuler" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ket061">Keterangan</label>
                                <input type="text" name="ket061" value="<?= $edit['ket061']; ?>" id="ket061" placeholder="Keterangan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="semester061">Semester</label>
                                <input type="text" name="semester061" value="<?= $edit['semester061']; ?>" id="semester061" placeholder="Semester" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="thn_ajaran061">Tahun Ajaran</label>
                                <input type="text" name="thn_ajaran061" value="<?= $edit['thn_ajaran061']; ?>" id="thn_ajaran061" placeholder="Tahun Ajaran" class="form-control">
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>