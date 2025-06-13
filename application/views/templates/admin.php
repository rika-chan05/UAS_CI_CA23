<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rumah Sakit Kita Bahagia</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->


  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Header -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">Selamat Datang di RS Kita Bahagia</h1>
      </div>
    </div>

    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Kotak Statistik -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>120</h3>
                <p>Pasien Terdaftar</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-injured"></i>
              </div>
              <a href="<?= base_url('pasien'); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>15</h3>
                <p>Dokter Aktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-md"></i>
              </div>
              <a href="<?= base_url('jadwal-dokter'); ?>" class="small-box-footer">Lihat Jadwal <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>8</h3>
                <p>Kamar Tersedia</p>
              </div>
              <div class="icon">
                <i class="fas fa-bed"></i>
              </div>
              <a href="<?= base_url('rawat-inap'); ?>" class="small-box-footer">Cek Kamar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Footer -->
  
</div>

<!-- Scripts -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>
