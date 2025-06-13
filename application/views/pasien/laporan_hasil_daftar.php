<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Data Pasien</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Pasien</li>
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
                <h3 class="card-title">Daftar Pasien</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Dokter</th>
                            <th>Keluhan</th>
                            <th>Tgl Kunjungan</th>
                            <th>Jam Kunjungan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($pasien as $p): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($p->nama); ?></td>
                                <td><?= date('d-m-Y', strtotime($p->tgl_lahir)); ?></td>
                                <td><?= nl2br(htmlspecialchars($p->alamat)); ?></td>
                                <td><?= htmlspecialchars($p->no_telpon); ?></td>
                                <td><?= htmlspecialchars($p->nama_dokter); ?> - <?= htmlspecialchars($p->specialist); ?></td>
                                <td><?= nl2br(htmlspecialchars($p->keluhan)); ?></td>
                                <td><?= date('d-m-Y', strtotime($p->tgl_kunjungan)); ?></td>
                                <td><?= date('H:i', strtotime($p->jam_kunjungan)); ?></td>
                                <td><?= htmlspecialchars($p->status); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Laporan seluruh pasien
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
