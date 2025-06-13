<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('pasien'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Pasien</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Pasien</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
    <form action="<?= base_url('pasien/update/' . $pasien['id_pasien']); ?>" method="POST">
        <div class="box-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $pasien['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $pasien['tgl_lahir']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control summernote" name="alamat" id="alamat" required><?= $pasien['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="no_telpon">No Telephone</label>
                <input type="text" class="form-control" name="no_telpon" id="no_telpon" value="<?= $pasien['no_telpon']; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_dokter">Dokter Specialist</label>
                <select class="form-control" name="id_dokter" id="id_dokter" required>
                    <option value="">-- Pilih Dokter --</option>
                    <?php if (!empty($dokter)): ?>
                        <?php foreach ($dokter as $d): ?>
                            <option value="<?= $d['id_dokter']; ?>" <?= ($pasien['id_dokter'] == $d['id_dokter']) ? 'selected' : ''; ?>>
                                <?= $d['nama_dokter']; ?> - <?= $d['specialist']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control summernote" name="keluhan" id="keluhan" required><?= $pasien['keluhan']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                <input type="date" class="form-control" name="tgl_kunjungan" id="tgl_kunjungan" value="<?= $pasien['tgl_kunjungan']; ?>" required>
            </div>   
            <div class="form-group">
                <label for="jam_kunjungan">Jam Kunjungan</label>
                <input type="time" class="form-control" name="jam_kunjungan" id="jam_kunjungan" value="<?= $pasien['jam_kunjungan']; ?>" required>
            </div>    
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('pasien'); ?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </section>
</div>
