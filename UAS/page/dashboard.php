<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card shadow-sm border-0 bg-primary">
                    <div class="card-body text-white">
                        <h2 class="mb-1">
                            <i class="fas fa-hospital-alt"></i>
                            Rumah Sakit Sehat
                        </h2>
                        <p class="mb-0">
                            Sistem Informasi Pelayanan Kesehatan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">

        <div class="alert alert-info shadow-sm">
            <i class="fas fa-info-circle"></i>
            Selamat Datang di <strong>Rumah Sakit Sehat</strong>.
            Semoga Anda sehat selalu.
        </div>

        <?php
        function hitungData($koneksi, $tabel)
        {
            $result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM `$tabel`");
            if (!$result) return 0;
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }

        $totalKonsultasi = hitungData($koneksi, 'konsultasi');
        $totalPerawatan  = hitungData($koneksi, 'perawatan');
        $totalCheckup    = hitungData($koneksi, 'medical_checkup');
        ?>

        <div class="row">

            <div class="col-lg-4 col-md-6 mb-3">
                <div class="small-box bg-info shadow dashboard-card">
                    <div class="inner">
                        <h3><?= $totalKonsultasi ?></h3>
                        <p>Total Konsultasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <a href="index.php?page=konsultasi" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-3">
                <div class="small-box bg-success shadow dashboard-card">
                    <div class="inner">
                        <h3><?= $totalPerawatan ?></h3>
                        <p>Total Perawatan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bed"></i>
                    </div>
                    <a href="index.php?page=perawatan" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-3">
                <div class="small-box bg-warning shadow dashboard-card">
                    <div class="inner">
                        <h3><?= $totalCheckup ?></h3>
                        <p>Medical Check Up</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-notes-medical"></i>
                    </div>
                    <a href="index.php?page=medical_checkup" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>

<style>
.dashboard-card {
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.dashboard-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.25);
}

.dashboard-card .icon i {
    font-size: 70px;
    opacity: 0.3;
}

.small-box .inner h3 {
    font-size: 36px;
    font-weight: bold;
}

.small-box .inner p {
    font-size: 16px;
}

.card.bg-primary {
    background: linear-gradient(135deg, #007bff, #0056b3) !important;
    border-radius: 15px;
}

.alert {
    border-radius: 10px;
}
</style>