<div class="content-header">
    <div class="container-fluid">
        <div class ="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Jadwal</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $kd =$_GET['kd'];
        $query = mysqli_query($koneksi, "DELETE FROM jadwal_kelas where Id_jadwal = '$kd'");
        if ($query){
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=jadwal">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_jadwal" class="btn btn-primary btn-sm">
            Tambah Jadwal</a>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>Id Jadwal</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </tread>
                <?php
                $no =0;
                $query = mysqli_query($koneksi,"SELECT * FROM jadwal_kelas");
                while ($result = mysqli_fetch_array($query) ) {
                    $no++
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?=$result['Id_jadwal']; ?></td>
                            <td><?=$result['Kelas']; ?></td>
                            <td><?=$result['Thn_ajaran']; ?></td>
                            <td><?=$result['Semester']; ?></td>
                             <td>
                                <a href="index.php?page=jadwal&action=hapus&kd=<?=  $result['Id_jadwal']
                                ?>" title="">
                                <span class="badge badge-danger">Hapus</span></a>
                                <a href="index.php?page=detail_jadwal&kd=<?= $result['Id_jadwal'] ?>" title
                                =""><span class
                                ="badge badge-warning">Detail</span><a>
                             </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            </div>
        </div>
    </div>
</div>