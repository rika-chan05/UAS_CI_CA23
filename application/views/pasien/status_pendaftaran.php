<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Status Pendaftaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Status Pendaftaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
		
          <h3 class="card-title">Status</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <?php if (!empty($pasien)): ?>
  <table id="datatable" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Nama Dokter</th>
        <th>Specialist</th>
        <th>Tanggal Kunjungan</th>
        <th>Jam Kunjungan</th>
        <th>Status</th>
        <!-- <th>Aksi</th> Tambahkan kolom aksi untuk Edit & Hapus -->
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($pasien as $p) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $p['nama']; ?></td>
          <td><?= $p['tgl_lahir']; ?></td>
          <td><?= $p['nama_dokter']; ?></td>
          <td><?= $p['specialist']; ?></td>
          <td><?= $p['tgl_kunjungan']; ?></td>
          <td><?= $p['jam_kunjungan']; ?></td>
          <td><?= $p['status']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>Tidak ada data pasien yang tersedia.</p>
<?php endif; ?>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>