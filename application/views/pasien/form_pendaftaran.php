<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Pendaftaran Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
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
		
          <h3 class="card-title">Pendaftaran</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url(). "pasien/insert";?>" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pasien" required>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir Pasien" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control summernote" name="alamat" id="alamat" placeholder="Alamat Pasien" required></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telpon">No Telephone</label>
                    <input type="text" class="form-control" name="no_telpon" id="no_telpon" placeholder="No Telephone" required>
                </div>
                <div class="form-group">
                    <label for="id_dokter">Dokter Specialist</label>
                    <select class="form-control" name="id_dokter" id="id_dokter" required>
                      <option value="">-- Pilih Dokter --</option>
                      <?php if (!empty($dokter)): ?>
                        <?php foreach ($dokter as $d): ?>
                          <option value="<?= $d->id_dokter; ?>"><?= $d->nama_dokter; ?> - <?= $d->specialist; ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control summernote" name="keluhan" id="keluhan" placeholder="Keluhan Pasien" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                    <input type="date" class="form-control" name="tgl_kunjungan" id="tgl_kunjungan" placeholder="Tanggal Kunjungan" required>
                </div>   
                <div class="form-group">
                    <label for="jam_kunjungan">Jam Kunjungan</label>
                    <input type="time" class="form-control" name="jam_kunjungan" id="jam_kunjungan" placeholder="Jam Kunjungan" required>
                </div>    
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
</section>
</div>
