<div class="content-header">
    <div class="container-fluid">
        <div class ="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Ekstrakurikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $kd =$_GET['kd'];
        $query = mysqli_query($koneksi, "DELETE FROM ekstra_2511500061 where id_ekstra061 = '$kd'");
        if ($query){
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra2511500061">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_ekstra2511500061" class="btn btn-primary btn-sm">
            Tambah Ekstrakurikuler</a>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>Id Ekstrakurikuler</th>
                        <th>Nama Ekstrakurikuler</th>
                        <th>Keterangan</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>Aksi</th>
                    </tr>
                </tread>
                <?php
                $no =0;
                $query = mysqli_query($koneksi,"SELECT * FROM ekstra_2511500061");
                while ($result = mysqli_fetch_array($query) ) {
                    $no++
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?=$result['id_ekstra061']; ?></td>
                            <td><?=$result['nama_ekstra061']; ?></td>
                             <td><?=$result['ket061']; ?></td>
                             <td><?=$result['semester061']; ?></td>
                             <td><?=$result['thn_ajaran061']; ?></td>
                             <td>
                                <a href="index.php?page=ekstra2511500061&action=hapus&kd=<?=  $result['id_ekstra061']
                                ?>" title="">
                                <span class="badge badge-danger">Hapus</span></a>
                                <a href="index.php?page=edit_ekstra2511500061&kd=<?= $result['id_ekstra061'] ?>" title
                                =""><span class
                                ="badge badge-warning">Edit</span><a>
                             </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            </div>
        </div>
    </div>
</div>